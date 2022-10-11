<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <h1>Книги</h1>
    <table border="1" class="table">
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
        <?php /** @var Book[] $books */
        foreach ($books as $book):?>
            <tr>
                <td><?php echo $book->id ?></td>
                <td><?php echo $book->name ?></td>
                <td><?php echo $book->author ?></td>
                <td><?php echo $book->ISBN ?></td>
                <td><?php echo $book->year ?></td>
                <td><?php echo $book->count ?></td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="document.location='books/<?php echo $book->id ?>'">Изменить</button>
                    <form method="post" action="books/<?php echo $book->id ?>">
                    <input class="btn btn-primary btn-sm btn-danger" type="submit" value="Удалить">
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require "Application/Views/layout/footer.php"; ?>

