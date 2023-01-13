<?php
if (!defined('ABSPATH')){
  exit; // Exit if accessed directly.
}
//
function shayanweb_fontchanger_get_all_options(){
  $options = array(
    // types: onoff/txt/select
    'choose_font' => array(
      'name' => __('انتخاب فونت پیشخوان وردپرس', 'shayanweb-admin-fontchanger'),
      'description' => __('فونت فارسی مدنظر خود را انتخاب کنید تا در بخش مدیریتی سایت اعمال شود. (پس از ذخیره کردن، یکبار رفرش کنید تا اعمال شود.)', 'shayanweb-admin-fontchanger'),
      'type' => 'select',
      'default' => 'shabnam',
      'options' => array(
        'shabnam'=>__('شبنم', 'shayanweb-admin-fontchanger'),
        'vazir'=>__('وزیر', 'shayanweb-admin-fontchanger'),
      ),
    ),
    'wp_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت پیشخوان وردپرس', 'shayanweb-admin-fontchanger'),
      'description' => __('با فعال بودن این تنظیم، فونت پیشخوان وردپرس (مدیریت سایت) تغییر می‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'elementor_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت ویرایشگر المنتور', 'shayanweb-admin-fontchanger'),
      'description' => __('فونت ویرایشگر المنتور (صرفا در هنگام ویرایش به‌عنوان مدیر سایت، نه در دید کاربران) با این تنظیم به فونت فارسی تغییر می‌کند.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
    'classic_font_changer' => array(
      'name' => __('فعال بودن تغییر فونت ویرایشگر کلاسیک', 'shayanweb-admin-fontchanger'),
      'description' => __('منظور از ویرایشگر کلاسیک، ویرایشگر توضیحات محصول ووکامرس (حین ویرایش در پیشخوان وردپرس) و دیگر بخش‌ها است.', 'shayanweb-admin-fontchanger'),
      'type' => 'onoff',
      'default' => 'on',
    ),
  );
  return $options;
}

function shayanweb_fontchanger_update_option($array){
  $old_options = get_option('shayanweb_fontchanger_options');
  $current_option = $old_options;
  if(!is_array($current_option) or $current_option == false or empty($current_option)){
    $current_option = array();
  }
  //
  $options = shayanweb_fontchanger_get_all_options();
  //
  // update or put each $array items in the saved option
  foreach ($array as $name => $value) {
    if(array_key_exists($name,$options)){
      $current_option[$name]=$value;
    }
  }
  //
  // check if option not existed in saved options, put the default in it!
  foreach ($options as $option_name => $option_items) {
    if(!array_key_exists($option_name,$current_option)){
      $current_option[$option_name] = $option_items['default'];
    }
  }
  //
  if($old_options !== $current_option){
    update_option('shayanweb_fontchanger_options',$current_option);
  }
}

function shayanweb_fontchanger_option($option_name){
  shayanweb_fontchanger_update_option(array()); //add default items if not
  $options = shayanweb_fontchanger_get_all_options();
	if(!empty($option_name) and array_key_exists($option_name,$options)){
    $get_options = get_option('shayanweb_fontchanger_options');
    return $get_options[$option_name];
	}
  return false;
}

function shayanweb_fontchangeroptions_create_submenu() {
  add_submenu_page(
    'options-general.php',
    __( 'شایان وب فونت', 'shayanweb-admin-fontchanger' ),
    __( 'شایان وب فونت', 'shayanweb-admin-fontchanger' ),
    'manage_options',
    'shayanweb-fontchanger-options',
    'shayanweb_fontchangeroptions_pagecontent' );
}
add_action('admin_menu','shayanweb_fontchangeroptions_create_submenu');


function shayanweb_fontchangeroptions_pagecontent() {
	$brefore_error_html = '<div class="shayanweb_message the_error">';
	$after_error_html = '</div>';
	$brefore_okay_html = '<div class="shayanweb_message the_okay">';
	$after_okay_html = '</div>';
	?>
	<style>
	.shayanweb_message{padding:10px;margin:20px 0;border-radius:10px;color:#333;font-size:19px;line-height:2}
	.shayanweb_message.the_error{background:#f9d4e3}
	.shayanweb_message.the_okay{background:#c5f1d4}
	.shayanweb_fontchanger-settings form {padding:20px;margin:20px 0;border-radius:10px; box-shadow:0 0 50px rgba(0,0,0,0.1)}
	.shayanweb_fontchanger-settings input {border-radius:5px;padding:10px;line-height: 1.5}
	.shayanweb_fontchanger-settings input[type="submit"] {cursor:pointer;border:unset;outline:unset;color:#fff;background:#6200EA;border-radius:5px;padding:10px 30px;margin-top:20px}
	.shayanweb_fontchanger-settings span.expired {color:#F50057}
  .shayanweb-boxed{background:#fff;padding:25px;border-radius:20px;box-shadow:0 0 80px rgba(0,0,0,0.1);margin: 25px 0;}

  .shayanweb-switch {position:relative;display:inline-block;width:60px;height:34px;}
  .shayanweb-switch input {opacity: 0;width: 0;height: 0;}
  .shayanweb-switch .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 34px;
  }
  .shayanweb-switch .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 50%;
  }
  .shayanweb-switch input:checked + .slider {
    background-color: #6200EA;
  }
  .shayanweb-switch input:focus + .slider {
    box-shadow: 0 0 1px #6200EA;
  }
  .shayanweb-switch input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  .special-suggestion{
    background: #304FFE;
    border-radius: 20px;
    text-align: center;
    padding: 20px;
    color: #fff;
    font-size: 17px;
    box-shadow: 0 0 80px rgba(58,85,254,.7);
    margin: 30px 0;
  }
  .special-suggestion p{font-size:16px}
  .special-suggestion h2{
    color: #fff;
    font-size: 20px;
    margin-bottom: 20px;
  }
  .special-suggestion a{
    color: #fff !important;
    text-decoration: none !important;
    border:unset !important;
    padding: 15px 30px;
    border-radius: 33px;
    background: #F50057;
    margin: 15px auto 0 auto;
    display: block;
    width: auto;
    width: max-content;
    font-size: 17px;
    transition: all 0.3s;
		box-shadow: unset !important;
  }
  .special-suggestion a:hover{
    background: #C51162;
    transform: scale(1.1);
  }
  .special-suggestion.visit-shayanweb{
    background: #00BFA5;
    box-shadow: 0 0 80px rgba(0, 191, 165,.7);
  }
  .special-suggestion.visit-shayanweb a{
    background: #00897B;
  }
  .special-suggestion.visit-shayanweb a:hover{
    background: #00695C;
  }
	.shayanweb-option{border:1px solid #e0e0e0;border-radius:10px;margin:10px 0;padding:20px;box-shadow: 0 0 20px rgba(0,0,0,0.1)}
	.shayanweb-option label{display:block;margin-bottom:8px;font-size:15px;font-weight:bold;}
	.shayanweb-option input[type="text"]{display:block;width:100%}
	.shayanweb-option select{display:block;width:100%}
	</style>
  <div class="wrap shayanweb_fontchanger-settings">
    <div class="shayanweb-boxed">
      <h1><?php _e( 'تنظیمات افزونه‌ی تغییر فونت <a href="https://shayanweb.com" style="color:#00BFA5" target="_blank">شایان وب</a>', 'shayanweb-admin-fontchanger' ) ?></h1>
      <?php
      if(!empty($_POST['save_settings'])){
        $new_options = $_POST;
        unset($new_options['save_settings']);
        //
        $real_options = shayanweb_fontchanger_get_all_options();
        foreach ($real_options as $r_name => $r_data) {
          if(!array_key_exists($r_name,$new_options) and $r_data['type'] == 'onoff'){
            $new_options[$r_name]='off';
          }
        }
        //
        shayanweb_fontchanger_update_option($new_options);
        echo $brefore_okay_html.'ذخیره‌ی تنظیمات با موفقیت انجام شد!'.$after_okay_html;
      }


      $options = shayanweb_fontchanger_get_all_options();
      echo '<form method="post" action="">';
			echo '<h2>'.__( 'تنظیمات تغییر فونت شایان وب', 'shayanweb-admin-fontchanger' ).'</h2>';
			echo '<p>'.__( 'گزینه‌های زیر را تنظیم کنید تا فونت فارسی در پیشخوان وردپرس وبسایت شما قرار گیرد. (بطور پیش‌فرض فعال است)', 'shayanweb-admin-fontchanger' ).'</p>';
      foreach ($options as $opton_name => $option) {
        $name = $opton_name;
        $fname = $option['name'];
        $type = $option['type'];
        $default = $option['default'];
        $description = $option['description'];
        $current = shayanweb_fontchanger_option($name);
        echo '<div class="shayanweb-option">'.
        '<label for="'.$name.'">'.$fname.'</label>'.
        '<p>'.$description.'</p>';
        if($type == 'select'){
          $option_options = $option['options'];
          echo '<select name="'.$name.'" id="'.$name.'">';
          foreach ($option_options as $o_slug => $o_name) {
            $selected='';
            if($o_slug==$current){
              $selected = ' selected';
            }
            echo '<option value="'.$o_slug.'"'.$selected.'>'.$o_name.'</option>';
          }
          echo '</select>';
        }elseif($type == 'onoff'){
          $checked='';
          if($current=='on'){
            $checked=' checked';
          }
          echo
          '<label class="shayanweb-switch">
            <input name="'.$name.'" id="'.$name.'" value="on" type="checkbox"'.$checked.'>
            <span class="slider round"></span>
          </label>';
        }else {
          echo '<input type="text" name="'.$name.'" id="'.$name.'" value="'.$current.'">';
        }
        echo '</div>';
      }
      echo '
      <input type="submit" name="save_settings" value="'.__('ذخیره‌ی تنظیمات','shayanweb-admin-fontchanger').'">
      </form>';
      ?>

      <div class="special-suggestion">
        <h2><?php _e('به این افزونه امتیاز دهید و حمایت کنید💚😍🙏', 'shayanweb-admin-fontchanger'); ?></h2>
        <p><?php _e('اگر این افزونه برای شما مفید بود، بسیار ممنون می‌شویم 5 امتیاز کامل را از طریق لینک زیر به ما بدهید.', 'shayanweb-admin-fontchanger'); ?></p>
        <a href="https://login.wordpress.org/?redirect_to=https%3A%2F%2Fwordpress.org%2Fsupport%2Fplugin%2Fshayanweb-admin-fontchanger%2Freviews%2F" target="_blank"><?php
        _e('ثبت امتیاز 5 ستاره!😍⭐', 'shayanweb-admin-fontchanger');
        ?></a>
      </div>

      <div class="special-suggestion visit-shayanweb">
        <h2><?php _e('به شایان وب سری بزنید!😍💚', 'shayanweb-admin-fontchanger'); ?></h2>
        <p><?php _e('در شایان وب، آموزش‌های بروز، دوره‌های آموزشی کاربردی و محصولات وردپرسی مفیدی داریم! حتما چند وقت یکبار بهمون سری بزنید (: خوشحال می‌شیم💚', 'shayanweb-admin-fontchanger'); ?></p>
        <a href="https://shayanweb.com/" target="_blank"><?php
        _e('بریم به شایان وب!😍', 'shayanweb-admin-fontchanger');
        ?></a>
      </div>



    </div>
  </div>
  <?php
}
