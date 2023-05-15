<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
// ShayanWeb.com Admin FontChanger
function shayanweb_front_wpadminbar_font_changer() {
    if ( current_user_can( 'administrator' ) ) {
        wp_enqueue_style( 'shayanweb_wpadminbar_fontchanger_font',
        SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
        array(),
        SHAYANWEB_FONT_CHANGER_VERSION);
        $adding_front_font_css = ".rtl #wpadminbar *{font-family:ShayanWeb-Font,Tahoma,sans-serif}";
        wp_add_inline_style( 'shayanweb_wpadminbar_fontchanger_font', $adding_front_font_css );
    }
}
add_action( 'wp_enqueue_scripts', 'shayanweb_front_wpadminbar_font_changer',99999999 );
