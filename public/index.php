<?php

require $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

$router = new core\Router();

$router->add('/', 'HomeController@index');
$router->add('/login', 'UserController@login');
$router->add('/logout', 'UserController@logout');
$router->add('/add_book', 'BookController@addBook');
$router->add('/update_book', 'BookController@updateBook');
$router->add('/delete_book', 'BookController@deleteBook');

$router->dispatch($_SERVER['REQUEST_URI']);
