<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $inquiries = Inquiry::latest()->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        $inquiry->load(['notes.user']);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function storeNote(Request $request, Inquiry $inquiry)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $inquiry->notes()->create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Internal note added successfully.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $inquiry = Inquiry::create($validated);

        // Send email notification to admin
        try {
            $this->applySmtpSettings();
            $adminEmail = \App\Models\Setting::get('contact_email', 'admin@programmersin.com');
            \Illuminate\Support\Facades\Mail::to($adminEmail)->send(new \App\Mail\NewInquiry($inquiry));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send inquiry email: ' . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json(['message' => 'Thank you for your inquiry. Our team will contact you shortly.']);
        }

        return back()->with('success', 'Your inquiry has been submitted successfully.');
    }

    /**
     * Apply SMTP settings from the database at runtime.
     */
    private function applySmtpSettings()
    {
        $host = \App\Models\Setting::get('mail_host');
        $port = \App\Models\Setting::get('mail_port');
        $username = \App\Models\Setting::get('mail_username');
        $password = \App\Models\Setting::get('mail_password');
        $encryption = \App\Models\Setting::get('mail_encryption');

        if ($host && $username && $password) {
            config([
                'mail.mailers.smtp.host' => $host,
                'mail.mailers.smtp.port' => $port ?? 587,
                'mail.mailers.smtp.username' => $username,
                'mail.mailers.smtp.password' => $password,
                'mail.mailers.smtp.encryption' => $encryption ?? 'tls',
            ]);
        }
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:new,in_review,responded,closed',
        ]);

        $inquiry->update($validated);

        return back()->with('success', 'Inquiry status updated successfully.');
    }
}
