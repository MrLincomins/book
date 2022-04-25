<?php

namespace App\Controllers;
use App\Models\Author;
class AuthorController extends BaseController
{
  public function getTop100()
  {
    $authors = (new Author())->getTop100();
    return $this->render('autors/list.php', compact('authors'));
  }



  public function list()
  {
    $authors = (new Author())->list();
    return $this->render('autors/list.php', compact('authors'));
  }

}
