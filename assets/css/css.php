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

define('ABSPATH', realpath(dirname(__FILE__)) . '/');

// Set up an array of files and their handles
$load = array(
	'base.css',
	'utility.css',
	'box.css',
	'content.css',
	'../carrington-build/css/cf-css-grid/css/grid.css',
	'structure.css'
);

// Initialize gzip and send headers
ob_start("ob_gzhandler");

header('Content-type: text/css');
header("Cache-Control: public");

// Cache for 1 day
header('Expires: '.gmdate('D, d M Y H:i:s', time() + 86400) . 'GMT'); 

// Test efficiency
// $timer = microtime();

foreach ($load as $file) {
	// Load up file
	$file_contents = file_get_contents(ABSPATH.$file);
	
	// Strip out comments, including multi-line
	$file_contents = preg_replace('/\/\*(.|[\r\n])*?\*\//', '', $file_contents);

	// Strip whitespace and newlines
	$needles = array(
		"\n",
		"\t"
	);
	$file_contents = str_replace($needles, '', $file_contents);
	
	echo $file_contents;
	
	// Alternate method (doesn't touch source)
	// include(ABSPATH.$css_files[$file]);
}

// Test efficiency (cont)
// echo "\n\n".'/* Created in '.(microtime() - $timer).' milliseconds. */';
?>
