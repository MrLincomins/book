<?php require "Application/Views/layout/header.php"; ?>
    <body>
    <section class="table-components">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Топ сто авторов</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper mb-30">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/books">Книги</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Топ 100 авторов
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <p class="text-sm mb-20">
                                Здесь собран топ, авторов, которые написали больше всего книг, содержащихся в нашей библиотеке
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Авторы</th>
                                        <th>Кол-во книг</th>
                                    </tr>
                                    <!-- end table row-->
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <?php /** @var Book[] $books */
                                        foreach ($books as $book):?>
                                    <tr>
                                        <td><?php echo $book->author ?></td>
                                        <td><?php echo $book->count ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- end table row -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
<?php require "Application/Views/layout/footer.php"; ?>