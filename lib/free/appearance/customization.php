<?php

$extensions_file = dirname(__FILE__) . "/../../premium/appearance/customization-extensions.php";
if(file_exists($extensions_file)) {
    require_once $extensions_file;
} else {
    require_once dirname(__FILE__) . "/../../premium-stubs/appearance/customization-extensions.php";
}

function ciGetColorTheme() {
    $theme = get_option('color_theme', 'blue_charcoal');
    if( isset($_GET['color']) ) {
        $theme = $_GET['color'];
    }


    $link = '#428bca';
    $name = '#27201D';
    $bg = '#eeeeee';
    $secondaryBG = '#27201D';
    $h2 = "#27201D";
    $h1 = "#27201D";
    $btn = '#428bca';
    $h2OnSecondary = "#ffffff";
    switch( $theme ) {
        case "red_charcoal":
            $link = '#A60304';
            $btn = $link;
            $h2OnSecondary = "#ffffff";
            break;
        case "green_charcoal":
            $link = '#20C033';
            $btn = $link;
            $h2OnSecondary = "#ffffff";
            break;
        case "orange_charcoal":
            $link = '#F66200';
            $btn = $link;
            $h2OnSecondary = "#ffffff";
            break;
        case "blue_green":
            $link = '#3FAFE9';
            $btn = '#50A038';
            $bg = '#ffffff';
            $h2 = $link;
            $h2OnSecondary = $h2;
            break;
        case "brown":
            $link = "#6871A5";//'#4E6094';
            $btn = '#C48851';
            $name = '#6B3010';
            $secondaryBG = '#3B3129';
            $bg = "#ffffff";
            $h2 = $btn;
            $h1 = $secondaryBG;
            $h2OnSecondary = $h2;
            break;
        case "royalblue":
            $link = '#418EBF';
            $name = '#17558C';
            $bg = '#e9f0f5';
            $secondaryBG = '#133663';
            $h2 = $link;
            $h1 = $secondaryBG;
            $btn = $link;
            $h2OnSecondary = $h2;
            break;
        case "purple":
            $link = '#B068C2';
            $name = '#390A74';
            $bg = '#EDE6ED';
            $secondaryBG = $name;
            $h2 = $link;
            $h1 = $name;
            $btn = $link;
            $h2OnSecondary = $h2;
            break;
        case "darkgreen":
            $link = '#0A8C00';
            $name = $link;
            $bg = '#CADBC5';
            $secondaryBG = "#002800";
            $h2 = $link;
            $h1 = $name;
            $btn = $link;
            $h2OnSecondary = $h2;
            break;
        case "multi":
            $link = '#45B29D';
            $name = '#E27A3F';
            $bg = '#ffffff';
            $secondaryBG = '#334D5C';
            $h2 = "#E27A3F";
            $h1 = "#45B29D";
            $btn = '#45B29D';
            $h2OnSecondary = $h2;
            break;

    }
    return array(
        'splash_color' => $link,
        'header_highlight_color' => $link,
        'header_hover_color' => "#ffffff",
        'header_text_color' => "#777777",
        'firm_name_color' => $name,
        'background_color' => $bg,
        'secondary_background_color' => $secondaryBG,
        'heading_color' => $h2,
        'page_title_color' => $h1,
        'button_color' => $btn,
        'heading_on_secondary_background' => $h2OnSecondary,
        'fancy_landing_splash_color' => $link,
        'fancy_landing_text_color' => "#ffffff",
        'fancy_landing_heading_color' => "#ffffff",
    );
}

if(class_exists('WP_Customize_Control')) {
    /**
     * Adds a textarea control for the theme customizer
     */
    class CiCustomizeTextareaControl extends WP_Customize_Control {
        public $type = 'textarea';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            </label> <?php
        }
    }

    /**
     * Adds a text control with placeholder text
     */
    class CiCustomizeTextControlWithPlaceholder extends WP_Customize_Control {
        public $type = 'text';
        public $placeholder = '';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php
                $value = esc_attr($this->value());
                if($value) { ?>
                    <input type="text" placeholder="<?php echo $this->placeholder; ?>" <?php $this->link(); ?> value="<?php echo $value; ?>" /> <?php
                } else { ?>
                    <input type="text" placeholder="<?php echo $this->placeholder; ?>" <?php $this->link(); ?> /> <?php
                } ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            </label> <?php
        }
    }

    /**
     * Adds a control that allows you to select multiple checkboxes
     */
    class CiCustomizeMulticheckControl extends WP_Customize_Control {
        public $type = 'checkbox-multiple';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <?php $multi_values = !is_array($this->value()) ? explode(',', $this->value()) : $this->value(); ?>
                <ul> <?php
                    foreach($this->choices as $value => $label) { ?>
                        <li>
                            <label>
                                <input type="checkbox" value="<?php echo esc_attr($value); ?>" <?php checked(in_array($value, $multi_values)); ?> />
                                <?php echo esc_html($label); ?>
                            </label>
                        </li> <?php
                    } ?>
                </ul>
                <input type="hidden" value="<?php echo esc_attr(implode(',', $multi_values)); ?>" <?php $this->link(); ?> />
            </label> <?php
        }
    }

    class CiCustomizeHeadingControl extends WP_Customize_Control {
        public $type = "heading";
        public function render_content() { ?>
            <h2 class="customize-control-title"><?php echo esc_html($this->label); ?></h2> <?php
        }
    }

    class CiCustomizeInfoControl extends WP_Customize_Control {
        public $type = "info";
        public function render_content() { ?>
            <p><?php echo $this->description; ?></p> <?php
        }
    }

    class CiCustomizeHorizontalRuleControl extends WP_Customize_Control {
        public $type = "line";
        public function render_content() { ?>
            <hr style="border-top: solid 1px #333;"> <?php
        }
    }

    /**
     * Class to create an image version of a radio button group
     */
    class CiCustomizeImagePickerControl extends WP_Customize_Control
    {
        public $type = 'radio-images';
        public $options = array();
        public function render_content() { ?>
            <label>
                <span class="customize-layout-control"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
                <div class="buttonset"> <?php
                    foreach($this->options as $key => $img) {
                        $checkedStatus = "";
                        if($key === $this->value()) {
                            $checkedStatus = 'checked="checked"';
                        }
                        $inputId = $this->id . "-" . $key; ?>
                        <input type="radio" value="<?php echo $key ?>" name="_customize-<?php echo $this->type; ?>-<?php echo $this->id; ?>" id="<?php echo $inputId; ?>" <?php $this->link(); echo $checkedStatus; ?> />
                        <label for="<?php echo $inputId; ?>">
                            <img src="<?php echo $img; ?>" alt="<?php echo $key; ?>" width="50" />
                        </label> <?php
                    } ?>
                </div>
            </label>
        <?php
        }
    }


    /**
     * Adds a TinyMCE editor for a text field
     */
    class CiCustomizeEditorControl extends WP_Customize_Control {
        public $type = 'editor';
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
<!--                <input type="hidden" --><?php //$this->link(); ?><!-- value="--><?php //echo esc_textarea( $this->value() ); ?><!--">-->
                <?php
                /**
                 * For settings options see:
                 * http://codex.wordpress.org/Function_Reference/wp_editor
                 *
                 * 'media_buttons' are not supported as there is no post to attach items to
                 * 'textarea_name' is set by the 'id' you choose
                 */
                $settings = array('textarea_name' => $this->id, 'media_buttons' => true, 'drag_drop_upload' => true, 'textarea_rows' => 5, 'tinymce' => array('plugins' => 'wordpress'));
                wp_editor($this->value(), $this->id, $settings);
                if(!did_action('admin_print_footer_scripts') == 0) {
                    do_action('admin_footer');
                    do_action('admin_print_footer_scripts');
                } ?>
            </label> <?php
        }
    }
}

function ciReturnTrue($ignored="") { return true; }
function ciSanitizeBool($bool) { return $bool == "0" || $bool == "1" || $bool == true || $bool == false || $bool == "true" || $bool == "false"; }

function ciAddCustomizationsToSection($wp_customize, $optionsArray, $sectionSlug) {
    foreach($optionsArray as $option) {
        // Add the setting (under the hood)
        $sanitizeFunction = 'ciReturnTrue';
        if($option['type'] == 'checkbox') {
            $sanitizeFunction = 'ciSanitizeBool';
        } elseif($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'editor' || $option['type'] == 'heading' || $option['type'] == 'info') {
            $sanitizeFunction = 'esc_textarea';
        }
        $wp_customize->add_setting($option['slug'], array('default' => $option['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => $sanitizeFunction));

        // Add the control itself to the page
        if($option['type'] == 'color') {
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $option['slug'], array('label' => $option['label'], 'section' => $sectionSlug, 'settings' => $option['slug'], 'description' => $option['description'])));
        } elseif($option['type'] == 'checkbox') {
            $wp_customize->add_control($option['slug'], array('label' => $option['label'], 'section' => $sectionSlug, 'type' => 'checkbox', 'description' => $option['description']));
        } elseif($option['type'] == 'multicheck') {
            $wp_customize->add_control(new CiCustomizeMulticheckControl(
                $wp_customize,
                $option['slug'],
                array(
                    'label' => $option['label'],
                    'description' => $option['description'],
                    'section' => $sectionSlug,
                    'options' => $option['options'],
                    'type' => 'multicheck'
                )
            ));
        } elseif($option['type'] == 'heading') {
            $wp_customize->add_control(new CiCustomizeHeadingControl(
                $wp_customize,
                $option['slug'],
                array(
                    'label' => $option['label'],
                    'section' => $sectionSlug,
                    'type' => 'heading'
                )
            ));
        } elseif($option['type'] == 'info') {
            $wp_customize->add_control(new CiCustomizeInfoControl(
                $wp_customize,
                $option['slug'],
                array(
                    'description' => $option['description'],
                    'section' => $sectionSlug,
                    'type' => 'info'
                )
            ));
        } elseif($option['type'] == 'line') {
            $wp_customize->add_control(new CiCustomizeHorizontalRuleControl(
                $wp_customize, $option['slug'], array('section' => $sectionSlug, 'type' => 'line')
            ));
        } elseif($option['type'] == 'text') {
            $wp_customize->add_control(
                new CiCustomizeTextControlWithPlaceholder(
                    $wp_customize,
                    $option['slug'],
                    array(
                        'label' => $option['label'],
                        'section' => $sectionSlug,
                        'description' => $option['description'],
                        'placeholder' => $option['placeholder']
                    )
                )
            );
        } elseif($option['type'] == 'editor') {
            $wp_customize->add_control(
                new CiCustomizeEditorControl(
                    $wp_customize,
                    $option['slug'],
                    array(
                        'label' => $option['label'],
                        'section' => $sectionSlug,
                        'description' => $option['description']
                    )
                )
            );
        } elseif($option['type'] == 'textarea') {
            $wp_customize->add_control(new CiCustomizeTextareaControl(
                $wp_customize,
                $option['slug'],
                array(
                    'label' => $option['label'],
                    'section' => $sectionSlug,
                    'settings' => $option['slug'],
                    'description' => $option['description']
                )
            ));
        } elseif($option['type'] == 'radio-images') {
            $wp_customize->add_control(new CiCustomizeImagePickerControl(
                $wp_customize,
                $option['slug'],
                array(
                    'label' => $option['label'],
                    'section' => $sectionSlug,
                    'options' => $option['options'],
                    'description' => $option['description']
                )
            ));
        } elseif($option['type'] == 'select') {
            $wp_customize->add_control($option['slug'], array('type' => 'select', 'label' => $option['label'], 'section' => $sectionSlug, 'description' => $option['description'], 'choices' => $option['options']));
        } elseif($option['type'] == 'radio') {

            $wp_customize->add_control($option['slug'], array('type' => 'radio', 'label' => $option['label'], 'section' => $sectionSlug, 'description' => $option['description'], 'choices' => $option['options']));
        } elseif($option['type'] == 'image') {
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $option['slug'], array('label' => $option['label'], 'section' => $sectionSlug, 'description' => $option['description'])));
        } else {
            die($option['type']);
        }
    }
}


add_action('customize_register', 'ciCustomizeRegister');
function ciCustomizeRegister($wp_customize)
{
    $defaultColors = ciGetColorTheme();


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // PAGE SETUP
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $patternPath = get_template_directory_uri() . '/assets/img/patterns/';
    $subtlePatterns = array(
        'none' => $patternPath . 'none.png',
        'dark_wood' => $patternPath . 'dark_wood.png',
        'tileable_wood_texture' => $patternPath . 'tileable_wood_texture.png',
        'wood_1' => $patternPath . 'wood_1.png',
        'wood_pattern' => $patternPath . 'wood_pattern.png',
        'brushed_@2X' => $patternPath . 'brushed_@2X.png',
        'grey_wash_wall' => $patternPath . 'grey_wash_wall.jpg',
        'light_grey' => $patternPath . 'light_grey.png',
        'nice_snow' => $patternPath . 'nice_snow.png',
        'ricepaper_v3' => $patternPath . 'ricepaper_v3.png',
        'sandpaper' => $patternPath . 'sandpaper.png',
        'sos' => $patternPath . 'sos.png',
        'stardust_@2X' => $patternPath . 'stardust_@2X.png',
        'ticks_@2X' => $patternPath . 'ticks_@2X.png',
        'tweed_@2X' => $patternPath . 'tweed_@2X.png',
        'witewall_3_@2X' => $patternPath . 'witewall_3_@2X.png'
    );
    $pageSetupOptions = array(
        /*array(
            'slug' => 'style',
            'type' => 'radio',
            'default' => CI_STYLE_CLEAN,
            'label' => __('Theme Style', 'ci-modern-accounting-firm'),
            'options' => array(
                CI_STYLE_CLEAN => __("Clean Lines", 'ci-modern-accounting-firm'),
                CI_STYLE_ROUNDED => __("Rounded Corners", 'ci-modern-accounting-firm')
            )
        ),*/
        ciGetFullWidthContainerOption(),
        array(
            'slug' => 'full_screen_image_bg',
            'type' => 'image',
            'label' => __('Full-Screen Background Image', 'ci-modern-accounting-firm')
        ),
        array(
            'label' => __("Body Background Pattern", 'ci-modern-accounting-firm'),
            'description' => __("To use a subtle pattern (from subtlepatterns.com) as the background to the pages (instead of a flat, solid color or an image), select a pattern here.", 'ci-modern-accounting-firm'),
            'slug' => "pattern_bg",
            'default' => "none",
            'type' => "radio-images",
            'options' => $subtlePatterns
        ),
        array(
            'label' => __('Enable demo mode?', 'ci-modern-accounting-firm'),
            'description' => __('If checked, we will display the theme selector on every page. You probably do not want to do this.', 'ci-modern-accounting-firm'),
            'slug' => 'mlf_demo_site',
            'default' => false,
            'type' => 'checkbox'
        )
    );
    $wp_customize->add_section('page_setup', array('title' => __('Page Setup', 'ci-modern-accounting-firm'), 'priority' => 0,));
    ciAddCustomizationsToSection($wp_customize, $pageSetupOptions, 'page_setup');







    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // HEADER
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $headerOption = array(
        array(
            'slug' => 'social_in_nav',
            'default' => false,
            'label' => __('Show social media icons to the right of the nav bar?', 'ci-modern-accounting-firm'),
            'type' => 'checkbox'
        ),
        array(
            'label' => __('Additional "menu" text', 'ci-modern-accounting-firm'),
            'description' => __('This will appear to the far right of the navigation menu. Example: Call us at (123) 456-7890', 'ci-modern-accounting-firm'),
            'slug' => 'additional_menu_text',
            'type' => 'text'
        ),
        array(
            'slug' => 'navbar_fixed',
            'default' => false,
            'label' => __('Fix navigation bar to top of screen?', 'ci-modern-accounting-firm'),
            'type' => 'checkbox'
        ),
        array(
            'slug' => 'header_link_size',
            'default' => '100',
            'label' => __('Nav Menu Text Size (percent)', 'ci-modern-accounting-firm'),
            'type' => 'text'
        ),
        array(
            'slug' => 'company_logo',
            'label' => __('Company Logo', 'ci-modern-accounting-firm'),
            'type' => 'image'
        ),
        array(
            'slug' => 'svg_logo',
            'label' => __('Company Logo (SVG Version, used only on supported browsers)', 'ci-modern-accounting-firm'),
            'type' => 'image'
        ),
        array(
            'slug' => 'logo_width',
            'default' => '',
            'label' => __('Width to display logo (px)', 'ci-modern-accounting-firm'),
            'type' => 'text'
        ),
        array(
            'slug' => 'logo_height',
            'default' => '',
            'label' => __('Height to display logo (px)', 'ci-modern-accounting-firm'),
            'type' => 'text'
        ),
        array(
            'slug' => 'logo_top_padding',
            'default' => '24',
            'label' => __('Top padding for logo (px)', 'ci-modern-accounting-firm'),
            'type' => 'text'
        )
    );
    $wp_customize->add_section('header', array('title' => __('Header', 'ci-modern-accounting-firm'), 'description' => __('Configure your logo, the navigation menu, and other items in the site-wide header.', 'ci-modern-accounting-firm'), 'priority' => 0,));
    ciAddCustomizationsToSection($wp_customize, $headerOption, 'header');


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // BODY COLORS
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $colors = array(
        ciGetColorThemeOption(),
        array(
            'type' => 'heading',
            'slug' => 'body_colors_heading',
            'label' => __('Body Colors', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'splash_color',
            'default' => $defaultColors['splash_color'],
            'type' => 'color',
            'label' => __('Link Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'button_color',
            'default' => $defaultColors['button_color'],
            'type' => 'color',
            'label' => __('Button Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'page_title_color',
            'default' => $defaultColors['page_title_color'],
            'type' => 'color',
            'label' => __('Page Title Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'heading_color',
            'default' => $defaultColors['heading_color'],
            'type' => 'color',
            'label' => __('Level 2 Heading Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'background_color',
            'default' => $defaultColors['background_color'],
            'type' => 'color',
            'label' => __('Background Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'secondary_background_color',
            'default' => $defaultColors['secondary_background_color'],
            'type' => 'color',
            'label' => __('Secondary Background Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'copyright_text_color',
            'default' => '#333333',
            'label' => __('Footer copyright notice text color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),

        array(
            'type' => 'line',
            'slug' => 'body_colors_post_line',
        ),
        array(
            'type' => 'heading',
            'slug' => 'header_colors_heading',
            'label' => __('Header Colors', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'firm_name_color',
            'default' => $defaultColors['firm_name_color'],
            'label' => __('Company Name Color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),
        array(
            'slug' => 'header_text_color',
            'default' => $defaultColors['header_text_color'],
            'label' => __('Nav Menu Text Color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),
        array(
            'slug' => 'header_highlight_color',
            'default' => $defaultColors['header_highlight_color'],
            'label' => __('Nav Menu Highlight ("You Are Here") Color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),
        array(
            'slug' => 'header_hover_color',
            'default' => $defaultColors['header_hover_color'],
            'label' => __('Nav Menu Hover Color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),
        array(
            'slug' => 'header_bg_color',
            'default' => $defaultColors['header_bg_color'],
            'label' => __('Nav Menu Background Color', 'ci-modern-accounting-firm'),
            'type' => 'color'
        ),
        array(

            'slug' => 'header_link_bg_is_solid',
            'default' => true,
            'label' => __('Active Menu Item Has Solid Background?', 'ci-modern-accounting-firm'),
            'type' => 'checkbox'
        ),
        array(
            'type' => 'line',
            'slug' => 'header_colors_post_line',
        ),
        array(
            'type' => 'heading',
            'slug' => 'fancy_landing_page_colors_heading',
            'label' => __('Fancy Landing Page Colors', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'fancy_landing_text_color',
            'default' => "#ffffff",
            'type' => 'color',
            'label' => __('Text Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'fancy_landing_splash_color',
            'default' => $defaultColors['splash_color'],
            'type' => 'color',
            'label' => __('Highlight Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'fancy_landing_page_title_color',
            'default' => $defaultColors['page_title_color'],
            'type' => 'color',
            'label' => __('Page Title Color', 'ci-modern-accounting-firm')
        ),
        array(
            'slug' => 'fancy_landing_heading_color',
            'default' => "#ffffff",
            'type' => 'color',
            'label' => __('Other Headings Color', 'ci-modern-accounting-firm')
        )
    );
    // We use the default Colors section
    ciAddCustomizationsToSection($wp_customize, $colors, 'colors');





    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FONTS
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ciDisplayFontCustomizationOptions($wp_customize);



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FOOTER
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $footerOptions = array(
        array(
            'slug' => 'footer_columns',
            'default' => '4',
            'label' => __('Footer Columns (1-4)', 'ci-modern-accounting-firm'),
            'description' => __('We place each widget in the Footer widget area in its own column; in general, you want this number to match the number of widgets you place in the Footer widget area.', 'ci-modern-accounting-firm'),
            'type' => 'text'
        ),
        array(
            'label' => __('Footer text (for the bottom of each page)', 'ci-modern-accounting-firm'),
            'description' => "If you'd like text at the very, very bottom of each page, you can type it here.",
            'slug' => 'disclaimer',
            'type' => 'textarea'
        ),
        array(
            'label' => __('Copyright Text', 'ci-modern-accounting-firm'),
            'description' => __('Appears beneath the footer text, if applicable', 'ci-modern-accounting-firm'),
            'slug' => 'copyright',
            'default' => '&copy; ' . date('Y') . ' ' . do_shortcode(get_bloginfo('name')),
            'type' => 'text'
        ),
        array(
            'label' => __('Enable theme design attribution?', 'ci-modern-accounting-firm'),
            'description' => __('If checked, enables a brief credit line for the theme\'s creators', 'ci-modern-accounting-firm'),
            'slug' => 'enable_attribution',
            'default' => 1,
            'type' => 'checkbox'
        )
    );
    $wp_customize->add_section('footer', array('title' => __('Footer', 'ci-modern-accounting-firm'), 'priority' => 100));
    ciAddCustomizationsToSection($wp_customize, $footerOptions, 'footer');

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // SOCIAL MEDIA LINKS
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $socialMediaOptions = ciGetSocialCustomizationOptions();
    $wp_customize->add_section('social_media', array('title' => __('Social Media Links', 'ci-modern-accounting-firm'), 'priority' => 100,));
    ciAddCustomizationsToSection($wp_customize, $socialMediaOptions, 'social_media');



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FAVICON
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $faviconOptions = array(
        array(
            'slug' => 'favicon',
            'label' => __('Favicon for site', 'ci-modern-accounting-firm'),
            'description' => __('A <a href="http://en.wikipedia.org/wiki/Favicon" target="_blank">favicon</a> is the little icon displayed in the page\'s tab. You can create one from a 16&times;16 image using the <a href="http://www.favicon.cc/" target="_blank">Favicon Generator</a>.', 'ci-modern-accounting-firm'),
            'type' => 'image'
        ),
        array(
            'label' => __('Apple Touch Icon', 'ci-modern-accounting-firm'),
            'description' => __('When someone adds your site to their home screen on an Apple device (iPhone, iPad, etc.), the <a href="https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html" target="_blank">Apple Touch Icon</a> is the image that will be used. (Typically, a 152&times;152 PNG is recommended.)', 'ci-modern-accounting-firm'),
            'slug' => 'touch_icon',
            'type' => 'image'
        ),
        array(
            'slug' => 'touch_icon_precomposed',
            'default' => false,
            'label' => __('Disable added effects on Apple Touch Icon?', 'ci-modern-accounting-firm'),
            'description' => __('Disables the curved border, drop shadow, etc. for Apple touch icon', 'ci-modern-accounting-firm'),
            'type' => 'checkbox'
        ),
    );
    $wp_customize->add_section('favicon', array('title' => __('Favicon', 'ci-modern-accounting-firm')));
    ciAddCustomizationsToSection($wp_customize, $faviconOptions, 'favicon');




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // CUSTOM CSS
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $cssOptions = array(
        array(
            'slug' => 'custom_css',
            'default' => '',
            'label' => __('Custom CSS', 'ci-modern-accounting-firm'),
            'description' => __('If you <em>really</em> don\'t want to create a child theme, you can add custom CSS to the header here.', 'ci-modern-accounting-firm'),
            'type' => 'textarea'
        )
    );
    $wp_customize->add_section('custom_css', array('title' => __('Custom CSS', 'ci-modern-accounting-firm')));
    ciAddCustomizationsToSection($wp_customize, $cssOptions, 'custom_css');


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // GOOGLE ANALYTICS
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $analyticsOptions = array(
        array(
            'slug' => 'analytics_id',
            'default' => '',
            'label' => __('Google Analytics ID', 'ci-modern-accounting-firm'),
            'description' => __('Format: <code>UA-XXXXX-Y</code> (Note: Universal Analytics only, not Classic Analytics). Note that Analytics tracking will <em>not</em> be active when you are logged in. (Open a different Web browser to test it.)', 'ci-modern-accounting-firm'),
            'type' => 'text'
        )
    );
    $wp_customize->add_section('analytics', array('title' => __('Google Analytics', 'ci-modern-accounting-firm')));
    ciAddCustomizationsToSection($wp_customize, $analyticsOptions, 'analytics');
}


/**
 * @param $hex string A hexidecimal color (like "#ffffff")
 * @param $steps int The amount to lighten or darken the color. Should be between -255 and 255,
 *                   with negative colors darkening and positive colors lightening.
 * @return string The hex value of the darkened/lightened color, beginning with "#"
 */
function ciAdjustBrightness($hex, $steps) {
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + ($r * ($steps / 255))));
    $g = max(0,min(255,$g + ($g * ($steps / 255))));
    $b = max(0,min(255,$b + ($b * ($steps / 255))));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}

function ciHexToRGBA($hex, $alphaValue) {
    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
    return "rgba($r,$g,$b,$alphaValue)";
}



add_action( 'ci_styles', 'ciPrintCustomColorStyling');
function ciPrintCustomColorStyling() {
    /**
     * Gets the customized color for a particular use.
     * @param string $colorIdentifier The name of the color, as registered with the WordPress theme customizer
     * @return string The color, in the form "#xxxxxxx"
     */
    function ciGetNormalizedColor($colorIdentifier) {
        $defaultColors = ciGetColorTheme();
        $clr = get_option($colorIdentifier);
        if( ($clr == "" || $clr == "#") && array_key_exists($colorIdentifier, $defaultColors) ) {
            $clr = $defaultColors[$colorIdentifier];
        }

        // Hack to keep this from being in the Customize options
        if( $colorIdentifier == 'heading_on_secondary_background' && !$clr ) {
            $clr = $defaultColors[$colorIdentifier];
        }

        if( $clr[0] !== "#" ) {
            $clr = "#" . $clr;
        }

        return $clr;
    }

    // Body colors
    $splash = ciGetNormalizedColor('splash_color');
    $firm_name = ciGetNormalizedColor('firm_name_color');
    $background = ciGetNormalizedColor('background_color');
    $secondaryBG = ciGetNormalizedColor('secondary_background_color');
    $h1 = ciGetNormalizedColor('page_title_color');
    $h2 = ciGetNormalizedColor('heading_color');
    $h2OnSecondary = ciGetNormalizedColor('heading_on_secondary_background');
    $btn = ciGetNormalizedColor('button_color');
    $copyright_text_color = ciGetNormalizedColor('copyright_text_color');

    // Fancy landing pages
    $fancy_landing_splash = ciGetNormalizedColor('fancy_landing_splash_color');
    $fancy_landing_text = ciGetNormalizedColor('fancy_landing_text_color');
    $fancy_landing_h1 = ciGetNormalizedColor('fancy_landing_page_title_color');
    $fancy_landing_h2 = ciGetNormalizedColor('fancy_landing_heading_color');

    // Header stuff
    $header_text_color = ciGetNormalizedColor('header_text_color');
    $header_highlight_color = ciGetNormalizedColor('header_highlight_color');
    $header_link_bg_is_solid = get_option('header_link_bg_is_solid');
    $header_link_size = get_option('header_link_size');
    $header_link_bg_color = ciGetNormalizedColor('header_link_bg_color');
    $header_bg_color = ciGetNormalizedColor('header_bg_color');
    $header_hover_color = ciGetNormalizedColor('header_hover_color');
    $logo_top_padding = get_option('logo_top_padding');

    // Image background
    $backgroundImg = get_option("full_screen_image_bg");
    $backgroundPattern = get_option("pattern_bg");
    $menuBackgroundPattern = get_option("menu_pattern_bg");

    $patternPath = get_template_directory_uri() . '/assets/img/patterns/';

?>
    <!-- From customization.php -->
    <style>
        body {
            background: <?php echo $background; ?>;
<?php
            if( $backgroundImg ) { ?>
                background: url(<?php echo $backgroundImg; ?>) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; <?php
            } else if( $backgroundPattern && $backgroundPattern != 'none' ) { ?>
                background-image: url('<?php echo $patternPath, $backgroundPattern; ?>.png');
                background-repeat: repeat;
                background-position: center center;<?php
            } ?>
        }

        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus {
            background: <?php echo $splash; ?>;
            color: #fff;
        }
        .navbar {
            <?php if($menuBackgroundPattern && $menuBackgroundPattern != 'none') { ?>
                background: url('<?php echo $patternPath, $menuBackgroundPattern; ?>.png') repeat center center;
            <?php } ?>
        }

        .fancy-landing main > p, .fancy-landing main > div, .fancy-landing main > span {
            color: <?php echo $fancy_landing_text ?>;
        }

        h1 {
            color: <?php echo $h1 ?>;
        }
        h2 {
            color: <?php echo $h2 ?>;
        }
        .fancy-landing h1 {
            color: <?php echo $fancy_landing_h1 ?>;
        }
        .fancy-landing h2, .fancy-landing h3, .fancy-landing h4  {
            color: <?php echo $fancy_landing_h2 ?>;
        }
        .colored-bg {
            background: <?php echo $secondaryBG; ?>;
        }
        .carousel-caption h2 {
            color: #fff;
        }
        .inverted h2 {
            color: <?php echo $h2OnSecondary; ?>;
        }

        a, .individual-post .meta a:hover {
            color: <?php echo $splash; ?>;
        }
        a:hover, a:focus, .employees h3 a {
            color: <?php echo ciAdjustBrightness($splash, -30) ?>;
            background: <?php echo ciHexToRGBA($splash, 0.05) ?>;
        }
        a:active {
            color: <?php echo ciAdjustBrightness($splash, -80) ?>;
        }
        .practice-area h3 a, .employees h3 a {
            background: transparent;
        }
        .practice-area h3 a:after, .employees h3 a:before {
            background: <?php echo ciAdjustBrightness($splash, -30) ?>;
        }

        .navbar-default .navbar-brand {
            color: <?php echo $firm_name; ?>;
            padding-top: <?php echo $logo_top_padding ?>px;
        }
        .navbar-default .navbar-brand:hover {
            color: <?php echo $header_highlight_color; ?>
        }
        .navbar-default .navbar-nav>li>a, .navbar-default .navbar-nav>.active.open>a {
            color: <?php echo $header_text_color; ?>;
        }
        .header-container {
            background: <?php echo $header_bg_color; ?>;
        }
        .post-nav a {
            color: <?php echo $header_text_color; ?>;
        }
        .navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus {
            background: <?php echo $header_link_bg_is_solid ? $header_hover_color : 'transparent'; ?>;
            color: <?php echo $header_highlight_color; ?>;
        }
        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            color: <?php echo $header_highlight_color; ?>;
        }
        .post-nav a:hover, .post-nav a:focus {
            color: <?php echo $header_link_bg_is_solid ? ciAdjustBrightness($header_text_color, -130) : $header_hover_color; ?>;
            text-decoration: none;
        }
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
            color: <?php echo ciAdjustBrightness($header_text_color, -130); ?>;
        }
        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus, .dropdown-menu>.active>a, .dropdown-menu>.active>a:hover, .dropdown-menu>.active>a:focus {
            background: <?php echo $header_link_bg_is_solid ? $header_highlight_color : 'transparent'; ?>;;
            color: <?php echo $header_link_bg_is_solid ? "#fff" : $header_highlight_color; ?>;
        }
        .navbar-default .navbar-nav>.active.open>a {
            background: #e7e7e7;
        }

        .navbar-nav > li > a {
            font-size: <?php echo $header_link_size; ?>%;
        }
        <?php if($header_link_size > 110) { ?>
            .navbar-nav>li>a {
                padding-top: 20px;
                padding-bottom: 20px;
            }
            .post-nav {
                padding-top: 15px;
            }
        <?php } ?>

        .nsu_widget, footer, .inverted, .carousel-caption.left, .carousel-caption.right {
            background: <?php echo $secondaryBG; ?>;
            color: #fff;
        }

        .btn-primary, input[type="submit"], button[type="submit"], .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
            color: #fff;
            position: relative;
            background-color: <?php echo $btn; ?>;
            border-color: <?php echo ciAdjustBrightness($btn, -20) ?>; /* slightly darker */
            box-shadow: 0 6px <?php echo ciAdjustBrightness($btn, -50); ?>;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open .dropdown-toggle.btn-primary, input[type="submit"]:hover, button[type="submit"]:hover, input[type="submit"]:focus, button[type="submit"]:focus, form input[type="submit"]:hover, form input[type="submit"]:focus,
        .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus, .woocommerce #respond input#submit.alt:active, .woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active {
            background-color: <?php echo $btn; ?>;
            border-color: <?php echo ciAdjustBrightness($btn, -50); ?>;
            box-shadow: 0 4px <?php echo ciAdjustBrightness($btn, -50); ?>;
            top: 2px;
            color: #fff;
        }
        .btn-primary:active, .btn-primary.active, .sidebar input[type="submit"]:active,
        .woocommerce #respond input#submit.alt:active, .woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active {
            top: 4px;
            box-shadow: 0 0 <?php echo ciAdjustBrightness($btn, -50); ?>;
        }
        button[type="submit"].search-submit:hover {
            background-color: <?php echo ciAdjustBrightness($btn, -30) ?>;
        }
        button[type="submit"].search-submit:active {
            background-color: <?php echo ciAdjustBrightness($btn, -50) ?>;
        }

        ul.social-list li a, .individual-post .meta a {
            color: <?php echo $secondaryBG; ?>;
        }

        .content-info, .content-info a {
            color: <?php echo $copyright_text_color; ?>;
        }

        @media (max-width: 768px) {
            .carousel-caption.left, .carousel-caption.right {
                background: transparent;
            }
        }
    </style>
<?php
}




function ciAddEditorStyles() {
    add_editor_style( 'assets/css/editor-colors.php' );
}
add_action( 'init', 'ciAddEditorStyles');


