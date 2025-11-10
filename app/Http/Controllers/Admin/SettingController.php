<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function homepage()
    {
        $settings = Setting::where('group', 'homepage')->get()->keyBy('key');
        return view('admin.settings.homepage', compact('settings'));
    }

    public function updateHomepage(Request $request)
    {
        $fields = [
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'hero_video' => 'nullable|url',
            'about_title' => 'nullable|string',
            'about_description' => 'nullable|string',
            'about_image' => 'nullable|image|max:10240',
            'services_title' => 'nullable|string',
            'services_description' => 'nullable|string',
            'projects_title' => 'nullable|string',
            'projects_description' => 'nullable|string',
            'contact_title' => 'nullable|string',
            'contact_description' => 'nullable|string',
        ];

        $request->validate($fields);

        foreach ($fields as $field => $rule) {
            if ($request->has($field) && !$request->hasFile($field)) {
                Setting::set($field, $request->$field, 'text', 'homepage');
            } elseif ($request->hasFile($field)) {
                $path = $request->file($field)->store('settings', 'public');
                Setting::set($field, $path, 'image', 'homepage');
            }
        }

        return redirect()->route('admin.settings.homepage')
            ->with('success', 'Homepage settings updated successfully.');
    }

    public function contact()
    {
        $settings = Setting::where('group', 'contact')->get()->keyBy('key');
        return view('admin.settings.contact', compact('settings'));
    }

    public function updateContact(Request $request)
    {
        $fields = [
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
        ];

        $request->validate($fields);

        foreach ($fields as $field => $rule) {
            if ($request->has($field)) {
                Setting::set($field, $request->$field, 'text', 'contact');
            }
        }

        return redirect()->route('admin.settings.contact')
            ->with('success', 'Contact settings updated successfully.');
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:settings,key',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,video,file',
            'group' => 'nullable|string',
        ]);

        Setting::create($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image,video,file',
            'group' => 'nullable|string',
        ]);

        $setting->update($validated);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }
}
