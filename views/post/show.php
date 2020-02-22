<?php /** @var TYPE_NAME $cats */ ?>

<!--
NOTE:
Блоки позволяют "записывать" контент в одном месте, а показывать в другом.
Они часто используются совместно с шаблонами. Например, вы определяете
(записываете) блок в виде и отображаете его в шаблоне.

Для определения блока вызываются методы beginBlock() и endBlock().
После определения, блок доступен через $view->blocks[$blockID],
где $blockID - это уникальный ID, который вы присваиваете блоку в
начале определения.
-->

<?php $this->beginBlock('block1'); ?>
    <h1>show.php -> block1</h1>
    <p>example block text</p>
<?php $this->endBlock(); ?>

<h1>Show Action Content</h1>

<!-- NOTE: выводим дамп нашей таблици -->
<?= debug($cats); ?>

<?php
  // NOTE: подключаем JS скрипт, только на данной странице
  $this->registerJsFile(
      '@web/js/scripts.js',
      [
          'depends' => 'yii\web\YiiAsset'
      ]
  );

?>

<!--
NOTE: registerJsFile
Для подключения файла только на текущей странице: $this->registerJsFile('');
• Первый параметр указывает где находиться данный файл
• @web - приведет нас в папку /web/
• 'depends' => 'yii\web\YiiAsset' - задаем, что сначала подкл. библиотека JQ,
а только потом, будет выполнен наш JQ скрипт, но в последних версиях yii2,
это уже сделано по умолчанию...
-->

<!--
NOTE: ajax scripts, look there:
https://www.yiiframework.com/wiki/665/overcoming-removal-of-client-helpers-e-g-ajaxlink-and-clientscript-in-yii-2-0
-->