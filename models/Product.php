<?php


namespace app\models;

use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        // NOTE: указываем наше имя таблици
        return 'categories';
    }

    // NOTE: один продукт относиться только к одной категрии, по этому hasOne
    //public function getCategories()
    //{
    //    return $this->hasOne(Category::className(), ['id' => 'parent']);
    //}
}