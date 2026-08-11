<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::whereNotNull('logo')
            ->orWhereHas('media')
            ->withCount('Projects')
            ->orderBy('name')
            ->get();

        return view('orionccFront.clients', compact('clients'));
    }
}
