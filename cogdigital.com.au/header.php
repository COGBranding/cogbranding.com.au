<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- js code for analytics and stuffs
    value comes from customiser > analytics section -->
    <?php
    if (is_singular('post')) { // Replace 'post' with your desired post type
        $post_id = get_the_ID();
        $schema_ld = get_field('schema', $post_id);
        if ($schema_ld) {
            echo '<script type="application/ld+json">' . $schema_ld . '</script>';
        }
    }
    echo get_theme_mod('head_js_code'); ?>
    <?php wp_head();
    ?>

</head>

<body <?php body_class(); ?>>
    <a href="#" class="back-to-top"></a>

    <?php echo get_theme_mod('body_js_code'); ?>
    <?php wp_body_open();

    $header_background = '#fff';
    $logo_image_id = get_theme_mod('cog_logo');
    $logo_image_url = wp_get_attachment_url($logo_image_id);

    if (is_singular('post')) {
        $header_class = 'header--post';
        $header_background = '#f69651';
    } elseif (is_singular('our-work')) {
        $header_class = 'header--our-work wcag-true';
        $header_background = "transparent";
    } else {
        $header_class = "";
    }

    $primary_menu = wp_nav_menu(
        array(
            'menu_name' => 'main_menu',
            'menu_class' => 'header__menu',
            'echo' => false,
        )
    );
    ?>

    <header class="header <?php echo $header_class; ?>" style="background-color: <?php echo $header_background; ?>">
        <div class="header__wrapper show-for-desktop">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo__wrapper">
                <img src="<?php echo esc_attr($logo_image_url); ?>" alt="Logo" class="header__logo" />
            </a>

            <?php echo $primary_menu; ?>

            <div class="header__cta">
                <a href="/contact/" class="text-uppercase text-uppercase--sm">
                    <?php _e('Contact', 'cog'); ?>
                </a>
                <a href="tel:0295236007" class="text-uppercase text-uppercase--sm">
                    <?php _e('02 9523 6007', 'cog'); ?>
                </a>
            </div>
        </div>

        <div class="header__wrapper show-for-tablet">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo__wrapper">
                <img src="<?php echo esc_attr($logo_image_url); ?>" alt="Logo" class="header__logo" />
            </a>

            <div class="header__mobile__menu-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="header__mobile__submenu">
                <div class="header__mobile__submenu__actions">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo__wrapper">
                        <img src="<?php echo esc_attr($logo_image_url); ?>" alt="Logo" class="header__logo" />
                    </a>

                    <div class="header__mobile__submenu__close-icon">
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <?php echo $primary_menu; ?>
            </div>
        </div>
    </header>