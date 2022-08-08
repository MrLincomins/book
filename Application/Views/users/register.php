<?php
use Application\Models\User;

if (isset($_REQUEST['doGo'])) {

   {
       //Name, Surname, Patronymic, Status, Class
        $Name = $_REQUEST['1Name'];
        if (empty($Name) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Имя пропущено"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/register">';
            die();
        }
        }

        $Surname = $_REQUEST['1Surname'];
        if (empty($Surname) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Фамилия пропущена"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/register">';
            die();
        }

        $Patronymic = $_REQUEST['1Patronymic'];
        $Status = $_REQUEST['1Status'];
        $Class = $_REQUEST['1Class'];
        if (empty($Class) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Класс пропущена"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/register">';
            die();
        }


        $Password = $_REQUEST['1Password'];
        if (empty($Password) == true){
            echo '<script type="text/javascript">
       window.onload = function () { alert("Пароль пропущена"); } 
</script>';
            echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/register">';
            die();
        }


        $Hash = crypt($Password, '$6$MVP$1000=DOLLALOVMrlincomDunGeon$');

        $register = (new User())->register($Name, $Surname, $Patronymic, $Status, $Class, $Hash);
echo '<script type="text/javascript">
       window.onload = function () { alert("Данные были успешно записаны"); } 
</script>';
echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/register">';
die();



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
        <p>Имя: <input type="text" name="1Name" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p>Фамилия: <input type="text" name="1Surname" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p>Отчество: <input type="text" name="1Patronymic" size="15" maxlength="30" id=""><samp style="color:red"></samp></p>
        <p>Статус:<select name="1Status" size="2" multiple>
        <option selected value="Ученик">Ученик</option>
        <option value="Админ">Админ</option>
        </select></p>
        <p>Класс: <input type="text" name="1Class" size="15" maxlength="3" id=""><samp style="color:red">*</samp></p>
        <p>Пароль: <input type="password" name="1Password" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
        <p><input type="submit" value="Добавить" name="doGo"></p>
    </form>
</body>
</html>
