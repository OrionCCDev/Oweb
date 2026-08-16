<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Client;
use App\Models\Sector;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\HomeFeature;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class MainHomePageController extends Controller
{
    public function index(){
        $sectors = Sector::all();
        $events = Event::all();
        $main_event = Event::latest()->take(1)->first();
        $projects = Project::orderBy('priority')->take(9)->get();
        $clients = Client::whereNotNull('logo')->orWhereHas('media')->get();
        $certificates = Certificate::orderBy('sort_order')->orderBy('id')->take(5)->get();
        $homeFeatures = HomeFeature::orderBy('sort_order')->orderBy('id')->get();
        $galleryImages = GalleryImage::orderBy('sort_order')->orderBy('id')->get();
        $stats = [
            'years' => now()->year - 2008,
            'projects' => Project::count(),
            'sectors' => Sector::count(),
            'clients' => $clients->count(),
        ];
        // dd($events , $main_event);
        return view('orionccFront.index', compact('sectors','events' , 'main_event','projects' , 'clients', 'stats', 'certificates', 'homeFeatures', 'galleryImages'));
    }

    public function modeled(){
        $sectors = Sector::all();
        $projects = Project::orderBy('priority')->take(6)->get();
        $clients = Client::whereNotNull('logo')->orWhereHas('media')->get();
        $stats = [
            'years' => now()->year - 2008,
            'projects' => Project::count(),
            'sectors' => Sector::count(),
            'clients' => $clients->count(),
        ];

        return view('orionccFront.home-modeled', compact('sectors', 'projects', 'stats'));
    }
}
