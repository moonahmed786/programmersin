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
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        return view('admin.inquiries.show', compact('inquiry'));
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

        Inquiry::create($validated);

        if ($request->ajax()) {
            return response()->json(['message' => 'Thank you for your inquiry. Our team will contact you shortly.']);
        }

        return back()->with('success', 'Your inquiry has been submitted successfully.');
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
