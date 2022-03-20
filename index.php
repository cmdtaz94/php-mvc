<?php

session_start();

error_reporting(E_ALL);

$controllerFiles = glob(__DIR__ . '/controllers/*.php');
foreach ($controllerFiles as $controllerFile) {
    require_once($controllerFile);
}

require_once __DIR__ . '/helper.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriComponents = explode('/php-mvc/index.php', $uri);
$pathFound = false;

if ('' == $uriComponents[1] && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $pathFound = true;
    $authController = new AuthController();
    $authController->getLoginForm();
}

if ('/post-login' == $uriComponents[1] && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $pathFound = true;
    $authController = new AuthController();
    $authController->postLoginForm();
}

if (!$pathFound) {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
