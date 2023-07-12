<?php
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Register primary-meny, secondary-menu and footer-menu 
 */
function cog_register_menu()
{

    register_nav_menus(array(
        'primary-menu'   => esc_html__('Primary Menu', 'cog'),
        'secondary-menu' => esc_html__('Secondary Menu', 'cog'),
        'footer-menu'    => esc_html__('Footer Menu', 'cog'),
    ));
}
add_action('after_setup_theme', 'cog_register_menu');
