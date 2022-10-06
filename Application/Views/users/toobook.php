<?php
use Application\Entities\UserMapper;

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


?>
<html lang="ru_RU">
<body>
<h1>Книги</h1>
<div>
    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>ISBN</th>
            <th>Год</th>
            <th>Кол-во на складе</th>
        </tr>
        </thead>
        <?php /** @var array $books */
        foreach ($books as $book):?>
            <tr>
                <td><?php echo $book["newid"]?></td>
                <td><?php echo $book["Name"]?></td>
                <td><?php echo $book["Author"]?></td>
                <td><?php echo $book["ISBN"]?></td>
                <td><?php echo $book["Year"]?></td>
                <td><?php echo $book["count"]?></td>
                <td><button onclick="document.location='tobook/<?php echo $book["newid"]?>'">Забронировать</button></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
</body>
</html>
