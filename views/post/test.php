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
debug(Yii::$app);