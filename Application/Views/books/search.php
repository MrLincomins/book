<?php
use Application\Models\Book;
session_start();
if (isset($_REQUEST['doGo'])) {
    {
        $Name = $_REQUEST['Namebook'];
 }
        if ($result = (new Book())->search(string $Name)) {
            echo "<table><tr><th>Имя</th><th>Автор</th><th>Год</th><th>ISBN</th>><th>Кол-во</th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Author"] . "</td>";
                echo "<td>" . $row["Year"] . "</td>";
                echo "<td>" . $row["ISBN"] . "</td>";
                echo "<td>" . $row["count"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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
    <title>Поиск книги по времени</title>
</head>
<body>
<form>
    <p>Название книги: <input type="text" name="Namebook" id=""></p>
    <p><input type="submit" value="Поиск" name="doGo"></p>
</form>
</body>
</html>