<?php require "Application/Views/layout/header.php";
/** @var Book[] $book */
?>
    <div class="container">
        <button class="btn btn-success btn-sm" id="time">
            <?php echo 'Вы успешно изменили: ', $book->name, ' написанная: ', $book->author; ?>
        </button>
        <script>
            setTimeout(function () {
                document.getElementById('time').style.display = 'none';
            }, 5000);
        </script>
        <h1>Редактирование книги</h1>
        <form action="/books/create/<?php echo $book->id; ?>" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Название книги</label>
                <label>
                    <input type="text" name="name" class="form-control" placeholder="Введите название книги" autocomplete="off" value="<?php echo $book->name; ?>">
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Автор</label>
                <label>
                    <input type="text" name="author" class="form-control" placeholder="Введите имя автора" autocomplete="off" value="<?php echo $book->author; ?>">
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">ИСБН</label>
                <label>
                    <input type="text" name="ISBN" class="form-control" placeholder="Введите ISBN" autocomplete="off" value="<?php echo $book->ISBN; ?>">
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Год</label>
                <label>
                    <input type="text" name="year" class="form-control" placeholder="Введите год книги" autocomplete="off" value="<?php echo $book->year; ?>">
                </label>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Кол-во книг</label>
                <label>
                    <input type="text" name="count" class="form-control" placeholder="Введите кол-во книг" autocomplete="off" value="<?php echo $book->count; ?>">
                </label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="submit" type="submit">Изменить</button>
            </div>
        </form>
    </div>
<?php require "Application/Views/layout/footer.php"; ?>