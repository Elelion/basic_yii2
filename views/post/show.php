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
<?//= debug($cats); ?>

<?php
    foreach ($cats as $cat) {
        echo '<ul>';
            echo '<li>' . $cat->title . '</li>';

            // NOTE: применяем отложенную загрузку
            $products = $cat->products;
            foreach ($products as $product) {
                echo '<ul>';
                    echo '<li>' . $product->title . '</li>';
                echo '</ul>';
            }
        echo '</ul>';
    }

    //echo $cats->title;
?>

<?php
  /*
   * NOTE:
   * Данный вид связи называется ленивой загрузкой, и аналогично
   * SELECT * FROM `products` WHERE `parent`=3
   * и выполнится он только на момент $cats->products
   * т.е. если бы мы НЕ выполнили $cats->products, то и наш запрос бы
   * не выполнился то же
   * */
    //echo '<br>' . count($cats->products);
?>

<?php
    // NOTE: для $cats = Category::find()->where('id = 3')->all();
    //echo '<br>' . count($cats[0]->products);
?>

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