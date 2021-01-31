<?php


Router::addNewRoute('^$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^main$', ['controller' => 'main', "action" => "index"]);
Router::addNewRoute('^basket$', ['controller' => 'basket', "action" => "index"]);
Router::addNewRoute('^login$', ['controller' => 'login', "action" => "index"]);
Router::addNewRoute('^product$', ['controller' => 'product', "action" => "index"]);
Router::addNewRoute('^catalog$', ['controller' => 'catalog', "action" => "index"]);
Router::addNewRoute('^user$', ['controller' => 'user', "action" => "index"]);
Router::addNewRoute('^register', ['controller' => 'register', "action" => "index"]);