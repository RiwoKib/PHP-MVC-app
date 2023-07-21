<?php

require "Config.php";
require "DBconn.php";
require "Controller.php";
require "Model.php";
require "Helpers.php";
require "App.php";


spl_autoload_register(function ($className) {
    $classFile = '../app/models/' . $className . '.php';
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});