@extends('layouts.admin')
@section('title', 'Add Admin User')
@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Add Admin User</h2>
    <form action="{{ route('admin.admin-users.store') }}" method="POST" class="bg-white rounded-lg shadow p-6 space-y-6">
        @csrf
        @include('admin.admin-users._form')
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.admin-users.index') }}" class="px-6 py-2 bg-gray-200 rounded-lg">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg">Create</button>
        </div>
    </form>
</div>
@endsection
