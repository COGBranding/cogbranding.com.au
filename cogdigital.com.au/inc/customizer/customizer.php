<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * callback function to register custom customiser
 * @param $wp_customize
 * 
 * Registers panel for log, contact info fields
 */
function cog_customizer($wp_customize)
{

    //add section for cog newsletter infromation
    $wp_customize->add_section('cog_newsletter', array(
        'title'      => 'COG News Letter',
        'priority'   => 11,
        'capability' => 'edit_theme_options'
    ));
    //add image upload option
    $wp_customize->add_setting('newsletter_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ));
    //add image upload option control

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'newsletter_image', array(
        'label'        => 'Newsletter Image',
        'section'    => 'cog_newsletter',
        'settings'   => 'newsletter_image',
        'mime_type'  => 'image'
    )));
    //add section for cog general infromation
    $wp_customize->add_section('cog_general', array(
        'title'      => 'COG General Information',
        'priority'   => 10,
        'capability' => 'edit_theme_options'
    ));

    //add image upload option
    $wp_customize->add_setting('logo_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ));
    //add image upload option control

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'logo_image', array(
        'label'        => 'Logo',
        'section'    => 'cog_general',
        'settings'   => 'logo_image',
        'mime_type'  => 'image'
    )));

    //add alternate image upload option
    $wp_customize->add_setting('alternate_logo_image', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'refresh'
    ));
    //add image upload option control

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'alt_logo_image', array(
        'label'        => 'Alternate Logo',
        'section'    => 'cog_general',
        'settings'   => 'alternate_logo_image',
        'mime_type'  => 'image'
    )));


    //add phone number text option
    $wp_customize->add_setting(
        'cog_phone',
        array(
            'default' => __('02 9523 6007', 'Cog'),
            'transport' => 'refresh',
        )
    );
    //add phone number text option control

    $wp_customize->add_control(
        'cog_phone',
        array(
            'label' => __('Phone number', 'cog'),
            'section' => 'cog_general',
            'setting' => 'cog_phone',
            'priority' => 10,
            'type' => 'text',


        )
    );
    //add phone number text option
    $wp_customize->add_setting(
        'cog_email',
        array(
            'default' => __('enquiries@cogbranding.com.au', 'Cog'),
            'transport' => 'refresh',
        )
    );
    //add phone number text option control

    $wp_customize->add_control(
        'cog_email',
        array(
            'label' => __('Contact email', 'cog'),
            'section' => 'cog_general',
            'setting' => 'cog_email',
            'priority' => 11,
            'type' => 'email',


        )
    );
    //add phone number text option
    $wp_customize->add_setting(
        'cog_apt_street',
        array(
            'default' => __('8A Cronulla Street', 'Cog'),
            'transport' => 'refresh',
        )
    );
    //add phone number text option control

    $wp_customize->add_control(
        'cog_apt_street',
        array(
            'label' => __('Apt and street', 'cog'),
            'section' => 'cog_general',
            'setting' => 'cog_apt_street',
            'priority' => 11,
            'type' => 'text',


        )
    );
    //add phone number text option
    $wp_customize->add_setting(
        'cog_full_address',
        array(
            'default' => __('Cronulla, NSW 2230, Australia', 'Cog'),
            'transport' => 'refresh',
        )
    );
    //add phone number text option control

    $wp_customize->add_control(
        'cog_full_address',
        array(
            'label' => __('Address', 'cog'),
            'section' => 'cog_general',
            'setting' => 'cog_full_address',
            'priority' => 11,
            'type' => 'text',


        )
    );

    if (current_user_can('administrator')) {
        // Add section for the JavaScript script
        $wp_customize->add_section('analytics', array(
            'title'      => 'Analytics Codes',
            'priority'   => 10,
        ));

        // Add setting for the JavaScript code
        $wp_customize->add_setting('head_js_code', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        // Add control for the JavaScript code
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control($wp_customize, 'head_js_code', array(
            'label'        => 'Head JavaScript Code',
            'section'      => 'analytics',
            'settings'     => 'head_js_code',
            'code_type'    => 'text/javascript', // Set the code type to JavaScript
            'editor_settings' => array(
                'theme' => 'monokai', // Optional: Set the code editor theme
            ),
        )));
        // Add setting for the JavaScript code
        $wp_customize->add_setting('body_js_code', array(
            'default'     => '',
            'transport'   => 'refresh',
        ));

        // Add control for the JavaScript code
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control($wp_customize, 'body_js_code', array(
            'label'        => 'Body JavaScript Code',
            'section'      => 'analytics',
            'settings'     => 'body_js_code',
            'code_type'    => 'text/javascript', // Set the code type to JavaScript
            'editor_settings' => array(
                'theme' => 'monokai', // Optional: Set the code editor theme
            ),
        )));
    }

    // Add social media section
    $wp_customize->add_section('custom_social_media_section', array(
        'title' => 'Social Media',
        'priority' => 30,
    ));

    // Add Facebook setting and control
    $wp_customize->add_setting('custom_facebook_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('custom_facebook_link_control', array(
        'label' => 'Facebook',
        'section' => 'custom_social_media_section',
        'settings' => 'custom_facebook_link',
        'type' => 'text',
    ));

    // Add Twitter setting and control
    $wp_customize->add_setting('custom_twitter_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('custom_twitter_link_control', array(
        'label' => 'Twitter',
        'section' => 'custom_social_media_section',
        'settings' => 'custom_twitter_link',
        'type' => 'text',
    ));

    // Add Instagram setting and control
    $wp_customize->add_setting('custom_instagram_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('custom_instagram_link_control', array(
        'label' => 'Instagram',
        'section' => 'custom_social_media_section',
        'settings' => 'custom_instagram_link',
        'type' => 'text',
    ));

    // Add LinkedIn setting and control
    $wp_customize->add_setting('custom_linkedin_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('custom_linkedin_link_control', array(
        'label' => 'LinkedIn',
        'section' => 'custom_social_media_section',
        'settings' => 'custom_linkedin_link',
        'type' => 'text',
    ));
}

add_action('customize_register', 'cog_customizer');
