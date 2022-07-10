<?php
use Application\Models\User;
use Application\Models\Book;
if (isset($_REQUEST['doGo'])) {
    {
        $idbook = $_REQUEST['idbook'];
        if (empty($idbook) == true){
            exit('ID Книги было пропущено ');
        }

        $iduser = $_REQUEST['iduser'];
        if (empty($iduser) == true){
            exit('ID Ученика был пропущен');
        }


        $check_user = (new User())->checkforbook($iduser);
        if(empty($check_user)){
            exit("У ученика нету книги");
        }

        $check_user2 = (new User())->checkuser($iduser);
        if(empty($check_user2)){
            exit("Ученика не существует");
        }


        $check_book2 = (new Book())->searchid($idbook);
        if(empty($check_book2)){
            exit("Книги не существует");
        }

        $returnbook = (new User())->return_book($iduser, $idbook);
        echo "Книга возвращена в библиотеку";

    }
}




?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
</head>
<body>
<form>
    <p>ID Ученика: <input type="text" name="iduser" size="15" maxlength="30000" id=""><samp style="color:rgba(4,131,146,0.59)">*</samp></p>
    <p>ID Книги: <input type="text" name="idbook" size="15" maxlength="3000000" id=""><samp style="color:#ffffff">*</samp></p>
    <p><input type="submit" value="Дать" name="doGo"></p>
</form>
</body>
</html>
