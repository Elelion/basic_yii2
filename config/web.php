<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    /*
     * NOTE:
     * задаяем Ру язык для всего сайта, в том числе и все ошибки валидации
     * будут теперь не на английском а на русском языке
     */
    'language' => 'ru-Ru',

    // FIXME: глобальный способ использовать наш шаблон .../views/layouts/basic
    // 'layout' => 'basic',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'j7aaWl8wfnlleT8TDJtyvh3ITmNBFzx7',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        /*
         * NOTE:
         * По умолчанию заккоментирован, раскоментируем его для включения ЧПУ.
         *
         * 'enablePrettyUrl' => true - включает сам ЧПУ
         *
         * 'showScriptName' => false - отключает отображение самого скрипта,
         * типа index.php и.т.п.
         *
         * 'enableStrictParsing' => false - взаимодействует с rules, которые
         * обрабатывают запросы из адресной строки, и пытается по этому запросу
         * найти соответствующее правило. Если правило НЕ найдено, то
         * обрабатывает по дефолту. Если => true, то по дефолту НЕ чего не
         * отрабатывает, а отрабатывает только по правилам.
         * Требуется крайне редко
         * */

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,

            /*
             * NOTE:
             * Что бы приписать нашим страничкам .html нам нужно добавить
             * лиш одно правило. И данное расширение будет применено ко ВСЕМ
             * страничкам в ЧПУ
             * */
            'suffix' => '.html',

            /*
             * NOTE:
             * задаем правило для главной страници, например в главной страници
             * нам НЕ нужно /index.html
             * */
            'rules' => [
                [
                    // NOTE: pattern - пустой, т.к. это и есть гл.страница
                    'pattern' => '',
                    'route' => 'site/index',
                    'suffix' => ''
                ],
                /*
                 * NOTE:
                 * Т.к. в нашей views/layouts/main.php мы убрали /site/...
                 * то при переходе по страничкам, будет ошибка, что бы
                 * этого не было, нам нужно создать правила перехода
                 * для этого пишем регулярное выражение с переходами
                 *
                 * action - как именованный параметр в регулярных выражениях
                 *
                 * Что бы не писать
                 * '<action:(about|contact|login)>' => 'site/<action>',
                 * т.к. страниц может быть много, мы можем написать
                 * \w+ - означает что могут ийдти любый страници экшенов, что бы
                 * не дописывать в дальнейшем сюда постоянно разные страници т.е.
                 * это некий задел на будующее...
                 * т.е. запись будет вида
                 * <action:\w+>' => 'site/<action>
                 * */
                '<action:(about|contact|login)>' => 'site/<action>',
            ],
        ],
    ],
    'params' => $params,
];

// NOTE: здесь подключается наш Gii
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        /*
         * NOTE:
         * добавляем нужный нам ip адрес, и доступ к Gii с этого ip адреса
         * будет запрещен
         * */
        //'allowedIPs' => ['127.0.0.52'],
    ];
}

return $config;

/*
NOTE:
Важно

например у нас идет правило для всех страниц и мы хотим задать правило
для какой то конкретной страници:

<action:\w+>' => 'site/<action>
'<action:about>' => 'page/about'

то НЕ чего не выйдет, т.к. правила читаются с верху в низ, и наше конкретное
правило затрет правило для всех страниц, грамотнее это сделать так

'<action:about>' => 'page/about'
<action:\w+>' => 'site/<action>

т.е. начало задать конкретное правило, и только потом правило для всех остальных
*/

