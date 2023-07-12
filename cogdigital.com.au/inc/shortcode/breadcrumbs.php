<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * @return string
 * breadcrumbs for the pages.
 */
function custom_breadcrumb()
{
    ob_start();
    // Retrieve the current post/page ID
    $current_id = get_queried_object_id();

    // Create an array to store breadcrumb items
    $breadcrumbs = array();

    // Add the home link to the breadcrumbs
    $breadcrumbs[] = '<a class="hero__page-title text-uppercase text-uppercase--sm span-text" href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'your-theme-domain') . '</a>';

    // Check if it's a page or single post
    if (is_page()) {
        // Retrieve the page hierarchy
        $ancestors = get_post_ancestors($current_id);
        $ancestors = array_reverse($ancestors);

        // Loop through the page hierarchy
        foreach ($ancestors as $ancestor) {
            $breadcrumbs[] = '<a class="hero__page-title text-uppercase text-uppercase--sm span-text" href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
        }

        // Add the current page to the breadcrumbs
        $breadcrumbs[] = get_the_title($current_id);
    } elseif (is_single()) {
        // Retrieve the post's categories
        $categories = get_the_category($current_id);
        $post_type = get_post_type($current_id);
        $post_type_obj = get_post_type_object($post_type);
        $post_archive_url = get_post_type_archive_link($post_type_obj->name);


        $breadcrumbs[] = '<a class="hero__page-title text-uppercase text-uppercase--sm span-text" href="' . $post_archive_url . '">' . $post_type . '</a>';
        // Check if the post belongs to any categories
        if ($categories) {
            // Get the last category
            $last_category = end($categories);

            // Loop through the categories hierarchy
            $category_ancestors = get_ancestors($last_category->term_id, 'category');
            $category_ancestors = array_reverse($category_ancestors);

            foreach ($category_ancestors as $category_ancestor) {
                $breadcrumbs[] = '<a class="hero__page-title text-uppercase text-uppercase--sm span-text" href="' . get_category_link($category_ancestor) . '">' . get_cat_name($category_ancestor) . '</a>';
            }

            // Add the last category to the breadcrumbs
            $breadcrumbs[] =  get_category_link($last_category) . '">' . $last_category->name . '</a>';
        }
        $ancestors = get_post_ancestors($current_id);
        $ancestors = array_reverse($ancestors);

        // Loop through the page hierarchy
        foreach ($ancestors as $ancestor) {
            $breadcrumbs[] = '<a class="hero__page-title text-uppercase text-uppercase--sm span-text" href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a>';
        }

        // Add the current post to the breadcrumbs
        $breadcrumbs[] = '<p class="hero__page-title text-uppercase text-uppercase--sm span-text">' . get_the_title($current_id) . '</p>';
    } elseif (is_archive()) {
        $post_type = get_post_type($current_id);

        $breadcrumbs[] =  $post_type;
    }

    // Output the breadcrumbs
    echo '<div class="breadcrumb">' . implode('  <div class="bc-sep hero__page-title text-uppercase text-uppercase--sm span-text"><span class="outer"><span class="inner"></span></span></div>  ', $breadcrumbs) . '</div>';

    return ob_get_clean();
}

add_shortcode('breadcrumb', 'custom_breadcrumb');
