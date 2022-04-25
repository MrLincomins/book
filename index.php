<?php
require_once './vendor/autoload.php';
use App\Core\Router\Router;
use App\Controllers\BookController;
use App\Controllers\AuthorController;
$route = new Router();
$route->route('/', function () {
  $list = (new BookController())->list();
});
$route->route('/add', function () {
$list = (new BookController())->scan();
});

$route->route('/authors/top', function () {
$list = (new AuthorController())->getTop100();
});

$route->route('/authors', function () {
$list = (new AuthorController())->list();
});

$route->route('/books/{id}/edit?', function ($id) {
$list = (new BookController())->edit($id);
});

$route->route('/books/{id}', function ($id) {
$list = (new BookController())->delete($id);
});


$action = $_SERVER['REQUEST_URI'];
$route->dispatch($action);
