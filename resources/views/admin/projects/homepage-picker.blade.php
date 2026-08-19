@extends('layouts.admin')
@section('title', 'Homepage Projects')
@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.settings.projects-section') }}" class="text-sm text-blue-600 hover:underline mb-4 inline-block">← Projects Section</a>
    <h2 class="text-2xl font-bold mb-2">Homepage Projects</h2>
    <p class="text-sm text-gray-500 mb-6">Choose which projects show as cards in the "Our Projects" section on the homepage, and the order they appear in (lowest number first). Up to 9 are shown. To change a project's own image, status, sector, or title, use <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:underline">Catalog → Projects</a> instead.</p>

    <div class="mb-4">
        <input type="text" id="project-filter" placeholder="Filter by name…" class="w-full px-4 py-2 border rounded-lg">
    </div>

    <form action="{{ route('admin.projects.homepage-picker.update') }}" method="POST">
        @csrf

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-16">Show</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-16">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Project</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-28">Order</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($projects as $project)
                        @php
                            $thumbCandidate = $project->slug_name . '/' . $project->main_image;
                            $thumbUrl = \Illuminate\Support\Facades\Storage::disk('projects')->exists($thumbCandidate)
                                ? \Illuminate\Support\Facades\Storage::disk('projects')->url($thumbCandidate)
                                : asset('orionFrontAssets/assets/images/project/' . $project->slug_name . '/' . $project->main_image);
                        @endphp
                        <tr class="project-picker-row" data-name="{{ strtolower($project->name) }}">
                            <td class="px-4 py-3">
                                <input type="checkbox" name="featured[]" value="{{ $project->id }}" class="w-5 h-5" {{ $project->featured_on_homepage ? 'checked' : '' }}>
                            </td>
                            <td class="px-4 py-3">
                                <img src="{{ $thumbUrl }}" alt="" class="w-14 h-10 object-cover rounded" onerror="this.style.visibility='hidden'">
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-gray-900">{{ $project->name }}</div>
                                <div class="text-sm text-gray-500">{{ $project->Sector->name ?? 'No sector' }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <input type="number" name="homepage_sort_order[{{ $project->id }}]" value="{{ $project->homepage_sort_order }}" min="0" class="w-20 px-2 py-1 border rounded-lg">
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="px-4 py-4 text-center text-gray-500">No projects found. Add one under Catalog → Projects.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Changes</button>
        </div>
    </form>
</div>

<script>
document.getElementById('project-filter').addEventListener('input', function (e) {
    var term = e.target.value.trim().toLowerCase();
    document.querySelectorAll('.project-picker-row').forEach(function (row) {
        row.style.display = row.dataset.name.includes(term) ? '' : 'none';
    });
});
</script>
@endsection
