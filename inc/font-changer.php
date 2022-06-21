<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_font_changer() {
	wp_enqueue_style( 'shayanweb_custom_admin_panel_style',
	SHAYANWEB_FONT_CHANGER_URL . 'css/shwebfontchanger.css',
	array(),
	SHAYANWEB_FONT_CHANGER_VERSION);
}
add_action( 'admin_enqueue_scripts', 'shayanweb_font_changer' );
