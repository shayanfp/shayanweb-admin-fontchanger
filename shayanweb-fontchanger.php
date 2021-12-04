<?php
/*
Plugin Name: ShayanWeb Admin FontChanger | افزونه‌ی تغییر فونت پیشخوان وردپرس شایان وب
Plugin URI:  https://ShayanWeb.com/blog/change-wp-admin-font/
Author:      ShayanWeb
Author URI:  https://ShayanWeb.com/
Version: 	 1.2
Tags: fonts, admin, wp-admin
Requires at least: 5.2
Tested up to: 5.8.2
Requires PHP: 7.0
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
define( 'SHAYANWEB_FONT_CHANGER_VERSION', '1.2' );
//
if (!function_exists( 'shayanweb_font_changer' )) {
  require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'font-changer.php';
}
//
if (defined('ELEMENTOR_VERSION')) {
	if (!function_exists( 'shayanweb_elementoreditor_font_changer' )) {
	  require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'elementor-editor.php';
	}
}
