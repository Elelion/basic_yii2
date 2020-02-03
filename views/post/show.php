<h1>Show Action Content</h1>

<?php
  // NOTE: подключаем JS скрипт, только на данной странице
  $this->registerJsFile(
      '@web/js/scripts.js',
      [
//          'depends' => 'yii\web\YiiAsset'
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