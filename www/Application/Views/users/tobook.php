<?php
use Application\Entities\UserMapper;
use Application\Entities\BookRepository;
$Status = (new UserMapper())->CheckLogin();
if(empty($Status)) {
    header('Location: /login');
    die;
}

$iduser = $_REQUEST["idus"];
$bgts = (new UserMapper())->checkforbook($iduser);
if(empty($bgts)){}
else{
    echo '<script type="text/javascript">
       window.onload = function () { alert("У вас уже есть книга на руках, пожалуйста сдайте её в библиотеку"); } 
</script>';
    echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/main">';
    die();
}
$toobook = (new UserMapper())->checktoobook($iduser);
if(empty($toobook)){}
else {
    echo '<script type="text/javascript">
       window.onload = function () { alert("У вас уже есть забронированая книга"); } 
</script>';
    echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/main">';
    die();
}


foreach ($books as $book):
    $idbook = $book["newid"];
endforeach;
$iduser = $_REQUEST["idus"];
$DATE0  = mktime(0, 0, 0, date("m")  , date("d")+2, date("Y"));
$DATE =  strftime("%Y-%m-%d", $DATE0);

if (isset($_REQUEST['doGo'])) {
    {
        ?>
        <html lang="ru">
        <body>
        <form>

            Вы точно хотите забронировать книгу>?
            <p><input type="submit" value="Да" name="doGo2"></p>
            ___________________________________________________________________
        </from>
        </body>
        </html>

        <?php
    }

}

if (isset($_REQUEST['doGo2'])) {
    {
        $books = (new UserMapper())->toobook($idbook, $iduser, $DATE);
        echo '<script type="text/javascript">
       window.onload = function () { alert("Данная книга успешно забронирована"); } 
</script>';
        echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/knigi">';
        die();
    }
}

if (isset($_REQUEST['doGo1'])) {
    {
        echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/toobook">';
        die();
    }
}



?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Бронь книги</title>
</head>
<body>
<?php foreach ($books as $book):?>

    <table border="1">
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
 Забронировать книгу?
<form>
    <p><input type="submit" value="Да" name="doGo"></p>
    <p><input type="submit" value="Нет" name="doGo1"></p>
</form>
</body>
</html>