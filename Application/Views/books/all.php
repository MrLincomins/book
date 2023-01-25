<?php require "Application/Views/layout/header.php";
?>
<?php if (empty($_POST)) {
} else { ?>
    <div class="alert alert-success" role="alert" id="time">
        <?php echo 'Удалили: ', $_POST['name'], ' написанная: ', $_POST['author']; ?>
    </div>
    <script>
        setTimeout(function () {
            document.getElementById('time').style.display = 'none';
        }, 5000);
    </script>
<?php } ?>
<?php  /** @var Book[] $books */ ?>

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
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><h6>Название</h6></th>
                                            <th><h6>Автор</h6></th>
                                            <th><h6>Год</h6></th>
                                            <th><h6>Жанр</h6></th>
                                            <th><h6>ISBN</h6></th>
                                            <th><h6>Action</h6></th>
                                        </tr>
                                        <!-- end table row-->
                                        </thead>
                                        <tbody>
                                        <?php foreach ($books as $book):?>
                                        <tr>
                                            <td class="min-width">
                                                <div class="lead">
                                                    <div class="lead-image">
                                                        <img
                                                                src="<?php echo $book->picture ?>"
                                                                alt=""
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
                                                <p><?php echo $book->year ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?php echo $book->genre ?></p>
                                            </td>
                                            <td class="min-width">
                                                <p><?php echo $book->ISBN ?></p>
                                            </td>
                                            <td>
                                                <div class="action">
                                                <form method="post" action="books/<?php echo $book->id ?>">
                                                    <button class="text-danger" type="submit">
                                                        <i class="lni lni-trash-can"></i>
                                                    </button>
                                                </form>
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

