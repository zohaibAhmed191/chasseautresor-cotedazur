<?php

namespace App\Http\Controllers;

use App\Mail\QuestionAnswersMail;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestionAnswerController extends Controller
{

    public function showForm()
    {

        $questions = Question::limit(3)->get();
        return view('concours', compact('questions'));
    }

    public function submitAnswers(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'answers' => 'array',
        ]);

        $questions = Question::limit(3)->get();

        Mail::to('chasseautresor.saintmalo@gmail.com')->send(new QuestionAnswersMail(
            $data['name'],
            $data['email'],
            $questions,
            $data['answers'] ?? []
        ));

        return redirect()->route('concours.form')->with('success', 'Vos réponses ont été envoyées !, Merci');
    }
}
