<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
if (defined('ELEMENTOR_VERSION')) {
  function shayanweb_elementoreditor_font_changer() {
    //
    wp_enqueue_style( 'shayanweb_custom_elementoreditor_style',
  	plugin_dir_url( __FILE__ ) . 'shayanweb-elementorfont.css',
  	array(),
  	SHAYANWEB_FONT_CHANGER_VERSION);
    //
    wp_add_inline_style('shayanweb_custom_elementoreditor_style', '.elementor-panel{font-family:ShayanWeb-Shabnam!important}');
  }
  add_action( 'elementor/editor/before_enqueue_scripts', 'shayanweb_elementoreditor_font_changer',100);
}
