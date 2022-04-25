<html lang="ru_RU">
    <body>
        <h1>Авторы</h1>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Авторы</th>
                        <th>кол-во книг</th>
                    </tr>
                </thead>
                <?php /** @var array $authors */
                    foreach ($authors as $author):?>
                    <tr>

                        <td><?php echo $author["Author"]?></td>
                        <td><?php echo $author["cnt"]?></td>
                    </tr>
                    <?php endforeach;?>
            </table>
        </div>
    </body>
</html>
