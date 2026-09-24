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
        $validated = $request->validate($this->rules());

        $event = Event::create(collect($validated)->except(['main_image', 'gallery'])->toArray());

        if ($request->hasFile('main_image')) {
            $event->addMedia($request->file('main_image'))->toMediaCollection('events');
        }

        $this->addGalleryImages($request, $event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate($this->rules());

        $event->update(collect($validated)->except(['main_image', 'gallery'])->toArray());

        if ($request->hasFile('main_image')) {
            $event->clearMediaCollection('events');
            $event->addMedia($request->file('main_image'))->toMediaCollection('events');
            $event->update(['main_image' => null]);
        }

        $this->addGalleryImages($request, $event);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->clearMediaCollection('events');
        $event->clearMediaCollection('gallery');
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    /**
     * Remove one photo from an event's gallery. Scoped to this event's own
     * gallery collection, so it can't be used to delete other media.
     */
    public function destroyGalleryImage(Event $event, int $media)
    {
        $item = $event->media()
            ->where('collection_name', 'gallery')
            ->whereKey($media)
            ->first();

        if (!$item) {
            return response()->json(['success' => false], 404);
        }

        $item->delete();

        return response()->json(['success' => true]);
    }

    private function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'mini_description' => 'nullable|string',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'video_url' => 'nullable|url',
            'main_image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,jpg,png,webp|max:10240',
        ];
    }

    /**
     * Gallery uploads are additive - new photos join the existing ones;
     * individual photos are removed from the edit page.
     */
    private function addGalleryImages(Request $request, Event $event): void
    {
        foreach ($request->file('gallery', []) as $image) {
            $event->addMedia($image)->toMediaCollection('gallery');
        }
    }
}
