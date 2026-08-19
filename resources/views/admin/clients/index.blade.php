@extends('layouts.admin')
@section('title', 'Manage Clients')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Clients</h2>
        <a href="{{ route('admin.clients.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Add Client</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
    @endif

    <p class="text-sm text-gray-500">Shown in the "Our Clients" homepage grid, ordered by Order (lowest first) — set the most important clients to the lowest numbers so they show in the first row.</p>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Website</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Projects</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($clients as $client)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($client->hasMedia('clients'))
                                <img src="{{ $client->getFirstMediaUrl('clients') }}" alt="{{ $client->name }}" class="w-16 h-10 object-contain">
                            @else
                                <div class="w-16 h-10 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs">—</div>
                            @endif
                        </td>
                        <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">{{ $client->name }}</div></td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            @if ($client->website_url)
                                <a href="{{ $client->website_url }}" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Visit ↗</a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $client->sort_order }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $client->projects_count }}</td>
                        <td class="px-6 py-4 text-sm font-medium space-x-2">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Delete?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">No clients found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $clients->links() }}
</div>
@endsection
