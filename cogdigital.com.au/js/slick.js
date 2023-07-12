jQuery(function ($) {
    var $homeSlider = $(".hero-slider__items");
    var $newsSlider = $(".news-grid__slider .news-grid__items");
    var $projectSlider = $(".project-slider__items");
    var $servicesSlider = $(".services--slider .services__items");

    function initializeSlick() {
        // Add the class to the current slide on page load
        $homeSlider.on("init", function (event, slick) {
            var $currentSlide = $(slick.$slides[slick.currentSlide]);
            $currentSlide
                .find(".hero-slider__item__loader--front circle")
                .addClass("hero-slider__item__loader--front__reveal");
        });

        $homeSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 8000,
            cssEase: "cubic-bezier(0.45, 0, 0.23, 1)",
            fade: true,
            pauseOnHover: false,
            nextArrow: $(".hero-slider__item__actions__button-next"),
        });

        $(".hero-slider__items").on(
            "beforeChange",
            function (event, slick, currentSlide, nextSlide) {
                // Remove the class from the previous slide
                var $currentSlide = $(slick.$slides[currentSlide]);
                $currentSlide
                    .find(".hero-slider__item__loader--front circle")
                    .removeClass("hero-slider__item__loader--front__reveal");

                // Add the class to the next slide
                var $nextSlide = $(slick.$slides[nextSlide]);
                $nextSlide
                    .find(".hero-slider__item__loader--front circle")
                    .addClass("hero-slider__item__loader--front__reveal");

                // Animate the left and right images
                var $currentSlide = $(slick.$slides[currentSlide]);
                var $nextSlide = $(slick.$slides[nextSlide]);

                // Animate the left image (from bottom to top)
                $currentSlide.find(".hero-slider__item__col--left").animate(
                    {
                        top: "-100%",
                    },
                    500
                );

                $nextSlide
                    .find(".hero-slider__item__col--left")
                    .css({
                        top: "100%",
                        display: "flex",
                    })
                    .animate(
                        {
                            top: "0",
                        },
                        500
                    );

                // Animate the right image (from top to bottom)
                $currentSlide.find(".hero-slider__item__col--right").animate(
                    {
                        top: "100%",
                    },
                    500
                );

                $nextSlide
                    .find(".hero-slider__item__col--right")
                    .css({
                        top: "-100%",
                        display: "flex",
                    })
                    .animate(
                        {
                            top: "0",
                        },
                        500
                    );
            }
        );

        // Update current count
        $homeSlider
            .on("afterChange", function (event, slick, currentSlide) {
                var $counterCurrent = $(this)
                    .closest(".hero-slider")
                    .find(".hero-slider__item__actions__counter--current");
                $counterCurrent.text(currentSlide + 1);
            })
            .trigger("afterChange", [null, 0]); // Pass the initial current slide index as 0

        // Update total count
        var $counterTotal = $homeSlider
            .closest(".hero-slider")
            .find(".hero-slider__item__actions__counter--total");
        $counterTotal.text($homeSlider.slick("getSlick").slideCount);

        if (!$newsSlider.hasClass("slick-initialized")) {
            $newsSlider
                .slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    adaptiveHeight: true,
                    rows: 0,
                    cssEase: "cubic-bezier(0.45, 0, 0.23, 1)",
                    prevArrow: $(
                        ".news-grid__slider .slick-navigation__link--prev"
                    ),
                    nextArrow: $(
                        ".news-grid__slider .slick-navigation__link--next"
                    ),
                    responsive: [
                        {
                            breakpoint: 980,
                            settings: {
                                slidesToShow: 2,
                            },
                        },
                        {
                            breakpoint: 479,
                            settings: {
                                slidesToShow: 1,
                            },
                        },
                    ],
                })
                .on("afterChange", function (event, slick, currentSlide) {
                    // Update current count
                    var $counterCurrent = $(this)
                        .closest(".news-grid__slider")
                        .find(".slick-navigation__counter--current");
                    $counterCurrent.text(currentSlide + 1);
                })
                .trigger("afterChange", [null, 0]); // Pass the initial current slide index as 0

            // Update total count
            var $newsCounterTotal = $(".news-grid__slider .news-grid__items")
                .closest(".news-grid__slider")
                .find(".slick-navigation__counter--total");
            $newsCounterTotal.text($newsSlider.slick("getSlick").slideCount);
        }
        $projectSlider.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 6000,
            cssEase: "cubic-bezier(0.45, 0, 0.23, 1)",
            prevArrow: $(".project-slider__navigation .btn--slick-prev"),
            nextArrow: $(".project-slider__navigation .btn--slick-next"),
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        if (
            window.innerWidth <= 767 &&
            !$servicesSlider.hasClass("slick-initialized")
        ) {
            $(".services--slider .services__items")
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 6000,
                    cssEase: "cubic-bezier(0.45, 0, 0.23, 1)",
                    prevArrow: $(
                        ".services--slider .slick-navigation__link--prev"
                    ),
                    nextArrow: $(
                        ".services--slider .slick-navigation__link--next"
                    ),
                })
                .on("afterChange", function (event, slick, currentSlide) {
                    // Update current count
                    var $counterCurrent = $(this)
                        .closest(".services--slider")
                        .find(".slick-navigation__counter--current");
                    $counterCurrent.text(currentSlide + 1);
                })
                .trigger("afterChange", [null, 0]); // Pass the initial current slide index as 0

            // Update total count
            var $servicesCounterTotal = $(".services--slider .services__items")
                .closest(".services--slider")
                .find(".slick-navigation__counter--total");
            $servicesCounterTotal.text(
                $(".services--slider .services__items").slick("getSlick")
                    .slideCount
            );
        } else if (
            window.innerWidth > 767 &&
            $servicesSlider.hasClass("slick-initialized")
        ) {
            $servicesSlider.slick("unslick");
        }
    }

    // Initialize slick carousel on page load
    $(document).ready(function () {
        initializeSlick();
    });

    // Bind resize event handler to window object
    $(window).on("resize", function () {
        if ($homeSlider.length && $homeSlider.hasClass("slick-initialized")) {
            $homeSlider.slick("unslick");
        }
        // 		if($newsSlider.length && $newsSlider.hasClass('slick-initialized')){
        // 			$newsSlider.slick('unslick');
        // 		}
        if (
            $projectSlider.length &&
            $projectSlider.hasClass("slick-initialized")
        ) {
            $projectSlider.slick("unslick");
        }
        if (
            $servicesSlider.length &&
            $servicesSlider.hasClass("slick-initialized")
        ) {
            $servicesSlider.slick("unslick");
        }
        initializeSlick();
    });
});
