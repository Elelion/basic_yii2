<?php

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    // NOTE: создаем ф-цию для вывода массива
    public function debug($arr)
    {
        // NOTE: true - для вывода в читабельном виде
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}

/*
NOTE:
Если мы наследуем прочие классы от AppController, то в наследуемом классе будут
доступны все методы, что мы объявляем здесь.
 * */

/**/

// NOTE: lifehack - так мы создаем глобальную ф-цию, которая будет видна в view
function debug ($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}