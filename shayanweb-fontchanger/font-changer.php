<?php
// ShayanWeb.com FontChanger
function shayanweb_font_changer() {
	wp_enqueue_style( 'custom_admin_panel_style', plugin_dir_url( __FILE__ )  . 'shwebfontchanger.css' );
}
add_action( 'admin_enqueue_scripts', 'shayanweb_font_changer' );
