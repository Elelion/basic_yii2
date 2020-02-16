<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test Action</h1>

<?php
/*
 * NOTE:
 * вызываем нашу глобальную ф-цию из AppController, и передаем в нее наш
 * глобальный Yii::$app
 * */
//\app\controllers\debug(Yii::$app);

/*
 * NOTE:
 * вызываем нашу глобальную ф-цию из глобального файла ./functions.php
 * что находиться в корне проекта
 * */
//debug(Yii::$app);
//debug($model);
?>
<div class="alert alert-primary" role="alert">
  A simple primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
</div>

<?php
/*
 * NOTE:
 * hasFlash(key) - проверяет есть ли указанный флеш (сессия)
 * getFlash(key) - возвращает значение из флеша(сессии) по указанному ключу
 */
if (Yii::$app->session->hasFlash('success')): ?>
  <!-- NOTE: вставляем код из спеки бутстрапа -->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?= Yii::$app->session->getFlash('success'); ?>
  </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
  <!-- NOTE: bootstrap layout -->
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <?= Yii::$app->session->getFlash('error'); ?>
  </div>
<?php endif; ?>

<!-- NOTE: создаем форму, импользуя ActiveForm & ActiveField -->
<?php $form = ActiveForm::begin(['options' => ['id' => 'testForm']]) ?>
<?= $form->field($model, 'name')->label('Имя (from View)') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')
        ->label('Текст сообщения (from View)')
        ->textarea(['rows' => 10]) ?>

<?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>

<!--
NOTE:
activeForm - позволяет начать создание формы
activeField - позволяет настроить поля нашей формы
Html - это хелпер HTML, нужен для создания HTML элементов (кнопка, и.т.п.)
-->

<!--
NOTE:
$form = ActiveForm::begin() - объявляем начало создание формы
ActiveForm::end() - закрываем нашу форму
-->

<!--
NOTE:
• $form->field() - принимает три параметра
1. - модель
2. атрибут данной модели, т.е. имя поля которое мы создаем
Например:
$form->field($model, 'text') - создаст input + label

• ...->label('Имя') - для создания label, которому будет присвоино наше название
• ...->textarea() - создание текстового поля
• ...->passwordInput() - задаем поле как для ввода пароля, под ****
• ...->input('email') - задает поле как поле для ввода eMail's

и.т.п. методы, см. в офф. доке
https://www.yiiframework.com/doc/api/2.0/yii-widgets-activefield
-->

<!--
NOTE:
Html::submitButton() - создаст кнопку, где первый параметр принимает
надпись на кнопке, а вторым - массив опций
-->

<!--
NOTE:
Все эти формы нужны так же для того, что бы проверять ошибки валидации и.т.п.
не только на стороне сервера но и на стороне клиента
-->