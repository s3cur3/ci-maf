<?php
/*
Plugin Name: Google Privacy Policy
Plugin URI: http://smheart.org/google-privacy-policy/
Description: This plugin provides a direct and easy to include privacy policy to meet Google's requirements for websites using AdSense.
Author: Matthew Phillips
Version: 1.0
Author URI: http://smheart.org


Copyright 2009 SMHeart Inc, Matthew Phillips  (email : matthew@smheart.org)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

http://www.gnu.org/licenses/gpl.txt


*/

/*
Version
        1.0   28 December 2009

*/


function ciGooglePrivacyPolicy() {
	return sprintf( __( '<strong>Note:</strong> <a href="%1$s">The premium version</a> of this theme includes a boilerplate privacy policy for using analytics and advertising tracking (as required by Google if you want to use their Analytics or AdWords services!). You can upgrade (without losing any of your existing work!) for $55 <a href="%1$s">on the Conversion Insights Web site</a>.', 'ci-modern-accounting-firm' ), CI_THEME_BUY_URL);;
}

function ciRegisterPrivacyPolicyShortcode() {
    add_shortcode('privacy', 'ciGooglePrivacyPolicy');
}

add_action( 'init', 'ciRegisterPrivacyPolicyShortcode');
