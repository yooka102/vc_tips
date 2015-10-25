<?php
/*
Plugin Name: Visual Composer Tips
Plugin URI: http://meee.pl
Description: Tips for Visual Composer
Version: 2015.10.25
Author: yooka
Author URI: http://meee.pl
License: GPL2
*/

#Hide Visual Composer generator
if(function_exists('visual_composer')){
	add_action('wp', 'remove_vc_generator', 100);
	if(!function_exists('remove_vc_generator')){
		function remove_vc_generator(){
			remove_action('wp_head',	array(visual_composer(), 'addMetaData'));
		}
	}
}

#Hide activation nag for Visual Composer
if(function_exists('vc_license')){
	add_action('admin_print_scripts-post.php', 'remove_vc_license_notice', 100);
	if(!function_exists('vc_license')){
		function remove_vc_license_notice(){
			remove_action('admin_notices',	array(vc_license(), 'adminNoticeLicenseActivation'));
		}
	}
}

