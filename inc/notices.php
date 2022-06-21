<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly.
}
//
//
// shayanweb fontchanger: wpshamsi compatibility
function shayanweb_fontchanger_wpshamsi_compatibility(){
	if (defined('WPSH_VERSION')) {
		if (get_option('shayanweb_adminnotice_ignore_wpshamsi')!== 'true') {
			echo '<div class="notice notice-error shayanweb-admin-notice" style="font-size:15px"><p style="font-size:15px;line-height:2.2">'.
			__('<strong>افزونه‌ی تغییر فونت شایان وب:</strong> ما فعال بودن افزونه‌ی شمسی‌ساز وردپرس را تشخیص دادیم. این افزونه از روش متفاوتی برای تغییر فونت استفاده می‌کند.
			این افزونه استایل‌های تغییر فونت اضافه می‌کند که این استایل‌ها را توصیه نمی‌کنیم. <br><br>'.
			'<b>راه‌حل چیست؟!</b>: نیازی به غیرفعال کردن کامل افزونه‌ی WP Shamsi نیست.<br>
			<ol style="margin-top:0">
			<li>ابتدا روی دکمه‌ی زیر کلیک کنید و وارد تنظیمات افزونه‌ی WP Shamsi شوید.</li>
			<li>در قدم بعدی، از منوی "فارسی‌ساز" در بخش "فونت مدیریت"، گزینه را روی "غیرفعال" قرار دهید.</li>
			<li>در منوی "سازگاری"، گزینه‌ی "المنتور" را غیرفعال کنید. (با این کار، تنها این استایل تغییر فونت اضافه لود نمی‌شود و مشکلی برای المنتور پیش نخواهد آمد.)</li>
			<li>در نهایت روی دکمه‌ی ذخیره‌سازی کلیک کنید.</li>
			</ol>'.
			' <div style="margin-top:10px;display:block"><a target="_blank" class="button button-primary" href="'.get_admin_url().'admin.php?page=wpsh">غیرفعال‌سازی این تنظیم و حل مشکل طبق دستورالعمل بالا</a>' .
			' | <a class="button button-secondary" href="?shweb-ignore-notice-wpshamsi">انجام دادم / عدم نمایش مجدد این پیام</a></div>' .
			'</p></div>','shayanweb-admin-fontchanger');
		}
	}
}
add_action('admin_notices','shayanweb_fontchanger_wpshamsi_compatibility');
//
// ignore notice
function shayanweb_adminnotice_ignore_wpshamsi(){
	if (defined('WPSH_VERSION')) {
		if (isset($_GET['shweb-ignore-notice-wpshamsi'])) {
			update_option('shayanweb_adminnotice_ignore_wpshamsi','true');
		}
	}
}
add_action('admin_init','shayanweb_adminnotice_ignore_wpshamsi');
