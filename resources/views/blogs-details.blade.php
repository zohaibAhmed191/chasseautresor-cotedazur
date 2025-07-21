@extends('layouts.app')

@section('title', $blog->meta_title_seo ?? $blog->title)

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($blog->meta_description_seo ?? Str::limit(strip_tags($blog->description), 150))))))
)
@section('meta_keywords', $blog->meta_keywords_seo ?? '')
@section('canonical_url', route('blog.detail', $blog->slug))

@section('meta_image', asset('storage/' . $blog->image))

@section('content')
    <div class="blog_header">
          <div class="col-lg-9 col-sm-10 text-center mx-auto">
            @isset($headings->blog)
            @if ($headings->blog)
            <h1 class="pages_heading concour_heading"> {{ $headings->blog }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="blog_section_2 position-relative">
        <div class="container blog_page_wraper text-center">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="blog_page_card">
                    <img src="{{ asset('storage/' . $blog->image) }}"   alt="{{ $blog->image_alt_text ?? $blog->title }}"
    title="{{ $blog->image_title_attr ?? $blog->title }}" alt="" />
                    <div class="blog_page_card_content text-center">
                        <p class="slide_title">{{ $blog->title ?? 'Untitled Blog' }}</p>
                        {!! $blog->description ?? 'No description' !!}
                    </div>
                </div>
                <h2 class="heading1 text-center mt-5 pt-5">Voir d’autres articles
                </h2>


                <div class="aboutus-2-carousel owl-carousel owl-theme my-5">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blog.detail', $blog->slug) }}">
                            <div class="item d-flex justify-content-center">
                                <div class="blog_bottom_cards">
                                    <img src="{{ asset('storage/' . $blog->image) }}"
                                      alt="{{ $blog->image_alt_text ?? $blog->title }}"
    title="{{ $blog->image_title_attr ?? $blog->title }}"
    class="rounded-2"   
                                    />
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
