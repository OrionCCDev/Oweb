<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Live-site fallback text for fields an admin hasn't overridden yet.
     * Shown in the dashboard forms (pre-filled, not just placeholder) so
     * an admin can see exactly what's on the site right now before
     * changing it. Must match the defaults passed to setting() in the
     * corresponding front-end Blade views.
     */
    private const HOMEPAGE_DEFAULTS = [
        'hero_eyebrow' => 'Since 2008 · UAE & Saudi Arabia',
        'hero_title' => 'Precision-Built Structures Across the UAE & Saudi Arabia',
        'hero_subtitle' => 'Commercial, industrial & MEP construction — trusted for quality, reliability, and on-schedule delivery.',
        'projects_tagline' => 'Checkout Our Projects',
        'projects_title' => 'Our Projects',
        'about_tagline' => 'You Dream We Build',
        'about_title' => 'Orion Founders Message',
        'about_description_1' => 'Founded in 2008 by a team of young, Experts engineers, our company has grown by leveraging extensive knowledge in industrial and commercial construction within the region.',
        'about_description_2' => 'We have built our reputation on the foundation of innovative technologies and methods, combined with creative concepts, designs, and meticulous project execution.',
        'about_commitment_text' => 'Our unwavering commitment is to achieve the ultimate satisfaction of our clients',
        'cta_tagline' => 'Need Orion Help?',
        'contact_title' => "We're leader in Contracting of Constructions market",
    ];

    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function homepage()
    {
        $settings = Setting::where('group', 'homepage')->get()->keyBy('key');
        $defaults = self::HOMEPAGE_DEFAULTS + $this->statsBarDefaults();
        return view('admin.settings.homepage', compact('settings', 'defaults'));
    }

    /**
     * Stats bar defaults for items 1-3 are computed from real data (same
     * math as MainHomePageController's $stats), so an admin who never
     * touches these fields keeps getting a live, always-current count.
     * Saving a field overrides it with a fixed value from then on.
     */
    private function statsBarDefaults(): array
    {
        return [
            'stats_1_value' => (string) (now()->year - 2008),
            'stats_1_suffix' => '+',
            'stats_1_label' => 'Years of Experience',
            'stats_2_value' => (string) Project::count(),
            'stats_2_suffix' => '+',
            'stats_2_label' => 'Projects Delivered',
            'stats_3_value' => (string) Sector::count(),
            'stats_3_suffix' => '+',
            'stats_3_label' => 'Sectors Served',
            'stats_4_value' => 'UAE & KSA',
            'stats_4_suffix' => '',
            'stats_4_label' => 'Where We Build',
        ];
    }

    public function updateHomepage(Request $request)
    {
        $fields = [
            'hero_eyebrow' => 'nullable|string',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'hero_video' => 'nullable|url',
            'hero_background_image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'stats_1_value' => 'nullable|string',
            'stats_1_suffix' => 'nullable|string',
            'stats_1_label' => 'nullable|string',
            'stats_2_value' => 'nullable|string',
            'stats_2_suffix' => 'nullable|string',
            'stats_2_label' => 'nullable|string',
            'stats_3_value' => 'nullable|string',
            'stats_3_suffix' => 'nullable|string',
            'stats_3_label' => 'nullable|string',
            'stats_4_value' => 'nullable|string',
            'stats_4_suffix' => 'nullable|string',
            'stats_4_label' => 'nullable|string',
            'about_tagline' => 'nullable|string',
            'about_title' => 'nullable|string',
            'about_description_1' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'about_commitment_text' => 'nullable|string',
            'projects_tagline' => 'nullable|string',
            'projects_title' => 'nullable|string',
            'projects_description' => 'nullable|string',
            'cta_tagline' => 'nullable|string',
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

    public function about()
    {
        $settings = Setting::where('group', 'about')->get()->keyBy('key');
        return view('admin.settings.about', compact('settings'));
    }

    public function updateAbout(Request $request)
    {
        $fields = [
            'about_intro_title' => 'nullable|string',
            'about_intro_text' => 'nullable|string',
            'about_mission' => 'nullable|string',
            'about_vision' => 'nullable|string',
        ];

        $request->validate($fields);

        foreach ($fields as $field => $rule) {
            Setting::set($field, $request->$field, 'text', 'about');
        }

        return redirect()->route('admin.settings.about')
            ->with('success', 'About page settings updated successfully.');
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
