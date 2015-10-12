<?php

add_action('ci_styles', 'ciPrintFontStyles');
function ciPrintFontStyles() {
    function getFontFamily($key, $default) {
        return str_replace("+", " ", get_option($key, $default) );
    }

    $h1Family = getFontFamily('title_font_family', "Bree Serif");
    $h2Family = getFontFamily('heading_font_family', "Bree Serif");
    $widgetTitleFamily = getFontFamily('widget_title_font_family', "Open Sans");
    $bodyFamily = getFontFamily('body_font_family', "Open Sans");
    $menuFamily = getFontFamily('menu_font_family', "Open Sans");

    $h1Weight = get_option('title_font_weight', '400');
    $h2Weight = get_option('heading_font_weight', '400');
    $widgetTitleWeight = get_option('widget_title_font_weight', '700');
    $bodyWeight = get_option('body_font_weight', '400');
    $menuWeight = get_option('menu_font_weight', '700');

    $h1Fallback = get_option('title_font_fallback', 'Georgia, Garamond, sans-serif');
    $h2Fallback = get_option('heading_font_fallback', 'Georgia, Garamond, sans-serif');
    $widgetTitleFallback = get_option('widget_title_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif');
    $bodyFallback = get_option('body_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif');
    $menuFallback = get_option('menu_font_fallback', '"Helvetica Neue", Helvetica, Arial, sans-serif'); ?>
    <!-- Font styles -->
    <style>
        body, html, div {
            font-family: "<?php echo $bodyFamily; ?>", <?php echo $bodyFallback; ?>;
            font-weight: <?php echo $bodyWeight; ?>;
        }
        .employees h3, .practice-area h3 {
            font-family: "<?php echo $bodyFamily; ?>", <?php echo $bodyFallback; ?>;
        }
        h1, a.navbar-brand {
            font-family: "<?php echo $h1Family; ?>", <?php echo $h1Fallback; ?>;
            font-weight: <?php echo $h1Weight; ?>;
        }
        h2, h3, h4, h5, h6 {
            font-family: "<?php echo $h2Family; ?>", <?php echo $h2Fallback; ?>;
        }
        h2, h3 {
            font-weight: <?php echo $h2Weight; ?>;
        }
        .widget h3, .stats h4 {
            font-family: "<?php echo $widgetTitleFamily; ?>", <?php echo $widgetTitleFallback; ?>;
            font-weight: <?php echo $widgetTitleWeight; ?>;
        }
        .nav {
            font-family: "<?php echo $menuFamily; ?>", <?php echo $menuFallback; ?>;
            font-weight: <?php echo $menuWeight; ?>;
        }
    </style>
<?php
}
