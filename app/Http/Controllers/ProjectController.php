<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);

        // Cache project list for 30 minutes per page
        $cacheKey = 'projects_grid_page_' . $page;
        $allData = Cache::remember($cacheKey, 1800, function() {
            return Project::select('id', 'name', 'slug_name', 'main_image', 'mini_desc', 'client_id', 'sector_id', 'priority')
                ->with([
                    'Client:id,name',
                    'Sector:id,name'
                ])
                ->orderBy('priority')
                ->paginate(9);
        });

        return view('orionccFront.projects',['allData' => $allData , 'page' => $page]);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexOfList(Request $request)
    {
        $page = $request->get('page', 1);

        // Cache project list for 30 minutes per page
        $cacheKey = 'projects_list_page_' . $page;
        $allData = Cache::remember($cacheKey, 1800, function() {
            return Project::select('id', 'name', 'slug_name', 'main_image', 'full_desc', 'client_id', 'sector_id', 'priority')
                ->with([
                    'Client:id,name',
                    'Sector:id,name'
                ])
                ->orderBy('priority')
                ->paginate(9);
        });

        return view('orionccFront.projects_list',['allData' => $allData, 'page' => $page]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Project::all(['id' , 'name']);
        return view('orionccFront.create_project',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        if ($request->hasFile('pro_images')) {
            $project->addMultipleMediaFromRequest(['pro_images'])
                ->each(function ($fileAdder) use ($request) {
                    $fileAdder->withResponsiveImages()->toMediaCollection($request->project_collection);
                });
        }
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // Eager load necessary relationships with specific fields
        $project->load([
            'gallaries:id,project_id,image',
            'sector:id,name',
            'client:id,name',
            'points:id,project_id,point'
        ]);

        // Cache suggested projects for this sector for 1 hour
        $cacheKey = 'suggested_projects_sector_' . $project->sector_id . '_exclude_' . $project->id;
        $suggested_projects = Cache::remember($cacheKey, 3600, function() use ($project) {
            return Project::where('sector_id', $project->sector_id)
                ->where('id', '!=', $project->id)
                ->select('id', 'main_image', 'name', 'slug_name', 'client_id')
                ->with('client:id,name')
                ->inRandomOrder()
                ->limit(3)
                ->get();
        });

        return view('orionccFront.project-details', [
            'videoUrl' => $project->video,
            'project' => $project,
            'sug_proj' => $suggested_projects,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
