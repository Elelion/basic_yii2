<?php
use app\components\MyWidget;
?>

<?php /** @var TYPE_NAME $cats */ ?>

<?php $this->beginBlock('block1'); ?>
    <h1>show.php -> block1</h1>
    <p>example block text</p>
<?php $this->endBlock(); ?>

<h1>Show Action Content</h1>

<hr>
<?php echo MyWidget::widget(['name' => 'Вася']); ?>

<?php MyWidget::begin() ?>
  <h1>контент -> show.php -> MyWidget::begin</h1>
<?php MyWidget::end() ?>

<hr>

<?php
    foreach ($cats as $cat) {
        echo '<ul>';
            echo '<li>' . $cat->title . '</li>';

            $products = $cat->products;
            foreach ($products as $product) {
                echo '<ul>';
                    echo '<li>' . $product->title . '</li>';
                echo '</ul>';
            }
        echo '</ul>';
    }
?>

<?php
  $this->registerJsFile(
      '@web/js/scripts.js',
      [
          'depends' => 'yii\web\YiiAsset'
      ]
  );
?>
