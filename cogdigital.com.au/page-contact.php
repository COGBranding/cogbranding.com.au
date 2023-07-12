<?php

/**
 * Template Name: Contact
 *
 * This template is used to display the contact page layout and contents.
 */
get_header();

$id = get_the_ID();

// Get contact page custom fields
$contact_page_heading = get_field('contact_page_heading', $id);
$contact_page_text = get_field('contact_page_text', $id);
$form_shortcode = get_field('form_shortcode');

// See https://www.advancedcustomfields.com/resources/repeater/ for contact_links loop 
?>
<div class="section contact__links">
    <div class="row contact__links__row">
        <?php
        // Check if rows exist
        if (have_rows('contact_links')) :
            while (have_rows('contact_links')) :
                the_row();

                $icon = get_sub_field('icon');
                $title_text = get_sub_field('title_text');
                $body_text = get_sub_field('body_text');
                $link_text = get_sub_field('link_text');
                $link_url = get_sub_field('link_url'); ?>

        <div class="contact__links__item">
            <div class="contact__links__item__icon-wrapper">
                <img src="<?php echo $icon; ?>" class="contact__links__item__icon">
            </div>

            <h4 class="contact__links__item__heading heading-xxs">
                <?php echo $title_text; ?>
            </h4>

            <p class="contact__links__item__body">
                <?php echo $body_text; ?>
            </p>

            <p class="contact__links__item__link">
                <a href="<?php echo $link_url ?>">
                    <?php echo $link_text ?>
                </a>
            </p>
        </div>

        <?php endwhile;
        endif; ?>
    </div>
</div>
<div class="section contact">
    <div class="row contact__row">
        <div class="contact__col contact__col--image reveal-image"
            style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">

        </div>

        <div class="contact__col contact__col--content">
            <div class="contact__content">
                <h2 class="contact__heading heading-lg">
                    <?php echo $contact_page_heading; ?>
                </h2>

                <div class="contact__text">
                    <?php echo $contact_page_text; ?>
                </div>

                <div class=contact__form">
                    <?php echo do_shortcode($form_shortcode) ?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
get_footer();