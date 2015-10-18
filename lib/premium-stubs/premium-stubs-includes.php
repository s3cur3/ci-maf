<?php


require_once 'appearance/fullWidthLayout.php'; // Tools for setting up the full-width layout
require_once 'content/sidebar/social.php'; // Social media icon widget
require_once 'content/google-privacy-policy.php'; // Boilerplate Google Privacy Policy
require_once 'theme/activation.php'; // Upgrade notice


//Initialize the update checker.
$update_checker = new ThemeUpdateChecker(
    'ci-modern-accounting-firm-free',
    'http://ci-modern-accounting-firm.mystagingwebsite.com/downloads/themes/ci-modern-accounting-firm-free_version_metadata.json',
    true
);


