<?php require "Application/Views/layout/header.php"; ?>
<div class="container px-4">
    <div class="row gx-5">
    <div class="col-5">
    <table class="table p-3 table-bordered">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Название жанра</th>
            <th>Управление</th>
        </tr>
        </thead>
        <?php foreach ($genres as $genre):?>
            <tr>
                <td><?php echo $genre['id'] ?></td>
                <td><?php echo $genre['genre'] ?></td>
                <td>
                    <a
                            class="btn btn-primary btn-sm"
                            href="books/genre/edit/<?php echo $genre['id'] ?>"
                            style="display: inline-block"
                    >
                        Изменить
                    </a>
                    <form
                            style="display: inline-block"
                            method="post"
                            action="books/genre/<?php echo $genre['id'] ?>"
                    >
                        <input type="hidden" value="">
                        <button
                                class="btn btn-danger btn-sm"
                                type="submit"
                        >
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    </div>
    <div class="col-5">
        <h1 class="p-2 border">Добавить жанр</h1>
    <form action="/books/genre" method="POST">
        <div class="form-group p-3 border">
            <label for="exampleInputEmail1">Название жанра</label >
            <label>
                <input type="text" name="genre" class="form-control"

                       autocomplete="off">
            </label>
            <div class="form-group" style="display: inline-block">
                <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
            </div>
        </div>
    </form>
    </div>
    </div>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
