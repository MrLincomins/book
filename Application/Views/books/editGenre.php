<?php require "Application/Views/layout/header.php"; ?>
<div class="container px-4">
    <?php if (empty($_POST)) {
    } else { ?>
        <div class="alert alert-success" role="alert" id="time">
            <?php echo 'Изменения прошли успешно'; ?>
        </div>
        <script>
            setTimeout(function () {
                document.getElementById('time').style.display = 'none';
            }, 5000);
        </script>
    <?php } ?>
    <?php foreach ($genre

    as $genre2): ?>
    <div class="row gx-5">
        <div class="col-5">
            <h1 class="p-3 border">Изменить жанр</h1>
            <form action="/books/genre/edit/<?php echo $genre2['id']; ?>" method="POST">
                <div class="form-group p-3 border">
                    <label for="exampleInputEmail1">Название жанра</label>
                    <label>
                        <input type="text" name="genre" class="form-control"
                               value="<?php echo $genre2['genre']; ?>"
                               autocomplete="off">
                    </label>
                    <div class="form-group" style="display: inline-block">
                        <button class="btn btn-primary" name="submit" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
        </div>
        <?php endforeach; ?>
        <div class="col-5">
            <table class="table p-3 table-bordered">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Название жанра</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <?php foreach ($genres as $genre1): ?>
                    <tr>
                        <td><?php echo $genre1['id'] ?></td>
                        <td><?php echo $genre1['genre'] ?></td>
                        <td>
                            <a
                                    class="btn btn-primary btn-sm"
                                    href="books/genre/edit/<?php echo $genre1['id'] ?>"
                                    style="display: inline-block"
                            >
                                Изменить
                            </a>
                            <form
                                    style="display: inline-block"
                                    method="post"
                                    action="books/genre/<?php echo $genre1['id'] ?>"
                            >
                                <input type="hidden" value="">
                                <button
                                        class="btn btn-danger b tn-sm"
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
    </div>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
