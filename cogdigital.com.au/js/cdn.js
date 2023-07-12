document.addEventListener("DOMContentLoaded", (event) => {
    createSpanText(".span-text");
    // parallaxImg("parallaxBackground", ".parallax", ".parallax", 4);
    // parallaxImg("parallaxBackground", ".parallax-sm", ".parallax-sm", 8);

    if (window.innerWidth >= 981) {
        addCircleWithText(".our-work__item", ".our-work__item__image", "View");
        addCircleWithText(
            ".featured-project__item",
            ".featured-project__item__col",
            "View"
        );
        addCircleWithText(".news-grid__slider", ".news-grid__items", "Drag");
        addCircleWithText(".project-slider", ".project-slider__items", "Drag");
    }
});
