<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

// NOTE: тут мы подключаем наши стили и скрипты

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    // NOTE: подключаем здесь наш CSS файлик из .../web/css/style.js
    public $css = [
        'css/site.css',
        'css/style.css',
    ];

    // NOTE: подключаем здесь наш JavaScript файлик из .../web/js/scripts.js
    public $js = [
//        'js/scripts.js'
    ];

    // NOTE: меняем расположение нашего скрипта с футера на хедер (см. спеку)
    public $jsOptions = [
//        'position' => View::POS_HEAD
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
