<?php
use Application\Models\User;
use Application\Models\Book;
$Status = (new User())->CheckLogin();
var_dump($_COOKIE);
@$justnow = $_COOKIE['justnow'];

?>

<html>
<link rel="stylesheet" type="text/css" href="../assets/main.css">
<nav id="nav-1">
    <h1 class="link-1" >Меню</h1>
</nav>
<nav id="nav-2">
    <a class="link-2" href="/knigi">Все книги</a>
    <a class="link-2" href="/top100">Топ 100 авторов</a>
    <a class="link-2" href="/year">Поиск книг по году</a>
    <a class="link-2" href="/disk">Показать все диски</a>
    <pre>
        <a></a>
    </pre>

    <a class="link-2" href="/account">Личный кабинет</a>
<?php if($Status === null): ?>
    <a class="link-2" href="/login">Вход</a>
<?php endif; ?>
<?php if($Status === 'Админ'): ?>
    <a class="link-2" href="/add">Добавление книг</a>
    <a class="link-2" href="/disk_add">Добавить диск</a>
    <a class="link-2" href="/register">Регистрация пользователя</a>
    <a class="link-2" href="/show">Показать всех пользователей</a>
    <pre>
        <a></a>
    </pre>
    <a class="link-2" href="/booksgive">Дать книгу пользователю</a>
    <a class="link-2" href="/alltoobook">Все забронированные книги</a>
    <a class="link-2" href="/booksreturn">Вернуть книгу от пользователя в библиотеку</a>

    <pre>
        <a></a>
    </pre>

<?php endif; ?>
<?php if($Status !== null): ?>
    <a class="link-2" href="/toobook">Бронирование книг</a>
    <a class="link-2" href="/logout">Выход</a>
<?php endif; ?>
</nav>
<title>Главная</title>
</html>



<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway);
    body {
        margin: 0px;
        background: linear-gradient(#68bd7a, #3fa40a) fixed;
    }
    nav {
        margin-top: 40px;
        padding: 24px;
        text-align: center;
        font-family: Raleway;
        box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }
    #nav-1 {
        background: #3fa46a;
    }

    #nav-2 {
        background: #3fa46a;
    }

    .link-1 {
        background: #3fa46a;
        color: #ffffff;
        font-size: 45px;
        border-top: 4px solid #3fa46a;
        border-bottom: 2px solid #3fa46a;
        margin: 0 300px;
    }


    .link-2 {
        transition: 0.3s ease;
        background: #3fa46a;
        color: #ffffff;
        font-size: 20px;
        text-decoration: none;
        border-top: 4px solid #3fa46a;
        border-bottom: 2px solid #3fa46a;
        padding: 20px 0;
        margin: 0 20px;
    }

    .link-2:hover {
        border-top: 4px solid #ffffff;
        border-bottom: 4px solid #ffffff;
        padding: 6px 0;
    }
</style>


