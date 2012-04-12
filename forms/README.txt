## forms/

### Overview

This directory holds forms that may be used in various places throughout the theme. 

These forms can be included in other theme files using the following code:

	<?php cfct_form('comment'); ?>

Where `comment.php` is the name of the file in the _forms/_ directory that you want to include.


### Example File Descriptions

- *search.php* - used for default Wordpress searches on all pages / posts.

Included by default are the "post comment" form (_comment.php_) and the "search" form (_search.php_). Create as many forms as you like and store them here to keep them organized.

This directory is not used by the Carrington engine (template naming conventions are not supported), it is provided solely for convenience and for better organization of these files.