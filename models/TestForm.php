<?php

// NOTE: если модель НЕ работает с БД, то ее называют с дописыванием Form

namespace app\models;

use yii\base\Model;

class TestForm extends Model
{
    public $name;
    public $email;
    public $text;
}