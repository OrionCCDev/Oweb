<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Client;
use App\Models\Sector;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MainHomePageController extends Controller
{
    public function index(){
        // Cache for 1 hour (3600 seconds) to dramatically improve performance
        $sectors = Cache::remember('homepage.sectors', 3600, function () {
            return Sector::select('id', 'name', 'title', 'photo')
                ->get();
        });

        $events = Cache::remember('homepage.events', 3600, function () {
            return Event::select('id', 'title', 'mini_description', 'main_image', 'created_at')
                ->latest()
                ->take(6)
                ->get();
        });

        $main_event = Cache::remember('homepage.main_event', 3600, function () {
            return Event::select('id', 'title', 'mini_description', 'main_image', 'created_at')
                ->latest()
                ->first();
        });

        $projects = Cache::remember('homepage.projects', 3600, function () {
            return Project::with(['Sector:id,name'])
                ->select('id', 'name', 'slug_name', 'main_image', 'sector_id', 'priority')
                ->orderBy('priority')
                ->take(9)
                ->get();
        });

        $clients = Cache::remember('homepage.clients', 3600, function () {
            return Client::select('id', 'name', 'logo')
                ->whereNotNull('logo')
                ->get();
        });

        return view('orionccFront.index', compact('sectors','events' , 'main_event','projects' , 'clients'));
    }
}
