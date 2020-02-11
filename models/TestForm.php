<?php

// NOTE: если модель НЕ работает с БД, то ее называют с дописыванием Form

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;

    /*
     * NOTE:
     * возвращает массив где ключами будут наши атрибуты name, email, text
     * а значениями будут названия для label'ов, которые мы хотим видить
     * */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя (from Model)',
            'email' => 'E-mail (from Model)',
            'text' => 'Текст сообщения (from Model)'
        ];
    }

    // NOTE: как правило rules - ф-ция по умолчанию, которая задает валидацию
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],

//            ['name', 'string', 'min' => 2, 'tooShort' => 'Слишком коротко'],
//            ['name', 'string', 'max' => 5, 'tooLong' => 'Слишком длинно']
            ['name', 'string', 'length' => [2, 5]],
            ['name', 'myRule'],
            ['text', 'trim']
        ];
    }

    // NOTE: пишем свое правило валидации, но оно backend'овое
    public function myRule($attr)
    {
        if (!in_array($attr, ['hello', 'world'])) {
            $this->addError($attr, 'Wrong!');
    }
    }
}

/*
NOTE:
По сути метод attributeLabels задает label's для соответствующих полей
НО а атрибут в ActiveForm ...->label('Имя') имеет более высокий приоритет
и по этому будет 'затирать' наш метод attributeLabels.
*/

/*
NOTE:
message - позволяет задать текст сообщения для большинства валидаторов
Например:
[['name', 'email'], 'required', 'message' => 'Поле обязательно']

А так мы можем задать минимальную длинну поля:
['name', 'string', 'min' => 2]

А так мы задаем текст ошибки при минимальной или максимальной длинне
'tooShort' => 'Слишком коротко' / 'tooLong' => 'Слишком длинно'
для min / max

trim - обрезать пробелы в начале и в конце строки
*/