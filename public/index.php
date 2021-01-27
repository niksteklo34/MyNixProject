<?php

require_once "../autoloader.php";

use App\models\Storage;
use App\tools\renderClass;
use App\exceptions\MyException;
use App\exceptions\LayoutRendererException;
use App\exceptions\TemplateRendererException;
use App\exceptions\NonIdException;
use App\tools\logger\Logger;

$products = require_once __DIR__ . '/../App/models/products.php';

$logger = new Logger();
$logger2 = new Logger('TemplateRendererLogs');

// get url string
$pageName = trim($_SERVER['REQUEST_URI'], '/');

try {

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
