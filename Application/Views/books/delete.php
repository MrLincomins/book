<?php
use Application\Models\Book;
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status !== 'Админ'){
  header('Location: /login');
  die;
}
foreach ($books as $book):
  $id = $book["newid"];
endforeach;


if (isset($_REQUEST['doGo'])) {
  {
   ?>
    <html lang="ru">
    <body>
      <form>
        Вы точно хотите удалить книгу?
        <p><input type="submit" value="Да" name="doGo3"></p>
     ___________________________________________________________________
      </from>
     </body>
    </html>

    <?php
  }

}



if (isset($_REQUEST['doGo3'])) {
   {
     $books = (new Book())->delete($id);
       echo '<script type="text/javascript">
       window.onload = function () { alert("Данные успешно удалены"); } 
</script>';
       echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/knigi">';
       die();
   }
}

if (isset($_REQUEST['doGo1'])) {
   {
     ?>
     <!DOCTYPE html>
     <html lang="ru">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
     </head>
     <body>
         <?php foreach ($books as $book): ?>
         <form>
             <p>Название книги: <input type="text" name="Name" size="15" maxlength="150" id="" placeholder="<?php echo $book["Name"]?> "><samp style="color:red">*</samp></p>
             <p>Автор: <input type="text" name="Author" size="15" maxlength="150" id="" placeholder="<?php echo $book["Author"]?> "><samp style="color:red">*</samp></p>
             <p>Год: <input type="text" name="Year" size="15" maxlength="20" id="" placeholder="<?php echo $book["Year"]?> "><samp style="color:red"></samp></p>
             <p>Международный стандартный книжный номер(ISBN): <input type="text" name="ISBN" size="15" maxlength="150" id="" placeholder="<?php echo $book["ISBN"]?> "><samp style="color:red">*</samp></p>
             <p>Количество: <input type="text" name="count" size="15" maxlength="150" id="" placeholder="<?php echo $book["count"]?> "><samp style="color:red">*</samp></p>
             <p><input type="submit" value="Изменить" name="doGo2"></p>
           ___________________________________________________________________
         </form>
       <?php endforeach;?>
     </body>
     </html>
     <?php
   }
}
if (isset($_REQUEST['doGo2'])) {
   {
       $Name = $_REQUEST['Name'];
       $Author = $_REQUEST['Author'];
       $Year = $_REQUEST['Year'];
       $ISBN = $_REQUEST['ISBN'];
       $count = $_REQUEST['count'];
       foreach ($books as $book):
       $id = $book["newid"];
       endforeach;
       echo "ID= ",$id, "ISBN = ", $ISBN, "NAME = ", $Name, "AUTHOR = ", $Author, "YEAR = ", $Year, "Count = ", $count;
       $books = (new Book())->edit($Name, $Author, $Year, $ISBN, $id, $count);
   }
}



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Удаление</title>
</head>
<body>
  <?php foreach ($books as $book):?>
  <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>ISBN</th>
            <th>Автор</th>
            <th>Год</th>
            <th>Кол-во</th>
        </tr>
    </thead>
  <tr>
      <td><?php echo $book["newid"]?> </td>
      <td> <?php echo $book["Name"]?> </td>
      <td> <?php echo $book["ISBN"]?> </td>
      <td> <?php echo $book["Author"]?> </td>
      <td> <?php echo $book["Year"]?> </td>
      <td> <?php echo $book["count"]?> </td>
  </tr>
</table>
  <?php endforeach;?>

  <form>
        <p><input type="submit" value="Удалить" name="doGo"></p>
        <p><input type="submit" value="Изменить" name="doGo1"></p>
  </form>

</body>
</html>
<title>Добавление книг в базу данных</title>
