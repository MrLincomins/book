<?php require "Application/Views/layout/header.php";
session_start();
if (!empty($_SESSION['borrow'])) {
if ($_SESSION['borrow'] == 'У пользователя нет книги'){ ?>
    <div class="alert-box alert-danger pl-75" role="alert" id="time">
        <?php } else { ?>
        <div class="alert-box alert-success pl-75" role="alert" id="time">
            <?php } ?>
            <div class="alert">
                <?php if ($_SESSION['borrow'] == 'У пользователя нет книги') { ?>
                    <h4 class="alert-heading">Ошибка</h4>
                <?php } else { ?>
                    <h4 class="alert-heading">Успех</h4>
                <?php } ?>
                <p class="text-medium">
                    <?php echo $_SESSION['borrow']; ?>
                </p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 15000);
    </script>

    <?php
    unset($_SESSION['borrow']);
} ?>
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
            }, 3000);
        </script>
    <?php
    endforeach;
    unset($_SESSION['errorValidation']);
} ?>
<div class="container-fluid">
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Возврат книги в библиотеку</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/books">books</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#0">borrow</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                return
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- Invoice Wrapper Start -->
    <div class="form-elements-wrapper">
        <form method="GET">
            <div class="row">
                <div class="col-lg-6">
                    <!-- input style start -->
                    <div class="card-style mb-30">
                        <h6 class="mb-25">Поиск выданной книги по id</h6>
                        <div class="input-style-2">
                            <label>Введите id ученика</label>
                            <input name="id" type="text" placeholder="id"/>
                            <span class="icon"> <i class="lni lni-bookmark"></i> </span>
                        </div>
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button class="main-btn primary-btn btn-hover w-100 text-center"
                                        type="submit"
                                        name="enter"
                                        value="1">
                                    OK
                                </button>
                            </div>
                        </div>
                        <!-- end button -->
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php if (isset($_GET['enter'])) {
        if (empty($_GET['id'])) {
            header('Location: ' . '/books/borrow/return');
        } else {
            header('Location: ' . '/books/borrow/return/' . $_GET['id']);
        }
        exit;
    } ?>
    <!-- Invoice Wrapper End -->
</div>
<!-- end container -->
<?php require "Application/Views/layout/footer.php"; ?>
