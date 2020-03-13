<?php

/*
 * NOTE:
 * этот файл - точка входа, следовательно...
 * в этом файле мы будем подключать наши различные ф-ции и.т.п.
 * */

/*
 * NOTE:
 * Следующие 2 строки отвечают за отладочную панель с низу, их необходимо
 * закомментировать, если мы разварачиваем наш проект на продакшен
 * Так же если мы закомментируем эти 2 строчки, то модуль Gii нам так же
 * будет НЕ доступен.
 * */
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

// NOTE: вот тут, мы поключаем наш файл с ф-циями, что будут глобальными
require __DIR__ . '/../functions.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
