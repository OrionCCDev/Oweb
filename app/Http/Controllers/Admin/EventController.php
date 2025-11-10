<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(20);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'mini_description' => 'nullable|string',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'video_url' => 'nullable|url',
            'main_image' => 'nullable|image|max:10240',
        ]);

        $event = Event::create($validated);

        if ($request->hasFile('main_image')) {
            $event->addMedia($request->file('main_image'))->toMediaCollection('events');
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'mini_description' => 'nullable|string',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'video_url' => 'nullable|url',
            'main_image' => 'nullable|image|max:10240',
        ]);

        $event->update($validated);

        if ($request->hasFile('main_image')) {
            $event->clearMediaCollection('events');
            $event->addMedia($request->file('main_image'))->toMediaCollection('events');
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->clearMediaCollection('events');
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
