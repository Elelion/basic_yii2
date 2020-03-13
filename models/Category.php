<?php


namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}


/*
NOTE:
Для того что бы не создавать подобные модели в ручную, нам может помочь Gii
Для того что бы попасть в него, нужно прописать
.../web/index.php?r=gii

НО т.к. у нас уже включен ЧПУ и добавлены в шаблонах окончания *.html,
то нужно прописать просто
.../web/gii.html

Gii нужен для генерации моделей, что бы не писать их самому.
*/

/*
NOTE:
Как пользоваться ?
Заходим в Gii и ждем - Model Generator
Затем выбираем нужную нам таблицу (Gii сам сформирует и выдаст список всех
существующих таблиц, которые имеются в подключенной БД (из db.php)) и
жмем на Preview -> Generate
После чего соответсвующая модель добавиться в папку ./models/

Создадим например модель - categories
*/
