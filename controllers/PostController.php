<?php
/*
NOTE:
Создадим контроллер, который будет наследоваться от нашего нового контроллера
AppController
 * */

namespace app\controllers;

// NOTE: use yii\web\Controller; - не нужно т.к. контроллеры находятся рядом
use Yii;

class PostController extends AppController
{
    // NOTE: обращаемся по такому адресу: .../web/?r=post/test
    public function actionTest()
    {
        $names = [
            'Ivanov',
            'Petrov',
            'Sidorov'
        ];

//        $this->debug(Yii::$app);
        return $this->render('test');
    }

    // NOTE: создаем action где более 1го слова в названии
    // NOTE: обращаемся по такому адресу: .../web/?r=my/blog-post
    public function actionBlogPost()
    {
        return 'Blog Post';
    }
}