@extends('layouts.app')

@section('title', $seo->home_meta_title ?? 'Accueil')

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($seo->home_meta_description ?? Str::limit(strip_tags($seo->home_meta_description), 150))))))
)
@section('meta_keywords', $seo->home_meta_keywords ?? '')
@section('meta_image', asset('storage/images/logo_footer.webp'))
@section('content')
    <div class="home_header">
        <div class="col-lg-6 col-sm-10 text-center mx-auto">
            @isset($headings->home)
            @if ($headings->home)
            <h1 class="pages_heading"> {{ $headings->home }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="home_section_2">
        <div class="container">
            <div class="col-lg-9 mx-auto">
              <div class="wooden_wrapper">
    <iframe width="100%" height="100%"
        src="https://www.youtube.com/embed/RpzRpIc_47Y"
        frameborder="0"
        allowfullscreen>
    </iframe>
</div>
            </div>
        </div>
    </div>
    <div class="home_section_3">
        <img src={{ asset('images/hat.webp') }} class="section_3_hat" alt="" />
        <div class="container">
            <div class="col-lg-10 mx-auto position-relative">
                <img src={{ asset('images/prev.webp') }} class="slide_arrow game_prev" alt="" />
                <img src={{ asset('images/next.webp') }} class="slide_arrow game_next" alt="" />
                <div class="games-carousel owl-carousel owl-theme my-5">
                 @if (!empty($scenarios))
        @foreach ($scenarios as $scenario)
            <div class="item">
                <div class="d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-center">
                    <div class="slide_game_img">
                        <img src="{{ asset('storage/' . $scenario->image) }}" alt="{{ $scenario->title ?? 'Scenario image' }}" />
                    </div>
                    <div class="slide_game_content">
                        <h4>{{ $scenario->title ?? 'No title available' }}</h4>
                        <p>{!! preg_replace('/<\/?p>/', '', $scenario->description ?? 'No description available') !!}</p>
                        <a href="{{ route('scenario.detail', $scenario->slug) }}">
                            <button class="button1 mt-4 d-block mx-auto mx-lg-0">
                                Lire plus
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center">
            <p>No scenarios found.</p>
        </div>
    @endif
            </div>
        </div>
    </div>
    
    </div>
    <div class="home_section_4 position-relative">

    <div class="container my-5">
        <h2 class="heading1 text-center mb-5">Comment Procéder</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 my-4">
                <div class="new_wheel">
                    <div class="wheel_content"> Choisissez votre chasse au trésor</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 my-4">
                <div class="new_wheel">
                    <div class="wheel_content">Préparer votre équipage pour l’aventure</div>

                </div>
            </div>
            <div class="col-md-6 col-lg-4 my-4">
                <div class="new_wheel">
                    <div class="wheel_content">Réservez 
votre session sur starlinxagency.net</div>

                </div>
            </div>
        </div>
    </div>

<div class="container presentation_div">
        <div class="presentation_wrapper">
            <img src={{ asset('images/keyy.webp') }} class="d-none d-lg-block" alt="">
        @if (!empty($homePresentation) && ($homePresentation->heading || $homePresentation->description))
    <div class="presentation_content">
        @if (!empty($homePresentation->heading))
            <h3>{{ $homePresentation->heading }}</h3>
        @endif

        @if (!empty($homePresentation->description))
            <p class="fs-5">{!! $homePresentation->description !!}</p>
        @endif
    </div>
@endif
        
        </div>

    </div>

        <div class="container">
            <h2 class="heading1 text-center mb-5">Avis des aventuriers</h2>
            <div class="titre-carousel owl-carousel owl-theme my-5">

   @if (!empty($reviews))
        @foreach ($reviews as $review)
            <div class="item">
                    <div class="titre_card">
                        <div class="titre_content">
                            <img src={{ asset('images/titre_card_icon.webp') }} alt="" />
                            <p class="font_richard">
                               {{ $review->comment ?? 'No Comment Found' }}
                            </p>
                        </div>
                    </div>
                </div>
        @endforeach
    @else
        <div class="text-center">
            <p>No Reviews found.</p>
        </div>
    @endif


               
            </div>
        </div>
        <img src={{ asset('images/responsive_forest.webp') }} class="forest_Responsive img-fluid d-lg-none"
            alt="" />
        <div class="container">
            <div class="py-4 d-none d-lg-block"></div>
            <div class="row pe-0 mt-5 position-relative overflow-hidden">
                <div class="col-lg-7 LES_margin">
                    @isset($aprops->home_page_heading)
                        @if ($aprops->home_page_heading)
                            <h2 class="heading1">{{ $aprops->home_page_heading }}</h2>
                        @endif
                    @endisset
                    @isset($aprops->home_page_description)
                        @if ($aprops->home_page_description)
                            <p class="font_richard fs-5 mt-4 text-center text-lg-start">
                                {{ $aprops->home_page_description }}
                            </p>
                        @endif
                    @endisset
                    <a href="/à-propos">
                        <button class="button1 mt-4 d-block mx-auto mx-lg-0">
                            Lire plus
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <img src={{ asset('images/forest.webp') }} class="forest_img d-none d-lg-block" alt="" />
    </div>

    <div class="home_blog_section">
        <div class="container position-relative">
            <h2 class="home_blog_heading text-center mb-5">Blog</h2>
            <img src={{ asset('images/blog_prev.png') }} class="home_blog_prev" alt="" />
            <img src={{ asset('images/blog_next.png') }} class="home_blog_next" alt="" />
            <div class="home-blogs-carousel owl-carousel owl-theme my-5">
              @foreach ($blogs as $blog)
                <div class="item">
                    <div class="home_blog_wrap d-flex align-items-center align-items-center">
                        <div class="row align-items-center blog-content">
                            <div class="col-md-5 mx-auto col-lg-5">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="" />
                            </div>
                            <div class="col-lg-7">
                                <p class="slide_title">{{ $blog->title }}</p>
                                <p class="slide_paragraph font_richard">
                                  {!! str_replace('{ content }', '', \Illuminate\Support\Str::limit(strip_tags($blog->description ?? 'No description available'), 150, '...')) !!}

                                </p>
                                <a href="{{ route('blog.detail', $blog->slug) }}">
                                    <button class="slide_button">Lire plus</button>
                                </a>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . $blog->image) }}" class="non_active_image object-fit-contain" alt="" />
                    </div>
                </div>
                  @endforeach
            </div>
        </div>
    </div>
    <div class="home_faq_section position-relative">
        <img src={{ asset('images/wheel.webp') }}  class="d-none d-lg-block wheel" alt="">
        <div class="container">
            <h2 class="heading1 text-center">{{ $faq_page->heading }}</h2>
            @isset($faq_page->contact_form_paragraph)
                    @if (!empty($faq_page->contact_form_paragraph))
                        <div class="col-lg-9 mx-auto">
                            <p class="text-center font_richard my-5">
                                {{ $faq_page->paragraph }}
                            </p>
                        </div>
                    @endif
                @endisset

<div class="col-lg-9 mx-auto">
                    @foreach ($faqs as $faq)
                        <div class="custom-accordion-item">
                            <div class="custom-accordian-body">
                                <div class="custom-accordion-header">
                                    <span>{{ $faq->question }}</span>
                                    <img class="custom-icon" src={{ asset('images/faq_arrow.webp') }} alt="Expand" />
                                </div>
                                <div class="custom-accordion-content">
                                    <p>
                                        {{ $faq->answer }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
