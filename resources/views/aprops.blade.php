@extends('layouts.app')

@section('title', $seo->aprops_meta_title ?? 'À propos')

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($seo->aprops_meta_description ?? Str::limit(strip_tags($seo->aprops_meta_description), 150))))))
)
@section('meta_keywords', $seo->aprops_meta_keywords ?? '')
@section('meta_image', asset('storage/images/logo_footer.webp'))


@section('content')
    <div class="aboutus_header">
          <div class="col-lg-9 col-sm-10 text-center mx-auto">
            @isset($headings->aprops)
            @if ($headings->aprops)
            <h1 class="pages_heading text-white "> {{ $headings->aprops }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="aboutus_section_2 position-relative">
        <img src={{ asset('images/aboutus_hat_desktop.png') }} class="aboutus_hat d-none d-lg-block" alt="" />
        <img src={{ asset('images/aboutus_hat_mobile.png') }} class="aboutus_hat d-lg-none" alt="" />
        <img src={{ asset('images/aboutus_element.png') }} class="aboutus_element d-none d-lg-block" alt="" />
        <div class="container text-center">
            <div class="col-lg-8 mx-auto">
                @isset($aprops->heading)
                    @if ($aprops->heading)
                        <h1 class="heading1">{{ $aprops->heading }}</h1>
                    @endif
                @endisset
                @isset($aprops->description)
                    @if ($aprops->description)
                        <p class="h5 font_richard lh-base my-4 mt-5">
                            {{ $aprops->description }}
                        </p>
                    @endif
                @endisset
            </div>
        </div>
        <div class="container aboutus_slider1">
            <img src={{ asset('images/prev.webp') }} class="aboutus_prev d-none d-lg-block" alt="" />
            <img src={{ asset('images/next.webp') }} class="aboutus_next d-none d-lg-block" alt="" />
            
            <div class="aboutus-1-carousel owl-carousel owl-theme my-5">
                @foreach ($partners as $partner)
                    <div class="item">
                        <div class="d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-center">
                            <div class="aboutus_slider_image">
                                <img src="{{ asset('storage/' . $partner->image) }}" alt="" />
                            </div>
                            <div class="slide_game_content">
                                <h5 class="heading1 fs-2">{{ $partner->title }}</h5>
                                <p>
                                    {{ $partner->description }}
                                </p>
                                <a href="{{ $partner->url }}" target="_blank">
                                    <button class="button1 aboutus_slider_button mt-4 d-block mx-auto mx-lg-0">
                                        Visitez le site
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
 <div class="container mt-5">
            <h5 class="heading1 text-center">Decouvrir aussi</h5>
            <x-scenario-slider :scenarios="$scenarios" />
        </div> 
    </div>

@endsection
