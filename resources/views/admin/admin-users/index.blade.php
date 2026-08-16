@extends('layouts.admin')
@section('title', 'Admin Users')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Admin Users</h2>
        <a href="{{ route('admin.admin-users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">+ Add Admin</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg">{{ session('error') }}</div>
    @endif

    <p class="text-sm text-gray-500">
        <strong>Super Admin</strong> can manage other admin accounts and everything below. <strong>Admin</strong> can manage all site content but not other admins.
        Anyone not listed here who signs up at /register has no dashboard access at all.
    </p>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                            @if ($user->id === auth()->id())
                                <span class="text-xs text-gray-400">(you)</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if ($user->role === 'super_admin')
                                <span class="px-2 py-1 text-xs font-semibold bg-purple-100 text-purple-800 rounded-full">Super Admin</span>
                            @elseif ($user->role === 'admin')
                                <span class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">Admin</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-600 rounded-full">No access ({{ $user->role }})</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium space-x-2">
                            <a href="{{ route('admin.admin-users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            @if ($user->id !== auth()->id())
                                <form action="{{ route('admin.admin-users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this admin account?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
