<?php
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status === null){
  header('Location: /login');
  die;
}
$iduser = $_COOKIE['idus'];
$Name = $_COOKIE['Nick'];
$Surname = $_COOKIE['Surname'];
$Patronymic = $_COOKIE['Patronymic'];
$Class = $_COOKIE['Class'];
$Status = $_COOKIE['Status'];

$should = (new User())->checkforbook($iduser);
if(empty($should)){}
else {
    foreach ($should as $id) {
        $books = (new User())->checkbook($id['idbook']);

    }
}
$toobook = (new User())->checktoobook($iduser);
if(empty($toobook)){}
else {
    foreach ($toobook as $id1) {
        $books1 = (new User())->checkbook($id1['idbook']);
    }
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
</head>
<body>
<h1>Личный кабинет</h1>
<div>
    <table border="1">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Статус</th>
                <th>Класс</th>
            </tr>
        </thead>
        <tr>
            <td><?php echo $Name?></td>
            <td><?php echo $Surname?></td>
            <td><?php echo $Patronymic?></td>
            <td><?php echo $Status?></td>
            <td><?php echo $Class?></td>
        </tr>
      </table>
  </div>
<?php if(empty($should)){
}
else{ ?>
    <h2>_________________________________</h2>
    <h3>Книга взятая из библиотеки</h3>
  <div>
    <table border="1">
        <thead>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>ISBN</th>
            <th>Год</th>
            <th>Дата возврата</th>
        </tr>
        </thead>
        <?php foreach($books as $book):?>
        <?php foreach($should as $Date):?>
            <td><?php echo $book["Name"]?></td>
            <td><?php echo $book["Author"]?></td>
            <td><?php echo $book["ISBN"]?></td>
            <td><?php echo $book["Year"]?></td>
            <td><?php echo $Date['DATE']?></td>

        <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
  </div>

<?php }?>

<?php if(empty($toobook)){}
else{ ?>
<h2>_________________________________</h2>
<h3>Забронированая книга</h3>
<div>
    <table border="1">
        <thead>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>ISBN</th>
            <th>Год</th>
            <th>Дата данная пользователю, чтобы забрать книгу</th>
        </tr>
        </thead>
        <?php foreach($books1 as $book1):?>
            <?php foreach($toobook as $DATA):?>
                <td><?php echo $book1["Name"]?></td>
                <td><?php echo $book1["Author"]?></td>
                <td><?php echo $book1["ISBN"]?></td>
                <td><?php echo $book1["Year"]?></td>
                <td><?php echo $DATA['DATE']?></td>

            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>
<?php } ?>
</body>
</html>
