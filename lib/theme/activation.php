<?php
/**
 * Theme activation
 */
if (is_admin() && isset($_GET['activated']) && 'themes.php' == $GLOBALS['pagenow']) {
    wp_redirect(admin_url('themes.php?page=theme_activation_options'));
    exit;
}

function roots_theme_activation_options_init()
{
    register_setting(
        'roots_activation_options',
        'roots_theme_activation_options'
    );
}

add_action('admin_init', 'roots_theme_activation_options_init');

function roots_activation_options_page_capability($capability)
{
    return 'edit_theme_options';
}

add_filter('option_page_capability_roots_activation_options', 'roots_activation_options_page_capability');

function roots_theme_activation_options_add_page()
{
    $roots_activation_options = roots_get_theme_activation_options();

    if (!$roots_activation_options) {
        $theme_page = add_theme_page(
            __('Theme Activation', CI_TEXT_DOMAIN),
            __('Theme Activation', CI_TEXT_DOMAIN),
            'edit_theme_options',
            'theme_activation_options',
            'roots_theme_activation_options_render_page'
        );
    } else {
        if (is_admin() && isset($_GET['page']) && $_GET['page'] === 'theme_activation_options') {
            flush_rewrite_rules();
            wp_redirect(admin_url('themes.php'));
            exit;
        }
    }
}

add_action('admin_menu', 'roots_theme_activation_options_add_page', 50);

function roots_get_theme_activation_options()
{
    return get_option('roots_theme_activation_options');
}

function roots_theme_activation_options_render_page()
{
    ?>
    <div class="wrap">
        <h2><?php printf(__('%s Theme Activation', CI_TEXT_DOMAIN), wp_get_theme()); ?></h2>

        <div class="update-nag">
            <?php _e('These settings are optional and should usually be used only on a fresh installation', CI_TEXT_DOMAIN); ?>
        </div>
        <?php settings_errors(); ?>

        <form method="post" action="options.php">
            <?php settings_fields('roots_activation_options'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e('Create static front page?', CI_TEXT_DOMAIN); ?>  (recommended)</th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span><?php _e('Create static front page?', CI_TEXT_DOMAIN); ?></span></legend>
                            <select name="roots_theme_activation_options[create_front_page]" id="create_front_page">
                                <option selected="selected" value="true"><?php echo _e('Yes', CI_TEXT_DOMAIN); ?></option>
                                <option value="false"><?php echo _e('No', CI_TEXT_DOMAIN); ?></option>
                            </select>

                            <p class="description"><?php printf(__('Create a page called Home and set it to be the static front page', CI_TEXT_DOMAIN)); ?></p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Change permalink structure?', CI_TEXT_DOMAIN); ?>  (recommended)</th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span><?php _e('Update permalink structure?', CI_TEXT_DOMAIN); ?></span></legend>
                            <select name="roots_theme_activation_options[change_permalink_structure]"
                                    id="change_permalink_structure">
                                <option selected="selected" value="true"><?php echo _e('Yes', CI_TEXT_DOMAIN); ?></option>
                                <option value="false"><?php echo _e('No', CI_TEXT_DOMAIN); ?></option>
                            </select>

                            <p class="description"><?php printf(__('Change permalink structure to /&#37;postname&#37;/', CI_TEXT_DOMAIN)); ?></p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Create navigation menu?', CI_TEXT_DOMAIN); ?> (recommended)</th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span><?php _e('Create navigation menu?', CI_TEXT_DOMAIN); ?></span></legend>
                            <select name="roots_theme_activation_options[create_navigation_menus]"
                                    id="create_navigation_menus">
                                <option selected="selected" value="true"><?php echo _e('Yes', CI_TEXT_DOMAIN); ?></option>
                                <option value="false"><?php echo _e('No', CI_TEXT_DOMAIN); ?></option>
                            </select>

                            <p class="description"><?php printf(__('Create the Primary Navigation menu and set the location', CI_TEXT_DOMAIN)); ?></p>
                        </fieldset>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php _e('Add pages to menu?', CI_TEXT_DOMAIN); ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e('Add pages to menu?', CI_TEXT_DOMAIN); ?></span>
                            </legend>
                            <select name="roots_theme_activation_options[add_pages_to_primary_navigation]"
                                    id="add_pages_to_primary_navigation">
                                <option selected="selected" value="true"><?php echo _e('Yes', CI_TEXT_DOMAIN); ?></option>
                                <option value="false"><?php echo _e('No', CI_TEXT_DOMAIN); ?></option>
                            </select>

                            <p class="description"><?php printf(__('Add all current published pages to the Primary Navigation', CI_TEXT_DOMAIN)); ?></p>
                        </fieldset>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

<?php
}

function roots_theme_activation_action()
{
    if (!($roots_theme_activation_options = roots_get_theme_activation_options())) {
        return;
    }

    if (strpos(wp_get_referer(), 'page=theme_activation_options') === false) {
        return;
    }

    if ($roots_theme_activation_options['create_front_page'] === 'true') {
        $roots_theme_activation_options['create_front_page'] = false;

        $default_pages = array('Home');
        $existing_pages = get_pages();
        $temp = array();

        foreach ($existing_pages as $page) {
            $temp[] = $page->post_title;
        }

        $pages_to_create = array_diff($default_pages, $temp);

        foreach ($pages_to_create as $new_page_title) {
            $home = <<<EOL
<h2>[bg highlight]By beer lovers, for beer lovers.[/bg]</h2>

[bg mb=10]From effervescent, Belgian-style saisons to the most massive, monstrous stouts...[/bg]

[bg mb=10]From cutting-edge, label-defying experimental brews to ancient recipe revivals...[/bg]

[bg mb=10]Forever Young stands for loving beer &amp; beer culture to the fullest.[/bg]

&nbsp;

&nbsp;

<h2>[bg highlight]Our Beers[/bg]</h2>

[beers columns=6 length=0 /]

&nbsp;

&nbsp;

<h2>[bg highlight]Our Story[/bg]</h2>

[container]

Here at Forever Young, we're brewers and culinarians.

Our mission is simple: to produce fresh, flavorful beers using the finest local ingredients and the best of both old &amp; new brewing techniques.

We want our beer to taste good, but we also want it to taste good with food. We don’t want to blow-out your palate, we want you to explore the hidden flavors and understand the complexities of the taste.

We're a crazy, kooky bunch, but we work hard &amp; get the job done. At work, we try to keep our day-to-day activities light &amp; fun.

Above all, we’re adventurous. We started as homebrewers, and we've never lost that sense of exploration. We hope you'll join us on our beer adventure.

[/container]

&nbsp;

&nbsp;

<h2>[bg highlight]Visit Our Taproom[/bg]</h2>

[widgets_on_pages]

<div class="text-center"><a class="btn btn-primary btn-lg " href="/tour/">View Our Tour Schedule</a></div>

&nbsp;

&nbsp;
EOL;



            $add_default_pages = array(
                'post_title' => $new_page_title,
                'post_content' => $home,
                'post_status' => 'publish',
                'post_type' => 'page'
            );

            $result = wp_insert_post($add_default_pages);
        }

        $home = get_page_by_title('Home');
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);

        $home_menu_order = array(
            'ID' => $home->ID,
            'menu_order' => -1
        );
        wp_update_post($home_menu_order);
    }

    if ($roots_theme_activation_options['change_permalink_structure'] === 'true') {
        $roots_theme_activation_options['change_permalink_structure'] = false;

        if (get_option('permalink_structure') !== '/%postname%/') {
            global $wp_rewrite;
            $wp_rewrite->set_permalink_structure('/%postname%/');
            flush_rewrite_rules();
        }
    }

    if ($roots_theme_activation_options['create_navigation_menus'] === 'true') {
        $roots_theme_activation_options['create_navigation_menus'] = false;

        $roots_nav_theme_mod = false;

        $primary_nav = wp_get_nav_menu_object('Primary Navigation');

        if (!$primary_nav) {
            $primary_nav_id = wp_create_nav_menu('Primary Navigation', array('slug' => 'primary_navigation'));
            $roots_nav_theme_mod['primary_navigation'] = $primary_nav_id;
        } else {
            $roots_nav_theme_mod['primary_navigation'] = $primary_nav->term_id;
        }

        $landing_nav = wp_get_nav_menu_object('Landing Page Navigation');

        if (!$landing_nav) {
            $landing_nav_id = wp_create_nav_menu('Landing Page Navigation', array('slug' => 'landing_navigation'));
            $roots_nav_theme_mod['landing_navigation'] = $landing_nav_id;
        } else {
            $roots_nav_theme_mod['landing_navigation'] = $landing_nav->term_id;
        }

        if ($roots_nav_theme_mod) {
            set_theme_mod('nav_menu_locations', $roots_nav_theme_mod);
        }
    }

    if ($roots_theme_activation_options['add_pages_to_primary_navigation'] === 'true') {
        $roots_theme_activation_options['add_pages_to_primary_navigation'] = false;

        $primary_nav = wp_get_nav_menu_object('Primary Navigation');
        $primary_nav_term_id = (int)$primary_nav->term_id;
        $menu_items = wp_get_nav_menu_items($primary_nav_term_id);

        if (!$menu_items || empty($menu_items)) {
            $pages = get_pages();
            foreach ($pages as $page) {
                $item = array(
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish'
                );
                wp_update_nav_menu_item($primary_nav_term_id, 0, $item);
            }
        }
    }

    update_option('roots_theme_activation_options', $roots_theme_activation_options);
}

add_action('admin_init', 'roots_theme_activation_action');

function roots_deactivation()
{
    delete_option('roots_theme_activation_options');
}

add_action('switch_theme', 'roots_deactivation');
