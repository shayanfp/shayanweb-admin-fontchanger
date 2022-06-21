<?php
/*
Plugin Name: ShayanWeb Admin FontChanger | افزونه‌ی تغییر فونت پیشخوان وردپرس شایان وب
Plugin URI:  https://ShayanWeb.com/blog/change-wp-admin-font/
Author:      ShayanWeb
Author URI:  https://ShayanWeb.com/
Version: 	 1.4
Tags: fonts, admin, wp-admin
Requires at least: 5.2
Tested up to: 6.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: shayanweb-admin-fontchanger
Description: Easiest way to change WordPress admin font for farsi websites is using this plugin!
*/
//
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
define( 'SHAYANWEB_FONT_CHANGER_VERSION' , '1.4' );
define( 'SHAYANWEB_FONT_CHANGER_URL' , trailingslashit(plugin_dir_url( __FILE__ )) );
define( 'SHAYANWEB_FONT_CHANGER_DIR' , trailingslashit(plugin_dir_path(__FILE__)) );
define( 'SHAYANWEB_FONT_CHANGER_INC_DIR' , trailingslashit(SHAYANWEB_FONT_CHANGER_DIR.'inc' ));
//
if (!function_exists( 'shayanweb_font_changer' )) {
	if (get_option('shayanweb_plugin_disable_wp_font_changer') !== 'yes') {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'font-changer.php';
		if (get_option('shayanweb_plugin_disable_wp_font_changer') !== 'no') {
			update_option('shayanweb_plugin_disable_wp_font_changer','no');
			// if you want to disable font changer for wordpress, go to wp-admin/options.php and change this to 'yes'
		}
	}
}
//
if (defined('ELEMENTOR_VERSION')) {
	if (!function_exists( 'shayanweb_elementoreditor_font_changer' )) {
		if (get_option('shayanweb_plugin_disable_elementor_font_changer') !== 'yes') {
	  	require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'elementor-editor.php';
			if (get_option('shayanweb_plugin_disable_elementor_font_changer') !== 'no') {
				update_option('shayanweb_plugin_disable_elementor_font_changer','no');
				// if you want to disable font changer for elementor, go to wp-admin/options.php and change this to 'yes'
			}
		}
	}
}
//
//
if (!function_exists( 'shayanweb_classiceditor_font_changer' )) {
	if (get_option('shayanweb_plugin_disable_classic_font_changer') !== 'yes') {
		require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'classic-editor.php';
		if (get_option('shayanweb_plugin_disable_classic_font_changer') !== 'no') {
			update_option('shayanweb_plugin_disable_classic_font_changer','no');
			// if you want to disable font changer for wordpress, go to wp-admin/options.php and change this to 'yes'
		}
	}
}
//
// load notices
require_once SHAYANWEB_FONT_CHANGER_INC_DIR . 'notices.php';
//
//
// Plugin By: ShayanWeb.com - Shayan Farhang Pazhooh
