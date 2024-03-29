<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
            rel="shortcut icon"
            type="image/x-icon"
    />
    <title>библиотека</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/css/lineicons.css"/>
    <link rel="stylesheet" href="/assets/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="/assets/css/fullcalendar.css"/>
    <link rel="stylesheet" href="/assets/css/fullcalendar.css"/>
    <link rel="stylesheet" href="/assets/css/main.css"/>
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="/">
            <img class="logo" src="/assets/images/logo/logo.png" width="180" height="40"/>
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item nav-item-has-children">
                <a
                        href="#0"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_1"
                        aria-controls="ddmenu_1"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
              <span class="icon">
                    <i class="lni lni-github-original"></i>
              </span>
                    <span class="text">GitHub</span>
                </a>
                <ul id="ddmenu_1" class="collapse show dropdown-nav">
                    <li>
                        <a href="https://github.com/MrLincomins/Book" target="_blank" class="active"> Ссылка на гит </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-item-has-children">
                <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_2"
                        aria-controls="ddmenu_2"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
              <span class="icon">
                  <i class="mdi mdi-book"></i>
              </span>
                    <span class="text">Книги</span>
                </a>
                <ul id="ddmenu_2" class="collapse dropdown-nav">
                    <li>
                        <a href="/books"> Все книги </a>
                    </li>
                    <li>
                        <a href="/books/year"> Поиск по году </a>
                    </li>
                    <li>
                        <a href="/books/top"> Топ 100 авторов </a>
                    </li>
                    <?php if (@$_COOKIE['status'] == 1) { ?>
                        <li>
                            <a href="/books/create"> Добавить книгу </a>
                        </li>
                        <li>
                            <a href="/books/genre"> Добавить жанр </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <li class="nav-item nav-item-has-children">
                <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_4"
                        aria-controls="ddmenu_4"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
              <span class="icon">
                  <i class="mdi mdi-book-clock"></i>
              </span>
                    <span class="text">Резервация</span>
                </a>
                <ul id="ddmenu_4" class="collapse dropdown-nav">
                    <?php if (@$_COOKIE['status'] == 1) { ?>
                        <li>
                            <a href="/books/reserve/show"> Все резервированные книги </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="/books"> Резервация (Все книги) </a>
                    </li>
                </ul>
            </li>
            <?php if (@$_COOKIE['status'] == 1) { ?>
                <li class="nav-item nav-item-has-children">
                    <a
                            href="#0"
                            class="collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#ddmenu_5"
                            aria-controls="ddmenu_5"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
              <span class="icon">
                  <i class="mdi mdi-book-arrow-up"></i>
              </span>
                        <span class="text">Книги у учеников</span>
                    </a>
                    <ul id="ddmenu_5" class="collapse dropdown-nav">
                        <li>
                            <a href="/books/borrow/show"> Все книги у учеников </a>
                        </li>
                        <li>
                            <a href="/books"> Дать книгу ученику(все книги) </a>
                        </li>
                        <li>
                            <a href="/books/borrow/return"> Вернуть книгу в библиотеку </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a
                            href="#0"
                            class="collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#ddmenu_6"
                            aria-controls="ddmenu_6"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                    >
              <span class="icon">
                  <i class="mdi mdi-account-circle"></i>
              </span>
                        <span class="text">Пользователи</span>
                    </a>
                    <ul id="ddmenu_6" class="collapse dropdown-nav">
                        <li>
                            <a href="/user"> Аккаунт </a>
                        </li>

                    </ul>
                </li>
            <?php } ?>
            <li class="nav-item nav-item-has-children">
                <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_3"
                        aria-controls="ddmenu_3"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                >
              <span class="icon">
                <svg
                        width="22"
                        height="22"
                        viewBox="0 0 22 22"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                          d="M12.9067 14.2908L15.2808 11.9167H6.41667V10.0833H15.2808L12.9067 7.70917L14.2083 6.41667L18.7917 11L14.2083 15.5833L12.9067 14.2908ZM17.4167 2.75C17.9029 2.75 18.3692 2.94315 18.713 3.28697C19.0568 3.63079 19.25 4.0971 19.25 4.58333V8.86417L17.4167 7.03083V4.58333H4.58333V17.4167H17.4167V14.9692L19.25 13.1358V17.4167C19.25 17.9029 19.0568 18.3692 18.713 18.713C18.3692 19.0568 17.9029 19.25 17.4167 19.25H4.58333C3.56583 19.25 2.75 18.425 2.75 17.4167V4.58333C2.75 3.56583 3.56583 2.75 4.58333 2.75H17.4167Z"
                  />
                </svg>
              </span>
                    <span class="text">Авторизация</span>
                </a>
                <ul id="ddmenu_3" class="collapse dropdown-nav">
                    <?php if (empty(@$_COOKIE['status'])) { ?>
                        <li>
                            <a href="/login"> Войти </a>
                        </li>
                    <?php } ?>
                    <?php if (@$_COOKIE['status'] == 1) { ?>
                        <li>
                            <a href="/register"> Зарегистрировать пользователя </a>
                        </li>
                    <?php } ?>
                    <?php if (!empty($_COOKIE['status'])) { ?>
                        <li>
                            <a href="/logout"> Выход из аккаунта </a>
                        </li>
                    <?php } ?>
                </ul>
            </li>

            <span class="divider"><hr/></span>


            <span class="divider"><hr/></span>

            <li class="nav-item">
                <a href="https://edu.tatar.ru/nsav/page2300.htm">
              <span class="icon">
                  <i class="lni lni-school-bench"></i>
              </span>
                    <span class="text">Ссылка на школу</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-20">
                            <button
                                    id="menu-toggle"
                                    class="main-btn primary-btn btn-hover"
                            >
                                <i class="lni lni-chevron-left me-2"></i> Меню
                            </button>
                        </div>
                        <div class="header-search d-none d-md-flex">
                            <form method="GET" action="/books/search">
                                <input name="name" type="text" placeholder="Поиск..."/>
                                <button><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                        <!-- notification start -->
                        <div class="notification-box ml-15 d-none d-md-flex">
                            <button
                                    class="dropdown-toggle"
                                    type="button"
                                    id="notification"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                <i class="lni lni-alarm"></i>
                            </button>
                            <ul
                                    class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="notification"
                            >
                                <li>
                                </li>
                            </ul>
                        </div>
                        <!-- notification end -->
                        <!-- profile start -->
                        <div class="profile-box ml-15">
                            <button
                                    class="dropdown-toggle bg-transparent border-0"
                                    type="button"
                                    id="profile"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                <div class="profile-info">
                                    <div class="info">
                                        <h6><?php
                                            if (!empty($_COOKIE['name'])) {
                                                echo $_COOKIE['name'];
                                            } else {
                                                echo 'Пользователь';
                                            }

                                            ?></h6>
                                        <div class="image">
                                            <img
                                                <?php if (@$_COOKIE['id'] == 1) { ?>
                                                    src="assets/images/profile/anonimus.jpg"
                                                    alt=""
                                                <?php } else { ?>
                                                    src="assets/images/profile/149452.png"
                                                    alt=""
                                                <?php } ?>
                                            />
                                            <span class="status"></span>
                                        </div>
                                    </div>
                                </div>
                                <i class="lni lni-chevron-down"></i>
                            </button>
                            <ul
                                    class="dropdown-menu dropdown-menu-end"
                                    aria-labelledby="profile"
                            >
                                <li>
                                    <a href="\user">
                                        <i class="lni lni-user"></i> Профиль
                                    </a>
                                </li>
                                <li>
                                    <a href="/logout"> <i class="lni lni-exit"></i> Выход </a>
                                </li>
                            </ul>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="overlay"></div>

