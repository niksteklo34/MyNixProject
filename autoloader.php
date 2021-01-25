<?php

spl_autoload_register(function ($class_name) {
        include __DIR__ . "/Core/" . $class_name . '.php';
});
