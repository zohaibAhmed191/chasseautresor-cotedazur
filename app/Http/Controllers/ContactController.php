<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    $emailBody = "
        Name: {$validated['name']}\n
        Email: {$validated['email']}\n
        Message: {$validated['message']}
    ";

    Mail::raw($emailBody, function ($message) use ($validated) {
        $message->to('chasseautresor.saintmalo@gmail.com') // Replace with your email
                ->subject('New Contact Form Submission');
    });

    return response()->json(['status' => true, 'message' => 'Message sent successfully.']);
}
}
