<?php
use Application\Models\User;
use Application\Models\Book;
$Status = (new User())->CheckLogin();

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
//Максимальное количество данных в таблице
$size_page = 4;

$offset = ($page-1) * $size_page;
$count = (new Book())->bookscount();
foreach ($count as $bookscount)
{
    $bookscounts = $bookscount["COUNT(*)"];
    $all_page = ceil($bookscounts / $size_page);
}
$books = (new Book())->all1($offset, $size_page);

?>
<html lang="ru_RU">
    <body>
        <h1>Книги</h1>
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

                    <a href="?page=1">Первая страница</a>
                    <page="<?php if($page <= 1){} ?>">
                        <a href="<?php if($page <= 1){} else { echo "?page=".($page - 1); } ?>">Превыдущая</a>
                    </page>
                     <page="<?php if($page >= $all_page) ?>">
                        <a href="<?php if($page >= $all_page){} else { echo "?page=".($page + 1); } ?>">Следующая</a>
                    </page>
                    <a href="?page=<?php echo $all_page; ?>">Последняя страница</a>

            <br><b>Номер страницы: <?php echo $page; ?></b>

        </div>
    </body>
</html>

