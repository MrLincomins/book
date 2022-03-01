<?php
$server = 'localhost';
$user = 'root';
$password = 'misterpika20';
$db = 'books_bd';

$db = mysqli_connect($server, $user, $password, $db);
$charset = "utf8";
if(!mysqli_set_charset($db, $charset)){
  print("Ошибка кодировки");
}
if (!$db) {
    echo "Не удалось подключиться к серверу!";
    exit;
}
