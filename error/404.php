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

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();
?>
<div id="primary" class="c1-12">
	<h1><?php _e('<i>Error 404:</i> Page Not Found', 'carrington-blueprint'); ?></h1>
	<?php
	_e('<h2>Sorry, we couldn&rsquo;t find the page you&rsquo;re looking for.</h2> <p>We may have moved the page or perhaps you followed an outdated link.<br/> You could try a search, or visit the home page.</p>', 'carrington-blueprint').'</p>'; 
	cfct_form('search');
	?>
</div><!-- #content -->
<?php get_footer(); ?>