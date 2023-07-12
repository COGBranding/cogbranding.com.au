<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue files
 */
require_once(THEMEPATH . 'inc/enqueue/enqueue_css.php');
require_once(THEMEPATH . 'inc/enqueue/enqueue_js.php');

/**
 *  Functions
 */
require_once(THEMEPATH . 'inc/functions/haschild.php');
require_once(THEMEPATH . 'inc/functions/disable_comments.php');
require_once(THEMEPATH . 'inc/functions/register_nav_menu.php');
require_once(THEMEPATH . 'inc/functions/user_profile.php');

/**
 * CPT
 */
require_once(THEMEPATH . 'inc/cpt/our_work.php');
require_once(THEMEPATH . 'inc/cpt/slider.php');
require_once(THEMEPATH . 'inc/cpt/services.php');

/**
 * Shortcode
 */
require_once(THEMEPATH . '/inc/shortcode/get_home_slider.php');
require_once(THEMEPATH . 'inc/shortcode/get_logo_slider.php');
require_once(THEMEPATH . 'inc/shortcode/get_news_posts.php');
require_once(THEMEPATH . 'inc/shortcode/get_projects_slider.php');
require_once(THEMEPATH . 'inc/shortcode/get_parent_services.php');
require_once(THEMEPATH . 'inc/shortcode/post_updated.php');
require_once(THEMEPATH . 'inc/shortcode/get_post_author.php');
require_once(THEMEPATH . 'inc/shortcode/breadcrumbs.php');



/**
 * Customizer
 */

require_once(THEMEPATH . 'inc/customizer/customizer.php');
