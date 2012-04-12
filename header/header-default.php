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
if (CFCT_DEBUG) { cfct_banner(__FILE__); }
?>
<!DOCTYPE html>

<!-- Internet Explorer Conditional Statements -->
<!--[if IE]><![endif]-->
<!--[if lt IE 7]> <html class="ie6" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]> <html class="ie7" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]> <html class="ie8" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="modern" <?php language_attributes() ?>> <!--<![endif]-->
<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/assets/css/lte-ie7.css?ver=<?php echo CFCT_URL_VERSION; ?>" />
<![endif]-->
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '-', true, 'right' ); esc_attr_e(get_bloginfo('name')); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<?php wp_get_archives(array('type' => 'monthly', 'format' => 'link')); ?>
	<?php include(CFCT_PATH.'assets/load.php'); ?>
	<?php
	// Include javascript for threaded comments if needed
	if ( is_singular() && get_option('thread_comments') && comments_open() ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}
	// Necessary for many Wordpress Functions
	wp_head();
	?>
	<!-- Add misc. Scripts and Includes here, such as Google Fonts. -->

</head>

<body <?php body_class(); ?>>
	<header id="header" class="clearfix">
		<!-- Blog title and link to home page -->
		<h1><a href="<?php echo home_url('/') ?>" title="Home" rel="home"><?php bloginfo('name') ?></a></h1>

		<!-- Blog Description -->
		<p><?php bloginfo('description'); ?></p>

		<!-- Primary Navigation Menu -->
		<div class="nav-wrap">
			<?php
			wp_nav_menu(array( 
				'theme_location' => 'main',
				'container' => 'nav',
				'container_class' => 'nav-main nav',
				'depth' => 2,
			));
			?>
	</div>
	</header><!-- #header -->
	<section id="main">
