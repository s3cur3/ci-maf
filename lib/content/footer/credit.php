<?php

function ciGetThemeCredit() {
    function getLinkWithText($url, $text) {
        return "<a href=\"$url\" target=\"_blank\">$text</a>";
    }
    
    // Print a different link based on the current page ID
    global $wp_query;
    $id = $wp_query->post->ID;

    $root = "http://conversioninsights.net";
    $me = $root . "/tyler-young/";
    $designServices = $root . "/services/web-design/";
    $freeThemes = $root . "/free-wordpress-themes-for-accounting-firms/";
    $paidThemes = $root . "/modern-accounting-firm-premium/";
    $project = $root;

    $choices = array(
        /* Project-specific */
        getLinkWithText($freeThemes, "Free WordPress Themes for Accounting Firms"),
        getLinkWithText($paidThemes, "Premium WordPress Themes for Accounting Firms"),
        getLinkWithText($project, "Site created by Conversion Insights"),
        getLinkWithText($project, "Theme by Conversion Insights"),
        getLinkWithText($paidThemes, "The Modern Accounting Firm WordPress Theme") . " by BrewSites",

        /* Brewery specific */
        getLinkWithText($root, "Web Marketing for Accounting Firms") . " by Conversion Insights",
        getLinkWithText($root, "Web Design for Accounting Firms"),
        "Web design by " . getLinkWithText($root, "Conversion Insights"),


        /* Kansas City-specific *
        getLinkWithText($designServices, "Kansas City Web Design"), */

        /* Generic */
        "WordPress theme created by " . getLinkWithText($me, "Tyler Young") . " of Conversion Insights",
        "Accounting WordPress theme by " . getLinkWithText($root, "Conversion Insights"),
        getLinkWithText($root, "Conversion Insights"),
        "Web site design by " . getLinkWithText($me, "Tyler Young") . " of Conversion Insights",
        "Designed by " . getLinkWithText($root, "Conversion Insights"),
        getLinkWithText($designServices, "Accounting Web Design") . " by BrewSites",
        getLinkWithText($designServices, "Web Design for Accounting Firms"),
    );

    return $choices[ $id % count($choices) ];
}

function ciPrintThemeCredit() {
    echo ciGetThemeCredit();
}