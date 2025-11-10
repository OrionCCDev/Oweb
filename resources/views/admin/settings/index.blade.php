@extends('layouts.admin')
@section('title', 'All Settings')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">All Settings</h2>
        <a href="{{ route('admin.settings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">+ Add Setting</a>
    </div>
    
    @foreach($settings as $group => $groupSettings)
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b">
            <h3 class="text-lg font-semibold">{{ ucfirst($group) }} Settings</h3>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Key</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Value</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($groupSettings as $setting)
                <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $setting->key }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($setting->value, 50) }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $setting->type }}</td>
                    <td class="px-6 py-4 text-sm font-medium space-x-2">
                        <a href="{{ route('admin.settings.edit', $setting) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach
</div>
@endsection
