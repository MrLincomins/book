<?php require "Application/Views/layout/header.php";
?>

<?php if (!empty($_POST)) { ?>
    <div class="alert alert-success" role="alert" id="time">
        <?php echo 'Удалили: ', $_POST['name'], ' написанная: ', $_POST['author']; ?>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 3000);
    </script>
<?php } ?>
<?php
session_start();
if (!empty($_SESSION['login'])) {
if ($_SESSION['login'] == 'Вы успешно вышли из аккаунта'){ ?>
<div class="alert-box alert-danger pl-75" role="alert" id="time">
    <?php } else { ?>
    <div class="alert-box alert-success pl-75" role="alert" id="time">
        <?php } ?>
        <div class="alert">
            <h4 class="alert-heading">Успех</h4>
            <p class="text-medium">
                <?php echo $_SESSION['login']; ?>
            </p>
        </div>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 15000);
    </script>
    <?php
    unset($_SESSION['login']);
    } ?>
    <?php
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
    <?php
    if (!empty($_SESSION['error'])) { ?>
        <div class="alert-box alert-danger pl-75" role="alert" id="time">
            <div class="alert">
                <h4 class="alert-heading">Ошибка</h4>
                <p class="text-medium">
                    <?php echo $_SESSION['error']; ?>
                </p>
            </div>
        </div>
        <script>
            setTimeout(function () {
                document.getElementById('time').style.display = 'none';
            }, 15000);
        </script>
        <?php
        unset($_SESSION['error']);
    } ?>
    <?php /** @var Book[] $books */
    ?>
    <body>
    <section class="table-components">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Книги</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <p class="text-sm mb-20">
                                Тут находятся все книги, которые не взяли и могут быть взяты в будущем
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table ">
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
                                    <?php foreach ($books[0] as $book):
                                        ?>
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
                                                        <p><?php echo $book->name ?></p>
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
                                                    <?php if (@$_COOKIE['status'] == 1){ ?>
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
                                                    <?php } ?>
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
                                                            <form method="post"
                                                                  action="books/reserve/<?php echo $book->id ?>">
                                                                <a href="books/reserve/<?php echo $book->id ?>" class="text-gray">Резервация</a>
                                                            </form>
                                                        </li>
                                                        <?php if (@$_COOKIE['status'] == 1) { ?>
                                                            <li class="dropdown-item">
                                                                <form method="post"
                                                                      action="books/borrow/<?php echo $book->id ?>">
                                                                    <a href="books/borrow/<?php echo $book->id ?>" class="text-gray">Дать книгу
                                                                        ученику</a>
                                                                </form>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <a
                                            href="<?php echo "?page=" . ($books[1]['pagination']['currentPage'] - 1) ?>"
                                            type="button"
                                            class="btn primary-btn <?php if ($books[1]['pagination']['currentPage'] == 1) {
                                                echo 'disabled';
                                            } ?> ">
                                        <-
                                    </a>

                                    <a
                                            type="button"
                                            class="btn primary-btn">
                                        <?php echo $books[1]['pagination']['currentPage'] ?>
                                    </a>

                                    <a
                                            href="<?php echo "?page=" . ($books[1]['pagination']['currentPage'] + 1) ?>"
                                            type="button"
                                            class="btn primary-btn <?php if ($books[1]['pagination']['currentPage'] == $books[1]['pagination']['lastPage']) {
                                                echo 'disabled';
                                            } ?> ">
                                        ->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</body>
<?php require "Application/Views/layout/footer.php"; ?>

