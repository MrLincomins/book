<html lang="ru_RU">
    <body>
        <h1>Книги</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Автор</th>
                        <th>Количество книг</th>
                    </tr>
                </thead>
                <?php /** @var array $books */
                    foreach ($books as $book):?>
                    <tr>
                        <td><?php echo $book["Author"]?></td>
                        <td><?php echo $book["books_count"]?></td>
                    </tr>
                    <?php endforeach;?>
            </table>
        </div>
    </body>
</html>
