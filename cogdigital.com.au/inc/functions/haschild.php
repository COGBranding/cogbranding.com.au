<?php
if (!defined('ABSPATH')) {
    die();
}

/**
 * Check if the page has child page 
 * 
 * @return bool 
 * ture if has child page and false if dont
 */

function if_has_child_page()
{
    global $post;

    $pageid = $post->ID;
    $result = false;

    $children_pages = get_pages(array(
        'post_type' => 'services',
        'child_of' => $pageid,
        'sort_column' => 'menu_order',
        'sort_order' => 'ASC'
    ));

    if (!empty($children_pages)) {
        $result = true;
    }

    return $result;
}
