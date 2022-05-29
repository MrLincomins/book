### Описание
Простая реализация MVC фреймворка на php.
Это автоматизированная библиотека, хранящая книги и диски. 
Поиск осуществляется с помощью сканера, который позволяет посылать POST запрос:
```
POST /scan
Content-Type: application/json
Accept: application/json
{"isbn": <int>, "author_full_name": <string>, "title": <string>,
"year": <int>}
```


### Роутинг
```
POST /scan - добавление новой позиции в библиотеку путем сканирования

// книги
GET /books - вывод всех книг
GET /books/search - поиск книг (?author_name=по автору, ?name=по названию.)

// авторы
GET /authors/all
GET /authors/top

// диски
GET /disks - вывод всех дисков
GET /disks/search - поиск дисков (?author_name=по автору, ?name=по названию.)

// категории
GET /categories - вывод всех категорий
GET /categories/statitstics - вывод списка категорий и количества книг в каждой из них
```



### Окружение

Используем простую сборку докера. 


- Запустить в консоли из корневой папке ```docker-compose up -d```
- Настроить подключение к бд _(host: 127.0.0.1, db_name: book, login: book_login, password: book_password)_
- Залить дамп готовой базы

Для доступа к консоли приложения выполняем ```docker-compose exec book-php bash```
