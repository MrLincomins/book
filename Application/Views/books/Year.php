<?php
use Application\Models\Book;
session_start();
if (isset($_REQUEST['doGo'])) {
    if (!$_REQUEST['Year1']) {
  }
   if (!$_REQUEST['Year2']) {
  }
  {
    $Year1 = $_REQUEST['Year1'];
    $Year2 = $_REQUEST['Year2'];
    if (empty($Year1) == true){
              $Year1 = 0;
    }
    if (empty($Year2) == true){
              $Year2 = 9999;
    }
    if ($result = $Year =(new Book())->byYear($Year1, $Year2)) {
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
        <p>Время (ОТ): <input type="text" name="Year1" id=""></p>
        <p>Время (ДО): <input type="text" name="Year2" id=""></p>
		    <p><input type="submit" value="Поиск" name="doGo"></p>
    </form>
</body>
</html>
