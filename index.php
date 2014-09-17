<?php
require_once(__DIR__ . '/vendor/autoload.php');

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once(__DIR__ . '/vendor/yiisoft/yii/framework/yii.php');

Yii::createWebApplication(__DIR__ . '/protected/config/main.php')->run();