<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'service' => 'nullable|string|in:tavern,trendy,realtors',
        ]);

        // Process the contact form (you can add email sending logic here)
        
        // Redirect with success message
        return redirect()->route('contact')->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}