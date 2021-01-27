<?php

require_once "autoloader.php";

use classes\Storage;
use classes\renderClass;
use classes\exceptions\MyException;
use classes\exceptions\LayoutRendererException;
use classes\exceptions\TemplateRendererException;
use classes\exceptions\NonIdException;
use classes\logger\Logger;

$products = require_once __DIR__ . '/../Data/storage.php';

$logger = new Logger();
$logger2 = new Logger('TemplateRendererLogs');

try {
    // get url string
    $pageName = trim($_SERVER['REQUEST_URI'], '/');

    // url is empty use main page
    if ($pageName == '') {
        $pageName = 'main';
    }

    // name of layout
    $templateName = $pageName . "Template";

    // function for work with storage
    $storage = new Storage($products, $logger);

    $id = 2;

    $contentById = $storage->getProductDataById($id);

    if (!$contentById) {
        throw new MyException('id not found');

    }
        // var_dump($contentById);

    // functions for work with render
    $obj = new renderClass();

    $obj->render($templateName, $pageName, $products);

} catch (LayoutRendererException $errors) {
    $logger2->warning($errors->getMessage(), ["zaglushka"]);
        echo $errors->getMessage();
} catch (TemplateRendererException $errors) {
    $logger2->warning($errors->getMessage(), ["zaglushka"]);
        echo $errors->getMessage();
} catch (MyException $errors) {
    echo $errors->getMessage();
} catch (NonIdException $errors) {
    echo $errors->getMessage();
} catch (Exception $errors) {

}
