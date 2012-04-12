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

global $post;

get_header();
?>
<header id="masthead">
	<h1><?php cfct_blog_title(); ?></h1>
</header><!-- #masthead -->
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
<div id="content">
	<div <?php post_class('entry attachment clearfix'); ?>>
		<div class="content clearfix">
			<p><a href="<?php echo get_permalink($post->post_parent); ?>">&larr; back to <b><?php echo get_the_title($post->post_parent); ?></b></a></p>
			<?php echo wp_get_attachment_link($post->ID, 'large', false) ?>
			<ul class="attachment-meta">
				<li class="entry-title"><div class="inside"><?php the_title(); ?></div></li>
				<?php
				if (has_excerpt()) { ?>
				<li><div class="inside"><?php the_excerpt(); ?></div></li>
				<?php
				}
				if (get_the_content()) { ?>
				<li><div class="inside"><?php the_content(__('Continued&hellip;', 'carrington-blueprint')); ?></div></li>
				<?php
				}
				?>
			</ul>
		</div>
	</div><!-- .entry -->
	<?php comments_template(); ?>
</div><!-- #content -->
<?php
	}
} else {
	cfct_misc('no-results');
}

get_footer();
?>