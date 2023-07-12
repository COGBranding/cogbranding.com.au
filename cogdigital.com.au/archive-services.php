<?php
get_header();

// Get the ACF field group
$hero_section = get_field('hero_section', 'option');
$hero_callout_text = $hero_section['callout_text'];
$hero_content = $hero_section['introduction_text'];
$hero_image = $hero_section['image'];

$display_page_title = !empty($hero_callout_text) ? $hero_callout_text : get_the_title();

// Render the hero section
get_template_part(
    'template-parts/section',
    'hero',
    [
        'page_title' => $display_page_title,
        'hero_content' => $hero_content,
        'hero_image' => $hero_image
    ]
);

// Render the services section
echo do_shortcode('[get_parent_services]');

// Render the images section
get_template_part(
    GLOBALTEMPLATEPART,
    'images',
);

// Render the project slider section
echo do_shortcode('[get_project_slider]');

// Render the news section
echo do_shortcode('[get_news_posts]');

get_footer();
