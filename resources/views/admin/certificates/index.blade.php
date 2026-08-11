@extends('layouts.admin')
@section('title', 'Manage Certificates')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Certificates</h2>
        <a href="{{ route('admin.certificates.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Add Certificate</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtitle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($certificates as $certificate)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($certificate->hasMedia('certificates'))
                                <img src="{{ $certificate->getFirstMediaUrl('certificates') }}" alt="" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-100 rounded flex items-center justify-center text-gray-400 text-xs">No image</div>
                            @endif
                        </td>
                        <td class="px-6 py-4"><div class="text-sm font-medium text-gray-900">{{ $certificate->title }}</div></td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $certificate->subtitle }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $certificate->sort_order }}</td>
                        <td class="px-6 py-4 text-sm font-medium space-x-2">
                            <a href="{{ route('admin.certificates.edit', $certificate) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="inline" onsubmit="return confirm('Delete this certificate?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No certificates found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $certificates->links() }}
</div>
@endsection
