<?php
use Application\Models\User;
if (isset($_REQUEST['doGo'])) {
   {
     $idbook = $_REQUEST['idbook'];
     if (empty($idbook) == true){
       exit('ID Книги было пропущено ');
     }

     $iduser = $_REQUEST['iduser'];
     if (empty($iduser) == true){
       exit('ID Ученика был пропущен');
     }

     $check = (new User())->checkforbook($iduser);
     if(empty($check)){}
     else{
         exit("У ученика уже есть книга");
     }
     

       $DATE = date('Y-m-d');
       echo "Date: ", $DATE, "Idbook: ", $idbook, "Iduser: ", $iduser;

     $givebook = (new User())->give($idbook, $iduser, $DATE);
     echo "Книга отдана ученику";

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
         <p>ID Ученика: <input type="text" name="iduser" size="15" maxlength="30000" id=""><samp style="color:red">*</samp></p>
         <p>ID Книги: <input type="text" name="idbook" size="15" maxlength="3000000" id=""><samp style="color:red">*</samp></p>
         <p><input type="submit" value="Дать" name="doGo"></p>
     </form>
 </body>
 </html>
