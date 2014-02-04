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

global $post;
global $comment;

// Extract data passed in from threaded.php for comment reply link
extract($data);

if ($comment->comment_approved == '0') {
?>
<div class="notice">
	<div class="content"><?php _e('Your comment is awaiting moderation.', 'carrington-blueprint'); ?></div>
</div>
<?php
}
?>
<div id="comment-<?php comment_ID(); ?>" <?php comment_class('reply clearfix'); ?>>
	<div class="reply-header vcard">
		<?php echo get_avatar($comment, 34); ?>
		<b class="reply-title fn"><?php comment_author_link(); ?></b>
	</div>
	<div class="reply-content">
		<?php comment_text(); ?>
	</div>
	<div class="reply-footer">
		<?php
		printf(__('On %s at %s', 'carrington-blueprint'), get_comment_date(), get_comment_time());
		if (get_option('thread_comments')) {
			echo ' &middot; ';
			comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'])), $comment, $post);
		}
		edit_comment_link(__('Edit', 'carrington-blueprint'), ' &middot; ', '');
		?>
	</div>
</div><!-- .reply -->