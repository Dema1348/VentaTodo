<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'compile_dir' => Kohana::$cache_dir . '/kodwoo/render', // default compilation dir
	'cache_dir' => Kohana::$cache_dir . '/kodwoo/cache', // default cache dir

	'default' => array ( // these settings can vary within the same application
		'auto_escape' => false,	// configured default
		'extension' => 'html',	// customary extension
	),
);
