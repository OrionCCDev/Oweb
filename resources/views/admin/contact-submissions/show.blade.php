@extends('layouts.admin')
@section('title', 'Contact Submission')
@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <a href="{{ route('admin.contact-submissions.index') }}" class="text-blue-600 hover:text-blue-900 text-sm">&larr; Back to submissions</a>

    <div class="bg-white rounded-lg shadow p-6 space-y-4">
        <div>
            <h2 class="text-2xl font-bold">{{ $submission->subject ?: '(no subject)' }}</h2>
            <p class="text-sm text-gray-500 mt-1">{{ $submission->created_at->format('M j, Y \a\t g:i A') }}</p>
        </div>

        <div class="border-t pt-4 grid grid-cols-2 gap-4 text-sm">
            <div>
                <span class="text-gray-500">From</span>
                <p class="font-medium text-gray-900">{{ $submission->name }}</p>
            </div>
            <div>
                <span class="text-gray-500">Email</span>
                <p class="font-medium text-gray-900"><a href="mailto:{{ $submission->email }}" class="text-blue-600">{{ $submission->email }}</a></p>
            </div>
            @if ($submission->phone)
            <div>
                <span class="text-gray-500">Phone</span>
                <p class="font-medium text-gray-900"><a href="tel:{{ $submission->phone }}" class="text-blue-600">{{ $submission->phone }}</a></p>
            </div>
            @endif
        </div>

        <div class="border-t pt-4">
            <span class="text-sm text-gray-500">Message</span>
            <p class="mt-2 text-gray-900 whitespace-pre-line">{{ $submission->message }}</p>
        </div>

        <div class="border-t pt-4 flex justify-between items-center">
            <a href="mailto:{{ $submission->email }}?subject=Re: {{ $submission->subject ?: 'Your inquiry' }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Reply by Email</a>
            <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST" onsubmit="return confirm('Delete this submission?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
