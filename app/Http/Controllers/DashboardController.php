<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sector;
use App\Models\Event;
use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'sectors' => Sector::count(),
            'events' => Event::count(),
            'clients' => Client::count(),
            'recent_projects' => Project::latest()->take(5)->get(),
            'recent_events' => Event::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
