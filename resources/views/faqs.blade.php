@extends('layouts.app')

@section('title', $seo->faq_meta_title ?? 'FAQ')

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($seo->faq_meta_description ?? Str::limit(strip_tags($seo->faq_meta_description), 150))))))
)
@section('meta_keywords', $seo->faq_meta_keywords ?? '')
@section('meta_image', asset('storage/images/logo_footer.webp'))


@section('content')
    <div class="faq_header">
        <div class="col-lg-9 col-sm-10 text-center mx-auto">
            @isset($headings->faq)
                @if ($headings->faq)
                    <h1 class="pages_heading concour_heading "> {{ $headings->faq }}</h1>
                @endif
            @endisset
        </div>
    </div>
    <div class="faq_section_2 position-relative">
        <div class="container blog_page_wraper text-center">
            <div class="col-lg-9 col-xl-9 mx-auto">
                @isset($faq_page->contact_form_paragraph)
                    @if (!empty($faq_page->contact_form_paragraph))
                        <h1 class="slide_title faq_headingss my-4"> {{ $faq_page->heading }}</h1>
                    @endif
                @endisset
                @isset($faq_page->contact_form_paragraph)
                    @if (!empty($faq_page->contact_form_paragraph))
                        <div class="col-lg-9 mx-auto">
                            <p class="text-center font_richard my-5 fs-4">
                                {{ $faq_page->paragraph }}
                            </p>
                        </div>
                    @endif
                @endisset

                <div>
                    @foreach ($faqs as $faq)
                        <div class="custom-accordion-item">
                            <div class="custom-accordian-body">
                                <div class="custom-accordion-header">
                                    <span>{{ $faq->question }}</span>
                                    <img class="custom-icon" src={{ asset('images/faq_arrow.webp') }} alt="Expand" />
                                </div>
                                <div class="custom-accordion-content text-start">
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
    <div class="faq_section_3 position-relative">
        <img src="./assets/images/faq_element.png" class="faq_element d-none d-lg-block" alt="">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-5 my-4">
                    @isset($faq_page->contact_form_heading)
                        @if (!empty($faq_page->contact_form_heading))
                            <h2 class="heading1">{{ $faq_page->contact_form_heading }}</h2>
                        @endif
                    @endisset
                    @isset($faq_page->contact_form_paragraph)
                        @if (!empty($faq_page->contact_form_paragraph))
                            <p class="font_richard fs-5 mt-4">
                                {{ $faq_page->contact_form_paragraph }}
                            </p>
                        @endif
                    @endisset
                </div>
                <!-- <div class="col-lg-6 my-2 my-lg-4">
                    <input type="text" class="my-2" placeholder="Votre nom" />
                    <input type="text" class="my-2" placeholder="Votre Email" />
                    <textarea name="" id="" class="my-2" placeholder="Votre Message"></textarea>
                    <button class="button1 d-block mx-auto mx-lg-0 ms-lg-auto mt-4">
                        Envoyer
                    </button>
                </div> -->
                <div class="col-lg-6 my-2 my-lg-4">
    <form id="contactForm">
        <input type="text" name="name" class="my-2" placeholder="Votre nom" required />
        <input type="email" name="email" class="my-2 " placeholder="Votre Email" required />
        <textarea name="message" class="my-2 " placeholder="Votre Message" required></textarea>

        <button type="submit" id="submitBtn" class="button1 d-block mx-auto mx-lg-0 ms-lg-auto mt-4">
            <span id="btnText">Envoyer</span>
            <span id="btnLoader" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
        </button>
    </form>
</div>
            </div>
        </div>
    </div>

    <div class="faq_section_4 mb-5 pb-4">
        <div class="container pb-5">
            <h3 class="heading1 text-center">Nos Scenarios</h3>
            <div class="col-lg-11 col-xl-11 mx-auto position-relative">
                <x-scenario-slider :scenarios="$scenarios" />
            </div>
        </div>
    </div>




<script>
document.getElementById("contactForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const form = e.target;
    const btnText = document.getElementById("btnText");
    const btnLoader = document.getElementById("btnLoader");

    // Show loader
    btnText.style.display = "none";
    btnLoader.style.display = "inline-block";

    const formData = new FormData(form);

    fetch("{{ route('contact.send') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error("Failed");
        return response.json();
    })
    .then(data => {
        form.reset();
        Toastify({
            text: "Message envoyé avec succès!",
            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            close: true
        }).showToast();
    })
    .catch(error => {
        Toastify({
            text: "Une erreur s'est produite!",
            backgroundColor: "#ff0000",
            close: true
        }).showToast();
    })
    .finally(() => {
        btnText.style.display = "inline";
        btnLoader.style.display = "none";
    });
});
</script>
@endsection