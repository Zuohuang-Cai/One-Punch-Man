<?php

require "../vendor/autoload.php";

use Helpers\ZepHyr;

$ZepHyr = new ZepHyr();
$arrayUrl = explode("/", $_SERVER['REQUEST_URI']);
$controller = $arrayUrl[1] === null || $arrayUrl[1] === "" ? "home" : $arrayUrl[1];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $method = $arrayUrl[2] ?? 'index';
} else {
    $method = ($arrayUrl[2] ?? 'index') . "Post";
}
$method = parse_url($method)["path"];
$controllerInstance = null;
$controllerpath = "Controllers\\" . ucfirst($controller) . "Controller";
if (class_exists($controllerpath, true) && method_exists($controllerpath, $method)) {
    $controllerInstance = new $controllerpath($ZepHyr);
    $controllerInstance->$method();
} else {
    $ZepHyr->error("404.twig", ["message" => "404 - Page not found"]);
}
