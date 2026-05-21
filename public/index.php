<?php

define('BASEURL', 'http://localhost/mvc_mahasiswa/public');

require_once '../config/database.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';

$url = rtrim($url, '/');
$url = explode('/', $url);

$controller = ucfirst($url[0]) . 'Controller';
$method = isset($url[1]) ? $url[1] : 'index';

echo "<h2>Router MVC Sederhana</h2>";
echo "Controller : " . $controller . "<br>";
echo "Method : " . $method . "<br>";

if (isset($url[2])) {
    echo "Parameter : " . $url[2];
}
