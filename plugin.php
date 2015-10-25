<?php
/*
Plugin Name: Visual Composer Tips
Plugin URI:
Description:
Version: 2015.10.25
Author: yooka
Author URI: http://meee.pl
License: GPL2
*/

if(function_exists('visual_composer')){
  add_action('wp', 'remove_vc_generator', 100);
}
if(function_exists('vc_license')){
  add_action('admin_print_scripts-post.php', 'remove_vc_license_notice', 100);
}

function remove_vc_generator(){
  remove_action('wp_head',  array(visual_composer(), 'addMetaData'));
}
function remove_vc_license_notice(){
	remove_action('admin_notices',  array(vc_license(), 'adminNoticeLicenseActivation'));
}
