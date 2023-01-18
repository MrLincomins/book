<?php require "Application/Views/layout/header.php"; ?>
<body>
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

<section class="tab-components">
    <div class="container-fluid">
        <section class="table-components">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Добавить книгу</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-elements-wrapper">
                    <form action="/books/create" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- input style start -->
                                <div class="card-style mb-30">
                                    <h6 class="mb-25">Поля ввода</h6>
                                    <div class="input-style-2">
                                        <label>Название книги</label>
                                        <input name="name" type="text" placeholder="Название книги"/>
                                        <span class="icon"> <i class="lni lni-bookmark"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="input-style-2">
                                        <label>Автор</label>
                                        <input name="author" type="text" placeholder="Автор"/>
                                        <span class="icon"> <i class="lni lni-user"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="input-style-2">
                                        <label>Год</label>
                                        <input name="year" type="text" placeholder="Год"/>
                                        <span class="icon"> <i class="lni lni-calendar"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="select-style-1">
                                        <label>Выбрать жанр</label>
                                        <div class="select-position">
                                            <select class="light-bg" name="genre">
                                                <?php foreach ($genres as $genre): ?>
                                                    <option value="<?php echo $genre["genre"]; ?>"><?php echo $genre["genre"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end select -->
                                    <div class="input-style-2">
                                        <label>ISBN</label>
                                        <input name="ISBN" type="text" placeholder="ISBN"/>
                                        <span class="icon"> <i class="lni lni-paperclip"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="input-style-2">
                                        <label>Число книг</label>
                                        <input name="count" type="text" placeholder="Число книг"/>
                                        <span class="icon"> <i class="lni lni-calculator"></i> </span>
                                    </div>
                                    <!-- end input -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                    type="submit">
                                                Добавить
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end button -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
</body>


<!--    -->
<!--    <h1 class="mb-3 bordered">Добавление книг</h1>-->
<!--    <ul class="nav nav-list">-->
<!--        <li class="divider"></li>-->
<!--    </ul>-->
<!--    <div class="row align-items-start">-->
<!--        <div class="col-6">-->
<!--            <form action="/books/create" method="POST" class="form-group p-2 needs-validation">-->
<!--                <div class="form-group mb-2">-->
<!--                    <label class="form-label">Название книги</label>-->
<!--                    <input type="text" name="name" class="form-control"-->
<!--                           placeholder="Введите название книги" --><?php //if (isset($_POST['autocomplete']) === true) { ?><!-- value="--><?php //echo $_POST['name']; ?><!--" --><?php //} ?>
<!--                           autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group mb-2">-->
<!--                    <label class="form-label">Автор</label>-->
<!--                    <input type="text" name="author" class="form-control"-->
<!--                           placeholder="Введите имя автора" --><?php //if (isset($_POST['autocomplete']) === true) { ?><!-- value="--><?php //echo $_POST['author']; ?><!--" --><?php //} ?>
<!--                           autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group mb-2">-->
<!--                    <label class="form-label">ИСБН</label>-->
<!--                    <input type="text" name="ISBN" class="form-control"-->
<!--                           placeholder="Введите ISBN" --><?php //if (isset($_POST['autocomplete']) === true) { ?><!-- value="--><?php //echo $_POST['ISBN']; ?><!--" --><?php //} ?>
<!--                           autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group mb-2">-->
<!--                    <label class="form-label">Год</label>-->
<!--                    <input type="text" name="year" class="form-control"-->
<!--                           placeholder="Введите год книги" --><?php //if (isset($_POST['autocomplete']) === true) { ?><!-- value="--><?php //echo $_POST['year']; ?><!--" --><?php //} ?>
<!--                           autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group mb-2">-->
<!--                    <label>Жанры</label>-->
<!--                    <select class="form-select" aria-label="Default select example" name="genre">-->
<!--                        --><?php //foreach ($genres as $genre): ?>
<!--                            <option value="--><?php //echo $genre["genre"]; ?><!--">--><?php //echo $genre["genre"]; ?><!--</option>-->
<!--                        --><?php //endforeach; ?>
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="form-group mb-2">-->
<!--                    <label class="form-label">Кол-во книг</label>-->
<!--                    <input type="text" name="count" class="form-control"-->
<!--                           placeholder="Введите кол-во книг" --><?php //if (isset($_POST['autocomplete']) === true) { ?><!-- value="--><?php //echo $_POST['count']; ?><!--" --><?php //} ?>
<!--                           autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group mb-2" style="display: inline-block">-->
<!--                    <button class="btn btn-primary" name="submit" type="submit">Добавить</button>-->
<!--                </div>-->
<!---->
<!--                --><?php //if (isset($_POST['autocomplete']) === true) { ?>
<!--                    <div class="form-check form-switch" style="display: inline-block">-->
<!--                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="autocomplete"-->
<!--                               checked>-->
<!--                        <label class="form-check-label" for="flexSwitchCheckChecked">Автозаполнение</label>-->
<!--                    </div>-->
<!--                --><?php //} else { ?>
<!--                    <div class="form-check form-switch" style="display: inline-block">-->
<!--                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="autocomplete">-->
<!--                        <label class="form-check-label" for="flexSwitchCheckDefault">Автозаполение</label>-->
<!--                    </div>-->
<!--                --><?php //} ?>
<!---->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<?php require "Application/Views/layout/footer.php"; ?>
