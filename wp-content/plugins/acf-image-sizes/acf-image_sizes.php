<?php

/*
Plugin Name: Advanced Custom Fields: Image Sizes
Plugin URI: PLUGIN_URL
Description: Field for select sizes of images
Version: 1.0.0
Author: Paco Manrique (paco@djnr.net)
Author URI: djnr.net
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl_2.0.html
*/




// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
load_plugin_textdomain( 'acf_image_sizes', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 


// 3. Include field type for ACF4
function register_fields_image_sizes() {
	
	include_once('acf-image_sizes-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_image_sizes');	



	
?>