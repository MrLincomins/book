<?php require "Application/Views/layout/header.php"; ?>
    <div class="container">
        <h1>Поиск по году</h1>
        <form action="/books/year" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Время (ОТ)</label>
                <label>
                    <input type="text" name="from" placeholder="0" class="form-control"
                        <?php if ($_POST['from'] === 0) { ?>
                        <?php } else { ?> value="<?php echo $_POST['from']; ?>" <?php } ?>
                           autocomplete="off">
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Время (ДО)</label>
                <label>
                    <input type="text" name="too" placeholder="9999" class="form-control"
                        <?php if ($_POST['too'] === 9999) { ?>
                        <?php } else { ?> value="<?php echo $_POST['too']; ?>" <?php } ?>
                           autocomplete="off">

                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="submit" type="submit">Искать</button>
            </div>
        </form>
        <label>

        </label>
        <table class="table">
            <thead class="">
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
    </div>
<?php require "Application/Views/layout/footer.php"; ?>