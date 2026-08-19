<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('projects')->orderBy('sort_order')->orderBy('id')->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);

        $client = Client::create(collect($validated)->except('logo')->toArray());

        if ($request->hasFile('logo')) {
            $client->addMedia($request->file('logo'))->toMediaCollection('clients');
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'logo' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'remove_logo' => 'nullable|boolean',
        ]);

        $client->update(collect($validated)->except(['logo', 'remove_logo'])->toArray());

        if ($request->hasFile('logo')) {
            $client->clearMediaCollection('clients');
            $client->addMedia($request->file('logo'))->toMediaCollection('clients');
        } elseif ($request->boolean('remove_logo')) {
            $client->clearMediaCollection('clients');
        }

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->clearMediaCollection('clients');
        $client->delete();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
