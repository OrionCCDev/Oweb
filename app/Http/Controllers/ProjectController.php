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

}
