<?php require "Application/Views/layout/header.php";
?>
<body>
<?php if (!empty($_POST)) { ?>
    <div class="alert-box success-alert pl-75" role="alert" id="time">
        <div class="alert">
            <h4 class="alert-heading">Success!</h4>
            <p class="text-medium">
                Книга была успешно добавлена в бд
            </p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 3000);
    </script>
<?php } ?>
<?php
session_start();
if (!empty($_SESSION['errorValidation'])) {
    foreach ($_SESSION['errorValidation'] as $error):
    ?>
    <div class="alert-box danger-alert pl-75" role="alert" id="time">
        <div class="alert">
            <h4 class="alert-heading">Ошибка</h4>
            <p class="text-medium">
                <?php echo implode($error); ?>
            </p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 3000);
    </script>
<?php
    endforeach;
    unset($_SESSION['errorValidation']);
} ?>

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

<?php require "Application/Views/layout/footer.php"; ?>
