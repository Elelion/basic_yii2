<?php

// TODO: создаем MyController и обращаемся к нему .../web/?r=my/index

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{
    public function actionIndex($id = null)
    {
        $hi = 'hello world';
        $hello = 'HeLlO wOrLd';
        $names = [
            'Ivanov',
            'Petrov',
            'Sidorov'
        ];

        if (empty($id)) {
            $id = 'default test';
        }

        return $this->render('index', compact(
            'hello',
            'names',
            'id'));
    }

    public function actionBlogPost()
    {
        return 'Blog Post';
    }
}