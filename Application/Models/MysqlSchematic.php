<?php

namespace Application\Models;

class MysqlSchematic extends Model
{
    public function AllSchemas(): array
    {


        $sql =
            "
            CREATE TABLE books
            (
                newid INT NOT NULL AUTO_INCREMENT,
                Name VARCHAR(70),
                Author VARCHAR(70),
                Year YEAR,
                ISBN VARCHAR(14),
                count INT,
                PRIMARY KEY (newid)
            ) ENGINE=innodb;
            
            ALTER TABLE `books`.`books`
            CHARACTER SET = utf8 , COLLATE = utf8_general_ci
            ";

        $sql1 =
            "
            CREATE TABLE User
            (
                id INT NOT NULL AUTO_INCREMENT,
                Name VARCHAR(70) NOT NULL,
                Surname VARCHAR(70) NOT NULL,
                Patronymic VARCHAR(40),
                Status VARCHAR(40) NOT NULL,
                Class VARCHAR(3) NOT NULL,
                Password VARCHAR(25) NOT NULL,
                PRIMARY KEY (id)
            ) ENGINE=innodb;
            
            ALTER TABLE `books`.`User`
            CHARACTER SET = utf8 , COLLATE = utf8_general_ci
            ";

        $sql2 =
            "
            CREATE TABLE BGTS
            (
                iduser INT NOT NULL,
                idbook INT NOT NULL,
                DATE DATE
            ) ENGINE=innodb;
            
            ALTER TABLE `books`.`BGTS`
            CHARACTER SET = utf8 , COLLATE = utf8_general_ci
            ";

        $sql3 =
            "
            CREATE TABLE disks
            (
                id INT NOT NULL AUTO_INCREMENT,
                Name VARCHAR(70),
                Author VARCHAR(70),
                Code INT(40) NOT NULL,
                Description VARCHAR(255),
                PRIMARY KEY (id)
            ) ENGINE=innodb;
            
            ALTER TABLE `books`.`books`
            CHARACTER SET = utf8 , COLLATE = utf8_general_ci 
            ";

       $sql4 =
           "
        CREATE TABLE toobook
    (
        idbook INT NOT NULL,
				iduser INT NOT NULL,
                DATE DATE
            ) ENGINE=innodb;
            
            ALTER TABLE `books`.`books`
            CHARACTER SET = utf8 , COLLATE = utf8_general_ci;
            ";

        $stmt = $this->connection->prepare($sql);
        $stmt1 = $this->connection->prepare($sql1);
        $stmt2 = $this->connection->prepare($sql2);
        $stmt3 = $this->connection->prepare($sql3);

        return $stmt->fetchAll();
        return $stmt1->fetchAll();
        return $stmt2->fetchAll();
        return $stmt3->fetchAll();
    }
}