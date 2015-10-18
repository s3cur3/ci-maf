<?php
function ciDisplayFontCustomizationOptions($wp_customize) {
    $fontOptions = array(
        array(
            'type' => 'info',
            'slug' => 'fonts_upgrade_msg',
            'description' => sprintf( __( '<strong>Note:</strong> The ability to use 600+ free <a href="https://www.google.com/fonts" target="_blank">Google Fonts</a> are a feature of <a href="%1$s">the premium version</a> of this theme. You can upgrade (without losing any of your existing work!) for $55 <a href="%1$s">on the Conversion Insights Web site</a>.', 'ci-modern-accounting-firm' ), CI_THEME_BUY_URL)
        ),
    );
    $wp_customize->add_section('fonts-upgrade', array('title' => __('Fonts', 'ci-modern-accounting-firm')));
    ciAddCustomizationsToSection($wp_customize, $fontOptions, 'fonts-upgrade');
}

function ciGetSocialCustomizationOptions() {
    return array(
        array(
            'type' => 'info',
            'slug' => 'social_media_upgrade_msg',
            'description' => sprintf( __( '<strong>Note:</strong> Social media links are a feature of <a href="%1$s">the premium version</a> of this theme. You can upgrade (without losing any of your existing work!) for $55 <a href="%1$s">on the Conversion Insights Web site</a>.', 'ci-modern-accounting-firm' ), CI_THEME_BUY_URL)
        ),
    );
}

function ciGetFullWidthContainerOption() {
    // Inidividual option, not option *group* (thus no array-of-array)
    return array(
            'type' => 'info',
            'slug' => 'full_width_upgrade_msg',
            'description' => sprintf( __( '<strong>Note:</strong> A new, full-width page layout option in included in <a href="%1$s">the premium version</a> of this theme. You can upgrade (without losing any of your existing work!) for $55 <a href="%1$s">on the Conversion Insights Web site</a>.', 'ci-modern-accounting-firm' ), CI_THEME_BUY_URL)
        );
}

function ciGetColorThemeOption() {
    // Inidividual option, not option *group* (thus no array-of-array)
    return array(
            'type' => 'info',
            'slug' => 'color_theme_upgrade_msg',
            'description' => sprintf( __( '<strong>Note:</strong> 9 new professional, customizable color themes are included in <a href="%1$s">the premium version</a> of this theme. You can upgrade (without losing any of your existing work!) for $55 <a href="%1$s">on the Conversion Insights Web site</a>.', 'ci-modern-accounting-firm' ), CI_THEME_BUY_URL)
        );
}

