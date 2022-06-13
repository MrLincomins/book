<?php
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status === null){
  header('Location: /login');
  die;
}
$Name = $_COOKIE['Nick'];
$Surname = $_COOKIE['Surname'];
$Patronymic = $_COOKIE['Patronymic'];
$Class = $_COOKIE['Class'];
$Status = $_COOKIE['Status'];
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
</body>
</html>
