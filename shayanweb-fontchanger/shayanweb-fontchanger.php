<?php
if (get_bloginfo("language") == 'fa-IR') {
/*
Plugin Name: تغییر فونت ادمین وردپرس - شایان وب
Plugin URI:  https://ShayanWeb.com/blog/change-wp-admin-font/
Author:      شایان وب
Author URI:  https://ShayanWeb.com/
Version: 	 1.0
Description: ساده‌ترین راه برای تغییر سریع فونت ادمین وردپرس.
*/
}else {
/*
Plugin Name: ShayanWeb WP-Admin FontChanger
Plugin URI:  https://ShayanWeb.com/blog/change-wp-admin-font/
Author:      ShayanWeb
Author URI:  https://ShayanWeb.com/
Version: 	 1.0
Description: The easiest way to change WordPress admin font.
*/
}
//
if (!function_exists( 'shayanweb_font_changer' )) {
  require_once plugin_dir_path(__FILE__) . DIRECTORY_SEPARATOR . 'font-changer.php';
}
