<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_font_changer() {
    if ( ! is_admin() ) {
        return;
    }
	//
	$custom_font_css = shayanweb_fontchanger_option('custom_font_css');
    $font_choice     = shayanweb_fontchanger_option('choose_font');
	//
    $current_hook  = current_filter();
    $handle_prefix = ( $current_hook === 'enqueue_block_assets' ) ? 'gutenberg_' : 'admin_panel_';
	//
	wp_enqueue_style( 
        'shayanweb_' . $handle_prefix . 'style',
	    SHAYANWEB_FONT_CHANGER_URL . 'css/shwebfontchanger.css',
	    array(),
	    SHAYANWEB_FONT_CHANGER_VERSION
    );
	//
	if ( $font_choice == 'custom' && !empty($custom_font_css) ) {
		wp_add_inline_style( 'shayanweb_' . $handle_prefix . 'style', $custom_font_css );
	} else {
		wp_enqueue_style( 
            'shayanweb_' . $handle_prefix . 'font',
		    SHAYANWEB_FONT_CHANGER_URL . 'css/' . $font_choice . '.css',
		    array(),
		    SHAYANWEB_FONT_CHANGER_VERSION
        );
	}
}

add_action( 'admin_enqueue_scripts', 'shayanweb_font_changer', 99999999 );
add_action( 'enqueue_block_assets', 'shayanweb_font_changer', 99999999 );