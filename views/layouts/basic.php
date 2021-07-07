<?php

/*
 * NOTE:
 * подключаем наш файл с настройками стилей, скриптов (копируем из
 * шаблона main.php. Т.е. эти подключения должен содержать любой шаблон, иначе
 * ни стили ни скрипты не подключаться
 * */
use app\assets\AppAsset;
use yii\helpers\Html;

/** @var TYPE_NAME $content */

/*
 * NOTE:
 * Для использования комплекта ресурсов, зарегистрируйте его в представлении
 * вызвав метод yii\web\AssetBundle::register(). Например, комплект ресурсов
 * в представлении может быть зарегистрирован следующим образом:
 * • AppAsset::register($this);
 * где, • $this - представляет собой объект представления
 * */
AppAsset::register($this);
?>

<!-- NOTE: создаем наш собственный шаблон -->

<!-- NOTE: устанавливаем соответствующие метки (см. основной шаблон) -->
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- NOTE: делаем динамический title -->
  <title><?= $this->title ?></title>
  <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <!--
    NOTE:
    добавляем верстку bootstrap от сюда
    https://getbootstrap.com/docs/4.4/components/navs/#tabs
    -->
    <div class="wrap">
      <div class="container">
        <ul class="nav nav-pills">
          <li class="nav-item presentation">
              <?= Html::a('Главная страница',
                  'http://localhost/yii2/basic_courses/web/',
                  ['class' => 'nav-link active']) ?>
          </li>
          <li class="nav-item presentation">
              <?= Html::a('Статьи', ['post/index'],
                  ['class' => 'nav-link active']) ?>
          </li>
          <li class="nav-item presentation">
              <?= Html::a('Статья', ['post/show'],
                  ['class' => 'nav-link active']) ?>
          </li>
        </ul>

        <!-- NOTE: выводим наш блок из представления -->
        <?php //debug($this->blocks) ?>

        <!-- NOTE: данный блок будет выведен только для view -> show.php -->
        <?php if (isset($this->blocks['block1'])): ?>
        <?= $this->blocks['block1']; ?>
        <?php endif; ?>

        <!-- NOTE: выводим контент -> .../views/post/show.php -->
        <?= $content ?>
      </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!--
NOTE:
• Html::a - создает гипер ссылку, где:
public static string a ( $text, $url = null, $options = [] )
Подробнее, тут - https://www.yiiframework.com/doc/api/2.0/yii-helpers-basehtml#a()-detail

• Html::a('Статьи', ['post/index']... - ведет на контроллер post, и действие index
т.е. в массиве задаются переходы на контроллеры и виды
-->