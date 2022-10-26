<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <h1 class="mb-2">Поиск по году</h1>
    <form action="/books/year" class="mb-3"  method="POST">
        <div class="form-group mb-2">
            <label for="exampleInputEmail1">Время (ОТ)</label>
            <label>
                <input type="text" name="from" placeholder="0" class="form-control"
                    <?php if (empty($_POST)) {
                    } else { ?>
                        <?php if ($_POST['from'] === 0) { ?>
                        <?php } else { ?> value="<?php echo $_POST['from']; ?>" <?php } ?>
                    <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputEmail1">Время (ДО)</label>
            <label>
                <input type="text" name="too" placeholder="9999" class="form-control"
                    <?php if (empty($_POST)) {
                    } else { ?>
                        <?php if ($_POST['too'] === 9999) { ?>
                        <?php } else { ?> value="<?php echo $_POST['too']; ?>" <?php } ?>
                    <?php } ?>
                       autocomplete="off">

            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="submit" type="submit">Искать</button>
        </div>
    </form>
    <?php if (empty($_POST)) {
    } else { ?>
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
    <?php } ?>
</div>
<?php require "Application/Views/layout/footer.php"; ?>