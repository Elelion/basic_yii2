<?php

// NOTE: если модель НЕ работает с БД, то ее называют с дописыванием Form

namespace app\models;

/*
 * NOTE:
 * что бы yii2 за нас дописал закомментированные св-ва, нужен ActiveRecord
 * а модель мы убираем
 * */

use yii\db\ActiveRecord;
//use yii\base\Model;

/*
 * NOTE:
 * соответственно мы убираем расширение от Модели, и будем расширять данный
 * класс ActiveRecord
 * */

//class TestForm extends Model
class TestForm extends ActiveRecord
{
    public static function tableName()
    {
        // NOTE: указываем наше имя таблици
        return 'posts';
    }

    // NOTE: убираем, т.к. за нас теперь это будет делать ActiveRecord
    //public $name;
    //public $email;
    //public $text;

    public function attributeLabels()
    {
        return [
            'name' => 'Имя (from Model)',
            'email' => 'E-mail (from Model)',
            'text' => 'Текст сообщения (from Model)'
        ];
    }

    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
            ['email', 'email'],

            // NOTE: закоментированные поля, объявит за нас yii2
             ['name', 'string', 'min' => 2, 'tooShort' => 'Слишком коротко'],
             ['name', 'string', 'max' => 5, 'tooLong' => 'Слишком длинно'],
            //['name', 'string', 'length' => [2, 5]],
            //['name', 'myRule'],
            ['text', 'trim']
        ];
    }

    // NOTE: пишем свое правило валидации, но оно backend'овое
    //public function myRule($attr)
    //{
    //    if (!in_array($this->$attr, ['hello', 'world'])) {
    //        $this->addError($attr, 'Wrong!');
    //    }
    //}
}
