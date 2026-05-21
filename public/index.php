<?php

session_start();

require_once '../vendor/autoload.php';

define(
    'BASEURL',
    'http://localhost/mvc_mahasiswa/public'
);

require_once '../core/Controller.php';
require_once '../core/Database.php';
require_once '../core/Router.php';

$router = new Router();

$router->run();
