<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/vendors/yii-1.1.14/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
define('VENDORS_PATH',dirname(__FILE__).'/vendors');
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
