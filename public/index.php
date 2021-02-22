<?php
require_once '../vendor/autoload.php';
use App\Services\UserService;
require_once '../Core/config/routes.php';

use Niksteklo34\mailer\MailTransport\MailTransport;
use Niksteklo34\mailer\MailTransport\Message;
use Niksteklo34\mailer\Render\Render;
use Core\Router;
use Niksteklo34\Logger\Logger;
use Core\Exceptions\MyException;
use Core\Exceptions\LayoutRendererException;
use Core\Exceptions\TemplateRendererException;
use Core\Exceptions\NonIdException;
use Core\Exceptions\DbException;
use Core\Session\Session;

//$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(dirname(__DIR__));
//$dotenv->load();

//$mailTransport = new MailTransport(
//    getenv('MAILER_HOST'),
//    (int) getenv('MAILER_PORT'),
//    getenv('MAILER_USER_EMAIL'),
//    getenv('MAILER_USER_PASSWORD'),
//    'ssl'
//);

//$message = new Message('Hello', 'World', getenv('MAILER_EMAIL_TO'));

//$mailTransport->send($message);

$log = new Logger('logFile', '../Core/Storage/log');

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