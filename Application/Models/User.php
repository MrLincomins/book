<?php

namespace Application\Models;
/**
 * Класс автора.
 * Все данные об авторах из базы берем через этот класс
 */
class User extends Model
{

    private $table = "User";

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


    public function CheckAuth($Name, $Surname, $Patronymic, $Class, $Password): bool
    {
      $user = (new User())->all();
      foreach ($user as $user1){
        if ($user1['Name'] === $Name
         && $user1['Password'] === $Password
         && $user1['Surname'] === $Surname
         && $user1['Patronymic'] === $Patronymic
         && $user1['Class'] === $Class
       )
       {
         return true;
       }
     }
     return false;
    }

    public function CheckLogin(): ?string
    {
      $Name = @$_COOKIE['Name'];
      $Surname = @$_COOKIE['Surname'];
      $Patronymic = @$_COOKIE['Patronymic'];
      $Class = @$_COOKIE['Class'];
      $Password = @$_COOKIE['Password'];

      if((new User())->CheckAuth($Name, $Surname, $Patronymic, $Class, $Password))
      {
        return $Name;
      }
      return null;
    }

}
