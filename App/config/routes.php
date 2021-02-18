<?php

use Router\Router;

Router::addNewRoute('^$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^main$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^basket$', ['controller' => 'basket', "action" => "index"]);
Router::addNewRoute('^basket/remove$', ['controller' => 'basket', "action" => "remove"]);
Router::addNewRoute('^basket/order$', ['controller' => 'basket', "action" => "makeOrder"]);

Router::addNewRoute('^login$', ['controller' => 'auth', "action" => "login"]);
Router::addNewRoute('^login/auth$', ['controller' => 'auth', "action" => "authorization"]);
Router::addNewRoute('^user$', ['controller' => 'auth', "action" => "user"]);
Router::addNewRoute('^user/logout$', ['controller' => 'auth', "action" => "logout"]);
Router::addNewRoute('^register$', ['controller' => 'auth', "action" => "reg"]);
Router::addNewRoute('^register/reg$', ['controller' => 'auth', "action" => "registration"]);

Router::addNewRoute('^product/\d+$', ['controller' => 'product', "action" => "index"]);
Router::addNewRoute('^product/\d+/order$', ['controller' => 'product', "action" => "addProduct"]);
Router::addNewRoute('^catalog$', ['controller' => 'catalog', "action" => "index"]);
Router::addNewRoute('^catalog/addProduct$', ['controller' => 'catalog', "action" => "addProduct"]);
