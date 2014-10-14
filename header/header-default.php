<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2014 Crowd Favorite, Ltd. All rights reserved.
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

if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { die(); }
if ( CFCT_DEBUG ) { cfct_banner( __FILE__ ); }

$blog_name = get_bloginfo( 'name' );
$blog_desc = get_bloginfo( 'description' );
$title_description = ( is_home() && !empty( $blog_desc ) ? ' - ' . $blog_desc : '' );

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( $blog_name, 1 ) . $title_description; ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicon.ico"  type="image/x-icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/ie78-style.css" type="text/css" media="all"><![endif]-->
</head>
<body <?php body_class(); ?>>
<div class="breakpoint-context"></div>
<div class="container grid">
	<header id="masthead" class="row site-header clearfix">
		<div class="c1-12">
			<button id="toggle-menu"><?php _e( 'Menu', 'carrington-blueprint' ); ?></button>
			<h1 id="site-name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'carrington-blueprint' ); ?>"><?php esc_html_e( $blog_name ); ?></a></h1>
			<nav id="nav-main" role="navigation">
				<?php wp_nav_menu( array(
					'container' => '',
					'theme_location' => 'main',
					'depth' => 2
				) ); ?>
			</nav>
		</div><!-- .c1-12 -->
	</header><!-- #masthead -->

	<div id="main" class="row clearfix">
