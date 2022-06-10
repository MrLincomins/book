<?php
use Application\Models\Book;
use Application\Models\User;
$Status = (new User())->CheckLogin();
If($Status !== 'Админ'){
  header('Location: /login');
  die;
}
//Надо отсканировать aplication/json что бы вписать данные
function repairUnqotedJsonValues(string $json) : string {
    $json = str_replace(": ", ":", $json);
    $json = str_replace("{ ", "{", $json);
    $json = str_replace(" }", "}", $json);
    $quotes = 0;
    $fixMode = false;
    $repaired = [];

    foreach (mb_str_split($json) as $char) {
        $add = [$char];

        if ($fixMode) {
            if ($char === ":") {
                array_push($add, "\"");
            }

            if ($char === "," || $char === "}") {
                array_unshift($add, "\"");
            }

            if ($char === "\"") {
                $fixMode = false;
            }
        }

        $repaired = array_merge($repaired, $add);

        if ($char === "\"") {
            $quotes++;
        }

        if ($quotes === 2) {
            $fixMode = true;
            $quotes = 0;
        }
    }

    return implode("", $repaired);
}
/** @var $weirdString */

//$weirdString =  = file_get_contents('php://input');
$json = repairUnqotedJsonValues($weirdString);
$user = json_decode($json);
$isbn = $user->{'isbn'};
$author = $user->{'полное имя автора'};
$nick = $user->{'название'};
$year = $user->{'год'};
$chr_ru_en = "A-Za-zА-Яа-яЁё0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]";
function emptysearch($UK) {
  if (empty($UK) == true){
    $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Данные были пропущены сканером";
    //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
    exit('Число было пропущено сканером');
  }
}
emptysearch($year);
emptysearch($isbn);
emptysearch($author);
emptysearch($nick);

if (preg_match("/^[$chr_ru_en]+$/u", $author)) {
} else {
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Неизвестные символы в имени автора";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  exit ('Неизвестные символы в имени автора');
}
if (preg_match("/^[$chr_ru_en]+$/u", $nick)) {
} else {
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Неизвестные символы в имени книги";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  exit ('Неизвестные символы в имени книги');
}

/* $numb = strlen($isbn);
$ukraine = $numb != 13;
if ($ukraine == true){
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: ISBN был отсканирован не правильно";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  echo '<div><a href="scanner.php">Искать</a></div>';
  exit ('ISBN был отсканирован не правильно');
}
*/
$numb1 = strlen($year);
$belarus = $numb1 != 4;
if ($belarus == true){
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Год был отсканирован не правильно";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  echo '<div><a href="scanner.php">Искать</a></div>';
  exit ('Год был отсканирован не правильно');
}
$belarus = 1900 > $year;
if ($belarus == true){
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Год был отсканирован не правильно";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  echo '<div><a href="scanner.php">Искать</a></div>';
  exit ('Год был отсканирован не правильно');
}
$belarus = 2030 < $year;
if ($belarus == true){
  $log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year не было допущено из-за: Год был отсканирован не правильно";
  //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
  echo '<div><a href="scanner.php">Искать</a></div>';
  exit ('Год был отсканирован не правильно');
}
echo 'Данные были успешно записаны';
$log = "ISBN: $isbn, Имя автора: $author, Название книги: $nick, Год: $year были успешно записаны";

$add = (new Book())->add($nick, $author, $year, $isbn);
//file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
?>
