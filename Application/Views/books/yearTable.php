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
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="button" class="btn btn-primary" onclick="history.back();" value="Назад"/>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
