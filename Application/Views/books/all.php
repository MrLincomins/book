<?php require "Application/Views/layout/header.php";
?>

<div class="container">
    <table class="table">
        <thead class="">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>ISBN</th>
            <th>Год</th>
            <th>Жанр</th>
            <th>Кол-во на складе</th>
            <th>Управление</th>
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
            <td><?php echo $book->genre?></td>
            <td><?php echo $book->count ?></td>
            <td>
                <a
                    class="btn btn-primary btn-sm"
                    href="books/edit/<?php echo $book->id ?>"
                    style="display: inline-block"
                >
                    Изменить
                </a>
                <form
                    style="display: inline-block"
                    method="post"
                    action="books/<?php echo $book->id ?>"
                >
                    <input type="hidden" value="">
                    <button
                        class="btn btn-danger btn-sm"
                        type="submit"
                    >
                        Удалить
                    </button>
                </form>
            </td>

        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require "Application/Views/layout/footer.php"; ?>

