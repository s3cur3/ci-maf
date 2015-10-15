<?php

function ciDisplayFontCustomizationOptions($wp_customize) {
    require_once "FontOptionsBuilder.php";
    $fontOptions = new FontOptionsBuilder();
    $openSansDefaultVariants = array(
        '300italic' => '1',
        '400italic' => '1',
        '700italic' => '1',
        '400' => '1',
        '300' => '1',
        '700' => '1',
    );
    $titleFontOptions = array(
        $fontOptions->getFontFamilySelect('title_font_family', "Bree+Serif"),
        $fontOptions->getFontFamilyVariants('title_font_variants'),
        $fontOptions->getWeightOption('title_font_weight', '400'),
        $fontOptions->getFallbackOption('title_font_fallback', 'Georgia, Garamond, sans-serif')
    );
    $headingFontOptions = array(
        $fontOptions->getFontFamilySelect('heading_font_family', "Bree+Serif"),
        $fontOptions->getFontFamilyVariants('heading_font_variants'),
        $fontOptions->getWeightOption('heading_font_weight', '400'),
        $fontOptions->getFallbackOption('body_font_fallback', 'Georgia, Garamond, sans-serif'),
    );
    $bodyFontOptions = array(
        $fontOptions->getFontFamilySelect('body_font_family', "Open+Sans"),
        $fontOptions->getFontFamilyVariants('body_font_variants', $openSansDefaultVariants),
        $fontOptions->getWeightOption('body_font_weight', '400'),
        $fontOptions->getFallbackOption('body_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif'),
    );
    $widgetFontOptions = array(
        $fontOptions->getFontFamilySelect('widget_title_font_family', "Open+Sans"),
        $fontOptions->getFontFamilyVariants('widget_title_font_variants', $openSansDefaultVariants),
        $fontOptions->getWeightOption('widget_title_font_weight', '700'),
        $fontOptions->getFallbackOption('widget_title_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif'),
    );
    $menuFontOptions = array(
        $fontOptions->getFontFamilySelect('menu_font_family', "Open+Sans"),
        $fontOptions->getFontFamilyVariants('menu_font_variants', $openSansDefaultVariants),
        $fontOptions->getWeightOption('menu_font_weight', '700'),
        $fontOptions->getFallbackOption('menu_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif'),
    );

    $wp_customize->add_panel('fonts', array(
        'title' => __('Fonts', CI_TEXT_DOMAIN),
        'description' => __('<p>Here, you can use just about any font you find in the <a href="http://www.google.com/fonts/" target="_blank">Google Fonts directory</a>.</p><p><strong>NOTE</strong>: It is recommended that you use a maximum of two to three fonts. More fonts will slow down page loads and generally look less professional.</p>', CI_TEXT_DOMAIN),
        'priority' => 40
    ));
    $wp_customize->add_section('fonts-titles', array('title' => __('Page Title (H1) Font', CI_TEXT_DOMAIN), 'panel' => 'fonts'));
    ciAddCustomizationsToSection($wp_customize, $titleFontOptions, 'fonts-titles');
    $wp_customize->add_section('fonts-headings', array('title' => __('Headings (H2, H3, H4) Font', CI_TEXT_DOMAIN), 'panel' => 'fonts'));
    ciAddCustomizationsToSection($wp_customize, $headingFontOptions, 'fonts-headings');
    $wp_customize->add_section('fonts-body', array('title' => __('Body Font', CI_TEXT_DOMAIN), 'panel' => 'fonts'));
    ciAddCustomizationsToSection($wp_customize, $bodyFontOptions, 'fonts-body');
    $wp_customize->add_section('fonts-widgets', array('title' => __('Widget Title Font', CI_TEXT_DOMAIN), 'panel' => 'fonts'));
    ciAddCustomizationsToSection($wp_customize, $widgetFontOptions, 'fonts-widgets');
    $wp_customize->add_section('fonts-menu', array('title' => __('Menu Font', CI_TEXT_DOMAIN), 'panel' => 'fonts'));
    ciAddCustomizationsToSection($wp_customize, $menuFontOptions, 'fonts-menu');
}

function ciGetSocialCustomizationOptions() {
    return array(
        array(
            'label' => __('Facebook URL', CI_TEXT_DOMAIN),
            'description' => __('URL for your company\'s Facebook page. <br>(To hide the Facebook icon, leave this blank.)', CI_TEXT_DOMAIN),
            'slug' => 'fb',
            'placeholder' => 'http://facebook.com/',
            'type' => 'text'
        ),
        array(
            'label' => __('Twitter URL', CI_TEXT_DOMAIN),
            'description' => __('URL for your company\'s Twitter page. <br />(To hide the Twitter icon, leave this blank.)', CI_TEXT_DOMAIN),
            'slug' => 'twitter',
            'placeholder' => 'https://twitter.com/',
            'type' => 'text'
        ),
        array(
            'label' => __('LinkedIn URL', CI_TEXT_DOMAIN),
            'description' => __('URL for your company\'s LinkedIn page. <br />(To hide the LinkedIn icon, leave this blank.)', CI_TEXT_DOMAIN),
            'slug' => 'linkedin',
            'placeholder' => 'http://www.linkedin.com/in/',
            'type' => 'text'
        ),
        array(
            'label' => __('Google+ URL', CI_TEXT_DOMAIN),
            'description' => __('URL for your company\'s Google+ page. <br />(To hide the Google+ icon, leave this blank.)', CI_TEXT_DOMAIN),
            'slug' => 'gplus',
            'placeholder' => 'https://plus.google.com/',
            'type' => 'text'
        ),
        array(
            'label' => __('Google+ link is to: ', CI_TEXT_DOMAIN),
            'description' => __('If you like, you can associate all pages of your site with an individual author or your organization. (<a href="http://www.searchenginejournal.com/claiming-google-authorship-and-publisher-markup-for-seo/61263/" target="_blank">More info</a>)', CI_TEXT_DOMAIN),
            'slug' => 'gplus_authorship',
            'default' => 'organization',
            'type' => 'select',
            'options' => $test_array = array(
                'author' => __('The site\'s primary "author"', CI_TEXT_DOMAIN),
                'organization' => __('Your company', CI_TEXT_DOMAIN),
                'none' => __('None', CI_TEXT_DOMAIN)
            )
        ),
        array(
            'label' => __('Display social media icons in full color?', CI_TEXT_DOMAIN),
            'description' => __('', CI_TEXT_DOMAIN),
            'slug' => 'social_icons_full_color',
            'default' => false,
            'type' => 'select',
            'options' => array(
                false => 'No, monochrome',
                true => 'Yes, full color'
            )
        )
    );
}

function ciGetFullWidthContainerOption() {
    return array(
        'slug' => 'full_width_container',
        'type' => 'checkbox',
        'default' => 0,
        'label' => __('Make Pages Full-Width?', CI_TEXT_DOMAIN)
    );
}

function ciGetColorThemeOption() {
    $colorPath = get_template_directory_uri() . '/assets/img/colors/';
    return array(
        'label' => __("Color Theme", CI_TEXT_DOMAIN),
        'description' => __("By default, we use a light blue-and-charcoal color theme. You can select a different theme here. <strong>NOTE</strong>: Your settings below will override this.", CI_TEXT_DOMAIN),
        'slug' => "color_theme",
        'default' => "blue_charcoal",
        'type' => "radio-images",
        'options' => array(
            'blue_charcoal' => $colorPath . 'blue_charcoal.png',
            'red_charcoal' => $colorPath . 'red_charcoal.png',
            'green_charcoal' => $colorPath . 'green_charcoal.png',
            'orange_charcoal' => $colorPath . 'orange_charcoal.png',
            'blue_green' => $colorPath . 'blue_green.png',
            'brown' => $colorPath . 'brown.png',
            'royalblue' => $colorPath . 'royalblue.png',
            'purple' => $colorPath . 'purple.png',
            'darkgreen' => $colorPath . 'darkgreen.png',
            'multi' => $colorPath . 'multi.png'
        )
    );
}

