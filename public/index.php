<?php

require_once "../vendor/autoload.php";
require_once '../App/config/routes.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use App\Exceptions\MyException;
use App\Exceptions\LayoutRendererException;
use App\Exceptions\TemplateRendererException;
use App\Exceptions\NonIdException;
use App\Session\Session;
use Router\Router;

$log = new Logger('coffezin');
$log->pushHandler(new StreamHandler('../App/storage/log/errorLogs.log', Logger::WARNING));

$session = new Session();
$session->start();

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
} catch (NonIdException $errors) {
    $log->warning('Id not found');
    echo $errors->getMessage();
} catch (Exception $errors) {
    $log->warning('');
    echo $errors->getMessage();
}