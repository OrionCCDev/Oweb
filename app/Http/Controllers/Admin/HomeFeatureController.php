<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFeature;
use Illuminate\Http\Request;

class HomeFeatureController extends Controller
{
    public function index()
    {
        $features = HomeFeature::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.home-features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.home-features.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        $feature = HomeFeature::create(collect($validated)->except('icon')->toArray());

        if ($request->hasFile('icon')) {
            $feature->addMedia($request->file('icon'))->toMediaCollection('icon');
        }

        return redirect()->route('admin.home-features.index')
            ->with('success', 'Feature created successfully.');
    }

    public function edit(HomeFeature $homeFeature)
    {
        return view('admin.home-features.edit', ['feature' => $homeFeature]);
    }

    public function update(Request $request, HomeFeature $homeFeature)
    {
        $validated = $this->validated($request);

        $homeFeature->update(collect($validated)->except('icon')->toArray());

        if ($request->hasFile('icon')) {
            $homeFeature->addMedia($request->file('icon'))->toMediaCollection('icon');
        }

        return redirect()->route('admin.home-features.index')
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(HomeFeature $homeFeature)
    {
        $homeFeature->clearMediaCollection('icon');
        $homeFeature->delete();

        return redirect()->route('admin.home-features.index')
            ->with('success', 'Feature deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'icon' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:2048',
        ]);
    }
}
