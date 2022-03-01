<?php
session_start();
require_once 'bd.php';
if (isset($_REQUEST['doGo'])) {
    if (!$_REQUEST['Author']) {
        print "Вы ввели пустое имя автора";
    }

    {
        $Author = $_REQUEST['Author'];
        if ($result = mysqli_query($db, "SELECT * FROM books WHERE Author LIKE '$Author%'")) {
            while($row = mysqli_fetch_assoc($result)) {
              printf ("Название книги: " . $row['Name'] . "; Автор книги:" . $row['Author'] . "; Год написания книги:" . $row['Year'] . "; ISBN:" . $row['ISBN'] . "<br>");
             }
        }
   }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Поиск книги по ISBN</title>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
        <p>Полное имя автора: <input type="text" name="Author" id=""></p>
		    <p><input type="submit" value="Поиск" name="doGo"></p>
    </form>
</body>
</html>
<title>Поиск книги по автору</title>
