document.addEventListener("DOMContentLoaded", () => {
    const desktopHeader = document.querySelector(
        ".header__wrapper.show-for-desktop"
    );

    if (desktopHeader) {
        applyDesktopHeaderSubmenu();
    }

    const mobileHeader = document.querySelector(
        ".header__wrapper.show-for-tablet"
    );

    if (mobileHeader) {
        applyMobileHeaderSubmenu();
    }
});

function applyDesktopHeaderSubmenu() {
    const desktopMenuItem = document.querySelectorAll(
        ".header__wrapper.show-for-desktop .menu-item-has-children"
    );
    const desktopSubmenu = document.querySelector(".sub-menu");
    let timeoutId;

    desktopMenuItem.forEach((item) => {
        item.addEventListener("mouseenter", () => {
            clearTimeout(timeoutId);
            desktopSubmenu.classList.add("active");
        });

        item.addEventListener("mouseleave", (e) => {
            timeoutId = setTimeout(
                () => {
                    desktopSubmenu.classList.remove("active");
                },
                !item.contains(e.relatedTarget) &&
                    !desktopSubmenu.contains(e.relatedTarget)
                    ? 200
                    : 0
            );
        });
    });

    desktopSubmenu.addEventListener("mouseleave", () => {
        timeoutId = setTimeout(
            () => {
                desktopSubmenu.classList.remove("active");
            },
            !desktopMenuItem[0].contains(e.relatedTarget) ? 200 : 0
        );
    });
}

function applyMobileHeaderSubmenu() {
    const mobileMenuItem = document.querySelectorAll(
        ".header__wrapper.show-for-tablet .menu-item-has-children"
    );
    const mobileSubmenu = document.querySelector(
        ".header__wrapper.show-for-tablet .sub-menu"
    );

    const mobileMenuItemDropdownIcon = document.createElement("div");
    mobileMenuItemDropdownIcon.classList.add("dropdown-icon__wrapper");
    mobileMenuItemDropdownIcon.innerHTML = `<img class="dropdown-icon" src="/wp-content/uploads/2023/06/icon-chevron-down.svg" />`;

    mobileMenuItem.forEach((item) => {
        item.appendChild(mobileMenuItemDropdownIcon);

        mobileMenuItemDropdownIcon.addEventListener("click", () => {
            mobileSubmenu.classList.toggle("active");
            mobileMenuItemDropdownIcon.classList.toggle("active");
        });
    });
}
