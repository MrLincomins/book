<?php
use Application\Models\CD;
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status !== 'Админ'){
  header('Location: /login');
  die;
}
if (isset($_REQUEST['doGo'])) {

   {

        $Name = $_REQUEST['Name'];
        $Author = $_REQUEST['Author'];
        $Code = $_REQUEST['Code'];
        $Description = $_REQUEST['Description'];
        $add = (new CD())->add($Name, $Author, $Code, $Description);
        echo "Диск был успешно добавлен";
}
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление книг в библиотеку</title>
</head>
<body>
    <form>
        <p>Название компакт диска: <input type="text" name="Name" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Автор: <input type="text" name="Author" size="15" maxlength="150" id=""><samp style="color:red">*</samp></p>
        <p>Код: <input type="text" name="Code" size="15" maxlength="30" id=""><samp style="color:red"></samp></p>
        <p>Описание: <input type="text" name="Description" size="15" maxlength="300" id=""><samp style="color:red">*</samp></p>
        <p><input type="submit" value="Добавить" name="doGo"></p>
    </form>
</body>
</html>
<title>Добавление книг в базу данных</title>
