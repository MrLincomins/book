<?php
use App\Models\Book;
if (isset($_REQUEST['doGo'])) {

   {

        $Name = $_REQUEST['Name'];
        $Author = $_REQUEST['Author'];
        $Year = $_REQUEST['Year'];
        $ISBN = $_REQUEST['ISBN'];
        $edit = (new Book())->edit($id, $Name, $Author, $Year, $ISBN);
        echo 'Данные были успешно записаны они были изменены на: ';
        echo "<br/> Название книги: ", $Name;
        echo "<br/> Автор: ", $Author;
        echo "<br/> Год написания: ", $Year;
        echo "<br/> ISBN: ", $ISBN;
   }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование книги</title>
</head>
<body>
    <form action="http://localhost:8080/books/<?php echo $id; ?>/edit" method="post">
        <p>Название книги: <input type="text" name="Name" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Автор: <input type="text" name="Author" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Год: <input type="text" name="Year" size="15" maxlength="20" id=""><samp style="color:red"></samp></p>
        <p>Международный стандартный книжный номер(ISBN): <input type="text" name="ISBN" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p><input type="submit" value="Редактировать" name="doGo"></p>
    </form>
</body>
</html>
