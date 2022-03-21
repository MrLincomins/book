<?php
namespace App;
require_once __DIR__ . '/vendor/autoload.php';
use App\bd\bd;
$dbO = new BD();
session_start();

if (isset($_REQUEST['doGo'])) {

   {

        $Name = $_REQUEST['Name'];
        $Author = $_REQUEST['Author'];
        $Year = $_REQUEST['Year'];
        $ISBN = $_REQUEST['ISBN'];

        $dbO->query("INSERT INTO `books` (`Name`, `Author`, `Year`, `ISBN`) VALUES ('" . $Name . "','" . $Author . "','" . $Year . "','" . $ISBN . "')");
        echo 'Данные были успешно записаны';
}
}
if (isset($_SESSION['digit'])) {
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление книг в библиотеку</title>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
        <p>Название книги: <input type="text" name="Name" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Автор: <input type="text" name="Author" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Год: <input type="text" name="Year" size="15" maxlength="20" id=""><samp style="color:red"></samp></p>
        <p>Международный стандартный книжный номер(ISBN): <input type="text" name="ISBN" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p><input type="submit" value="Добавить" name="doGo"></p>
    </form>
</body>
</html>
<title>Добавление книг в базу данных</title>
