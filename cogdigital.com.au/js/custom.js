console.log(`
  ___  _____  ___    ____  ____    __    _  _  ____  ____  _  _  ___
 / __)(  _  )/ __)  (  _ \(  _ \  /__\  ( \( )(  _ \(_  _)( \( )/ __)
( (__  )(_)(( (_-.   ) _ < )   / /(__)\  )  (  )(_) )_)(_  )  (( (_-.
 \___)(_____)\___/  (____/(_)\_)(__)(__)(_)\_)(____/(____)(_)\_)\___/
 
                Designed & Developed by COG Branding
                    https://cogbranding.com.au`);

document.addEventListener("DOMContentLoaded", (event) => {
    // Add Lenis smooth scroll sitewide
    // see: https://github.com/studio-freight/lenis#setup
    const lenis = new Lenis({
        smoothWheel: true,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }

    requestAnimationFrame(raf);

    // Slow down the scroll speed, default 1.2
    lenis.options.duration = 2;

    // Mobile menu
    const mobileMenu = document.querySelector(
        ".header__wrapper.show-for-tablet"
    );
    const mobileMenuIcon = document.querySelector(".header__mobile__menu-icon");
    const mobileMenuSubmenu = document.querySelector(
        ".header__mobile__submenu"
    );

    if (mobileMenuIcon) {
        const documentBody = document.querySelector("body");
        const bodyOverlay = document.createElement("div");
        bodyOverlay.classList.add("body-overlay");
        documentBody.appendChild(bodyOverlay);

        const toggleMenu = () => {
            mobileMenu.classList.toggle("menu-open");
            mobileMenuSubmenu.classList.toggle("menu-open");
            bodyOverlay.classList.toggle("menu-open");
        };

        mobileMenuIcon.addEventListener("click", toggleMenu);

        const mobileMenuCloseIcon = document.querySelector(
            ".header__mobile__submenu__close-icon"
        );
        mobileMenuCloseIcon.addEventListener("click", toggleMenu);
    }

    // Add class to last media with text section
    const mediaWithTextSections = document.querySelectorAll(".media-with-text");
    if (mediaWithTextSections) {
        mediaWithTextSections.forEach((section, index) => {
            if (index === mediaWithTextSections.length - 1) {
                const lastElement =
                    mediaWithTextSections[mediaWithTextSections.length - 1];
                lastElement.classList.add("last");
            }
        });
    }

    // Services acronyms
    const serviceItemTitles = document.querySelectorAll(
        ".services__item__title"
    );
    const serviceItemAcronyms = document.querySelectorAll(
        ".services__item__acronym__content"
    );

    serviceItemTitles.forEach((title, index) => {
        const words = title.textContent.trim().split(" ");
        let acronymContent = "";

        if (words.length === 1) {
            acronymContent =
                words[0].charAt(0).toUpperCase() +
                words[0].charAt(1).toLowerCase();
        } else if (words.length >= 2) {
            acronymContent =
                words[0].charAt(0).toUpperCase() +
                words[1].charAt(0).toLowerCase();
        }

        // Assign unique acronym to each corresponding acronym element
        const acronym = serviceItemAcronyms[index];
        acronym.textContent = acronymContent;
    });

    // Newsletter popup
    const newsletterTrigger = document.querySelector("#newsletter-popup");
    const newsletterPopup = document.querySelector(".newsletter-popup");
    const newsletterCloseIcon = document.querySelector(
        ".newsletter-popup__close-icon"
    );

    if (newsletterPopup) {
        newsletterTrigger.addEventListener("click", (e) => {
            e.preventDefault();
            newsletterPopup.classList.add("active");
        });

        newsletterCloseIcon.addEventListener("click", () => {
            newsletterPopup.classList.remove("active");
        });
    }
});

//Back to top button
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $(".back-to-top").fadeIn();
        } else {
            $(".back-to-top").fadeOut();
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });
});
