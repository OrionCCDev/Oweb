<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        $submissions = ContactSubmission::latest()->paginate(20);
        $unreadCount = ContactSubmission::whereNull('read_at')->count();

        return view('admin.contact-submissions.index', compact('submissions', 'unreadCount'));
    }

    public function show(ContactSubmission $contactSubmission)
    {
        if (!$contactSubmission->read_at) {
            $contactSubmission->update(['read_at' => now()]);
        }

        return view('admin.contact-submissions.show', ['submission' => $contactSubmission]);
    }

    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();

        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'Submission deleted.');
    }
}
