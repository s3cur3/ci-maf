<?php

/**
 * @param $arrayOfSocialURLs
 */
function ciStaffSocialURLsAreEmpty($arrayOfSocialURLs) {
    return true;
}


/**
 * @param array $urlArray The array spit out by ciGetStaffSocialURLs()
 * @return boolean True if there are no "real" social URLs; false otherwise
 */
function ciSocialURLsAreEmpty( $urlArray ) {
    return true;
}

function ciPrintSocialLinks() {
    // Stub!
    // This is a feature of the premium version of the theme.
    echo "Social media links are a feature of <a href='" . CI_THEME_BUY_URL . "'>the premium version</a> of this theme. ";
    echo "You can upgrade (without losing any of your existing work!) for $55 <a href='" . CI_THEME_BUY_URL . "'>on the Conversion Insights Web site</a>.";
}


/**
 * Prints the <link rel="publisher"> or <link rel="author"> tags, as appropriate
 */
function ciPrintGoogleAuthorshipLink() {
    // If $authorship is set to 'organization', we'll print the rel="publisher"
    // markup; similarly, if set to 'author', we'll add rel="author" to the link.
    $authorship = get_option("gplus_authorship");
    $gplus = get_option('gplus');
    if( $authorship == 'author' ) {
        echo "\n<link href=\"$gplus\" rel=\"author\" />\n";
    } else if( $authorship == 'organization' ) {
        echo "\n<link href=\"$gplus\" rel=\"publisher\" />\n";
    }
}
add_action( 'wp_head', 'ciPrintGoogleAuthorshipLink' );


class CiSocialMediaWidget extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'CiSocialMediaWidget', // Base ID
            __('Social Media Icons', 'ci-modern-accounting-firm'), // Name
            array('description' => __('Displays links to your social media profiles', 'ci-modern-accounting-firm'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        ciPrintSocialLinks();
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Connect with Us', 'ci-modern-accounting-firm');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'ci-modern-accounting-firm'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
                   <p><strong>Note:</strong> Social media links are a feature of <a href="<?php echo CI_THEME_BUY_URL; ?>">the premium version</a> of this theme.
                        You can upgrade (without losing any of your existing work!) for $55 <a href="<?php echo CI_THEME_BUY_URL; ?>">on the Conversion Insights Web site</a>.</p>
        <p>We'll put a link to each of your social media icons here.</p>
        <p>(To configure which icons are shown, and which pages they link to, visit <a href="customize.php" target="_blank">Appearance > Customize</a>, and click Social Media Links.)</p>
        </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}

// register Foo_Widget widget
function register_social_widget() {
    register_widget( 'CiSocialMediaWidget' );
}
add_action( 'widgets_init', 'register_social_widget' );

?>
