<?php

$server = 'localhost';
$user = 'root';
$password = 'misterpika20';
$db = 'books_bd';
$charset = "utf8";

try {
  $dbO = new PDO('mysql:host='. $server .';dbname='. $db .';charset='. $charset .'', $user, $password);
}
catch (PDOException $e) {
  die('Проблема с подключением к бд');
}
