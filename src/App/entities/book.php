<?php
namespace App\entities;
use PDO;
class book extends PDO{
    protected $dbO;
    protected $mysql;
    public function __construct(PDO $dbO, $mysql){
        $this->dbO = $dbO;
        $this->mysql = $mysql;
    }

    public function getAllFoos() {
        if (empty($this->mysql)) {
          return $this->dbO->query("SELECT * FROM books");
        }else{
          return $this->dbO->query("$this->mysql");
        }
    }
}
