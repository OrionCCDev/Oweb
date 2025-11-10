<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::withCount('projects')->latest()->paginate(20);
        return view('admin.sectors.index', compact('sectors'));
    }

    public function create()
    {
        return view('admin.sectors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:10240',
        ]);

        $sector = Sector::create($validated);

        if ($request->hasFile('photo')) {
            $sector->addMedia($request->file('photo'))->toMediaCollection('sectors');
        }

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector created successfully.');
    }

    public function edit(Sector $sector)
    {
        return view('admin.sectors.edit', compact('sector'));
    }

    public function update(Request $request, Sector $sector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:10240',
        ]);

        $sector->update($validated);

        if ($request->hasFile('photo')) {
            $sector->clearMediaCollection('sectors');
            $sector->addMedia($request->file('photo'))->toMediaCollection('sectors');
        }

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector updated successfully.');
    }

    public function destroy(Sector $sector)
    {
        $sector->clearMediaCollection('sectors');
        $sector->delete();

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector deleted successfully.');
    }
}
