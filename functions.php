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
 * Set this to "true" to turn on debugging mode.
 * Helps with development by showing the paths of the files loaded by Carrington.
 */
define('CFCT_DEBUG', false);

/**
 * Theme version.
 */
define('CFCT_THEME_VERSION', '0.1');

/**
 * Theme URL version.
 * Added to query var at the end of assets to force browser cache to reload after upgrade.
 */
if (!(defined('CFCT_URL_VERSION'))) {
	define('CFCT_URL_VERSION', '0.1');
}

/**
 * Includes
 */
include_once(CFCT_PATH.'carrington-core/carrington.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (! isset($content_width)) {
	$content_width = 600;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as
 * indicating support post thumbnails.
 */
if (! function_exists('cfct_theme_setup')) {
	function cfct_theme_setup() {
		/**
		 * Make theme available for translation
		 * Use find and replace to change 'carrington-blueprint' to the name of your theme.
		 */
		load_theme_textdomain('carrington-blueprint');

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable post thumbnails support.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * New image sizes that are not overwrote in the admin.
		 */
		// add_image_size('thumb-img', 160, 120, true);
		// add_image_size('medium-img', 510, 510, false);
		// add_image_size('large-img', 710, 700, false);

		/**
		 * Add navigation menus
		 */
		register_nav_menus(array(
			'main' => 'Main Navigation',
			'footer' => 'Footer Navigation'
		));

		/**
		 * Add post formats
		 */
		// add_theme_support( 'post-formats', array('image', 'link', 'gallery', 'quote', 'status', 'video'));
	}
}
add_action('after_setup_theme', 'cfct_theme_setup');


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cfct_widgets_init() {
	// Sidebar Defaults
	$sidebar_defaults = array(
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>'
	);
	// Copy the following code and replace values to create more widget areas
	register_sidebar(array_merge($sidebar_defaults, array(
		'id' => 'sidebar-default',
		'name' => __('Default Sidebar', 'carrington-blueprint'),
	)));
}
add_action( 'widgets_init', 'cfct_widgets_init' );

/**
 * Enqueue's scripts and styles
 */
function cfct_load_assets() {
	//Variable for assets url
	$cfct_assets_url = get_template_directory_uri() . '/assets/';

	// Styles
	wp_enqueue_style('styles', $cfct_assets_url . 'css/style.css', array(), CFCT_URL_VERSION);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Scripts
	wp_enqueue_script('modernizr', $cfct_assets_url . 'js/modernizr-2.5.3.min.js', array(), CFCT_URL_VERSION);
	wp_enqueue_script('placeholder', $cfct_assets_url . 'js/jquery.placeholder.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('script', $cfct_assets_url . 'js/script.js', array('jquery', 'placeholder'), CFCT_URL_VERSION);
	wp_enqueue_script('iphone-scaling-fix', $cfct_assets_url . 'js/ios-orientationchange-fix.js', array(), CFCT_URL_VERSION, true);
}
add_action('wp_enqueue_scripts', 'cfct_load_assets');

