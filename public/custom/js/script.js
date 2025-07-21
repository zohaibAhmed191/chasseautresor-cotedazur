$(document).ready(function () {
    $("#menu_opener").click(function () {
        $(".menu_items").css("left", "0"); // Slide menu into view
    });

    $("#menu_closer").click(function () {
        $(".menu_items").css("left", "-460px"); // Slide menu out of view
    });
});

$(document).ready(function () {
    function initTitreCarousel() {
        $(".titre-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            center: true,
            smartSpeed: 500,
            responsive: {
                0: { items: 1 },
                768: { center: false, items: 2 },
                1000: { items: 3 },
            },
        });
    }

    function initGamesCarousel() {
        const games = $(".games-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            center: true,
            smartSpeed: 500,
            responsive: {
                0: { items: 1 },
            },
        });

        $(".game_next").click(() => games.trigger("next.owl.carousel"));
        $(".game_prev").click(() => games.trigger("prev.owl.carousel"));
    }

    // Initialize all carousels
    initGamesCarousel();
    initTitreCarousel();

    function initHomeBlogsCarousel() {
        const blog = $(".home-blogs-carousel").owlCarousel({
            loop: true,
            margin: 50, // Adjust margin between slides
            nav: false,
            dots: false,
            center: true,
            smartSpeed: 500,
            responsive: {
                0: { items: 1 },
                768: { center: true, items: 1 },
                1000: { items: 3 },
            },
            onInitialized: updateSlides, // When initialized
            onTranslated: updateSlides, // When slide changes
        });

        $(".home_blog_next").click(() => blog.trigger("next.owl.carousel"));
        $(".home_blog_prev").click(() => blog.trigger("prev.owl.carousel"));
    }

    function updateSlides() {
        if ($(window).width() > 992) {
            // Apply only for screens larger than 992px
            $(".home-blogs-carousel .owl-item").each(function (index) {
                const slide = $(this).find(".item");

                if ($(this).hasClass("center")) {
                    slide
                        .addClass("active-slide")
                        .removeClass("inactive-slide left-slide right-slide");

                    // Delay content appearance after 1 second
                    setTimeout(() => {
                        slide.find(".blog-content").fadeIn(); // Smooth fade-in effect
                        slide.find(".non_active_image").fadeOut();
                    }, 1000); // 1 second delay
                } else {
                    slide
                        .addClass("inactive-slide")
                        .removeClass("active-slide");

                    // Hide content immediately for non-active slides
                    slide.find(".blog-content").hide();
                    slide.find(".non_active_image").show();

                    // Determine if it's the left or right slide
                    if (
                        index <
                        $(".home-blogs-carousel .owl-item.center").index()
                    ) {
                        slide.addClass("left-slide").removeClass("right-slide");
                    } else {
                        slide.addClass("right-slide").removeClass("left-slide");
                    }
                }
            });
        } else {
            // Reset styles for smaller screens (optional)
            $(".home-blogs-carousel .item").removeClass(
                "active-slide inactive-slide left-slide right-slide"
            );
            $(".home-blogs-carousel .blog-content").show(); // Show content by default
            $(".home-blogs-carousel .non_active_image").hide();
        }
    }

    initHomeBlogsCarousel();

    function initAccordions() {
        $(".custom-accordion-header").click(function () {
            const accordionItem = $(this).next(".custom-accordion-content");
            const icon = $(this).find(".custom-icon");
            const parentItem = $(this).closest(".custom-accordion-item");
            const parentBody = $(this).closest(".custom-accordian-body");
            let active_faq = "../images/active_faq_png.webp";
            let responsive_active_faq = "../images/active_responsive_faq.webp";
            if (accordionItem.is(":visible")) {
                // Close the active accordion
                accordionItem.slideUp();
                icon.css("transform", "rotate(0deg)"); // Rotate downward when closed
                parentBody.css("background-color", ""); // Remove background color
                parentItem.css("background-image", ""); // Reset background image
                accordionItem.css("color", ""); // Reset text color
            } else {
                // Close all other accordions
                $(".custom-accordion-content").slideUp();
                $(".custom-icon").css("transform", "rotate(0deg)");
                $(".custom-accordian-body").css("background-color", ""); // Reset background color
                $(".custom-accordion-item").css("background-image", ""); // Reset background image
                $(".custom-accordion-content").css("color", ""); // Reset text color

                // Open the clicked accordion
                accordionItem.slideDown();
                icon.css("transform", "rotate(180deg)"); // Rotate upward when open
                parentBody.css("background-color", "#E6CFAB"); // Set background color
                if ($(window).width() < 768) {
                    parentItem.css(
                        "background-image",
                        `url(${responsive_active_faq})`
                    ); // Change background image
                } else {
                    parentItem.css("background-image", `url(${active_faq})`); // Change background image
                }
                // active_responsive_faq

                accordionItem.css("color", "#521C03"); // Change text color
            }
        });
    }

    function initNosCarousel() {
        const nos = $(".scenario-1-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            center: true,
            smartSpeed: 500,
            responsive: {
                0: { items: 1 },
            },
        });
        $(".scanrio_slider_next").click(() => nos.trigger("next.owl.carousel"));
        $(".scanrio_slider_prev").click(() => nos.trigger("prev.owl.carousel"));
    }
    function initSecondCarousel() {
        const games = $(".aboutus-2-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            center: true,
            smartSpeed: 500,
            responsive: {
                0: { items: 1 },
                768: { items: 2, center: false },
                992: { items: 3 },
            },
        });
    }

    initSecondCarousel();
    initNosCarousel();

    initAccordions();
});
