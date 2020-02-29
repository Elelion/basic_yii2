<?php

/*
 * NOTE:
 * этот файл - точка входа, следовательно...
 * в этом файле мы будем подключать наши различные ф-ции и.т.п.
 * */

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

// NOTE: вот тут, мы поключаем наш файл с ф-циями, что будут глобальными
require __DIR__ . '/../functions.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
