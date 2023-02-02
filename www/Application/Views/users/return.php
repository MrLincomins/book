<?php
use Application\Entities\UserMapper;
use Application\Entities\BookRepository;
if (isset($_REQUEST['doGo'])) {
    {
        $idbook = $_REQUEST['idbook'];
        if (empty($idbook) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("ID книги было пропущено"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
            die();
        }

        $iduser = $_REQUEST['iduser'];
        if (empty($iduser) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("ID ученика пропущен"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
            die();
        }



        $check_user = (new UserMapper())->checkforbook($iduser);
        if(empty($check_user)){
            echo '<script type="text/javascript">
       window.onload = function () { alert("У ученика нету книги"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
            die();
        }

        $check_user2 = (new UserMapper())->checkuser($iduser);
        if(empty($check_user2)){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Ученика не существует"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
            die();
        }


        $check_book2 = (new BookRepository())->searchid($idbook);
        if(empty($check_book2)){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Книги не существует"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
            die();
        }

        $returnbook = (new UserMapper())->return_book($iduser, $idbook);
        echo '<script type="text/javascript">
       window.onload = function () { alert("Книга возвращена в библиотеку"); } 
</script>';
        echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/booksreturn">';
        die();

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
