<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2013 Crowd Favorite, Ltd. All rights reserved.
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

$s = get_query_var('s');

if (get_option('permalink_structure') != '') {
	$search_title = '<a href="'.esc_attr(site_url('search/'.urlencode($s))).'">'.esc_html($s).'</a>';
}
else {
	$search_title = '<a href="'.esc_attr(site_url('?s='.urlencode($s))).'">'.esc_html($s).'</a>';
}
?>

<div id="primary" class="c1-8">
	<h1><?php printf(__('Search Results for: %s', 'carrington-blueprint'), $search_title); ?></h1>
	<?php
	// For the loop used, look in /loops
	cfct_loop();
	?>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>