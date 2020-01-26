<?php

// TODO: создаем MyController и обращаемся к нему .../web/?r=admin/user/index
/*
 * NOTE:
 * мы можем так же обратиться к данному контроллеру так: .../web/?r=admin/user/
 * т.к. дефолтный action index отрабатывается по умолчанию
 */
// NOTE: т.е. мы создаем в папке admin -> контроллер user -> действие index

// NOTE: задаем пространство имен до нашей папки
namespace app\controllers\admin;

use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}