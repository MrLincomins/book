<?php
if (isset($_REQUEST['doGo'])) {
   {
     setcookie('Name', '');
     setcookie('Surname', '');
     setcookie('Patronymic', '');
     setcookie('Class', '');
     setcookie('Password', '');
     setcookie('Status', '');     
     header('Location: /main');
   }
}
if (isset($_REQUEST['doGo1'])) {
   {
     header('Location: /main');
   }
}
 ?>

 <html lang="ru">
 <body>
   <form>
     Вы точно хотите выйти?
     <p><input type="submit" value="Да" name="doGo"></p>
     <p><input type="submit" value="Нет" name="doGo1"></p>
   </from>
  </body>
 </html>
