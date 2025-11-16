<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Client;
use App\Models\ProjectPoint;
use App\Models\ProjectGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['sector', 'client'])->latest()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $clients = Client::all();
        return view('admin.projects.create', compact('sectors', 'clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sub_name' => 'nullable|string|max:255',
            'contract_type' => 'nullable|string|max:255',
            'scope' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'status' => 'required|in:c-pro,u-con,u-pro,h-100',
            'priority' => 'required|in:h-v1,h-v2,m-v1,m-v2,l-v1,l-v2',
            'cost' => 'nullable|numeric',
            'sector_id' => 'required|exists:sectors,id',
            'client_id' => 'nullable|exists:clients,id',
            'video' => 'nullable|url',
            'mini_desc' => 'nullable|string',
            'full_desc' => 'nullable|string',
            'images.*' => 'image|max:10240',
            'gallery.*' => 'image|max:10240',
            'project_points.*' => 'nullable|string',
        ]);

        // Remove file fields from validated data before creating project
        $projectData = collect($validated)->except(['images', 'gallery', 'project_points'])->toArray();
        $projectData['slug_name'] = Str::slug($request->name);

        $project = Project::create($projectData);

        // Handle main images (flipster collection)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $project->addMedia($image)->toMediaCollection('flipster');
            }
        }

        // Handle gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                ProjectGallary::create([
                    'project_id' => $project->id,
                    'image' => $image->store('gallery', 'public'),
                ]);
            }
        }

        // Handle project points
        if ($request->project_points) {
            foreach ($request->project_points as $point) {
                if ($point) {
                    ProjectPoint::create([
                        'project_id' => $project->id,
                        'point' => $point,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $project->load(['sector', 'client', 'points', 'gallaries']);
        $sectors = Sector::all();
        $clients = Client::all();
        return view('admin.projects.edit', compact('project', 'sectors', 'clients'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sub_name' => 'nullable|string|max:255',
            'contract_type' => 'nullable|string|max:255',
            'scope' => 'nullable|string',
            'duration' => 'nullable|string|max:255',
            'status' => 'required|in:c-pro,u-con,u-pro,h-100',
            'priority' => 'required|in:h-v1,h-v2,m-v1,m-v2,l-v1,l-v2',
            'cost' => 'nullable|numeric',
            'sector_id' => 'required|exists:sectors,id',
            'client_id' => 'nullable|exists:clients,id',
            'video' => 'nullable|url',
            'mini_desc' => 'nullable|string',
            'full_desc' => 'nullable|string',
            'images.*' => 'image|max:10240',
            'gallery.*' => 'image|max:10240',
            'project_points.*' => 'nullable|string',
        ]);

        // Remove file fields from validated data before updating project
        $projectData = collect($validated)->except(['images', 'gallery', 'project_points'])->toArray();
        $projectData['slug_name'] = Str::slug($request->name);

        $project->update($projectData);

        // Handle new main images (flipster collection)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $project->addMedia($image)->toMediaCollection('flipster');
            }
        }

        // Handle new gallery images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                ProjectGallary::create([
                    'project_id' => $project->id,
                    'image' => $image->store('gallery', 'public'),
                ]);
            }
        }

        // Update project points
        if ($request->has('project_points')) {
            $project->points()->delete();
            foreach ($request->project_points as $point) {
                if ($point) {
                    ProjectPoint::create([
                        'project_id' => $project->id,
                        'point' => $point,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        // Delete related data
        $project->points()->delete();
        $project->gallaries()->delete();
        $project->clearMediaCollection('flipster');
        $project->clearMediaCollection('mini_gallary');
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function deleteImage(Request $request)
    {
        $mediaId = $request->media_id;
        $media = \Spatie\MediaLibrary\MediaCollections\Models\Media::find($mediaId);

        if ($media) {
            $media->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function deleteGalleryImage($id)
    {
        $gallery = ProjectGallary::findOrFail($id);

        // Delete the file from storage
        if (\Storage::disk('public')->exists($gallery->image)) {
            \Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json(['success' => true]);
    }
}
