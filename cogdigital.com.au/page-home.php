<?php
get_header();

/**
 * Home Slider
 */
echo do_shortcode('[get_home_slider id="697"]');

/**
 * Hero Section
 */
// Get the hero section field group
$hero_section = get_field('hero_section');

// Get the subfields from the group
$hero_section_text = $hero_section['hero_section_text'];
$hero_section_button_one_text = $hero_section['hero_section_button_one_text'];
$hero_section_button_one_url = $hero_section['hero_section_button_one_url'];
$hero_section_button_two_text = $hero_section['hero_section_button_two_text'];
$hero_section_button_two_url = $hero_section['hero_section_button_two_url'];
$hero_section_image = $hero_section['hero_section_image'];
$hero_logo_slider = $hero_section['display_logo_slider_section'];

// Render the hero section
get_template_part(
    GLOBALTEMPLATEPART,
    'hero',
    [
        'hero_content' => $hero_section_text,
        'button_one_text' => $hero_section_button_one_text,
        'button_one_url' => $hero_section_button_one_url,
        'button_two_text' => $hero_section_button_two_text,
        'button_two_url' => $hero_section_button_two_url,
        'hero_image' => $hero_section_image,
        'display_logo_slider' => true,
        'slider_id' => 38,
    ]
);

// Render the featured projects secction
get_template_part(
    'template-parts/home',
    'featured-projects',
);

/**
 * Content Section
 */
// Get the content section field group
$content_section = get_field('content_section');

// Get the subfields from the group
$content_section_heading_text = $content_section['content_section_heading_text'];
$content_section_body_text = $content_section['content_section_body_text'];
$content_section_button_one_text = $content_section['content_section_button_one_text'];
$content_section_button_one_url = $content_section['content_section_button_one_url'];
$content_section_button_two_text = $content_section['content_section_button_two_text'];
$content_section_button_two_url = $content_section['content_section_button_two_url'];
$content_section_image = $content_section['content_section_image'];

// Render the content section
get_template_part(
    GLOBALTEMPLATEPART,
    'hero',
    [
        'hero_content' => $content_section_heading_text,
        'hero_body_text' => $content_section_body_text,
        'button_one_text' => $content_section_button_one_text,
        'button_one_url' => $content_section_button_one_url,
        'button_two_text' => $content_section_button_two_text,
        'button_two_url' => $content_section_button_two_url,
        'hero_image' => $content_section_image,
    ]
);

// Render the services section
echo do_shortcode('[get_parent_services]');

// Render the news section
echo do_shortcode('[get_news_posts]');

get_footer();
