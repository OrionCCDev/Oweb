@extends('layouts.admin')
@section('title', 'Create Sector')
@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Create New Sector</h2>
    <form action="{{ route('admin.sectors.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
            <input type="text" name="title" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.sectors.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Create</button>
        </div>
    </form>
</div>
@endsection
