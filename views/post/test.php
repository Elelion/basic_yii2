<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>

<div class="alert alert-primary" role="alert">
  A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>

<?php
if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?= Yii::$app->session->getFlash('success'); ?>
  </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?= Yii::$app->session->getFlash('error'); ?>
  </div>
<?php endif; ?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]) ?>
<?= $form->field($model, 'name')->label('Имя (from View)') ?>
<?= $form->field($model, 'email')->input('email') ?>

<!-- NOTE: вставляем наше расширение -->
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>

<?= $form->field($model, 'text')
        ->label('Текст сообщения (from View)')
        ->textarea(['rows' => 10]) ?>

<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>


<?php
/*
NOTE:
https://www.yiiframework.com/extension/yiisoft/yii2-jui
от сюда мы можем скачивать любое нужное нам расширение под конкретные задачи.

Установка в автоматическом режиме более простая, нежели установка расширения
в ручную. И если есть возможность установки через консоль, нужно устанавливать
именно через нее.

Например ищем расширение
JUI Extension for Yii 2 - JQ календарик

А в описании копируем его установку , далее переходим в нашу корневую папку
проекта, и устанавливаем через композер
php composer.phar require --prefer-dist yiisoft/yii2-jui

но будет ошибка, т.к. нужно удалить лишнее...
composer require --prefer-dist yiisoft/yii2-jui

WARNING! если будет ошибка git API - нужно просто авторизоваться в гит хабе...

для использования расширения копируем код из USAGE
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>

Язык календаря будет таким, какой язык мы установили в config/web.php->language
*/
?>