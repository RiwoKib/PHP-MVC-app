<?php

require "Config.php";
require "Controller.php";
require "App.php";
require "DBconn.php";
require "Model.php";


spl_autoload_register(function ($className) {
    $classFile = '../app/models/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});