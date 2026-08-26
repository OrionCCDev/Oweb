<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $allData = Project::with(['Client','Sector'])->paginate(9);
        return view('orionccFront.projects',['allData' => $allData , 'page' => $page]);
    }
    /**
     * Display a listing of the resource.
     */
    public function indexOfList(Request $request)
    {
        $page = $request->get('page', 1);

        $allData = Project::with(['Client','Sector'])->paginate(9);
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
        $project->load(['gallaries', 'sector', 'client', 'points', 'details']);

        // Related projects: same sector or same client as this one, with
        // sector+client double-matches shown first. Deterministic order
        // (not random) so the section doesn't reshuffle on every visit.
        $sug_proj = Project::where('id', '!=', $project->id)
            ->where(function ($query) use ($project) {
                $query->where('sector_id', $project->sector_id)
                    ->orWhere('client_id', $project->client_id);
            })
            ->with('sector')
            ->orderByRaw('CASE WHEN sector_id = ? AND client_id = ? THEN 0 WHEN sector_id = ? THEN 1 ELSE 2 END', [
                $project->sector_id,
                $project->client_id,
                $project->sector_id,
            ])
            ->orderByDesc('id')
            ->limit(9)
            ->get(['id', 'name', 'slug_name', 'main_image', 'status', 'sector_id', 'client_id']);

        return view('orionccFront.project-details', [
            'videoUrl' => $project->video,
            'project' => $project,
            'sug_proj' => $sug_proj,
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
