<?php

/**
 * Register meta boxes
 *
 * For a demo of available options, see https://github.com/rilwis/meta-box/blob/master/demo/demo.php
 *
 * @param $meta_boxes void
 * @return array The filled meta boxes
 */
function ciRegisterMetaBoxes( $meta_boxes ) {
    global $ciSidebars;
    reset($ciSidebars);
    /**
     * Prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = CI_THEME_PREFIX . '_';

    // 1st meta box
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'standard',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Page-Specific Options', 'ci-modern-accounting-firm' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( 'post', 'page' ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            // Show page title
            array(
                'name' => __( 'Show page title?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}show_page_title",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 1,
            ),
            /*
            array(
                'name' => __( 'Make this a transparent landing page?', 'ci-modern-accounting-firm' ),
                'desc' => __('If checked, your text will be put directly on top of your site-wide background (either an image or a solid color). This is a neat effect for landing pages. (Configure colors in the WP Customize screen.)', 'ci-modern-accounting-firm'),
                'id'   => "{$prefix}make_fancy_landing",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 0,
            ),
            array(
                'name'     => __( 'Align page text:', 'ci-modern-accounting-firm' ),
                'id'       => "{$prefix}alignment",
                'type'     => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'  => array('left' => __('Left', 'ci-modern-accounting-firm'), 'center' => __('Center', 'ci-modern-accounting-firm'), 'right' => __('Right', 'ci-modern-accounting-firm')),
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'std'         => 'left'
            ),
            */
            array(
                'name' => __( 'Show page sidebar?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}show_page_sidebar",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 1,
            ),
            array(
                'name' => __( 'Show featured image?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}show_featured_img",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 1,
            ),
            /*
            array(
                'name' => __( 'Push page down (to show off page background) this many pixels', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}push_page_down",
                'type' => 'text',
                'std'  => '0',
            ),
            array(
                'name' => __( 'Push footer down (to show off page background) this many pixels', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}push_footer_down",
                'type' => 'text',
                'std'  => '0',
            ),
            */
            array(
                'name'     => __( 'Which sidebar should we use?', 'ci-modern-accounting-firm' ),
                'id'       => "{$prefix}sidebar",
                'type'     => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'  => $ciSidebars,
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'std'         => key($ciSidebars),
                'placeholder' => __( 'Select an Item', 'ci-modern-accounting-firm' ),
            ),
            // Top-of-page image slider
            array(
                'name' => __( 'Show giant image slider at top of page?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}top_img_slider",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std' => 0,
            ),
            // Taxonomy
            array(
                // Field name - Will be used as label
                'name'  => __( 'Show slides from this category at the top of the page (leave blank to show all)', 'ci-modern-accounting-firm' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}top_img_slider_cat_string",
                // Field description (optional)
                'desc'  => __( 'If you\'re showing an image slider at the top of the page. Note: give the category "slug."', 'ci-modern-accounting-firm' ),
                'type'  => 'text',
                // Default value (optional)
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => false,
            ),
        ),
    );

    // Meta box for the staff member custom post type
    $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id' => 'staff-only',

        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title' => __( 'Individual staff member options', 'ci-modern-accounting-firm' ),

        // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
        'pages' => array( CI_STAFF_TYPE ),

        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context' => 'normal',

        // Order of meta box: high (default), low. Optional.
        'priority' => 'high',

        // Auto save: true, false (default). Optional.
        'autosave' => true,

        // List of meta fields
        'fields' => array(
            // Show page title
            array(
                'name' => __( 'Show page title?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}show_page_title",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 1,
            ),
            array(
                'name' => __( 'Show page sidebar?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}show_page_sidebar",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std'  => 1,
            ),
            array(
                'name'     => __( 'Which sidebar should we use?', 'ci-modern-accounting-firm' ),
                'id'       => "{$prefix}sidebar",
                'type'     => 'select',
                // Array of 'value' => 'Label' pairs for select box
                'options'  => $ciSidebars,
                // Select multiple values, optional. Default is false.
                'multiple'    => false,
                'std'         => key($ciSidebars),
                'placeholder' => __( 'Select an Item', 'ci-modern-accounting-firm' ),
            ),
            // Top-of-page image slider
            array(
                'name' => __( 'Show giant image slider at top of page?', 'ci-modern-accounting-firm' ),
                'id'   => "{$prefix}top_img_slider",
                'type' => 'checkbox',
                // Value can be 0 or 1
                'std' => 0,
            ),
            // Slider
            array(
                'name'  => __( 'Show slides from this category at the top of the page (leave blank to show all)', 'ci-modern-accounting-firm' ),
                'id'    => "{$prefix}top_img_slider_cat_string",
                'desc'  => __( 'If you\'re showing an image slider at the top of the page. Note: give the category "slug."', 'ci-modern-accounting-firm' ),
                'type'  => 'text',
                // Default value (optional)
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                // CLONES: Add to make the field cloneable (i.e. have multiple value)
                'clone' => false,
            ),
            array(
                'type' => 'heading',
                'name' => __( 'Social media links for this staff member', 'ci-modern-accounting-firm' ),
                'id'   => 'fake_id', // Not used but needed for plugin
            ),
            // FB
            array(
                'name'  => __( 'Facebook URL', 'ci-modern-accounting-firm' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}facebook",
                'desc'  => "Leave blank to hide the Facebook link",
                'type'  => 'text',
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                'clone' => false,
            ),
            // Twitter
            array(
                'name'  => __( 'Twitter URL', 'ci-modern-accounting-firm' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}twitter",
                'desc'  => "Leave blank to hide the Twitter link",
                'type'  => 'text',
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                'clone' => false,
            ),
            // LI
            array(
                'name'  => __( 'LinkedIn URL', 'ci-modern-accounting-firm' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}linkedin",
                'desc'  => "Leave blank to hide the LinkedIn link",
                'type'  => 'text',
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                'clone' => false,
            ),
            // G+
            array(
                'name'  => __( 'Google+ URL', 'ci-modern-accounting-firm' ),
                // Field ID, i.e. the meta key
                'id'    => "{$prefix}google-plus",
                'desc'  => "Leave blank to hide the Google+ link",
                'type'  => 'text',
                'std'   => __( '', 'ci-modern-accounting-firm' ),
                'clone' => false,
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'ciRegisterMetaBoxes');


/* Spits out the docs page */
function ci_docs_page() { ?>
    <div id="ci-docs-page-wrap" class="wrap" style="background-color: white;">
        <iframe src="<?php echo get_template_directory_uri(); ?>/docs/theme-documentation.html" style="width:100%;height:1080px;"></iframe>
    </div> <?php
}

function add_custom_options_page() {
    add_theme_page(__('Theme Documentation', 'ci-modern-accounting-firm'), __('Theme Documentation', 'ci-modern-accounting-firm'), 'read', 'ci-theme-docs', 'ci_docs_page');

    // This would add a top-level menu page (right above Posts and beneath Dashboard)
    //add_menu_page( $menu['page_title'], $menu['menu_title'], $menu['capability'], $menu['menu_slug'], 'ci_docs_page', 'dashicons-admin-generic', 3 );
}
add_action('admin_menu', 'add_custom_options_page');








