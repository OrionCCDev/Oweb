@component('mail::message')
# New Website Inquiry

You have a new message from the contact form on the Orion Contracting Company website.

**Name:** {{ $submission->name }}
**Email:** {{ $submission->email }}
@if ($submission->phone)
**Phone:** {{ $submission->phone }}
@endif
@if ($submission->subject)
**Subject:** {{ $submission->subject }}
@endif

**Message:**

{{ $submission->message }}

@component('mail::button', ['url' => route('admin.contact-submissions.index')])
View in Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
