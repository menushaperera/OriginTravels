<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|confirmed',
            'email_confirmation' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'inquiry_type' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        try {
            ContactSubmission::create($validated);
            return back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}