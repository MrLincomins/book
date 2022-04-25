<?php
namespace App;
require_once __DIR__ . '/vendor/autoload.php';
use App\bd\bd;
$dbO = new BD();
session_start();
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
