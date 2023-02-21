<?php require "Application/Views/layout/header.php"; ?>
    <body>
    <section class="table-components">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Поиск книг</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <p class="text-sm mb-20">
                                Тут находятся все найденные книги
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><h6>Название</h6></th>
                                        <th><h6>Автор</h6></th>
                                        <th><h6>Кол-во</h6></th>
                                        <th><h6>Год</h6></th>
                                        <th><h6>Жанр</h6></th>
                                        <th><h6>ISBN</h6></th>
                                        <th>
                                            <h6 class="text-sm text-medium text-end">
                                                Управление <i class="lni lni-arrows-vertical"></i>
                                            </h6>
                                        </th>
                                    </tr>
                                    <!-- end table row-->
                                    </thead>
                                    <tbody>
                                    <?php foreach ($books as $book):?>
                                        <tr>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-image bgc-img">
                                                        <img
                                                                src="<?php echo $book->picture ?>"
                                                                alt=""
                                                                class="lup"
                                                        />


                                                    </div>
                                                    <div class="lead-text">
                                                        <p><?php echo $book->name  ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="min-width">
                                                <p><a><?php echo $book->author ?></a></p>
                                            </td>
                                            <td class="min-width">
                                                <p><a><?php echo $book->count ?></a></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?php echo $book->year ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?php echo $book->genre ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?php echo $book->ISBN ?></p>
                                            </td>
                                            <td>
                                                <div class="action justify-content-end">
                                                    <form method="get" action="books/edit/<?php echo $book->id; ?>">
                                                        <button class="text-secondary" type="submit">
                                                            <i class="mdi mdi-tools"></i>
                                                        </button>
                                                    </form>
                                                    <form method="post" action="books/<?php echo $book->id ?>">
                                                        <button class="text-danger" type="submit">
                                                            <i class="lni lni-trash-can"></i>
                                                        </button>
                                                    </form>
                                                    <button
                                                            class="more-btn ml-10 dropdown-toggle"
                                                            id="moreAction1"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false"
                                                    >
                                                        <i class="lni lni-more-alt"></i>
                                                    </button>
                                                    <ul
                                                            class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1"
                                                    >
                                                        <li class="dropdown-item">
                                                            <form method="post" action="books/reserve/<?php echo $book->id ?>">
                                                                <a href="#0" class="text-gray">Резервация</a>
                                                            </form>
                                                        </li>
                                                        <li class="dropdown-item">
                                                            <form method="post" action="books/borrow/<?php echo $book->id ?>">
                                                                <a href="#0" class="text-gray">Дать книгу ученику</a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
<?php require "Application/Views/layout/footer.php"; ?>