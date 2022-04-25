# Недоработанная версия, содержит несколько багов. #

Для запуска: находим корень проекта и в powershell запускаем `composer install`.

Для запуска `Docker-compose`, заходим в корень проекта и в powershell запускаем `docker-compose up --build` .

`localhost:8080/` - Список всех книг.

`localhost:8080/add` - Добавление книги при помощи POST запроса.

`localhost:8080/authors` - Список всех авторов и количество книг.

`localhost:8080/authors/top` - Топ 100 авторов по количеству книг.

`localhost:8080/books/{id}` - Удаление книги по айдишнику.
