<?php
use Application\Models\User;
if (isset($_REQUEST['doGo'])) {

   {
       //Name, Surname, Patronymic, Status, Class
        $Name = $_REQUEST['Name'];
        if (empty($Name) == true){
          exit('Имя было пропущено ');
        }

        $Surname = $_REQUEST['Surname'];
        if (empty($Surname) == true){
          exit('Фамилия была пропущена');
        }

        $Patronymic = $_REQUEST['Patronymic'];
        $Status = $_REQUEST['Status'];
        $Class = $_REQUEST['Class'];
        if (empty($Class) == true){
          exit('Класс был пропущен');
        }

        $Password = $_REQUEST['Password'];
        if (empty($Password) == true){
          exit('Пароль был пропущен');
        }

        $register = (new User())->register($Name, $Surname, $Patronymic, $Status, $Class, $Password);
        echo 'Данные были успешно записаны';

    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление пользователей в бд</title>
</head>
<body>
    <form>
        <p>Имя: <input type="text" name="Name" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p>Фамилия: <input type="text" name="Surname" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p>Отчество: <input type="text" name="Patronymic" size="15" maxlength="30" id=""><samp style="color:red"></samp></p>
        <p>Статус:<select name="Status" size="4" multiple>
        <option selected value="Ученик">Ученик</option>
        <option value="Помощник библиотекаря">Помощник библиотекаря</option>
        <option value="Библиотекарь">Библиотекарь</option>
        <option value="Админ">Админ</option>
        </select></p>
        <p>Класс: <input type="text" name="Class" size="15" maxlength="3" id=""><samp style="color:red">*</samp></p>
        <p>Пароль: <input type="password" name="Password" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p><input type="submit" value="Добавить" name="doGo"></p>
    </form>
</body>
</html>
