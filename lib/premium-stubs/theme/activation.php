<?php

if( !defined('CI_IGNORE_UPGRADE_KEY') ) define('CI_IGNORE_UPGRADE_KEY', 'ci_acknowledge_upgrade');

add_action('after_switch_theme', 'ciThemeActivation');
function ciThemeActivation() {
    $displayNoticeAfter = current_time('timestamp') /* double, secs since 1970 */ + 60*60*24; // show 1 day after first activation
    update_option(CI_DO_DEFERRED_ADMIN_NOTICES_AFTER_KEY, $displayNoticeAfter);
}


function ciUpgradeAdminNotice() {
    global $current_user ;
    if(!get_user_meta($current_user->ID, CI_IGNORE_UPGRADE_KEY) && current_user_can('manage_options')) {
        // if it's past the window where we try not to annoy the user
        if(current_time('timestamp') > get_option(CI_DO_DEFERRED_ADMIN_NOTICES_AFTER_KEY, 0)) { ?>
            <div id="ci-upgrade-notice" class="updated notice">
                <p><?php printf(__('<strong>Upgrade to <a href="%1$s">the premium version</a> of this theme</strong> to get instant access to tons of powerful new features, including:', 'ci-modern-accounting-firm'), CI_THEME_BUY_URL); ?></p>
                <ul style="list-style-type: disc; padding-left: 2em;">
                    <li><?php _e('9 professional, fully customizable color themes,', 'ci-modern-accounting-firm') ?></li>
                    <li><?php _e('600+ free fonts from <a href="https://www.google.com/fonts" target="_blank">Google Fonts</a>,', 'ci-modern-accounting-firm') ?></li>
                    <li><?php _e('new page layout options,', 'ci-modern-accounting-firm') ?></li>
                    <li><?php _e('integration with your social media accounts,', 'ci-modern-accounting-firm') ?></li>
                    <li><?php _e('&amp; much more.', 'ci-modern-accounting-firm') ?></li>
                </ul>
                <p><?php printf(__('Don&rsquo;t worry&mdash;you won&rsquo;t lose any of your previous work when you upgrade!', 'ci-modern-accounting-firm'), CI_THEME_BUY_URL); ?></p>
                <a href="<?php echo CI_THEME_BUY_URL; ?>" class="btn btn-primary" style="text-decoration: none; margin-bottom:1em;" target="_blank"><?php _e('Upgrade to the Premium Version Now', 'ci-modern-accounting-firm'); ?></a>
                | <a href="?<?php echo CI_IGNORE_UPGRADE_KEY; ?>=1"><?php _e('No thanks, the free version is all I need', 'ci-modern-accounting-firm'); ?></a>
            </div><?php
        }
    }
}
add_action( 'admin_notices', 'ciUpgradeAdminNotice' );


function ciUpgradeNagIgnore() {
    global $current_user;
    /* If user clicks to ignore the notice, add that to their user meta */
    if(isset($_GET[CI_IGNORE_UPGRADE_KEY]) && $_GET[CI_IGNORE_UPGRADE_KEY] == '1') {
        add_user_meta($current_user->ID, CI_IGNORE_UPGRADE_KEY, 'true', true);
    }
}
add_action('admin_init', 'ciUpgradeNagIgnore');

