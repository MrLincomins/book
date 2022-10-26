<?php require "Application/Views/layout/header.php"; ?>
<div class="container px-4">
    <?php    if(empty($_POST)) { } else {?>
        <button class="btn btn-success btn-sm" id="time">
            <?php echo 'Изменения прошли успешно'; ?>
        </button>
        <script>
            setTimeout(function () {
                document.getElementById('time').style.display = 'none';
            }, 5000);
        </script>
    <?php } ?>
    <div class="row gx-5">
        <div class="col-5">
            <table class="table p-3 border bg-light">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название жанра</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <?php foreach ($genres as $genre1):?>
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
        <?php foreach ($genre as $genre2):?>
        </div>
        <div class="col-5">
            <h1 class="p-3 border bg-light">Изменить жанр</h1>
            <form action="/books/genre/edit/<?php echo $genre2['id'];?>" method="POST">
                <div class="form-group p-3 border bg-light">
                    <label for="exampleInputEmail1">Название жанра</label >
                    <label>
                        <input type="text" name="genre" class="form-control"
                               value="<?php echo $genre2['genre'];?>"
                               autocomplete="off">
                    </label>
                    <div class="form-group" style="display: inline-block">
                        <button class="btn btn-primary" name="submit" type="submit">Изменить</button>
                    </div>
                </div>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
