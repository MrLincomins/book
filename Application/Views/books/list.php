<?php
use Application\Models\User;
use Fpdf\Fpdf;

$pdf = new Fpdf();


$Status = (new User())->CheckLogin();
?>
<html lang="ru_RU">
    <body>
        <h1>Книги</h1>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Автор</th>
                        <th>ISBN</th>
                        <th>Год</th>
                        <th>Кол-во на складе</th>                    
                    </tr>
                </thead>
                <?php /** @var array $books */
                    foreach ($books as $book):?>
                    <tr>

                        <td><?php echo $book["newid"]?></td>
                        <td><?php echo $book["Name"]?></td>
                        <td><?php echo $book["Author"]?></td>
                        <td><?php echo $book["ISBN"]?></td>
                        <td><?php echo $book["Year"]?></td>
                        <td><?php echo $book["count"]?></td>
                        <?php If($Status === 'Админ'){ ?>
                        <td><button onclick="document.location='books/<?php echo $book["newid"]?>'">Изменить/Удалить</button></td>
                        <?php } ?>
                    </tr>
                    <?php endforeach;?>
            </table>
        </div>
    </body>
</html>
