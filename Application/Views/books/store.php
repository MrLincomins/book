<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <div class="alert alert-success" role="alert" id="time">
        Книга была успешно добавлена!
    </div>
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
                <input type="text" name="name" class="form-control"
                       placeholder="Введите название книги" <?php if(isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['name']; ?>" <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Автор</label>
            <label>
                <input type="text" name="author" class="form-control"
                       placeholder="Введите имя автора" <?php if(isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['author']; ?>" <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ИСБН</label>
            <label>
                <input type="text" name="ISBN" class="form-control"
                       placeholder="Введите ISBN" <?php if(isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['ISBN']; ?>" <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Год</label>
            <label>
                <input type="text" name="year" class="form-control"
                       placeholder="Введите год книги" <?php if(isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['year']; ?>" <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label>Жанры</label>
            <label>
                <select class="form-select" aria-label="Default select example" name="genre">
                    <?php foreach ($genres as $genre):?>
                        <option value="<?php echo $genre["genre"]; ?>"><?php echo $genre["genre"];?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Кол-во книг</label>
            <label>
                <input type="text" name="count" class="form-control"
                       placeholder="Введите кол-во книг" <?php if(isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['count']; ?>" <?php } ?>
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group" style="display: inline-block">
            <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
        </div>

        <?php if(isset($_POST['autocomplete']) === true) { ?>
            <div class="form-check form-switch" style="display: inline-block">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="autocomplete" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked">Автозаполнение</label>
            </div>
        <?php } else{ ?>
            <div class="form-check form-switch" style="display: inline-block">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="autocomplete">
                <label class="form-check-label" for="flexSwitchCheckDefault">Автозаполение</label>
            </div>
        <?php } ?>

    </form>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
