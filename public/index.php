<?php

require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

require '../config/routes.php';

$match = $router->match();

require '../elements/layout.php';

if (is_array($match)) {
    $params = $match['params'];
    ob_start();
    require "../template/{$match['target']}.php";
    $pageContent = ob_get_contents();
} else {
    echo "404";
}
