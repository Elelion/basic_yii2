<!-- TODO: создаем view для нашего MyController -->

<?php
// NOTE: создаем PHPdoc, что бы PHPStorm НЕ ругался
/** @var TYPE_NAME $hello */
/** @var TYPE_NAME $id */
?>

<h1>Action Index</h1>
<?php

// NOTE: выводим нашу переменную $hello
echo '<b> $hello var: </b><br>';
echo $hello;

echo '<hr>';

// NOTE: выводим наш массив $names
echo '<b> $names array: </b><br>';
foreach ($names as $name) {
    echo $name . '<br>';
}

echo '<hr>';

/*
 * NOTE:
 * выводим наш $id полученные из URL, т.е. если в URL вписать:
 * .../web/?r=my/index&id=test то выведиться test
 */
echo $id;