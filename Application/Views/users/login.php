<?php
use Application\Models\User;
if (isset($_REQUEST['doGo'])) {

   {
     $Name = $_REQUEST['Name'];
     if (empty($Name) == true){
       exit('Имя было пропущено ');
     }

     $Surname = $_REQUEST['Surname'];
     if (empty($Surname) == true){
       exit('Фамилия была пропущена');
     }

     $Patronymic = $_REQUEST['Patronymic'];


     $Class = $_REQUEST['Class'];

     if (empty($Class) == true){
       exit('Класс был пропущен');
     }

     $Password = $_REQUEST['Password'];
     if (empty($Password) == true){
       exit('Пароль был пропущен');
     }

    $Status = $_REQUEST['Status'];

     $register = (new User())->CheckAuth($Name, $Surname, $Patronymic, $Class, $Password, $Status);
     if($register === true){
       setcookie('Name', $Name, time()+86400 * 30);
       setcookie('Surname', $Surname, time()+86400 * 30);
       setcookie('Patronymic', $Patronymic, time()+86400 * 30);
       setcookie('Class', $Class, time()+86400 * 30);
       setcookie('Password', $Password, time()+86400 * 30);
       setcookie('Status', $Status, time()+86400 * 30);
       header('Location: /main');
     }
     if($register === false){
       echo('Пароль или логин не верен');
     }
     //echo "Урааа, я умнее чем компьютер";
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
         <p>Имя: <input type="text" name="Name" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
         <p>Фамилия: <input type="text" name="Surname" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
         <p>Отчество: <input type="text" name="Patronymic" size="15" maxlength="30" id=""><samp style="color:red"></samp></p>
         <p>Класс: <input type="text" name="Class" size="15" maxlength="3" id=""><samp style="color:red">*</samp></p>
         <p>Пароль: <input type="password" name="Password" size="15" maxlength="30" id=""><samp style="color:red">*</samp></p>
         <p>Статус:<select name="Status" size="2" multiple>
         <option selected value="Ученик">Ученик</option>
         <option value="Админ">Админ</option>
         </select></p>
         <p><input type="submit" value="Войти" name="doGo"></p>
     </form>
 </body>
 </html>
