<?php

namespace Router;

use App\Exceptions\TemplateRendererException;
use App\Exceptions\LayoutRendererException;
use App\tools\logger\Logger;

class Router
{
    public static array $route = [];
    public static array $routes = [];
    const MAIN_ACTION = 'index';

    public static function getUrlString() {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public static function addNewRoute(string $regexp, array $value) {
        self::$routes[$regexp] = $value;
    }

    public static function checkRoute(string $uri) {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#$pattern#", $uri, $neutral)) {
                foreach ($neutral as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = self::MAIN_ACTION;
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public function matchRoute() {
        $logger = new Logger('TemplateRendererLogs');
        if (self::checkRoute(self::getUrlString())) {
            $controllerName = ucfirst(self::$route['controller']) . "Controller";
            $actionName = ucfirst(self::$route['action']);
            $strNameSpace = "Controllers\\$controllerName";
            if (class_exists($strNameSpace)) {
                $object = new $strNameSpace(self::$route);
                $object->$actionName();
            } else {
                $logger->warning("Content not found", ["Route for: \"" . self::getUrlString() . "\" not found(Template)"]);
                throw new TemplateRendererException('Content not found');
            }
        } else {
            $logger->warning("Layout not found", ["Route for: \"" . self::getUrlString() . "\" not found(Layout)"]);
            throw new LayoutRendererException('Layout of not found');
        }
    }

}