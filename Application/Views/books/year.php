<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <h1>Добавление книг</h1>
    <form action="/books/year" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Время (ОТ)</label>
            <label>
                <input type="text" name="from" class="form-control" placeholder="0" autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Время (ДО)</label>
            <label>
                <input type="text" name="too" class="form-control" placeholder="9999" autocomplete="off">
            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" name="submit" type="submit">Искать</button>
        </div>
    </form>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
