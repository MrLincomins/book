<?php

namespace App\Controllers;
use App\Controllers\Repair;
use App\Models\Book;

class BookController extends BaseController
{

    public function list()
    {
        $books = (new Book())->all();

        return $this->render('books/list.php', compact('books'));
    }

    public function scan()
    {
        $weirdString = file_get_contents('php://input');
        return $this->render('books/scanner.php', compact('weirdString'));
    }

    public function add($Name, $Author, $Year, $ISBN)
    {

    $add = (new Book())->add($Name, $Author, $Year, $ISBN);
    }




    public function delete($id)
    {
      $delete = (new Book())->delete($id);
      foreach ($delete as $book){
        echo "Вы удалили книгу ";
        echo " Название: ", $book["Name"], ", ";
        echo " Автор: ", $book["Author"], ", ";
        echo " Год: ", $book["Year"], ", ";
        echo " ISBN ", $book["ISBN"], ", ";
      }
    }

    public function edit($id)
    {
    $what = "Понимаю, долго делал и криво немного, но зато понял и скоро всё поправлю";
    return $this->render('books/update.php', compact('id'));

    }

}
