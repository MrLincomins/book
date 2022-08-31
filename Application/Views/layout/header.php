<?php
use Application\Models\User;
use Application\Models\Book;
$Status = (new User())->CheckLogin();
var_dump($_COOKIE);
@$justnow = $_COOKIE['justnow'];
?>

<html>
<link rel="stylesheet" type="text/css" href="main.css">
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
    :root{--toast-width:270px;--toast-border-radius:0.25rem;--toast-theme-default:#fff;--toast-theme-primary:#0d6efd;--toast-theme-secondary:#6c757d;--toast-theme-success:#198754;--toast-theme-danger:#dc3545;--toast-theme-warning:#ffc107;--toast-theme-info:#0dcaf0;--toast-theme-light:#f8f9fa;--toast-theme-dark:#212529}.toast-container{position:fixed;top:15px;right:15px;width:var(--toast-width)}.toast{font-size:.875rem;background-clip:padding-box;border:1px solid rgba(0,0,0,.05);border-radius:var(--toast-border-radius);box-shadow:0 .125rem .25rem rgba(0,0,0,.075);position:relative;overflow:hidden;transition:.3s opacity}.toast_default{color:#212529;background-color:var(--toast-theme-default)}.toast_primary{color:#fff;background-color:var(--toast-theme-primary)}.toast_secondary{color:#fff;background-color:var(--toast-theme-secondary)}.toast_success{color:#fff;background-color:var(--toast-theme-success)}.toast_danger{color:#fff;background-color:var(--toast-theme-danger)}.toast_warning{color:#212529;background-color:var(--toast-theme-warning)}.toast_info{color:#212529;background-color:var(--toast-theme-info)}.toast_light{color:#212529;background-color:var(--toast-theme-light)}.toast_dark{color:#fff;background-color:var(--toast-theme-dark)}.toast_danger .toast__close,.toast_dark .toast__close,.toast_primary .toast__close,.toast_secondary .toast__close,.toast_success .toast__close{filter:invert(1)}.toast:not(:last-child){margin-bottom:.75rem}.toast:not(.toast_show){display:none}.toast_showing{opacity:0}.toast__header{position:relative;padding:.5rem 2.25rem .5rem 1rem;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.05)}.toast__close{content:"";position:absolute;top:.75rem;right:.75rem;width:.875em;height:.875em;background:transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/.875em auto no-repeat;border:0;opacity:.5;cursor:pointer;transition:opacity .1s ease-in-out}.toast__close:hover{opacity:1}.toast__body{padding:1rem}.toast_message .toast__body{padding-right:2.25rem}
</style>
<?php if(empty($justnow)){}
else{ foreach ($onebook as $onebook1): ?>
<script>
    class Toast{constructor(t){this._title=!1!==t.title&&(t.title||"Title"),this._text=t.text||"Message...",this._theme=t.theme||"default",this._autohide=t.autohide&&!0,this._interval=+t.interval||5e3,this._create(),this._el.addEventListener("click",t=>{t.target.classList.contains("toast__close")&&this._hide()}),this._show()}_show(){this._el.classList.add("toast_showing"),this._el.classList.add("toast_show"),window.setTimeout(()=>{this._el.classList.remove("toast_showing")}),this._autohide&&setTimeout(()=>{this._hide()},this._interval)}_hide(){this._el.classList.add("toast_showing"),this._el.addEventListener("transitionend",()=>{this._el.classList.remove("toast_showing"),this._el.classList.remove("toast_show"),this._el.remove()},{once:!0});const t=new CustomEvent("hide.toast",{detail:{target:this._el}});document.dispatchEvent(t)}_create(){const t=document.createElement("div");t.classList.add("toast"),t.classList.add(`toast_${this._theme}`);let e='{header}<div class="toast__body"></div><button class="toast__close" type="button"></button>';const s=!1===this._title?"":'<div class="toast__header"></div>';if(e=e.replace("{header}",s),t.innerHTML=e,this._title?t.querySelector(".toast__header").textContent=this._title:t.classList.add("toast_message"),t.querySelector(".toast__body").textContent=this._text,this._el=t,!document.querySelector(".toast-container")){const t=document.createElement("div");t.classList.add("toast-container"),document.body.append(t)}document.querySelector(".toast-container").append(this._el)}}
    new Toast({
        title: 'Осталось всего <? echo $onebook1['count']; ?> книг<?php if($onebook1['count'] === 1){print 'а';} else {print 'и';}?>!',
        text: '<?php echo "Название: ", $onebook1['Name'], " Автор: ", $onebook1['Author'], " ISBN: ", $onebook1['ISBN']; ?>',
        theme: 'blue',
        autohide: true,
        interval: 9000
    });
</script>
<? endforeach; } ?>


