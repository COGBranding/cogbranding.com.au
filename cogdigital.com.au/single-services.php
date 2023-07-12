<?php
get_header();

$haschild = if_has_child_page();

if (!$haschild) {
    /**
     * Get template part called singleservice from template-parts > template-singleservice.php
     */
    get_template_part(TEMPLATEPART, 'singleservice');
} else {
    /**
     * Get template part called servicearchive from template-parts > template-servicearchive.php
     */
    get_template_part(TEMPLATEPART, 'servicearchive');
}

// Render the news section
echo do_shortcode('[get_news_posts]');

get_footer();
