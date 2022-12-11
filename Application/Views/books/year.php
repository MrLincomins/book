<?php require "Application/Views/layout/header.php"; ?>
    <div class="container px-4">
        <div class="row gx-5">
            <div class="col-sm-4">
                <h1 class="p-3 border ">Поиск по году</h1>
                <form action="/books/year" class="mb-3 p-3 border" method="POST">

                    <div class="form-group mb-3">
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
                    <div class="form-group" style="display: inline-block">
                        <button class="btn btn-primary" name="submit" type="submit">Искать</button>
                    </div>
                </form>
            </div>
            <?php if (empty($_POST)) { ?>
                <div class="col">
                    <table class="table col p-3 table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>ISBN</th>
                            <th>Жанр</th>
                            <th>Год</th>
                            <th>Кол-во на складе</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                            <td>...</td>
                        </tr>
                    </table>
                </div>
            <?php } else { ?>
                <div class="col">
                    <table class="table col p-3 table-bordered">
                        <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>ISBN</th>
                            <th>Жанр</th>
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
                                <td><?php echo $book->genre ?></td>
                                <td><?php echo $book->year ?></td>
                                <td><?php echo $book->count ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
<?php require "Application/Views/layout/footer.php"; ?>