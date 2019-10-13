<?php
/**
 * @package Custom_Social_Embed
 * @version 1.0.0
 */
/*
Plugin Name: Custom Social Embed
Plugin URI: http://wordpress.org/plugins/custom-social-embed/
Description: This WordPress plugin will help you in removing some frustrating description and comments on photos and videos embedded from Instagram social network. Custom Social Embed is developed by Teodoro PICCINNI, not officially approved or released by Instagram developers team.
Author: Teodoro PICCINNI
Version: 0.0.3
Author URI: https://www.teodoropiccinni.com/
*/

// Default security WP check
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Process embedded Social contents
function custom_social_embed($content) {
	/** Customize post content from plugin settings */
	if(strpos($content, 'instagr.am') !== false || strpos($content, 'instagram.com') !== false){ // if social embed
	    $return = preg_replace("@data-instgrm-captioned@", "", $content); // remove caption class
	    return $return;		
    }
	return $content;
}


// Now we set that function up to execute when the embed_handler_html and embed_oembed_html action is called.
add_filter('embed_handler_html', 'custom_social_embed');
add_filter('embed_oembed_html', 'custom_social_embed');

