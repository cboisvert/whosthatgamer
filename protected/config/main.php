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
        'application.components.api.*',
        'application.components.api.xbox.*',
        'application.components.api.xbox.includes.*',
        'application.components.api.xbox.includes.classes.*',
        'application.components.api.xbox.includes.cookies.*',
        'application.components.api.xbox.includes.logs.*',
        'application.extensions.YiiMongoDbSuite.*',
        'application.models.db.*',
        'application.models.form.*',
        'application.extensions.yii-mail.*'
	),

	// application components
	'components'=>array(
		'user'=>array(
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl'=>array('/public/index'),
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
            'class'=>'ext.yii-mail.YiiMail',
            'transportType'=>'smtp',
            'transportOptions'=>array(
                'host'=>'mail.indexwebmarketing.com',
                'port'=>587,
                'username'=>'noreply@epasslive.com',
                'password'=>'abdel123',
                'encryption'=>false,
            ),
        ),
        'api'=>array(
        	'class'=>'application.components.api.Wrapper'
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);