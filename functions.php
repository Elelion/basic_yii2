<?php
// NOTE: создаем ф-цию для вывода массива
function debug($arr)
{
    // NOTE: true - для вывода в читабельном виде
    echo '<pre>' . print_r($arr, true) . '</pre>';
}