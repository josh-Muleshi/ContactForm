<?php

$router->map('GET', '/', 'home', 'home');
$router->map('GET', '/add', 'add', 'add');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');