<?php

require_once "googleFonts.php";

class FontOptionsBuilder {
    private $fontList = array();
    private $fontNames = array();


    function __construct() {
        global $fontsJSON;
        $this->fontList = json_decode($fontsJSON, true);
        $this->fontList = $this->fontList['items'];
    }

    public function getNamesList() {
        if( count($this->fontNames) == 0 ) {
            foreach( $this->fontList as $font ) {
                $plussifiedName = str_replace(' ', '+', $font['family']);
                $this->fontNames[$plussifiedName] = $font['family'];
            }
        }

        return $this->fontNames;
    }

    /**
     * @param string $slug The identifier you want to use for this option
     * @param string $default The standard selection
     * @return array The array to append to the Options array
     */
    public function getFontFamilySelect($slug, $default="Open+Sans") {
        return array(
            'label' => __("Font Family", 'ci-modern-accounting-firm'),
            'description' => __("Hint: click on this massive drop-down list, then type the first character of the font name you're looking for", 'ci-modern-accounting-firm'),
            'slug' => $slug,
            'default' => $default,
            'type' => "select",
            'options' => $this->getNamesList()
        );
    }

    /**
     * @param string $slug The identifier you want to use for this option
     * @param string $default The standard selection
     * @return array The array to append to the Options array
     */
    public function getWeightOption($slug, $default="400") {
        return array(
            'label' => __("Default Font Weight", 'ci-modern-accounting-firm'),
            'description' => __("Note: you shouldn't ask browsers to use a weight that isn't available; the results aren't pretty.", 'ci-modern-accounting-firm'),
            'slug' => $slug,
            'default' => $default,
            'type' => "select",
            'options' => array(
                '100' => "Thin (100)",
                '200' => "Extra-light (200)",
                '300' => "Light (300)",
                '400' => "Normal (400)",
                '500' => "Medium (500)",
                '600' => "Semi-bold (600)",
                '700' => "Bold (700)",
                '800' => "Extra-bold (800)",
                '900' => 'Ultra-bold (900)'
            )
        );
    }

    /**
     * @param string $slug The identifier you want to use for this option
     * @param string $default The standard selection
     * @return array The array to append to the Options array
     */
    public function getFallbackOption($slug, $default="sans-serif") {
        return array(
            'label' => __("Fallback Fonts", 'ci-modern-accounting-firm'),
            'description' => __("If the selected font isn't available, this comma-separated list will be used instead.", 'ci-modern-accounting-firm'),
            'slug' => $slug,
            'default' => $default,
            'type' => "text"
        );
    }

    public function getFontFamilyVariants($slug, $default=null) {
        return array(
            'label' => __("Font Variants to Make Available", 'ci-modern-accounting-firm'),
            'slug' => $slug,
            'default' => $default,
            'type' => "multicheck",
            'options' => array(
                '100' => "Thin (100)",
                '100italic' => "Thin (100) italic",
                '200' => "Extra-light (200)",
                '200italic' => "Extra-light (200) italic",
                '300' => "Light (300)",
                '300italic' => "Light (300) italic",
                '400' => "Normal (400)",
                '400italic' => "Normal (400) italic",
                '500' => "Medium (500)",
                '500italic' => "Medium (500) italic",
                '600' => "Semi-bold (600)",
                '600italic' => "Semi-bold (600) italic",
                '700' => "Bold (700)",
                '700italic' => "Bold (700) italic",
                '800' => "Extra-bold (800)",
                '800italic' => "Extra-bold (800) italic",
                '900' => 'Ultra-bold (900)',
                '900italic' => 'Ultra-bold (900) italic'
            )
        );
    }

} 