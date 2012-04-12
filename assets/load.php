<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2012 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

// Load bundler config.
include_once(CFCT_PATH.'assets/config.php');
// Helper class for enqueueing bundles
include_once(CFCT_PATH.'assets/asset-build/lib/Bundler_Loader.php');

// Used for conditional comments with wp_enqueue_style
global $wp_styles;
$assets_url = trailingslashit(get_bloginfo('template_url')) . 'assets/';
$business_bundle = (CFCT_PRODUCTION ? array('bundle-business') : array());

// Enqueue bundles compiled by bundler script
$loader = new Bundler_Loader($assets_url);
// Set the default cache-busting version number. Used if the bundle doesn't have one set.
$loader->set_default_ver(CFCT_URL_VERSION);

// If we're in production mode, enqueue the built files
if (CFCT_PRODUCTION) {
	$loader->enqueue_bundled_files();
}
// Otherwise, if we're in development mode, enqueue the original separate files
else {
	$loader->enqueue_original_files();
}

if ( ! function_exists( 'cfct_enqueue_pluggable' ) ) {
	function cfct_enqueue_pluggable() {
		if (!is_admin()) {
			wp_enqueue_script('favemagazine', get_bloginfo('template_directory') . '/assets/js/master.js', array('jquery'), CFCT_URL_VERSION);
		}
		if (is_child_theme() && !is_admin()) {
			wp_enqueue_style('favemagazine', get_bloginfo('stylesheet_url'), array(), CFCT_URL_VERSION, 'screen');
		}
	}
}

cfct_enqueue_pluggable();


function cfcp_viewport_meta() {
// Mobile viewport optimized: j.mp/bplateviewport
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
}
//add_action('wp_head', 'cfcp_viewport_meta');

