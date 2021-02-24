<?php
require_once '../vendor/autoload.php';
require_once '../Core/config/routes.php';

use Core\Router;
use Niksteklo34\Logger\Logger;
use Core\Exceptions\MyException;
use Core\Exceptions\LayoutRendererException;
use Core\Exceptions\TemplateRendererException;
use Core\Exceptions\NonIdException;
use Core\Exceptions\DbException;
use Core\Session\Authentication;

$log = new Logger('logFile', '../Core/Storage/log');

$authSession = new Authentication();
$authSession->session->start();

try {

    $router = new Router();
    $router->matchRoute();

} catch (LayoutRendererException $errors) {
    $log->warning('Layout not found');
    echo $errors->getMessage();
} catch (TemplateRendererException $errors) {
    $log->warning('Content not found');
    echo $errors->getMessage();
} catch (MyException $errors) {
    $log->warning('Id not found');
    echo $errors->getMessage();
} catch (DbException $errors) {
    $log->warning($errors->getMessage());
    echo $errors->getMessage();
} catch (NonIdException $errors) {
    $log->warning($errors->getMessage());
    echo $errors->getMessage();
} catch (Exception $errors) {
    $log->warning('');
    echo $errors->getMessage();
}