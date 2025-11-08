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
        // Cache home page data for 1 hour (3600 seconds)
        $sectors = Cache::remember('home_sectors', 3600, function() {
            return Sector::select('id', 'name', 'slug_name', 'icon')->get();
        });

        $events = Cache::remember('home_events', 3600, function() {
            return Event::select('id', 'title', 'date', 'location', 'description')
                ->latest()
                ->take(5) // Limit to latest 5 events instead of all
                ->get();
        });

        $main_event = Cache::remember('home_main_event', 3600, function() {
            return Event::latest()->first();
        });

        $projects = Cache::remember('home_projects', 3600, function() {
            return Project::select('id', 'name', 'slug_name', 'main_image', 'mini_desc', 'priority')
                ->orderBy('priority')
                ->take(9)
                ->get();
        });

        $clients = Cache::remember('home_clients', 3600, function() {
            return Client::select('id', 'name', 'logo')
                ->whereNotNull('logo')
                ->take(20) // Limit to 20 clients instead of all
                ->get();
        });

        return view('orionccFront.index', compact('sectors','events' , 'main_event','projects' , 'clients'));
    }
}
