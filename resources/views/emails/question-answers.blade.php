<h2>New Question Form Submission</h2>

<p><strong>Name:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>

<h3>Answers:</h3>
<ul>
    @foreach ($questions as $question)
        <li>
            <strong>{{ $question->question }}:</strong>
            {{ $answers[$question->id] ?? 'No answer provided' }}
        </li>
    @endforeach
</ul>
