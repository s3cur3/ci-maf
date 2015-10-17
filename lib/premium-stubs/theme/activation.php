<?php


register_activation_hook(__FILE__, 'ciThemeActivation');
function ciThemeActivation() {
    $displayNoticeAfter = current_time('timestamp') /* double, secs since 1970 */ + 60*60*24; // show 1 day after first activation
    update_option('ci_do_deferred_admin_notices_after', $displayNoticeAfter);
}


function ciUpgradeAdminNotice() {
    global $current_user ;
    if(!get_user_meta($current_user->ID, 'ci_upgrade_nag_ignore') && current_user_can('manage_options')) {
        // if it's past the window where we try not to annoy the user
        if(get_option('ci_do_deferred_admin_notices_after', 0) > current_time('timestamp')) { ?>
            <div id="ci-upgrade-notice" class="updated">
                <p><?php printf(__('Upgrade to <a href="%1$s">the premium version</a> of this theme to get instant access to tons of powerful new features, including:', CI_TEXT_DOMAIN), CI_THEME_BUY_URL); ?></p>
                <ul>
                    <li><?php _e('9 professional, fully customizable color themes,', CI_TEXT_DOMAIN) ?></li>
                    <li><?php _e('600+ free fonts from <a href="https://www.google.com/fonts" target="_blank">Google Fonts</a>,', CI_TEXT_DOMAIN) ?></li>
                    <li><?php _e('new page layout options,', CI_TEXT_DOMAIN) ?></li>
                    <li><?php _e('integration with your social media accounts,', CI_TEXT_DOMAIN) ?></li>
                    <li><?php _e('and much more.', CI_TEXT_DOMAIN) ?></li>
                </ul>
                <p><?php printf(__('Don&rsquo;t worry&mdash;you won&rsquo;t lose any of your previous work when you upgrade!', CI_TEXT_DOMAIN), CI_THEME_BUY_URL); ?></p>
                <a href="<?php echo CI_THEME_BUY_URL; ?>"><?php _e('Upgrade to the Premium Version Now', CI_TEXT_DOMAIN); ?></a>
                <a href="?ci_upgrade_nag_ignore=0" class="notice-dismiss"><span class="screen-reader-text"><?php _e('No thanks, the free version is all I need', CI_TEXT_DOMAIN); ?></span></a>
            </div> <?php
        }
    }


}
add_action( 'admin_notices', 'ciUpgradeAdminNotice' );


function ciUpgradeNagIgnore() {
    global $current_user;
    /* If user clicks to ignore the notice, add that to their user meta */
    if(isset($_GET['ci_upgrade_nag_ignore']) && $_GET['example_nag_ignore'] == '0') {
        add_user_meta($current_user->ID, 'ci_upgrade_nag_ignore', 'true', true);
    }
}
add_action('admin_init', 'ciUpgradeNagIgnore');

