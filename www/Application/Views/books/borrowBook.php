<?php require "Application/Views/layout/header.php"; ?>
<?php
if (!empty($_SESSION['borrow'])) { ?>
    <div class="alert-box alert-success pl-75" role="alert" id="time">

        <div class="alert">
            <h4 class="alert-heading">Успех</h4>
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
<?php ;
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
                    <h2 class="mr-40">Выдача книги ученику</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">
                                borrow
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

    <div class="invoice-wrapper">
        <div class="row">
            <div class="col-7">
                <div class="invoice-card card-style mb-6">
                    <div class="invoice-header">
                        <div class="invoice-address">
                            <div class="address-item pt-3">
                                <h1> <?php echo $book->name ?> </h1>
                                <p class="text">
                                    <span class="text-medium">Автор:</span>
                                    <?php echo $book->author; ?>
                                </p>
                                <p class="text">
                                    <span class="text-medium">Жанр:</span>
                                    <?php echo $book->genre; ?>
                                </p>
                                <p class="text">
                                    <span class="text-medium">Год:</span>
                                    <?php echo $book->year; ?>
                                </p>
                            </div>
                            <div class="invoice-for">
                            </div>
                            <div class="logo col-14">
                                <img
                                        src="<?php echo $book->picture ?>"
                                        alt=""
                                />
                            </div>
                        </div>
                        <div class="form-elements-wrapper">
                            <div class="col-lg-9" style="margin-top: -110%;">
                                <!-- input style start -->
                                <div class="card-style">
                                    <h6 class="mb-25">Введите id ученика</h6>
                                    <div class="input-style-1">
                                        <input form="id" type="text" name='id' placeholder="id"/>
                                    </div>
                                    <!-- end input -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-action">
                        <ul
                                class="
                        d-flex
                        flex-wrap
                        align-items-center
                        justify-content-center
                      "
                        >
                            <li class="m-2">
                                <a
                                        href="/books"
                                        class="main-btn primary-btn-outline btn-hover"
                                >
                                    Отмена
                                </a>
                            </li>
                            <li class="m-2">
                                <form method="post" id="id" action="/books/borrow/<?php echo $book->id ?>">
                                    <button class="main-btn primary-btn btn-hover" type="submit">
                                        Выдать
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- ENd Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- Invoice Wrapper End -->
</div>
<!-- end container -->
<?php require "Application/Views/layout/footer.php"; ?>
