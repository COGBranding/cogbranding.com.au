<?php
function create_our_work_post_type()
{
    $labels = array(
        'name'               => 'Our Work',
        'singular_name'      => 'Our Work',
        'menu_name'          => 'Our Work',
        'name_admin_bar'     => 'Our Work',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Our Work',
        'new_item'           => 'New Our Work',
        'edit_item'          => 'Edit Our Work',
        'view_item'          => 'View Our Work',
        'all_items'          => 'All Our Work',
        'search_items'       => 'Search Our Work',
        'parent_item_colon'  => 'Parent Our Work:',
        'not_found'          => 'No Our Work found.',
        'not_found_in_trash' => 'No Our Work found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'our-work'),
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => null,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'categories', 'tags'),
    );

    register_post_type('our-work', $args);
}

add_action('init', 'create_our_work_post_type');

//hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'create_our_work_categories_hierarchial_taxonomy', 0);

function create_our_work_categories_hierarchial_taxonomy()
{
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
    $labels = array(
        'name' => _x('Our Work Categories', 'taxonomy general name'),
        'singular_name' => _x('Our Work Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Our Work Categories'),
        'all_items' => __('All Our Work Categories'),
        'parent_item' => __('Parent Our Work Category'),
        'parent_item_colon' => __('Parent Our Work Category:'),
        'edit_item' => __('Edit Our Work Category'),
        'update_item' => __('Update Our Work Category'),
        'add_new_item' => __('Add New Our Work Category'),
        'new_item_name' => __('New Our Work Category Name'),
        'menu_name' => __('Our Work Categories'),
    );

    // Now register the taxonomy
    register_taxonomy('categories', array('our-work'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-work-categories'),
    ));
}
