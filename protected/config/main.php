<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Whosthatgamer',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.extensions.YiiMongoDbSuite.*',
        'application.models.db.*',
        'application.models.form.*',
        'application.extensions.yii-mail.*'
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
                '' => '/public/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'public/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, info',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace',
                    'categories'=>'application',
                ),

			),
		),
        'mongodb' => array(
            'class'            => 'EMongoDB',
            'connectionString' => 'mongodb://whosthat:123456@dharma.mongohq.com:10010/whosthatdb',
            'dbName'           => 'whosthatdb',
            'fsyncFlag'        => true,
            'safeFlag'         => true,
            'useCursor'        => false
        ),
        'mail'=>array(
            'class'=>'application.extensions.yii-mail.YiiMail',
            'viewPath'=>'application.views.mail',
            'transportType'=>'smtp',
            'transportOptions'=>array(
                'host'=>'mail.indexwebmarketing.com',
                'port'=>25,
                'username'=>'epasslive@indexwebmarketing.com',
                'password'=>'devdev',
                'encryption'=>false,
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