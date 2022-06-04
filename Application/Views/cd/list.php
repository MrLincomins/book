<html lang="ru_RU">
 <body>
     <h1>Компакт диски</h1>
     <div>
         <table>
             <thead>
                 <tr>
                      <th>ID</th>
                     <th>Название</th>
                     <th>Код</th>
                     <th>Автор</th>
                     <th>| |</th>
                     <th>Описание</th>
                 </tr>
             </thead>
             <?php /** @var array $books */
                 foreach ($cd as $cd):?>
                 <tr>
                     <td><?php echo $cd["id"]?></td>
                     <td><?php echo $cd["Name"]?></td>
                     <td><?php echo $cd["Code"]?></td>
                     <td><?php echo $cd["Author"]?></td>
                     <td>| |</td>
                     <td><?php echo $cd["Description"]?></td>
                 </tr>
                 <?php endforeach;?>
         </table>
     </div>
 </body>
</html>
