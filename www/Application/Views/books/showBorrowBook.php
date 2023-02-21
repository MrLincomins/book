<?php require "Application/Views/layout/header.php";
?>

    <body>
    <section class="table-components">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Книги взятые из библиотеки</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">Книги находящиеся у учеников</h6>
                            <p class="text-sm mb-20">
                                Все книжки находящиеся у учеников находятся тут
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table striped-table">
                                    <thead>
                                    <tr>
                                        <th><h6>Название книги</h6></th>
                                        <th><h6>Автор</h6></th>
                                        <th><h6>Год</h6></th>
                                        <th><h6>ISBN</h6></th>
                                        <th><h6>ID</h6></th>
                                        <th><h6>ФИО</h6></th>
                                        <th><h6>Класс</h6></th>
                                        <th><h6>Дата конца резервации</h6></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $users = [];
                                    for ($i = 0; $i <= count($books[1]) - 1; $i++) {
                                        $users = array_merge_recursive($books[1][$i], $books[2][$i], $books[0][$i]); ?>
                                        <tr>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-image bgc-img">
                                                        <img

                                                            src="<?php echo $users['picture'] ?>"
                                                            alt=""
                                                            class="lup"
                                                        />

                                                    </div>
                                                    <div class="lead-text">

                                                        <p><?php echo $users['Name']; ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p><?php echo $users['Author']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['Year']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['ISBN']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['id']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['name']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['class']; ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $users['DATE']; ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    </body>
<?php require "Application/Views/layout/footer.php"; ?>