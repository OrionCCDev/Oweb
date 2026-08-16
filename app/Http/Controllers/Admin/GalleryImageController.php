<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function index()
    {
        $images = GalleryImage::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.gallery-images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.gallery-images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);

        $image = GalleryImage::create(collect($validated)->except('image')->toArray());
        $image->addMedia($request->file('image'))->toMediaCollection('image');

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image added successfully.');
    }

    public function edit(GalleryImage $galleryImage)
    {
        return view('admin.gallery-images.edit', ['image' => $galleryImage]);
    }

    public function update(Request $request, GalleryImage $galleryImage)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);

        $galleryImage->update(collect($validated)->except('image')->toArray());

        if ($request->hasFile('image')) {
            $galleryImage->addMedia($request->file('image'))->toMediaCollection('image');
        }

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(GalleryImage $galleryImage)
    {
        $galleryImage->clearMediaCollection('image');
        $galleryImage->delete();

        return redirect()->route('admin.gallery-images.index')
            ->with('success', 'Image deleted successfully.');
    }
}
