<?php require "Application/Views/layout/header.php";
/** @var Book[] $book */
?>
    <div class="container">
        <?php if (empty($_POST)) {
        } else { ?>
            <div class="alert alert-success" role="alert" id="time">
                <?php echo 'Вы успешно изменили: ', $book->name, ' написанная: ', $book->author; ?>
            </div>
            <script>
                setTimeout(function () {
                    document.getElementById('time').style.display = 'none';
                }, 5000);
            </script>
        <?php } ?>
        <h1 class="mb-3">Редактирование книги</h1>
        <form action="/books/edit/<?php echo $book->id; ?>" method="POST">
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Название книги</label>
                <label>
                    <input type="text" name="name" class="form-control" placeholder="Введите название книги"
                           autocomplete="off" value="<?php echo $book->name; ?>">
                </label>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Автор</label>
                <label>
                    <input type="text" name="author" class="form-control" placeholder="Введите имя автора"
                           autocomplete="off" value="<?php echo $book->author; ?>">
                </label>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">ИСБН</label>
                <label>
                    <input type="text" name="ISBN" class="form-control" placeholder="Введите ISBN" autocomplete="off"
                           value="<?php echo $book->ISBN; ?>">
                </label>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Год</label>
                <label>
                    <input type="text" name="year" class="form-control" placeholder="Введите год книги"
                           autocomplete="off" value="<?php echo $book->year; ?>">
                </label>
            </div>
            <div class="form-group mb-2">
                <label>Жанры</label>
                <label>
                    <select class="form-select" aria-label="Default select example" name="genre">
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo $genre["genre"]; ?>"><?php echo $genre["genre"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Кол-во книг</label>
                <label>
                    <input type="text" name="count" class="form-control" placeholder="Введите кол-во книг"
                           autocomplete="off" value="<?php echo $book->count; ?>">
                </label>
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-primary" name="submit" type="submit">Изменить</button>
            </div>
        </form>
    </div>
<?php require "Application/Views/layout/footer.php"; ?>