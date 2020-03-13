<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $title
 * @property int $parent
 * @property string $alias
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['parent'], 'integer'],
            [['alias'], 'string'],
            [['title'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'parent' => 'Parent',
            'alias' => 'Alias',
        ];
    }
}

/*
Если в таблице будут связи типа ALTER ... то Gii автоматически создаст эти
связи программно, в виде кода.
Так же связи можно и не создавать в таблице, а можно программно задавать здесь
*/