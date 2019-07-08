<?php
/**
 * @package Instagram_Embedded_Custom
 * @version 0.0.1
 */
/*
Plugin Name: Instagram Embedded Custom
Plugin URI: http://wordpress.org/plugins/instagram-embedded-custom/
Description: This plugin will help you in removing some frustrating description and comments from embedded Instagram photos and videos.
Author: Teodoro PICCINNI
Version: 0.0.1
Author URI: https://www.teodoropiccinni.com/
*/

// Default security WP check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Process Instagram embedded contents
function instagram_embedded_customizer($content) {
	/** Customize post content from plugin settings */
	if(strpos($content, 'instagr.am') !== false || strpos($content, 'instagram.com') !== false){ // if instagram embed
	    $return = preg_replace("@data-instgrm-captioned@", "", $content); // remove caption class
	    return $return;		
    }
	return $content;
}


// Now we set that function up to execute when the embed_handler_html and embed_oembed_html action is called.
add_filter('embed_handler_html', 'instagram_embedded_customizer');
add_filter('embed_oembed_html', 'instagram_embedded_customizer');

