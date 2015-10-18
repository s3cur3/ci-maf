<?php


require_once 'content/header/addGoogleFonts.php'; // Load custom Google Fonts
require_once 'appearance/googleFontsStyles.php'; // Add the <style> tags to set font-families
require_once 'appearance/fullWidthLayout.php'; // Tools for setting up the full-width layout
require_once 'content/google-privacy-policy.php'; // Boilerplate Google Privacy Policy
require_once 'content/integrate-woocommerce.php'; // Enable Woocommerce support
require_once 'content/sidebar/social.php'; // Social media icon widget
require_once 'content/fancy-landing.php'; // Shortcodes for our "fancy" landing pages


//Initialize the update checker.
$update_checker = new ThemeUpdateChecker(
    'ci-modern-accounting-firm',
    'http://ci-modern-accounting-firm.mystagingwebsite.com/downloads/themes/ci-modern-accounting-firm_version_metadata.json',
    true
);


