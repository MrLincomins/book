<?php
session_start();
require_once 'bd.php';
$sql = "SELECT Author, count(*) books_count FROM books GROUP BY Author ORDER BY books_count DESC LIMIT 100";
if ($result = $dbO->query($sql)) {
  echo "<table><tr><th>Авторы</th><th>Количество книг</th></tr>";
  foreach ($result as $row){
    echo "<tr>";
     echo "<td>" . $row["Author"] . "</td>";
     echo "<td>" . $row["books_count"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}



?>
