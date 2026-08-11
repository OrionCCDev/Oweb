<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->orderBy('id')->paginate(20);
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        $certificate = Certificate::create($this->prepareData($validated));

        if ($request->hasFile('image')) {
            $certificate->addMedia($request->file('image'))->toMediaCollection('certificates');
        }

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $this->validated($request);

        $certificate->update($this->prepareData($validated));

        if ($request->hasFile('image')) {
            $certificate->clearMediaCollection('certificates');
            $certificate->addMedia($request->file('image'))->toMediaCollection('certificates');
        }

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->clearMediaCollection('certificates');
        $certificate->delete();

        return redirect()->route('admin.certificates.index')
            ->with('success', 'Certificate deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'summary' => 'nullable|string',
            'points' => 'nullable|string',
            'closing_text' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);
    }

    private function prepareData(array $validated): array
    {
        $points = [];

        foreach (preg_split('/\r\n|\r|\n/', (string) ($validated['points'] ?? '')) as $line) {
            $line = trim($line);
            if ($line === '') {
                continue;
            }

            [$pointTitle, $pointText] = array_pad(explode('|', $line, 2), 2, '');
            $points[] = [
                'title' => trim($pointTitle),
                'text' => trim($pointText),
            ];
        }

        return collect($validated)
            ->except(['image', 'points'])
            ->merge([
                'points' => $points,
                'sort_order' => $validated['sort_order'] ?? 0,
            ])
            ->toArray();
    }
}
