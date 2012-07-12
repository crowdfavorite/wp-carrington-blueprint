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

$abspath = realpath(dirname(__FILE__)) . '/';
require_once($abspath . '/asset-build/lib/Bundler.php');

$bundler = Bundler::create($abspath);

$bundle_css = new Bundle('css/build.css');
$bundle_css
	->set_bundle_key('bundle-blueprint')
	->set_language('css')
	->add('base', 'css/base.css')
	->add('grid', 'css/grid.css')
	->add('utility', 'css/content.css')
	->add('content', 'css/utility.css');
	// Add the following line for every file you want bundled.
	// ->add('name', 'css/file.css');
$bundler->push($bundle_css);

$bundle_js = new Bundle('js/build.js');
$bundle_js
	->set_bundle_key('bundle-blueprint')
	->set_language('javascript')
	->set_meta('dependencies', array('jquery'))
	->add('modernizr', 'js/modernizr-2.5.3.min.js')
	->add('placeholder', 'js/jquery.placeholder.min.js')
	->add('global', 'js/global.js');
	// Add the following line for every file you want bundled.
	// ->add('name', 'js/file.js');
$bundler->push($bundle_js);

