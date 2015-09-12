<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
    // Make theme available for translation
    load_theme_textdomain( CI_TEXT_DOMAIN, get_template_directory() . '/lang' );

    // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
    register_nav_menus( array(
                            'primary_navigation' => __( 'Primary Navigation', CI_TEXT_DOMAIN ),
                            'landing_navigation' => __( 'Landing Page Navigation', CI_TEXT_DOMAIN ),
                        ) );

    // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
    add_theme_support( 'post-thumbnails' );
    // set_post_thumbnail_size(150, 150, false);
    // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)

    // Add post formats (http://codex.wordpress.org/Post_Formats)
    // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // Tell the TinyMCE editor to use a custom stylesheet
    add_editor_style( '/assets/css/admin/editor-style.css' );
    add_editor_style( '/assets/css/admin/editor-colors.php' );
}

add_action( 'after_setup_theme', 'roots_setup' );