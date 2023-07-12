<?php
get_header();

// render news section
echo do_shortcode('[get_news_posts archive=true]');

get_footer();
