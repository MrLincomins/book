<?php
use Application\Models\Book;
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status !== 'Админ'){
  header('Location: /login');
  die;
}
if (isset($_REQUEST['doGo2'])) {
   {
       $Name = $_REQUEST['Name'];
       $Author = $_REQUEST['Author'];
       $Year = $_REQUEST['Year'];
       $ISBN = $_REQUEST['ISBN'];
       foreach ($books as $book):
       $id = $book["newid"];
       endforeach;
       echo "ID= ",$id, "ISBN = ", $ISBN, "NAME = ", $Name, "AUTHOR = ", $Author, "YEAR = ", $Year;
       $books = (new Book())->edit($Name, $Author, $Year, $ISBN, $id);


   }
}

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
        <p><input type="submit" value="Изменить" name="doGo2"></p>
    </form>
  <?php endforeach;?>
</body>
</html>
