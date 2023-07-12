<?php

/**
 * template part for single service page- hero section
 */
$page_title = isset($args['page_title']) ? $args['page_title'] : "";
$hero_title =  isset($args['hero_title']) ? $args['hero_title'] : "";
$hero_subheading =  isset($args['hero_subheading']) ? $args['hero_subheading'] : "";
$hero_image =  isset($args['hero_image']) ? $args['hero_image'] : "";
?>
<div class="row hero__row">
    <div class="hero__content">
        <?php
        if ($page_title != "") {
            echo '<p class="hero__page-title text-uppercase text-uppercase--sm span-text">' . _($page_title) . '</p>';
        }
        if ($hero_title != "") {
            echo '<h2 class="hero__heading heading-md span-text">' . _($hero_title) . '</h2></div>';
        }
        if ($hero_subheading != "") {
            echo '<p class="hero__body span-text">' . _($hero_subheading) . '</p>';
        }
        ?>
    </div>
    <?php
    if ($hero_image != "") {
        $url = wp_get_attachment_image_url($hero_image, 'full');
        echo '<div class="hero__image parallax reveal-image" style="background-image : url(' . $url . ')">';
        echo '</div>';
    }
    ?>
</div>