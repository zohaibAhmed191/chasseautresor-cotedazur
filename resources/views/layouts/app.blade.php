<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description', 'Default Description')">
    <meta name="keywords" content="@yield('meta_keywords', 'keyword1, keyword2')">
    <meta property="og:image" content="@yield('meta_image')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <!-- Modern browsers -->
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<!-- Legacy support -->
<link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />
    <link rel="stylesheet" href="{{ asset('custom/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet"
        href="{{ asset('custom/css/sheet.css') }}?v={{ filemtime(public_path('custom/css/sheet.css')) }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "chasseautresorsaintmalo",
  "url": "https://chasseautresorsaintmalo.fr",
  "logo": "https://chasseautresorsaintmalo.fr/images/favicon.svg"
}
</script>

</head>

<body>
    <div class="menu_bar_wrap">
        <div class="container">
            <div class="d-flex d-lg-none align-items-center justify-content-between pt-2">
                <img src={{ asset('images/menu.png') }} class="menu_opener" id="menu_opener" alt="" />
                <a href="/">
                    <img src={{ asset('images/main-logo.webp') }} class="header_logo" alt="">
                </a>
            </div>
            <div class="d-flex justify-content-between sp-margin">
                <a href="/">
                    <img src={{ asset('images/main-logo.webp') }} id="header_desktop_logo" class="header_logo" alt="">
                </a>
                <div class="menu_items d-flex">
                    <div class="menu_closer" id="menu_closer">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                    <a href="/">
                        <p class="{{ request()->is('/') ? 'active' : '' }}">Accueil</p>
                    </a>
                    <a href="/scenario">
                        <p class="{{ str_contains(strtolower(request()->url()), 'scenario') ? 'active' : '' }}">
                            Scénarios</p>
                    </a>
                    <a href="/concours">
                        <p class="{{ str_contains(strtolower(request()->url()), 'concours') ? 'active' : '' }}">Concours
                        </p>
                    </a>

                    <a href="/mysteria-quest">
                        <p class="{{ request()->is('mysteria-quest', 'mysteria-quest/*') ? 'active' : '' }}">
                            Mysteria-Quest</p>
                    </a>
                    <a href="/blog">
                        <p class="{{ str_contains(strtolower(request()->url()), 'blog') ? 'active' : '' }}">Blog</p>
                    </a>
                    <a href="/à-propos">
                        <p class="{{ request()->is('à-propos', 'à-propos/*') ? 'active' : '' }}">À propos</p>
                    </a>
                    <a href="/faq">
                        <p class="{{ str_contains(strtolower(request()->url()), 'faq') ? 'active' : '' }}">FAQ</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')


    <div class="footer">
        <div class="container_custom">
            <div class="row ">
                <div class="col-10 mx-auto col-md-6 col-lg-4 my-3 ">
                    <div class="d-flex justify-content-start flex-column">
                        <div class="d-flex flex-column flex-lg-row gap-3 align-items-start">
                            <img src={{ asset('images/logo_footer.webp') }} class="img-fluid footer_logo" alt="" />
                            <div class="pt-3">
                                <p class="footer_contact_info">
                                    <span>Téléphone</span> :
                                    <a href="tel:+33(0)768287018">+33 (0) 7 68 28 70 18</a>
                                </p>
                                <p class="footer_contact_info">
                                    <span>Mail</span> :
                                    <a
                                     href="mailto:chasseautresor.saintmalo@gmail.com">chasseautresor.saintmalo@gmail.com</a>
                                </p>

                                <div class="d-flex justify-content-center justify-content-lg-start gap-4 social_icons mt-4">
                                <img src={{ asset('images/fb.png') }} alt="" />
                                <img src={{ asset('images/insta.png') }} alt="" />
                                <img src={{ asset('images/youtube.png') }} alt="" />
                            </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 my-3 ">
                    <div class="footer_new_letter_wrapper">
                        <p>Inscrivez-vous à notre neswletter</p>
                        <form id="newsletterForm">
                            <input type="email" autocomplete="off" id="email" name="email" required
                                placeholder="Entrez votre adresse mail" />
                            <button type="submit" class="slide_button">S’INSCRIRE</button>
                            <div id="message"></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-3 d-flex justify-content-center align-items-center text-white">
                    <p class="text-white text-center">

                        @if (request()->is('/'))
                            {!! $footerTexts->home ?? '' !!}
                        @elseif (request()->is('à-propos'))
                            {!! $footerTexts->aprops ?? '' !!}
                        @elseif (request()->is('scenario*'))
                            {!! $footerTexts->scenario ?? '' !!}
                        @elseif (request()->is('blog*'))
                            {!! $footerTexts->blogs ?? '' !!}
                        @elseif (request()->is('faq'))
                            {!! $footerTexts->faqs ?? '' !!}
                        @elseif (request()->is('concours'))
                            {!! $footerTexts->concours ?? '' !!}
                        @elseif (request()->is('mysteria-quest'))
                            {!! $footerTexts->mysteria ?? '' !!}
                        @endif
                    </p>
                </div>
                <div class="col-md-6 col-lg-2 my-3">
                    <p class="text-white text-center mb-2">
                        Réservez votre session ici
                    </p>
                    <a href="https://starlinxagency.net/escape-game-exterieur-a-saint-malo.html" target="_blank">
                        <img src={{ asset('images/SLA.webp') }} class="img-fluid d-block mx-auto qrImage rounded-2" width="150px"
                            alt="" />
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="{{ asset('custom/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('custom/js/jquery.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('custom/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('custom/js/script.js') }}"></script>
@if (request()->is('à-propos'))
    <script>
        $(document).ready(function () {
            function initFirstCarousel() {
                const games = $(".aboutus-1-carousel").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    center: true,
                    smartSpeed: 500,
                    responsive: {
                        0: {
                            items: 1
                        },
                    },
                });

                $(".aboutus_next").click(() => games.trigger("next.owl.carousel"));
                $(".aboutus_prev").click(() => games.trigger("prev.owl.carousel"));
            }

            function initSecondCarousel() {
                const games = $(".scanrio-2-carousel").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    center: true,
                    smartSpeed: 500,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2,
                            center: false
                        },
                        992: {
                            items: 3
                        },
                    },
                });
            }

            // Initialize all carousels
            initFirstCarousel();
            initSecondCarousel();
        });
    </script>
@endif

<script>
    document.getElementById('newsletterForm').addEventListener('submit', async function (event) {
        event.preventDefault(); // Prevent default form submission

        const emailInput = document.getElementById('email');
        const messageDiv = document.getElementById('message');
        const email = emailInput.value;

        messageDiv.textContent = 'Subscribing...';
        messageDiv.className = 'text-white'; // Clear previous classes

        try {
            const response = await fetch('/api/subscribe-newsletter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json', // Important for Laravel to return JSON
                },
                body: JSON.stringify({
                    email: email
                })
            });

            const data = await response.json();

            if (response.ok) { // Check for 2xx status codes
                messageDiv.textContent = data.message;
                messageDiv.className = 'text-warning';
                emailInput.value = ''; // Clear the input field
            } else {
                let errorMessage = 'An error occurred.';
                if (data.errors && data.errors.email) {
                    errorMessage = data.errors.email[0]; // Display the first validation error
                } else if (data.message) {
                    errorMessage = data.message;
                }
                messageDiv.textContent = errorMessage;
                messageDiv.className = 'text-danger';
            }

        } catch (error) {
            console.error('Error:', error);
            messageDiv.textContent = 'Network error or server unavailable.';
            messageDiv.className = 'error';
        }
    });
</script>

</html>