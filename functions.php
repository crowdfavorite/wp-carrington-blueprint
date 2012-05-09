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

define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

/**
 * Here for internationalization purposes.
 * If you rename the textdomain, be sure to also do it in the rest of your theme files.
 * See the Wordpress Codex for more information.
 */
load_theme_textdomain('carrington-blueprint');

/**
 * Set this to "true" to turn on debugging mode.
 * Debug helps with development by showing you the paths of the files loaded by Carrington.
 */
define('CFCT_DEBUG', false);

/**
 * In production mode, or doing development?
 * When true, assets/load.php will enqueue the built versions of the files
 */
define('CFCT_PRODUCTION', false);

/**
 * Theme version.
 */
define('CFCT_THEME_VERSION', '1.0');

/**
 * Theme URL version.
 * Added to query var at the end of assets to force browser cache to reload after upgrade.
 */
if (!(defined('CFCT_URL_VERSION'))) {
	define('CFCT_URL_VERSION', '1');
}

/**
 * Includes
 */
include_once(CFCT_PATH.'carrington-core/carrington.php');
include_once(CFCT_PATH.'functions/sidebars.php');

/**
 * Theme Setup
 */
function cfct_theme_setup() {
	// Add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');
	
	// This theme uses post thumbnails
	add_theme_support('post-thumbnails');

	// New image sizes that are not overwrote in the admin
	// add_image_size('thumb-img', 160, 120, true);
	// add_image_size('medium-img', 510, 510, false);
	// add_image_size('large-img', 710, 700, false);

	// If the content width is not defined elsewhere, it will be set to 550px.
	// This is used for things such as embedded YouTube videos, etc.
	if (! isset($content_width)) {
		$content_width = 550;
	}
			
	// Add navigation menus
	register_nav_menus(array(
		'main' => 'Main Navigation',
		'footer' => 'Footer Navigation'
	));

	// Add post formats
	// add_theme_support( 'post-formats', array('image', 'link', 'gallery', 'quote', 'status', 'video'));
}
add_action('after_setup_theme', 'cfct_theme_setup');

/**
 * Load assets at action 'wp', when conditionals like is_single are available.
 */
function cfct_load_assets() {
	include_once(CFCT_PATH.'assets/load.php');
}
add_action('wp', 'cfct_load_assets');

