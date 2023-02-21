<?php require "Application/Views/layout/header.php"; ?>


    <section>
        <div class="container-fluid">
            <div class="title-wrapper pt-20">
                <div class="row align-items-center">
                </div>
            </div>
            <div class="invoice-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-card card-style mb-20">
                            <div class="invoice-header">
                                <div class="invoice-for">
                                    <h2 class="mb-10">Добро пожаловать!</h2>
                                    <p class="text-sm">
                                        Книжная библиотека онлайн
                                    </p>
                                </div>
                                <img src="assets/images/logo/logo.png" alt="" width="400"/>
                                <div class="invoice-date">
                                    <p><span>Последнее обновление:</span> 21/02/2023</p>
                                </div>
                            </div>
                            <div class="invoice-address">
                                <div class="address-item">
                                    <p>
                                        Здесь вы сможете наблюдать за книгами в школьной библиотеке и при желании
                                        резервировать их.
                                    </p>
                                    <p>
                                        Библиотека обладает многими функциями, здесь вы можете ознакомиться с самыми примитивными.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-2 mb-30">
                            <div class="card-image">
                                <a href="/books">
                                    <img
                                            src="assets/images/modals/books.png"
                                            alt=""
                                            width="350"
                                            height="350"
                                    />
                                </a>
                            </div>
                            <div class="card-content">
                                <h4><a href="#0">Книги</a></h4>
                                <p>
                                    Здесь находяться все книги библиотеки, вы можете наблюдать их количество, автора и соответственно название.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-2 mb-30">
                            <div class="card-image">
                                <a href="#0">
                                    <img
                                            src="assets/images/cards/card-style-2/card-2.jpg"
                                            alt=""
                                            width="350"
                                            height="350"
                                    />
                                </a>
                            </div>
                            <div class="card-content">
                                <h4><a href="#0">Поиск книг</a></h4>
                                <p>
                                    В самом вверху вы можете увидеть поле ввода, введя туда данные вы сможете найти книги удовлетворяющие введённым данным.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-2 mb-30">
                            <div class="card-image">
                                <a href="#0">
                                    <img
                                            src="assets/images/cards/card-style-2/card-3.jpg"
                                            alt=""
                                            width="350"
                                            height="350"
                                    />
                                </a>
                            </div>
                            <div class="card-content">
                                <h4><a href="#0">Резервация книг</a></h4>
                                <p>
                                    Так-же вы сможете резервировать книгу, она останется у библиотекаря и никто не сможет её взять. У вас будет один <день></день>, чтобы получить её на руки.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php require "Application/Views/layout/footer.php"; ?>