<?php require "Application/Views/layout/header.php"; ?>
<?php
session_start();
if (!empty($_SESSION['auth'])) { ?>
    <div class="alert-box alert-danger pl-75" role="alert" id="time">
        <div class="alert">
            <h4 class="alert-heading">Ошибка</h4>
            <p class="text-medium">
                <?php echo $_SESSION['auth']; ?>
            </p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 15000);
    </script>
    <?php
    unset($_SESSION['auth']);
} ?>
    <body>
    <?php
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
                }, 15000);
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
                                    <h2>Вход</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-elements-wrapper">
                        <form action="/login" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- input style start -->
                                    <div class="card-style mb-30">
                                        <h6 class="mb-25">Поля ввода</h6>
                                        <div class="input-style-2">
                                            <label>ФИО</label>
                                            <input name="name" type="text" placeholder="ФИО"/>
                                            <span class="icon"> <i class="lni lni-user"></i>
                                        </div>
                                        <!-- end input -->
                                        <div class="input-style-2">
                                            <label>Класс</label>
                                            <input name="class" type="text" placeholder="Класс"/>
                                            <span class="icon"> <i class="lni lni-briefcase"></i> </span>
                                        </div>
                                        <!-- end input -->
                                        <div class="input-style-2">
                                            <label>Пароль</label>
                                            <input name="password" type="password" placeholder="Пароль"/>
                                            <span class="icon"> <i class="lni lni-key"></i> </span>
                                        </div>
                                        <!-- end input -->
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button class="main-btn primary-btn btn-hover w-100 text-center"
                                                        type="submit">
                                                    Войти
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