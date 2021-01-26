<?php

require_once "../autoloader.php";

use classes\Storage;
use classes\renderClass;
use classes\MyException;
use classes\LayoutRendererException;
use classes\TemplateRendererException;
use classes\NonIdException;
use classes\logger\Logger;

$products = require_once __DIR__ . '/../Data/storage.php';

$logger = new Logger();
$logger2 = new Logger('TemplateRendererLogs');

try {
    $pageName = trim($_SERVER['REQUEST_URI'], '/');

    if ($pageName == '') {
        $pageName = 'main';
    }

    $templateName = $pageName . "Template";

    $storage = new Storage($products, $logger);

    $id = 2;

    $contentById = $storage->getProductDataById($id);

    if (!$contentById) {
        throw new MyException('id not found');

    }
        // var_dump($contentById);

    $obj = new renderClass();

    $obj->render($templateName, $pageName, $products);

} catch (LayoutRendererException $errors) {
    $logger2->warning($errors->getMessage(), ["zaglushka"]);
//        echo $errors->getMessage();
} catch (TemplateRendererException $errors) {
    $logger2->warning($errors->getMessage(), ["zaglushka"]);
//        echo $errors->getMessage();
} catch (MyException $errors) {
    $logger->warning($errors->getMessage(), ['id' => $id]);
} catch (NonIdException $errors) {

} catch (Exception $errors) {

}
