<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>Авторы</th>
                <th>Кол-во книг</th>
            </tr>
            </thead>
            <?php /** @var Book[] $books */
            foreach ($books as $book):?>
                <tr>
                    <td><?php echo $book->author ?></td>
                    <td><?php echo $book->count ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
<?php require "Application/Views/layout/footer.php"; ?>