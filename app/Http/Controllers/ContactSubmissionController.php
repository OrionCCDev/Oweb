<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmitted;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $submission = ContactSubmission::create($validated);

        $recipient = setting('email') ?: config('mail.from.address');
        $sent = false;

        if ($recipient) {
            try {
                Mail::to($recipient)->send(new ContactFormSubmitted($submission));
                $sent = true;
            } catch (\Throwable $e) {
                Log::error('Contact form email failed to send', [
                    'submission_id' => $submission->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $submission->update(['email_sent' => $sent]);

        $message = '<p class="text-success">Thank you, ' . e($submission->name) . '! Your message has been received — we\'ll be in touch soon.</p>';

        if ($request->wantsJson() || $request->ajax()) {
            return response($message);
        }

        return back()->with('contact_success', true);
    }
}
