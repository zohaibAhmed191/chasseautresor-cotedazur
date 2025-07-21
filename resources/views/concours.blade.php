@extends('layouts.app')

@section('title', $seo->home_meta_title ?? 'Concours')

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($seo->concour_meta_description ?? Str::limit(strip_tags($seo->concour_meta_description), 150))))))
)
@section('meta_keywords', $seo->concour_meta_keywords ?? '')
@section('meta_image', asset('storage/images/logo_footer.webp'))


@section('content')
    <div class="concours_header">
        <div class="col-lg-6 col-sm-10 text-center mx-auto">
            @isset($headings->concours)
            @if ($headings->concours)
            <h1 class="pages_heading concour_heading"> {{ $headings->concours }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="concours_section_2">
        <div class="container text-center">
            <div class="col-lg-8 mx-auto">
                @isset($concours->main_heading)
                    @if ($concours->main_heading)
                        <h1>{{ $concours->main_heading }}</h1>
                    @endif
                @endisset
                @isset($concours->main_paragraph)
                    @if ($concours->main_paragraph)
                        <p class="h5 font_richard lh-base my-4">
                            {{ $concours->main_paragraph }}
                        </p>
                    @endif
                @endisset
                @isset($concours->sub_paragraph)
                    @if ($concours->sub_paragraph)
                        <p class="h5 font_richard lh-base my-4">
                            {{ $concours->sub_paragraph }}
                        </p>
                    @endif
                @endisset
            </div>
            @isset($concours->how_to_play_heading)
                @if ($concours->how_to_play_heading)
                    <h2 class="heading1 con_heading_margin">{{ $concours->how_to_play_heading }}</h2>
                @endif
            @endisset
            <div class="row mt-5">
                <div class="col-lg-4 my-4">
                    <div class="position-relative">
                    <p class="countingHead">1</p>
                        <img src={{ asset('images/circle.webp') }} class="con_circle" alt="" />
                    </div>
                    <div class="con_card_content">
                        @isset($concours->subheading1)
                            @if ($concours->subheading1)
                                <p class="head">{{ $concours->subheading1 }}</p>
                            @endif
                        @endisset
                        <p class="font_richard fs-5">
                            @isset($concours->subparagraph1)
                                @if ($concours->subparagraph1)
                                    {{ $concours->subparagraph1 }}
                            </p>
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4 my-4">
                     <div class="position-relative">
                    <p class="countingHead">2</p>
                        <img src={{ asset('images/circle.webp') }} class="con_circle" alt="" />
                    </div>
                    <div class="con_card_content">
                        @isset($concours->subheading2)
                            @if ($concours->subheading2)
                                <p class="head">{{ $concours->subheading2 }}</p>
                            @endif
                        @endisset
                        @isset($concours->subparagraph2)
                            @if ($concours->subparagraph2)
                                <p class="font_richard fs-5">
                                    {{ $concours->subparagraph2 }}
                                </p>
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4 my-4">
                     <div class="position-relative">
                    <p class="countingHead">3</p>
                        <img src={{ asset('images/circle.webp') }} class="con_circle" alt="" />
                    </div>
                    <div class="con_card_content">
                        @isset($concours->subheading3)
                            @if ($concours->subheading3)
                                <p class="head">{{ $concours->subheading3 }}</p>
                            @endif
                        @endisset
                        <p class="font_richard fs-5">
                            @isset($concours->subparagraph3)
                                @if ($concours->subparagraph3)
                                    {{ $concours->subparagraph3 }}
                            </p>
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="concours_section_3">
        <div class="container text-center">
            <div class="col-lg-8 mx-auto">
                @isset($concours->asking_question)
                    @if ($concours->asking_question)
                        <h4 class="heading1 mb-5"> {{ $concours->asking_question }}</h4>
                    @endif
                @endisset


                @isset($concours->asking_lines)
                    @if (!empty($concours->asking_lines))
                        <ol class="fs-4 font_richard">
                            @foreach ($concours->asking_lines as $line)
                                <li class="my-4">{{ $line['line'] }}</li>
                            @endforeach
                        </ol>
                    @endif
                @endisset


                @isset($concours->endlines)
                    @if (!empty($concours->endlines))
                        <div class="mt-4">
                            @foreach ($concours->endlines as $line)
                                <p class="font_richard fs-5 m-0">
                                    {{ $line['line'] }}
                                </p>
                            @endforeach
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>
    <div class="concours_section_4">
        <div class="container pad_pading">
            <div class="col-lg-10 mx-auto">
                <div class="pad_wrapper">
                    <form action="{{ route('submit.answers') }}" method="POST">
                        @csrf

                        <div class="pad_content">
                            <p class="fs-5 font_richard">PLACER VOTRE RÉPONSE ICI</p>

                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="name"  class="fw-bold">Prénom</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" autocomplete="off" name="name" class="con_input" required>
                                </div>
                            </div>

                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="email" class="fw-bold">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" autocomplete="off" name="email" class="con_input" required>
                                </div>
                            </div>

                            @foreach ($questions as $question)
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label class="fw-bold">{{ $question->question }}</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" autocomplete="off" name="answers[{{ $question->id }}]" class="con_input">
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit" class="con_button d-flex justify-content-center align-items-center"
                                id="submitBtn">
                                <span id="submitText">Envoyer</span>
                                <div id="spinner" class="loader d-none"></div>

                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const spinner = document.getElementById('spinner');

            if (form) {
                form.addEventListener('submit', function() {
                    submitText.classList.add('d-none');
                    spinner.classList.remove('d-none');
                    submitBtn.disabled = true;
                });
            }

            @if (session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50",
                }).showToast();
            @endif
        });
    </script>

@endsection
