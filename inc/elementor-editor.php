<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
function shayanweb_elementoreditor_font_changer() {
	if (defined('ELEMENTOR_VERSION')) {
    //
    wp_enqueue_style( 'shayanweb_custom_elementoreditor_style',
  	SHAYANWEB_FONT_CHANGER_URL . 'css/shayanweb-elementorfont.css',
  	array(),
  	SHAYANWEB_FONT_CHANGER_VERSION);
		wp_enqueue_style( 'shayanweb_fontchanger_font',
		SHAYANWEB_FONT_CHANGER_URL . 'css/'.shayanweb_fontchanger_option('choose_font').'.css',
		array(),
		SHAYANWEB_FONT_CHANGER_VERSION);
    //
    wp_add_inline_style('shayanweb_custom_elementoreditor_style', '.elementor-panel{font-family:ShayanWeb-Shabnam!important}');
  }
}
add_action( 'elementor/editor/before_enqueue_scripts', 'shayanweb_elementoreditor_font_changer',100);
