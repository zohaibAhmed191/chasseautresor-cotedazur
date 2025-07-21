<?php

namespace App\Http\Controllers\Api;

use App\Mail\NewsletterThankYouMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $newsletter = Newsletter::create([
                'email' => $request->email,
            ]);

            // ✅ Send Thank You email
            Mail::to($request->email)->send(new NewsletterThankYouMail($request->email));

            return response()->json([
                'success' => true,
                'message' => 'Successfully subscribed to the newsletter!',
                'data' => $newsletter,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while subscribing: ' . $e->getMessage(),
            ], 500);
        }
    }
}
