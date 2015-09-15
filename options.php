<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

require_once "lib/appearance/FontOptionsBuilder.php";

function optionsframework_option_name() {
	$themename = "Conversion Insights Base";//wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * To see an example, check out: https://github.com/devinsays/options-framework-theme/blob/master/options.php
 */

if( !function_exists('optionsframework_options') ) {
    function optionsframework_options() {
        $options = array();


        /**************************************************************
                    Appearance (advanced)
         ***************************************************************/
        $options[] = array(
            'name' => __('Appearance (advanced)', CI_TEXT_DOMAIN),
            'type' => 'heading');


        $options[] = array(
            'name' => __('Enable demo mode?', CI_TEXT_DOMAIN),
            'desc' => __('If checked, we will display the theme selector on every page. You probably do not want to do this.', CI_TEXT_DOMAIN),
            'id' => 'mlf_demo_site',
            'std' => '0',
            'type' => 'checkbox');





        /**************************************************************
        Documentation
         ***************************************************************/
        $options[] = array(
            'name' => __('Documentation', CI_TEXT_DOMAIN),
            'type' => 'heading' );


        $options[] = array(
            'name' => '',
            'desc' => '<iframe src="' . get_template_directory_uri() . '/docs/modern-brewery-theme-documentation.html" style="width:100%;height:1080px;"></iframe>',
            'type' => 'info');


        return $options;
    }
}
