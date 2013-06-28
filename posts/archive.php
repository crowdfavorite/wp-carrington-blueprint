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
?>

<div id="primary" class="c1-8">
	<h1 class="archive-title"><?php
		if (is_day()) {
			printf(__('Daily Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date() . '</span>');
		} elseif (is_month()) {
			printf(__('Monthly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_year()) {
			printf(__('Yearly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_tag()) {
			printf(__('Tag Archives: %s', 'carrington-blueprint'), '<span>' . single_tag_title('', false ) . '</span>');
		} elseif (is_category()) {
			printf(__('Category Archives: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		} else {
			_e('Blog Archives', 'carrington-blueprint');
		}
	?></h1>

	<?php
		// Show an optional category description
		if (is_category) {
			$category_description = category_description();
			if ($category_description) {
				echo '<div class="archive-description">' . $category_description . '</div>';
			}
		} elseif (is_tag()) {
			$tag_description = tag_description();
			if ($tag_description) {
				echo '<div class="archive-description">' . $tag_description . '</div>';
			}
		}

		// For the loop used, look in /loops
		cfct_loop();

		// Pagination
		cfct_misc('nav-posts');
	?>

</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>