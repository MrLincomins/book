<?php
session_start();
require_once 'bd.php';
if (isset($_REQUEST['doGo'])) {
    if (!$_REQUEST['Author']) {
        print "Вы ввели пустое имя автора";
    }

    {
        $Author = $_REQUEST['Author'];
        if ($result = mysqli_query($db, "SELECT COUNT(*) / COUNT(DISTINCT Year, Author) books_count FROM books GROUP BY Author")) {
            while($row = mysqli_fetch_assoc($result)){
             $num = round($row['books_count']);
             $json_string = '{"Автор":"' . $Author . '","Книг в год":"' . $num . '"}';
             json_encode($json_string, JSON_FORCE_OBJECT );
             $file_name = 'gg.json';
             if(file_put_contents($file_name, $json_string )){
               header ('Location: gg.json');
             }

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
    <title>Сколько книг автор написал в год</title>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
        <p>Полное имя автора: <input type="text" name="Author" id=""></p>
		    <p><input type="submit" value="Поиск" name="doGo"></p>
    </form>
</body>
</html>
