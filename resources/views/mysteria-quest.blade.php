@extends('layouts.app')

@section('title', $seo->mysteria_meta_title ?? 'Mysteria-Quest')

@section('meta_description', e(trim(preg_replace('/\s+/', ' ', str_replace('&nbsp;', ' ', strip_tags($seo->mysteria_meta_description ?? Str::limit(strip_tags($seo->mysteria_meta_description), 150))))))
)
@section('meta_keywords', $seo->mysteria_meta_keywords ?? '')
@section('meta_image', asset('storage/images/logo_footer.webp'))


@section('content')
    <div class="mysteria_header">
        <div class="col-lg-9 col-sm-10 text-center mx-auto">
            @isset($headings->mysteria)
            @if ($headings->mysteria)
            <h1 class="pages_heading concour_heading"> {{ $headings->mysteria }}</h1>    
            @endif
            @endisset
        </div>
    </div>
    <div class="scanrio_section_2 position-relative">
        <img src={{ asset('images/mystery_element.png') }} class="mystery_element d-none d-lg-block" alt="" />
        <img src={{ asset('images/mobile_responsive.webp') }} class="img-fluid responsive_moble_margin d-md-none"
            alt="" />
        <div class="container text-center">
            <div class="col-lg-9 col-xl-9 mx-auto">
                <div class="d-none d-md-flex align-items-center justify-content-around">
                    <img src={{ asset('images/start.webp') }} class="header_phone_images" alt="" />
                    <img src={{ asset('images/middle.webp') }} class="header_phone_images" alt="" />
                    <img src={{ asset('images/end.webp') }} class="header_phone_images" alt="" />
                </div>
                <h2 class="text-center heading1 mt-5">Mysteria Quest :</h2>
                <h2 class="text-center heading1 fs-2">
                    L'Expérience Ultime d'Escape Game Outdoor !
                </h2>
                <p class="font_richard text-center fs-5 mt-5">
                    Envie d'aventure et de mystère ? <br />
                    Mysteria Quest révolutionne l’escape game en vous plongeant dans une
                    expérience immersive en plein air ! Grâce à votre smartphone et à
                    notre application mobile, partez à la découverte de lieux insolites,
                    de villes fascinantes et de villages secrets tout en résolvant des
                    énigmes captivantes.
                </p>
                <div class="row justify-content-center my-5">
                    <div class="col-lg-5 col-md-6 my-4">
                        <div class="store_link_wrap">
                            <img src={{ asset('images/appstore.png') }} alt="" />
                            <span>Disponible sur iOS</span>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 my-4">
                        <div class="store_link_wrap">
                            <img src={{ asset('images/playstore.png') }} alt="" />
                            <span>Disponible sur Android</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mystery_character_section">
            <div class="container">
                <h4 class="heading1 text-center">
                    Un Escape Game Nouvelle Génération !
                </h4>
                <div class="col-lg-10 mx-auto">
                    <p class="text-center font_richard fs-5 m-0 my-5">
                        Avec Mysteria Quest, transformez votre ville en un immense terrain
                        de jeu grandeur nature ! Inspiré des escape games traditionnels,
                        et des jeux de piste, notre application vous propose des scénarios
                        variés et interactifs, conçus pour tous les passionnés d’énigmes,
                        de mystères et d’aventure.
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-10 mx-auto col-md-6 my-4 col-lg-3">
                        <div class="escape_circle">
                            <h6>Explorez des endroits inédits</h6>
                            <p>
                                Chaque quête vous emmène à la découverte de lieux cachés et
                                d’histoires fascinantes.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-6 my-4 col-lg-3">
                        <div class="escape_circle">
                            <h6>️Résolvez des énigmes immersives</h6>
                            <p>
                                Faites appel à votre sens de l’observation, votre logique et
                                votre esprit d’équipe pour progresser.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-6 my-4 col-lg-3">
                        <div class="escape_circle">
                            <h6>Vivez des scénarios captivants</h6>
                            <p>
                                Plongez dans des histoires intrigantes aux thématiques variées
                                (enquête policière, chasse au trésor, légendes urbaines…).
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-10 mx-auto col-md-6 my-4 col-lg-3">
                        <div class="escape_circle">
                            <h6>Jouez en solo ou en équipe</h6>
                            <p>
                                Que vous soyez un aventurier solitaire ou en quête d’un défi
                                entre amis ou en famille, Mysteria Quest s’adapte à tous les
                                joueurs !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container first_mobile_margin mt-lg-5 pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6 order-last order-lg-first my-0">
                    <h5 class="heading1 fs-2">Comment ça marche ?</h5>
                    <ol class="fs-5 font_richard">
                        <li class="my-4">
                            Téléchargez l’application Mysteria Quest sur votre smartphone.
                        </li>
                        <li class="my-4">
                            Choisissez votre quête parmi plusieurs aventures disponibles
                            dans votre ville ou aux alentours, depuis notre site internet :
                            mysteriaquest.com
                        </li>
                        <li class="my-4">
                            Partez à l’aventure et laissez-vous guider par les indices et
                            les énigmes à résoudre en parcourant des lieux uniques.
                        </li>
                        <li class="my-4">
                            Décryptez, analysez et triomphez pour découvrir le fin mot de
                            l’histoire et relever tous les défis !
                        </li>
                    </ol>
                </div>
                <div class="col-lg-6 my-0">
                    <img src={{ asset('images/mobiles1.webp') }} class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="myestry_mobile2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 my-4">
                    <img src={{ asset('images/mobile2.webp') }} class="img-fluid mobile2" alt="" />
                </div>
                <div class="col-lg-6 my-4 text-center text-lg-start">
                    <h6 class="heading1 fs-2">Pourquoi choisir Mysteria Quest ? 🏆</h6>
                    <p class="fs-5 font_richard mt-4">
                        Une expérience immersive et interactive <br />
                        ️Un moyen ludique de découvrir de nouveaux lieux <br />
                        Accessible à tous, petits et grands <br />
                        Sans contrainte horaire : jouez à votre rythme
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mystery_end_section">
        <div class="container">
            <h6 class="text-center heading1">Alors, prêt à relever le défi ?</h6>
            <div class="col-lg-6 mx-auto">
                <p class="text-center font_richard fs-5 m-0 my-5">
                    Téléchargez Mysteria Quest dès maintenant et transformez chaque
                    balade en une aventure inoubliable !
                </p>
            </div>

            <div class="row justify-content-center my-5">
                <div class="col-lg-4 col-md-6 my-4">
                    <div class="store_link_wrap">
                        <img src={{ asset('images/appstore.png') }} alt="" />
                        <span>Disponible sur iOS</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-4">
                    <div class="store_link_wrap">
                        <img src={{ asset('images/playstore.png') }} alt="" />
                        <span>Disponible sur Android</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
