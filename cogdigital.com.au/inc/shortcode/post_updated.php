<?php
if (!defined('ABSPATH')) {
    exit;
}
//the following function allows you to print the post updated date using [post_updated] shortcode. useful for pages like Privacy, Term & Conditions
function shortcode_post_updated_date()
{
    $u_time = get_the_time('U');
    $u_modified_time = get_the_modified_time('U');
    if ($u_modified_time >= $u_time + 86400) {
        $updated_date = get_the_modified_time('F jS, Y');
        $custom_content .= $updated_date;
    }
    $custom_content .= $content;
    return $custom_content;
}
add_shortcode('post_updated', 'shortcode_post_updated_date');
