<?php
if (isset($_REQUEST['doGo'])) {
   {
     setcookie('idus', '');
     setcookie('Nick', '');
     setcookie('Surname', '');
     setcookie('Patronymic', '');
     setcookie('Class', '');
     setcookie('Password', '');
     setcookie('Status', '');
       echo '<script type="text/javascript">
       window.onload = function () { alert("Вы вышли из аккаунта"); } 
</script>';
       echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/main">';
       die();
   }
}
if (isset($_REQUEST['doGo1'])) {
   {
       echo '<script type="text/javascript">
       window.onload = function () { alert("Вы отменили выход из аккаунта"); } 
</script>';
       echo '<meta http-equiv="refresh" content="0; url=http://localhost:8080/main">';
       die();
   }
}
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
 <body>
   <form>
     Вы точно хотите выйти?
     <p><input type="submit" value="Да" name="doGo"></p>
     <p><input type="submit" value="Нет" name="doGo1"></p>
   </from>
  </body>
</head>
 </html>
