<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// Remove this line if you don't have a ContactMessage mailable yet
// use App\Mail\ContactMessage;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string'
        ]);

        // Send email (you'll need to configure mail in .env)
        // Mail::to('info@isyaralearn.com')->send(new ContactMessage($validated));

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim! Kami akan menghubungi Anda segera.'
        ]);
    }
}