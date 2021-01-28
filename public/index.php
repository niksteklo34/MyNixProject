<?php

require_once "../autoloader.php";
require_once '../App/config/routes.php';

use App\exceptions\MyException;
use App\exceptions\LayoutRendererException;
use App\exceptions\TemplateRendererException;
use App\exceptions\NonIdException;

try {

    $router = new Router();
    $router->matchRoute();

} catch (LayoutRendererException $errors) {
    echo $errors->getMessage();
} catch (TemplateRendererException $errors) {
    echo $errors->getMessage();
} catch (MyException $errors) {
    echo $errors->getMessage();
} catch (NonIdException $errors) {
    echo $errors->getMessage();
} catch (Exception $errors) {

}
