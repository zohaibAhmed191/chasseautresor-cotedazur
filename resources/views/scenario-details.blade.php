@extends('layouts.app')
@section('title', $scenario->meta_title_seo ?? $scenario->title)
@section('meta_description', strip_tags(str_replace('&nbsp;', ' ', $scenario->meta_description_seo ?? '')))
@section('meta_keywords', $scenario->meta_keywords_seo ?? '')
@section('canonical_url', route('scenario.detail', $scenario->slug))
@section('meta_image', asset('storage/' . $scenario->image))
@section('content')
    <div class="scenario_header">
          <div class="col-lg-9 col-sm-10 text-center mx-auto">
            @isset($headings->scenario)
            @if ($headings->scenario)
            <h1 class="pages_heading concour_heading"> {{ $headings->scenario }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="scanrio_section_2 position-relative">
        <div class="container text-center">
            <img src={{ asset('images/aboutus_element.png') }} class="scanrio_element_1" alt="" />
            <img src={{ asset('images/con_element2.png') }}  class="scanrio_element_2" alt="" />
            <div class="col-lg-9 col-xl-9 mx-auto">
                <!-- <div class="video_wrapper"></div> -->

                @php
    function convertToEmbedUrl($url) {
        if (Str::contains($url, 'watch?v=')) {
            return str_replace('watch?v=', 'embed/', $url);
        }
        return $url;
    }

    $embedUrl = convertToEmbedUrl($scenario->video_url ?? '');
@endphp

@if($embedUrl)
    <div class="video-wrapper">
        <iframe width="560" height="315"
            src="{{ $embedUrl }}"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>
@endif
                 
                <h1 class="heading1 my-4"> {{ $scenario->heading ?? '' }}</h1>
                <div class="col-lg-9 mx-auto">
                    <p class="text-center font_richard fs-4">
                        {{ $scenario->paragraph ?? '' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="scanrio_custom_slider">
            <div class="scanrio_slider_1">
                 <div class="row justify-content-between align-items-center">
                            <div class="col-md-8 mx-auto col-lg-5">
                                <img src="{{ asset('storage/' . $scenario->image) }}"
                                    alt="{{ $scenario->title ?? 'Scenario Image' }}" class="nos_slider_img" />
                            </div>
                            <div class="col-lg-7">
                                <h5 class="heading1 text-dark">{{ $scenario->title }}</h5>
                                <p class="font_richard text-center text-lg-start fs-5 m-0 p-0 my-4">
                                    {{ $scenario->description ?? 'No description available' }}
                                </p>
                                <div class="row">
                                    <div class="col-sm-9 mx-auto col-md-6 my-3">
                                        <div class="member_bar">
                                         Joueurs  <span
                                                class="scanrio_quantity">{{ $scenario->players ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 mx-auto col-md-6 my-3">
                                        <div class="location_bar">
                                            Ville <span
                                                class="scanrio_quantity">{{ $scenario->location ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 mx-auto col-md-6 my-3">
                                        <div class="time_bar">
                                         Temps de jeu    <span class="scanrio_quantity">{{ $scenario->duration ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 mx-auto col-md-6 my-3">
                                        <div class="age_bar">
                                            Âge <span class="scanrio_quantity">{{ $scenario->age ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- <img src="./assets/images/prev.webp" class="scanrio_slider_prev" alt="" />
                <img src="./assets/images/next.webp" class="scanrio_slider_next" alt="" />
                <div class="scenario-1-carousel owl-carousel owl-theme my-5">
                    <div class="item">
                       
                    </div>

                </div> -->
            </div>
        </div>
        <a href="https://starlinxagency.net/sac1.html#anchor1" target="_blank" rel="noopener noreferrer">
            <button class="button1 aboutus_slider_button mt-5 d-block mx-auto myScanrioButtn">
                RÉSERVEZ VOTRE SESSION MAINTENANT
            </button>
        </a>

        <div class="container mt-lg-5 pt-5">
            <h5 class="heading1 text-center mt-5">Decouvrir aussi</h5>
            <x-scenario-slider :scenarios="$scenarios" />
        </div>
    </div>
@endsection
