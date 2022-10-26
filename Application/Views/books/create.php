<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
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
                <input type="text" name="count" class="form-control" placeholder="Введите кол-во книг"
                       autocomplete="off">
            </label>
        </div>
        <div class="form-group" style="display: inline-block">
            <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
        </div>
        <div class="form-check form-switch" style="display: inline-block">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="autocomplete" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Автозаполнение</label>
        </div>
    </form>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
