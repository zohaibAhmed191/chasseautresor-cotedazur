<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactUsMail;
use App\Models\Blog;
use App\Models\Scenario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\QuestionAnswerController;



Route::get('/', function () {
    return view('index');
});
Route::get('/faq', function () {
    return view('faqs');
});
Route::get('/à-propos', function () {
    return view('aprops'); 
});
Route::get('/mysteria-quest', function () {
    return view('mysteria-quest');
});
Route::get('/concours', [QuestionAnswerController::class, 'showForm'])->name('concours.form');
Route::get('/concours', [QuestionAnswerController::class, 'showForm'])->name('concours.form');
Route::post('/questions/submit', [QuestionAnswerController::class, 'submitAnswers'])->name('submit.answers');



Route::get('/scenario', function () {
    // Fetch the last scenario by created_at
    $lastScenario = Scenario::orderBy('created_at', 'desc')->first();

    if ($lastScenario) {
        // Redirect to the last scenario's slug
        return Redirect::to(route('scenario.detail', $lastScenario->slug));
    }

    // If no scenarios exist, redirect to home
    return Redirect::to('/');
});

Route::get('/scenario/{slug}', function ($slug) {
    try {
        // Try to fetch the scenario by slug
        $scenario = Scenario::getDetailsBySlug($slug);
        return view('scenario-details', compact('scenario'));
    } catch (\Exception $e) {
        // If slug not found, fetch the last scenario
        $lastScenario = Scenario::orderBy('created_at', 'desc')->first();

        if ($lastScenario) {
            // Redirect to the last scenario's slug
            return Redirect::to(route('scenario.detail', $lastScenario->slug));
        }

        // If no scenarios exist, redirect to home
        return Redirect::to('/');
    }
})->name('scenario.detail');


Route::get('/blog', function () {
    // Fetch the last blog by created_at
    $lastBlog = Blog::orderBy('created_at', 'desc')->first();

    if ($lastBlog) {
        // Redirect to the last blog's slug
        return Redirect::to(route('blog.detail', $lastBlog->slug));
    }

    // If no blogs exist, redirect to home
    return Redirect::to('/');
});

Route::get('/blog/{slug}', function ($slug) {
    try {
        $blog = Blog::getDetailsBySlug($slug);
        return view('blogs-details', compact('blog'));
    } catch (\Exception $e) {
        // Log::error('Blog route error: ' . $e->getMessage());
        $lastBlog = Blog::orderBy('created_at', 'desc')->first();

        if ($lastBlog) {
            return Redirect::to(route('blog.detail', $lastBlog->slug));
        }

        return Redirect::to('/');
    }
})->name('blog.detail');

// Define login route that redirects to Filament login
Route::get('login', function () {
    return redirect()->to(Filament::getLoginUrl());
})->name('login');

Route::get('/admin/dashboard', function () {
    return view('filament.pages.dashboard');  // This is Filament's default dashboard view
})->name('filament.pages.dashboard');



Route::post('/contact/send', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

