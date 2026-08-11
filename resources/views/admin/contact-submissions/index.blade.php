@extends('layouts.admin')
@section('title', 'Contact Submissions')
@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold">Contact Form Submissions</h2>
        @if ($unreadCount > 0)
            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">{{ $unreadCount }} unread</span>
        @endif
    </div>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">From</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Received</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($submissions as $submission)
                    <tr class="{{ $submission->read_at ? '' : 'bg-blue-50' }}">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $submission->name }}</div>
                            <div class="text-sm text-gray-500">{{ $submission->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ Str::limit($submission->subject ?: '(no subject)', 40) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $submission->created_at->diffForHumans() }}</td>
                        <td class="px-6 py-4 text-sm">
                            @if ($submission->email_sent)
                                <span class="text-green-600">Sent</span>
                            @else
                                <span class="text-red-600" title="Email delivery failed or not configured - check mail settings">Not sent</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm font-medium space-x-2">
                            <a href="{{ route('admin.contact-submissions.show', $submission) }}" class="text-blue-600 hover:text-blue-900">View</a>
                            <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST" class="inline" onsubmit="return confirm('Delete?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No submissions yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $submissions->links() }}
</div>
@endsection
