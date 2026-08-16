<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSettingController extends Controller
{
    public function index()
    {
        $groups = collect(config('site_content'))->map(function ($definition, $group) {
            return array_merge($definition, ['group' => $group]);
        })->values();

        return view('admin.content.index', compact('groups'));
    }

    /**
     * Every controllable section is declared in config/site_content.php.
     * Stored Setting keys are namespaced "{group}.{field}" since several
     * groups reuse field names like "title"/"tagline".
     */
    public function edit(string $group)
    {
        $definition = $this->definitionFor($group);

        $values = Setting::where('group', $group)->get()->keyBy(function ($setting) use ($group) {
            return str_replace("{$group}.", '', $setting->key);
        });

        return view('admin.content.edit', [
            'group' => $group,
            'definition' => $definition,
            'values' => $values,
        ]);
    }

    public function update(Request $request, string $group)
    {
        $definition = $this->definitionFor($group);

        foreach ($definition['fields'] as $field => $config) {
            $storageKey = "{$group}.{$field}";

            if ($config['type'] === 'image') {
                if ($request->hasFile($field)) {
                    $validated = $request->validate([
                        $field => 'image|mimes:jpeg,jpg,png,webp,gif|max:10240',
                    ]);
                    $path = $request->file($field)->store('settings', 'public');
                    Setting::set($storageKey, $path, 'image', $group);
                }
                continue;
            }

            $rule = $config['type'] === 'url' ? 'nullable|url' : 'nullable|string';
            $request->validate([$field => $rule]);

            Setting::set($storageKey, $request->input($field), $config['type'] === 'textarea' ? 'textarea' : 'text', $group);
        }

        return redirect()->route('admin.content.edit', $group)
            ->with('success', $definition['label'] . ' updated successfully.');
    }

    private function definitionFor(string $group): array
    {
        $definition = config("site_content.{$group}");

        abort_if($definition === null, Response::HTTP_NOT_FOUND);

        return $definition;
    }
}
