@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Project: {{ $project->name }}</h2>
        <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-900">← Back to Projects</a>
    </div>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Copy all fields from create.blade.php -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Project Name *</label>
                <input type="text" name="name" value="{{ old('name', $project->name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sub Name</label>
                <input type="text" name="sub_name" value="{{ old('sub_name', $project->sub_name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sector *</label>
                <select name="sector_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ old('sector_id', $project->sector_id) == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                <select name="client_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="c-pro" {{ old('status', $project->status) == 'c-pro' ? 'selected' : '' }}>Completed</option>
                    <option value="u-con" {{ old('status', $project->status) == 'u-con' ? 'selected' : '' }}>Under Construction</option>
                    <option value="u-pro" {{ old('status', $project->status) == 'u-pro' ? 'selected' : '' }}>Under Progress</option>
                    <option value="h-100" {{ old('status', $project->status) == 'h-100' ? 'selected' : '' }}>100% Complete</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Priority *</label>
                <select name="priority" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="h-v1" {{ old('priority', $project->priority) == 'h-v1' ? 'selected' : '' }}>High V1</option>
                    <option value="h-v2" {{ old('priority', $project->priority) == 'h-v2' ? 'selected' : '' }}>High V2</option>
                    <option value="m-v1" {{ old('priority', $project->priority) == 'm-v1' ? 'selected' : '' }}>Medium V1</option>
                    <option value="m-v2" {{ old('priority', $project->priority) == 'm-v2' ? 'selected' : '' }}>Medium V2</option>
                    <option value="l-v1" {{ old('priority', $project->priority) == 'l-v1' ? 'selected' : '' }}>Low V1</option>
                    <option value="l-v2" {{ old('priority', $project->priority) == 'l-v2' ? 'selected' : '' }}>Low V2</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cost</label>
                <input type="number" step="0.01" name="cost" value="{{ old('cost', $project->cost) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Contract Type</label>
                <input type="text" name="contract_type" value="{{ old('contract_type', $project->contract_type) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                <input type="text" name="duration" value="{{ old('duration', $project->duration) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Scope</label>
            <textarea name="scope" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('scope', $project->scope) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Video URL</label>
            <input type="url" name="video" value="{{ old('video', $project->video) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Add New Main Images</label>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Add New Gallery Images</label>
            <input type="file" name="gallery[]" multiple accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Project Points</label>
            <div id="project-points" class="space-y-2">
                @foreach($project->projectPoints as $point)
                    <input type="text" name="project_points[]" value="{{ $point->point }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                @endforeach
                @if($project->projectPoints->count() == 0)
                    <input type="text" name="project_points[]" placeholder="Achievement point 1" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                @endif
            </div>
            <button type="button" onclick="addProjectPoint()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Add Another Point</button>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-4">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Project</button>
        </div>
    </form>
</div>

<script>
function addProjectPoint() {
    const container = document.getElementById('project-points');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'project_points[]';
    input.placeholder = 'Achievement point ' + (container.children.length + 1);
    input.className = 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent';
    container.appendChild(input);
}
</script>
@endsection
