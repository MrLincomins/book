<?php
use Application\Entities\User;
use Application\Entities\UserMapper;
use Application\Entities\Book;
$Status = (new UserMapper())->CheckLogin();
If($Status !== 'Админ'){
    header('Location: /login');
    die;
}
$book = new Book;
$user0 = new User;
foreach ($user as $user1) {
    $book->id = $user1["idbook"];
    $user0->id = $user1["iduser"];
    $books = (new Book())->searchid($book->id);
    $iduser = (new User())->checkuser($user0->id);
}

?>
<html lang="ru_RU">
<body>
<h1 align="center">Пользователи забронировшие книгу</h1>
<div>
    <table border="1" align="center">
        <thead>
        <tr>
            <th>id книги</th>
            <th>id пользователя</th>
            <th>Дата данная пользователю, чтобы забрать книгу</th>
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
