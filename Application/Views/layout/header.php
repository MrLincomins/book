<?php
use Application\Models\User;
use Application\Models\Book;
$Status = (new User())->CheckLogin();
var_dump($_COOKIE);
@$justnow = $_COOKIE['justnow'];
?>
<?php if(empty($justnow)){}
else{ foreach ($onebook as $onebook1): ?>
<script>
    class Toast{constructor(t){this._title=!1!==t.title&&(t.title||"Title"),this._text=t.text||"Message...",this._theme=t.theme||"default",this._autohide=t.autohide&&!0,this._interval=+t.interval||5e3,this._create(),this._el.addEventListener("click",t=>{t.target.classList.contains("toast__close")&&this._hide()}),this._show()}_show(){this._el.classList.add("toast_showing"),this._el.classList.add("toast_show"),window.setTimeout(()=>{this._el.classList.remove("toast_showing")}),this._autohide&&setTimeout(()=>{this._hide()},this._interval)}_hide(){this._el.classList.add("toast_showing"),this._el.addEventListener("transitionend",()=>{this._el.classList.remove("toast_showing"),this._el.classList.remove("toast_show"),this._el.remove()},{once:!0});const t=new CustomEvent("hide.toast",{detail:{target:this._el}});document.dispatchEvent(t)}_create(){const t=document.createElement("div");t.classList.add("toast"),t.classList.add(`toast_${this._theme}`);let e='{header}<div class="toast__body"></div><button class="toast__close" type="button"></button>';const s=!1===this._title?"":'<div class="toast__header"></div>';if(e=e.replace("{header}",s),t.innerHTML=e,this._title?t.querySelector(".toast__header").textContent=this._title:t.classList.add("toast_message"),t.querySelector(".toast__body").textContent=this._text,this._el=t,!document.querySelector(".toast-container")){const t=document.createElement("div");t.classList.add("toast-container"),document.body.append(t)}document.querySelector(".toast-container").append(this._el)}}
    new Toast({
        title: 'Осталось всего <?php echo $onebook1['count']; ?> книг<?php if($onebook1['count'] === 1){print 'а';} else {print 'и';}?>!',
        text: '<?php echo "Название: ", $onebook1['Name'], " Автор: ", $onebook1['Author'], " ISBN: ", $onebook1['ISBN']; ?>',
        theme: 'success',
        autohide: true,
        interval: 9000
    });
</script>
<?php endforeach; } ?>


<link rel="stylesheet" type="text/css" href="22.css">
<nav class="dropdownmenu">
    <ul>
        <li><a href="http://localhost:8080/main">Главная</a></li>
        <?php if($Status !== null): ?>
        <li><a href="http://localhost:8080/account">Аккаунт</a></li>
        <?php endif; ?>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Книги</a>
            <div class="dropdown-content">
                <a href="http://localhost:8080/knigi">Все книги</a>
                <a href="http://localhost:8080/top100">Топ 100 авторов</a>
                <a href="http://localhost:8080/year">Поиск книг по году</a>
                <?php if($Status === 'Админ'): ?>
                <a href="http://localhost:8080/add">Добавить книгу</a>
                <?php endif; ?>
            </div>
        </li

        <li class="dropdown">
            <a href=" <?php if($Status !== 'Админ'){ echo 'http://localhost:8080/disk'; } ?>" class="dropbtn">Диски</a>
            <div class="dropdown-content">
                <?php if($Status === 'Админ'): ?>
                <a href="http://localhost:8080/disk">Все Диски</a>
                <a href="http://localhost:8080/disk_add">Добавить диск</a>
                <?php endif; ?>
            </div>
        </li>

        <li class="dropdown">
            <a href="<?php if($Status !== 'Админ'){ echo 'http://localhost:8080/toobook'; } ?>" class="dropbtn">Бронирование книг</a>
            <div class="dropdown-content">
                <?php if($Status === 'Админ'): ?>
                <a href="../toobook">Бронирование книги</a>
                <a href="http://localhost:8080/alltoobook">Все забронированные книги</a>
                <?php endif; ?>
            </div>
        </li>
        <?php if($Status === 'Админ'): ?>

        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Выдача/Сбор книг</a>
            <div class="dropdown-content">
                <a href="http://localhost:8080/booksgive">Выдача книги ученику</a>
                <a href="http://localhost:8080/booksreturn">Сбор книги ученика</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Пользователи</a>
            <div class="dropdown-content">
                <a href="http://localhost:8080/show">Все пользователи</a>
                <a href="http://localhost:8080/register">Регистрация пользователей</a>
            </div>
        </li>
        <?php endif; ?>
        <?php if($Status !== null): ?>
        <li><a href="http://localhost:8080/logout">Выход</a></li>
        <?php endif; ?>
        <?php if($Status === null): ?>
        <li><a href="http://localhost:8080/login">Вход</a></li>
        <?php endif; ?>

    </ul>
</nav>

