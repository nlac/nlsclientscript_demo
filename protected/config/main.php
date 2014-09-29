<?php

// Alias for "nlac" namespace - not needed any more cus of autoload
//Yii::setPathOfAlias('nlac', __DIR__ . '/../../vendor/nlac/nlsclientscript/src/nlac');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'NLSClientScript demo',
	
	'theme'=>'bootstrap-nlac',
	
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.components.*',
	),

	// application components
	'components'=>array(

		'clientScript' => @$_GET['nonls'] ? array('class'=>'CClientScript') : array(
			//'class' => 'ext.nlac.nlsclientscript.NLSClientScript',
			'class' => 'nlac\NLSClientScript',
			'appVersion' => '1.0',
			'mergeAbove' => 0,
			//'includePattern' => '/prevent_reloading_only_this_pattern/',
			//'excludePattern' => '/allow_reload_this_pattern/i',
			
			'mergeJs' => true,
			//'mergeJsIncludePattern' => '/only_merge_this_pattern/i',
			//'mergeJsExcludePattern' => '/no_merge_this_pattern/i',
			'compressMergedJs' => false,
			'forceMergeJs' => false,//only for debugging
			'mergeIfXhr' => false,//if true: attempt to merge scripts pulled by ajax-requested partials

			'mergeCss' => true,
			//'mergeCssIncludePattern' => '/only_merge_this_pattern/i',
			//'mergeCssExcludePattern' => '/no_merge_this_pattern/i',
			'downloadCssResources' => true,
			'compressMergedCss' => false,
			'forceMergeCss' => false,
		),


		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'' => 'site/index',
				'contact' => 'site/contact',
				'<view:([-\w]+)>' => 'site/page'
			)
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);