
### Роутинг
```
GET /main - главная страница

// книги
POST /add - добавление новой позиции в библиотеку путем сканирования
GET /knigi - вывод всех книг
GET /books/{id} - удаление или редактирование книги по выбору
GET /add - Добавление книг отправкой формы
GET /top100 - топ 100 авторов
GET /year - Поиск по году (от, до)
GET /delete - Удаление/Изменение книги 

//Диски
GET /disk_add - Добавление диска
GET /disk - вывод всех дисков

//Махинации с пользователем
GET /register - регистрация
GET /show - вывод всех пользователей
GET /login - вход на сайт
GET /logout - выход из аккаунта
GET /account - личный кабинет
GET /booksgive - выдача книг пользователю
GET /booksreturn - возврат пользователем книги в библиотеку
```


### Принцип действия в библиотеки
```
1. Добавление книг в бд
2. Добавление учеников в бд
3. Инвентаризация
4. Проверка книги в бд и выдача ученику, привязка книги к ученику
5. Возврат книги от ученика в библиотеку, передача книги в свободный пул
6. Списание книги из бд
7. Привязка книги к полке
```
