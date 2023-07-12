<?php
get_header();

// ----- Hero section  ----- //
// Get the ACF field group
$hero_section = get_field('hero_section');

// Get the subfields from the field group
$hero_heading = $hero_section['hero_heading'];
$hero_body_text = $hero_section['hero_body_text'];
$button_one_text = $hero_section['button_one_text'];
$button_one_url = $hero_section['button_one_url'];
$button_two_text = $hero_section['button_two_text'];
$button_two_url = $hero_section['button_two_url'];
$hero_image = $hero_section['hero_image'];

// Render the hero section
get_template_part(
    GLOBALTEMPLATEPART,
    'hero',
    [
        'hero_content' => $hero_heading,
        'hero_body_text' => $hero_body_text,
        'button_one_text' => $button_one_text,
        'button_one_url' => $button_one_url,
        'button_two_text' => $button_two_text,
        'button_two_url' => $button_two_url,
        'hero_image' => $hero_image,
    ]
);

// ----- Media with text sections ----- //
// Check if rows exist
if (have_rows('media_with_text')) :
    while (have_rows('media_with_text')) :
        // Loop output
        the_row();

        // Load subfields
        $image_position = get_sub_field('image_position');
        $image = get_sub_field('image');
        $heading_text = get_sub_field('heading_text');
        $body_text = get_sub_field('body_text');
        $button_one_text = get_sub_field('button_one_text');
        $button_one_url = get_sub_field('button_one_url');
        $button_two_text = get_sub_field('button_two_text');
        $button_two_url = get_sub_field('button_two_url');

        get_template_part(
            '/template-parts/section',
            'media-with-text',
            [
                'image_position' => $image_position,
                'image_url' => $image,
                'heading_text' => $heading_text,
                'body_text' => $body_text,
                'button_one_text' => $button_one_text,
                'button_one_url' => $button_one_url,
                'button_two_text' => $button_two_text,
                'button_two_url' => $button_two_url,
            ]
        );

    endwhile;

endif;

// $haschild = if_has_child_page();

// if (!$haschild) {
//     /**
//      * Get template part called singleservice from template-parts > template-singleservice.php
//      */
//     get_template_part(TEMPLATEPART, 'singleservice');
// } else {
//     /**
//      * Get template part called servicearchive from template-parts > template-servicearchive.php
//      */
//     get_template_part(TEMPLATEPART, 'servicearchive');
// }

// Render the news section
echo do_shortcode('[get_news_posts]');


get_footer();