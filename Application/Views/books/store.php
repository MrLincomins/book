<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <button class="btn btn-success btn-sm" id="time">
        <?php echo 'Вы успешно добавили книгу: ', $_POST['name'], ' написанная: ', $_POST['author']; ?>
    </button>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 5000);
    </script>
    <h1>Добавление книг</h1>
    <form action="/books" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Название книги</label>
            <label>
                <input type="text" name="name" class="form-control" placeholder="Введите название книги"
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Автор</label>
            <label>
                <input type="text" name="author" class="form-control" placeholder="Введите имя автора"
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ИСБН</label>
            <label>
                <input type="text" name="ISBN" class="form-control" placeholder="Введите ISBN" autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Год</label>
            <label>
                <input type="text" name="year" class="form-control" placeholder="Введите год книги" autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Кол-во книг</label>
            <label>
                <input type="text" name="count" class="form-control" placeholder="Введите кол-во книг"
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
        </div>
    </form>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
