<?php

use Router\Router;

Router::addNewRoute('^$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^main$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^basket$', ['controller' => 'basket', "action" => "index"]);

Router::addNewRoute('^login$', ['controller' => 'auth', "action" => "login"]);
Router::addNewRoute('^user$', ['controller' => 'auth', "action" => "user"]);
Router::addNewRoute('^register', ['controller' => 'auth', "action" => "reg"]);

Router::addNewRoute('product/\d+', ['controller' => 'product', "action" => "index"]);
Router::addNewRoute('^catalog$', ['controller' => 'catalog', "action" => "index"]);
