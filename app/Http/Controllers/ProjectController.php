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
        $suggested_projects = Project::where('sector_id', $project->sector_id)
        ->where('id', '!=', $project->id)
        ->with('Client')
        ->inRandomOrder()
        ->limit(3)
        ->get(['id', 'main_image', 'name', 'slug_name', 'client_id']);

        return view('orionccFront.project-details',['project' => $project , 'sug_proj'=>$suggested_projects]);
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
