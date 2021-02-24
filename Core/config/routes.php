<?php

use Core\Router;

Router::addNewRoute('^$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^main$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^basket$', ['controller' => 'basket', "action" => "index"]);

Router::addNewRoute('^basket/remove$', ['controller' => 'basket', "action" => "remove"]);
Router::addNewRoute('^basket/order$', ['controller' => 'basket', "action" => "makeOrder"]);
Router::addNewRoute('^basket/setQty$', ['controller' => 'basket', "action" => "setQty"]);

Router::addNewRoute('^login$', ['controller' => 'auth', "action" => "login"]);
Router::addNewRoute('^login/auth$', ['controller' => 'auth', "action" => "authorization"]);

Router::addNewRoute('^user$', ['controller' => 'user', "action" => "index"]);
Router::addNewRoute('^user/logout$', ['controller' => 'user', "action" => "logout"]);
Router::addNewRoute('^user/wish', ['controller' => 'user', "action" => "wish"]);
Router::addNewRoute('^user/removeWish', ['controller' => 'user', "action" => "removeWish"]);
Router::addNewRoute('^user/shopList', ['controller' => 'user', "action" => "shopList"]);

Router::addNewRoute('^register$', ['controller' => 'auth', "action" => "register"]);
Router::addNewRoute('^register/reg$', ['controller' => 'auth', "action" => "checkAndCreateUser"]);

Router::addNewRoute('^product/\d+$', ['controller' => 'product', "action" => "index"]);
Router::addNewRoute('^product/\d+/order$', ['controller' => 'product', "action" => "addProduct"]);

Router::addNewRoute('^catalog$', ['controller' => 'catalog', "action" => "index"]);
Router::addNewRoute('^catalog/addProduct$', ['controller' => 'catalog', "action" => "addProduct"]);
