## assets/css/

Organizational folder for holding theme image files. You can reference these files using the built-in WordPress `bloginfo()` function like so:

	<link rel="stylesheet" type="text/css" 
		href="<?php bloginfo('template_directory'); ?>/assets/css/base.css" />

This directory is not used by the Carrington engine (template naming conventions are not supported), it is provided solely for convenience and for better organization of these files.
