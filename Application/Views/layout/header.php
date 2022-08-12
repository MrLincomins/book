  <?php
use Application\Models\User;
$Status = (new User())->CheckLogin();
var_dump($_COOKIE);

?>

<link rel="stylesheet" href="assets/main.css">
<nav>
  <ul>
    Главная
    <li><a href="/knigi">Все книги</a></li>
    <li><a href="/top100">Топ 100 авторов</a></li>
    <li><a href="/year">Поиск книг по году</a></li>
    <li><a href="/disk">Показать все диски</a></li>
    <li><a href="/account">Личный кабинет</a></li>
<?php if($Status === null): ?>
    <a href="/login">Вход</a>
<?php endif; ?>
<?php if($Status === 'Админ'): ?>
    <li><a href="/add">Добавление книг</a></li>
    <li><a href="/disk_add">Добавить диск</a></li>
    <li><a href="/register">Регистрация пользователя</a></li>
    <li><a href="/show">Показать всех пользователей</a></li>
    <li><a href="/booksgive">Дать книгу пользователю</a></li>
    <li><a href="/alltoobook">Все забронированные книги</a></li>
    <li><a href="/booksreturn">Вернуть книгу от пользователя в библиотеку</a></li>
<?php endif; ?>
<?php if($Status !== null): ?>
    <li><a href="/toobook">Бронирование книг</a></li>
    <a href="/logout">Выход</a>
<?php endif; ?>
  </ul>
</nav>
<title>Главная</title>
