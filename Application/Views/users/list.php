<html lang="ru_RU">
 <body>
     <h1>Пользователи</h1>
     <div>
         <table>
             <thead>
                 <tr>
                      <th>ID</th>
                     <th>Имя</th>
                     <th>Фамилия</th>
                     <th>Отчество</th>
                     <th>Статус</th>
                     <th>Класс</th>
                 </tr>
             </thead>
             <?php /** @var array $books */
                 foreach ($user as $user1):?>
                 <tr>
                     <td><?php echo $user1["id"]?></td>
                     <td><?php echo $user1["Name"]?></td>
                     <td><?php echo $user1["Surname"]?></td>
                     <td><?php echo $user1["Patronymic"]?></td>
                     <td><?php echo $user1["Status"]?></td>
                     <td><?php echo $user1["Class"]?></td>
                 </tr>
                 <?php endforeach;?>
         </table>
     </div>
 </body>
</html>
