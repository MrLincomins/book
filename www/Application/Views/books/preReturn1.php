<?php require "Application/Views/layout/header.php"; ?>
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
                                <h1> <?php echo $books->name ?> </h1>
                                <p class="text">
                                    <span class="text-medium">Автор:</span>
                                    <?php echo $books->author; ?>
                                </p>
                                <p class="text">
                                    <span class="text-medium">Жанр:</span>
                                    <?php echo $books->genre; ?>
                                </p>
                                <p class="text mb-5">
                                    <span class="text-medium">Год:</span>
                                    <?php echo $books->year; ?>
                                </p>
                                <p class="text">
                                    <span class="text-medium">Имя:</span>
                                    <?php echo $user[0]['name']; ?>
                                </p>
                                <p class="text">
                                    <span class="text-medium">Класс:</span>
                                    <?php echo $user[0]['class']; ?>
                                </p>
                            </div>
                            <div class="invoice-for">
                            </div>
                            <div class="logo col-14">
                                <img
                                    src="<?php echo $books->picture ?>"
                                    alt=""
                                />
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
                                    href="/books/borrow/return"
                                    class="main-btn primary-btn-outline btn-hover"
                                >
                                    Отмена
                                </a>
                            </li>
                            <li class="m-2">
                                <form method="post" id="id" action="/books/borrow/return/<?php echo $user[0]['id'] ?>">
                                    <button class="main-btn primary-btn btn-hover" type="submit">
                                        Вернуть в библиотеку
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
