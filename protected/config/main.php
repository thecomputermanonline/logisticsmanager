<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'LogisticsManager 1.0',
	'theme'=>'blackboot',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.yii-mail.YiiMailMessage',
		'application.modules.bum.models.*',
    'application.modules.bum.components.*',
	'ext.giix-components.*', // giix components
	),

	'modules'=>array(
	'consignment',
	//'auth',
	// Basic User Management module;
    'bum' => array(
        // needs yii-mail extension..

        'install'=>false, // true just for installation mode, on develop or production mode should be set to false
    ),
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		
		'generatorPaths' => array(
			'ext.giix-core', // giix generators
		),

		),
		
	),

	// application components
	'components'=>array(
	 'authManager' => array(
     'class'=>'CDbAuthManager',
        'connectionID'=>'db',
      
    ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'BumWebUser',
        'loginUrl' => array('//bum/users/login'), // required
		),
		
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
		'transportType' => 'php',
			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>'false',
			'urlSuffix'=>'.htm',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=hrdotnet_bumbum',
			'emulatePrepare' => true,
			'username' => 'hrdotnet_logic',
			'password' => 'myjoy=123',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
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