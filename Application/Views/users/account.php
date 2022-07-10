<?php
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status === null){
  header('Location: /login');
  die;
}
$iduser = $_COOKIE['iduser'];
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
    <table>
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
    <h2>Взятые из библиотеки книги</h2>
  <div>
    <table>
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
        <tr>
            <td><?php echo $book["Name"]?></td>
            <td><?php echo $book["Author"]?></td>
            <td><?php echo $book["ISBN"]?></td>
            <td><?php echo $book["Year"]?></td>
            <td><?php echo $Date['DATE']?></td>

        </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
  </div>

<?php }?>
</body>
</html>
