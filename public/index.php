<?php

require_once "../vendor/autoload.php";
require_once '../App/config/routes.php';

use App\Exceptions\MyException;
use App\Exceptions\LayoutRendererException;
use App\Exceptions\TemplateRendererException;
use App\Exceptions\NonIdException;
use App\Session\Session;
use Router\Router;

$session = new Session();
$session->start();

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
    echo $errors->getMessage();
}