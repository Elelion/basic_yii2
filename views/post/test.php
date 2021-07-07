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
