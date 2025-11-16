@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Create New Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-900">← Back to Projects</a>
    </div>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Project Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sub Name</label>
                <input type="text" name="sub_name" value="{{ old('sub_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sector *</label>
                <select name="sector_id" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select Sector</option>
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                <select name="client_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="c-pro" {{ old('status') == 'c-pro' ? 'selected' : '' }}>Completed</option>
                    <option value="u-con" {{ old('status') == 'u-con' ? 'selected' : '' }}>Under Construction</option>
                    <option value="u-pro" {{ old('status') == 'u-pro' ? 'selected' : '' }}>Under Progress</option>
                    <option value="h-100" {{ old('status') == 'h-100' ? 'selected' : '' }}>100% Complete</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Priority *</label>
                <select name="priority" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="h-v1" {{ old('priority') == 'h-v1' ? 'selected' : '' }}>High V1</option>
                    <option value="h-v2" {{ old('priority') == 'h-v2' ? 'selected' : '' }}>High V2</option>
                    <option value="m-v1" {{ old('priority') == 'm-v1' ? 'selected' : '' }}>Medium V1</option>
                    <option value="m-v2" {{ old('priority') == 'm-v2' ? 'selected' : '' }}>Medium V2</option>
                    <option value="l-v1" {{ old('priority') == 'l-v1' ? 'selected' : '' }}>Low V1</option>
                    <option value="l-v2" {{ old('priority') == 'l-v2' ? 'selected' : '' }}>Low V2</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Cost</label>
                <input type="number" step="0.01" name="cost" value="{{ old('cost') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Contract Type</label>
                <input type="text" name="contract_type" value="{{ old('contract_type') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                <input type="text" name="duration" value="{{ old('duration') }}" placeholder="e.g., 12 months" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Scope</label>
            <textarea name="scope" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('scope') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
            <textarea name="mini_desc" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Brief description for project preview">{{ old('mini_desc') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Full Description</label>
            <textarea name="full_desc" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Detailed project description">{{ old('full_desc') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Video URL (YouTube, Vimeo, etc.)</label>
            <input type="url" name="video" value="{{ old('video') }}" placeholder="https://www.youtube.com/watch?v=..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Main Images</label>
            <input type="file" name="images[]" multiple accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <p class="text-sm text-gray-500 mt-1">You can select multiple images. Max 10MB per image.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
            <input type="file" name="gallery[]" multiple accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <p class="text-sm text-gray-500 mt-1">You can select multiple gallery images. Max 10MB per image.</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Project Points</label>
            <div id="project-points" class="space-y-2">
                <input type="text" name="project_points[]" placeholder="Achievement point 1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button type="button" onclick="addProjectPoint()" class="mt-2 text-sm text-blue-600 hover:text-blue-800">+ Add Another Point</button>
        </div>

        <div class="flex items-center justify-end space-x-4 pt-4">
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Project</button>
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
