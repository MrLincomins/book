<?php

namespace Application\Models;
/**
 * Класс автора.
 * Все данные об авторах из базы берем через этот класс
 */
class User extends Model
{

    private $table = "User";
    ///BGTS = Book Give To Student;

    public function register($Name, $Surname, $Patronymic, $Status, $Class, $Password)
    {
      $sql = "INSERT INTO {$this->table} (Name, Surname, Patronymic, Status, Class, Password) VALUES (:Name, :Surname, :Patronymic, :Status, :Class, :Password)";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(['Name' => $Name, 'Surname' => $Surname, 'Patronymic' => $Patronymic, 'Status' => $Status, 'Class' => $Class, 'Password' => $Password]);
      return $stmt->fetchAll();
    }

    public function all(): array
    {
        $sql = "SELECT * FROM {$this->table}";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }


    public function CheckAuth($Name, $Surname, $Patronymic, $Class, $Password, $Status): bool
    {
      $user = (new User())->all();
      foreach ($user as $user1){
        if ($user1['Name'] === $Name
         && password_verify($Password, $user1['Password']) === true
         && $user1['Surname'] === $Surname
         && $user1['Patronymic'] === $Patronymic
         && $user1['Class'] === $Class
         && $user1['Status'] === $Status
       )
       {
         return true;
       }
     }
     return false;
    }

    public function search_id($Name, $Surname, $Patronymic, $Class, $Password, $Status): array
    {
        $sql = "SELECT id FROM User WHERE Name = :Name AND Surname = :Surname AND Patronymic = :Patronymic AND Status = :Status AND Class = :Class AND Password = :Password";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['Name' => $Name, 'Surname' => $Surname, 'Patronymic' => $Patronymic, 'Status' => $Status, 'Class' => $Class, 'Password' => $Password]);
        return $stmt->fetchAll();
    }

    public function CheckLogin(): ?string
    {
      $Name = @$_COOKIE['Nick'];
      $Surname = @$_COOKIE['Surname'];
      $Patronymic = @$_COOKIE['Patronymic'];
      $Class = @$_COOKIE['Class'];
      $Password = @$_COOKIE['Password'];
      $Status = @$_COOKIE['Status'];

      if((new User())->CheckAuth($Name, $Surname, $Patronymic, $Class, $Password, $Status))
      {
        return $Status;
      }
      return null;
    }

    public function give($idbook, $iduser, $DATE): array
    {
        $sql = "INSERT INTO BGTS (idbook, iduser, DATE) VALUES (:idbook, :iduser, :DATE)";
        $sql1 = "UPDATE books SET count = count - 1 WHERE newid = :idbook";
        $stmt = $this->connection->prepare($sql);
        $stmt1 = $this->connection->prepare($sql1);
        $stmt->execute(['idbook' => $idbook, 'iduser' => $iduser, 'DATE' => $DATE]);
        $stmt1->execute(['idbook' => $idbook]);
        return $stmt->fetchAll();
        return $stmt1->fetchAll();
    }

    public function checkforbook($iduser): array
    {
        $sql = "SELECT * FROM BGTS WHERE iduser = :iduser";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['iduser' => $iduser]);
        return $stmt->fetchAll();
    }

    public function checkbook($idbook): array
    {
        $sql = "SELECT * FROM books WHERE newid = :newid";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['newid' => $idbook]);
        return $stmt->fetchAll();
    }

    public function checkuser($iduser): array
    {
        $sql = "SELECT * FROM User WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $iduser]);
        return $stmt->fetchAll();
    }

    public function return_book($iduser, $idbook):array
    {
        $sql = "DELETE FROM BGTS WHERE iduser = :iduser";
        $sql1 = "UPDATE books SET count = count + 1 WHERE newid = :idbook";
        $stmt = $this->connection->prepare($sql);
        $stmt1 = $this->connection->prepare($sql1);
        $stmt->execute(['iduser' => $iduser]);
        $stmt1->execute(['idbook' => $idbook]);
        return $stmt->fetchAll();
        return $stmt1->fetchAll();
    }
}


