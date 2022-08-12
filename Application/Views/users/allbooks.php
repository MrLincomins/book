<?php
use Application\Models\User;
use Application\Models\Book;
$Status = (new User())->CheckLogin();
If($Status !== 'Админ'){
  header('Location: /login');
  die;
}


foreach ($user as $user1) {
    $books = (new Book())->searchid1($user1["idbook"]);
    $iduser = (new User())->checkuser1($user1["iduser"]);
}



?>
<html lang="ru_RU">
 <body>
     <h1 align="center">Пользователи взявшие книгу</h1>
     <div>
         <table border="1" align="center">
             <thead>
                 <tr>
                      <th>id книги</th>
                     <th>id ученика</th>
                     <th>Дата взятия</th>
                     <th>________</th>
                     <th>ID книги</th>
                     <th>Название</th>
                     <th>Автор</th>
                     <th>ISBN</th>
                     <th>Год</th>
                     <th>Кол-во на складе</th>
                     <th>________</th>
                     <th>ID ученика</th>
                     <th>Имя</th>
                     <th>Фамилия</th>
                     <th>Отчество</th>
                     <th>Статус</th>
                     <th>Класс</th>
                 </tr>
             </thead>
             <?php /** @var array $user */
                 foreach ($user as $user1):?>
                 <tr>
                     <td><?php echo $user1["idbook"]?></td>
                     <td><?php echo $user1["iduser"]?></td>
                     <td><?php echo $user1["DATE"]?></td>
                     <td>________</td>
                     <?php endforeach;?>

                     <?php /** @var array $books */
                     foreach ($books as $book1):?>
                     <td><?php echo $book1["newid"]?></td>
                     <td><?php echo $book1["Name"]?></td>
                     <td><?php echo $book1["Author"]?></td>
                     <td><?php echo $book1["ISBN"]?></td>
                     <td><?php echo $book1["Year"]?></td>
                     <td><?php echo $book1["count"]?></td>
                     <td>________</td>
                     <?php endforeach; ?>

                     <?php /** @var array $iduser */
                     foreach ($iduser as $iduser1):?>
                     <td><?php echo $iduser1["id"]?></td>
                     <td><?php echo $iduser1["Name"]?></td>
                     <td><?php echo $iduser1["Surname"]?></td>
                     <td><?php echo $iduser1["Patronymic"]?></td>
                     <td><?php echo $iduser1["Status"]?></td>
                     <td><?php echo $iduser1["Class"]?></td>

                 </tr>
             <?php endforeach; ?>

         </table>
     </div>
 </body>
</html>
