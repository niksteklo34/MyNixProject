<?php

//  Подключение автозагрузчика
require_once "../autoloader.php";

// Подключения файла(бд) с данными
$products = require_once __DIR__ . '/../Data/storage.php';

// Подготовка строки запроса
$pageName = trim($_SERVER['REQUEST_URI'], '/');

// Если строка запроса пуста - установить значение main
if ($pageName == '') {
    $pageName = 'main';
}

// Установка значения для подключения контента страницы
$templateName = $pageName . "Template";

$obj = new renderClass();

$obj->render($templateName, $pageName, $products);
