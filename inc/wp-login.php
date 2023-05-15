<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_wp_login_font_changer() {
	wp_enqueue_style( 'shayanweb_custom_admin_wp_login_style',
	SHAYANWEB_FONT_CHANGER_URL . 'css/shayanweb-wp-login.css',
	array(),
	SHAYANWEB_FONT_CHANGER_VERSION);
	wp_enqueue_style( 'shayanweb_fontchanger_font',
	SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
	array(),
	SHAYANWEB_FONT_CHANGER_VERSION);
}
add_action( 'login_enqueue_scripts', 'shayanweb_wp_login_font_changer',99999999 );
