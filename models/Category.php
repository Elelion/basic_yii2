<?php


namespace app\models;

use yii\db\ActiveRecord;

/*
 * NOTE:
 * yii2 автоматически попытается связать Category с таблицей Category, но
 * т.к. у нас таблица называется Categories , то будет ошибка
 * Table 'yii2_basic_courses.category' doesn't exist
 * */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        // NOTE: указываем наше имя таблици
        return 'categories';
    }
}