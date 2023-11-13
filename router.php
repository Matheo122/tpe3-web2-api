<?php
require_once 'libs/router.php';
require_once './app/controllers/products.controller.php';

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
// recurso solicitado
$resource = $_GET["resource"];
// método utilizado
$method = $_SERVER["REQUEST_METHOD"];
// instancia el router
$router = new Router();

                //    ENDPOINT, VERBO, Controller,     METODO
$router->addRoute("products", "GET", "Controller", "getAll");
$router->addRoute("products/:ID", "GET", "Controller", "getProductById");
$router->addRoute("productss/:ID", "GET", "Controller", "getProductByPag");

$router->addRoute("products/:ID", "PUT", "Controller", "updateProducts");
$router->addRoute("products/:ID", "DELETE", "Controller", "deleteProduct");

$router->route($resource, $method);
