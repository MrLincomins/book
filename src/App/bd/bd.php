<?php
namespace App\bd;
use PDO;
class BD extends PDO {
  public $server = 'localhost';
  public $user = 'root';
  public $password = 'misterpika20';
  public $db = 'books_bd';
  public $charset = "utf8";
  public function __construct() {
    parent::__construct('mysql:host='. $this->server .';dbname='. $this->db .';charset='. $this->charset .'', $this->user, $this->password);
    $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}
