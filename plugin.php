<?php
/*
Plugin Name: Wp Tips
Plugin URI: http://meee.pl
Description: Tips for wp
Version: 2015.10.25
Author: yooka
Author URI: http://meee.pl
License: GPL2
*/

if(!defined( 'ABSPATH' ) ) exit;

#Hide Revolution Slider generator
add_filter('wp_enqueue_scripts', 'clear_revslider', 100);
if(!function_exists('clear_revslider')){
	function clear_revslider(){
		if(class_exists('RevSliderFront')){
			remove_action('wp_head', array('RevSliderFront', 'add_meta_generator'));
		}
	}
}

#Hide Visual Composer generator
if(function_exists('visual_composer')){
	if(!function_exists('remove_vc_generator')){
		function remove_vc_generator(){
			remove_action('wp_head',	array(visual_composer(), 'addMetaData'));
		}
	}
	add_action('wp', 'remove_vc_generator', 100);
	
}

#Hide activation nag for Visual Composer
if(function_exists('vc_license')){
	if(!function_exists('remove_vc_license_notice')){
		function remove_vc_license_notice(){
			remove_action('admin_notices',	array(vc_license(), 'adminNoticeLicenseActivation'));
		}
	}
	add_action('admin_init', 'remove_vc_license_notice', 100);
	
}

