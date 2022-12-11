<?php require "Application/Views/layout/header.php"; ?>
<div class="container">
    <?php if (empty($_POST)) {
    } else { ?>
        <div class="alert alert-success" role="alert" id="time">
            <?php echo 'Книга: ', $_POST['name'], ' была успешно добавлена'; ?>
        </div>
        <script>
            setTimeout(function () {
                document.getElementById('time').style.display = 'none';
            }, 5000);
        </script>
    <?php } ?>
    <h1 class="mb-3 bordered">Добавление книг</h1>
    <ul class="nav nav-list">
        <li class="divider"></li>
    </ul>
    <div class="row align-items-start">
        <div class="col-3">
            <aside>
                <ul>
                    <li><a href="#">test</a></li>
                    <li><a href="#">test</a></li>
                </ul>
            </aside>
        </div>
        <div class="col-6">
            <form action="/books/create" method="POST" class="form-group p-2 needs-validation">
                <div class="form-group mb-2">
                    <label class="form-label">Название книги</label>
                    <input type="text" name="name" class="form-control"
                           placeholder="Введите название книги" <?php if (isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['name']; ?>" <?php } ?>
                           autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Автор</label>
                    <input type="text" name="author" class="form-control"
                           placeholder="Введите имя автора" <?php if (isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['author']; ?>" <?php } ?>
                           autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">ИСБН</label>
                    <input type="text" name="ISBN" class="form-control"
                           placeholder="Введите ISBN" <?php if (isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['ISBN']; ?>" <?php } ?>
                           autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Год</label>
                    <input type="text" name="year" class="form-control"
                           placeholder="Введите год книги" <?php if (isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['year']; ?>" <?php } ?>
                           autocomplete="off">
                </div>
                <div class="form-group mb-2">
                    <label>Жанры</label>
                    <select class="form-select" aria-label="Default select example" name="genre">
                        <?php foreach ($genres as $genre): ?>
                            <option value="<?php echo $genre["genre"]; ?>"><?php echo $genre["genre"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Кол-во книг</label>
                    <input type="text" name="count" class="form-control"
                           placeholder="Введите кол-во книг" <?php if (isset($_POST['autocomplete']) === true) { ?> value="<?php echo $_POST['count']; ?>" <?php } ?>
                           autocomplete="off">
                </div>
                <div class="form-group mb-2" style="display: inline-block">
                    <button class="btn btn-primary" name="submit" type="submit">Добавить</button>
                </div>

                <?php if (isset($_POST['autocomplete']) === true) { ?>
                    <div class="form-check form-switch" style="display: inline-block">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="autocomplete"
                               checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Автозаполнение</label>
                    </div>
                <?php } else { ?>
                    <div class="form-check form-switch" style="display: inline-block">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="autocomplete">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Автозаполение</label>
                    </div>
                <?php } ?>

            </form>
        </div>
    </div>
    <script>
        (function () {
            'use strict'

            // Получите все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap
            var forms = document.querySelectorAll('.needs-validation')

            // Зацикливайтесь на них и предотвращайте отправку
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</div>
<?php require "Application/Views/layout/footer.php"; ?>
