<?php

require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

$match = $router->match();

require '../elements/layout.php';

if (is_array($match)) {
    $params = $match['params'];
    require "../template/{$match['target']}.php";
} else {
    echo "404";
}
