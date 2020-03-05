<?php

/*
 * NOTE:
 * Виджет - это какой либо элемент сайта, который можно повторно использовать
 * например элементы меню, хедера и.т.п.
 * */

/*
 * NOTE:
 * создаем в корне проекта отдельную папку, которую называем components
 * в ней будут лежать наши дальнейшие виджеты
 * */

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();

        if ($this->name === null) {
            $this->name = 'Гость';
        }

        ob_start();
    }

    public function  run()
    {
        $content = ob_get_clean();
        $content = mb_strtoupper($content);

        return $this->render('my', [
            'name' => $this->name,
            'content' => $content
        ]);
    }
}
