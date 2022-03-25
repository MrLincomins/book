<?php
namespace App;
require_once __DIR__ . '/vendor/autoload.php';
use App\bd\bd;
use PDO;

if(isset($_POST['doGo'])){
  $value = $_POST['value'];
  $query = "SELECT * FROM `books` WHERE CONCAT(`newid`, `Name`, `Author`, `Year`, `ISBN`) LIKE '%".$value."%'";
  $search = filterTable($query);
}
else {
}
$dbO = new BD();
$filter = $dbO->query($query);
function filterTable($query){
  $dbO = new BD();
  $filter = $dbO->query($query);
  return $filter;
}
?>
<html>
  <body>
    <form action="experiment.php" method="post">
      <input type="text" name="value" placeholder="Буква"><br><br>
      <input type="submit" name="doGo" value="Фильтр"><br><br>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Author</th>
          <th>Year</th>
          <th>ISBN</th>
        </tr>
        <?php foreach ($filter as $row){ ?>
        <tr>
          <td><?php echo $row['newid']; ?></td>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['Author']; ?></td>
          <td><?php echo $row['Year']; ?></td>
          <td><?php echo $row['ISBN']; ?></td>
        <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
