-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: books
use book;
-- ------------------------------------------------------
-- Server version	8.0.29
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `BGTS`
--

DROP TABLE IF EXISTS `BGTS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `BGTS` (
  `iduser` int NOT NULL,
  `idbook` int NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BGTS`
--

LOCK TABLES `BGTS` WRITE;
INSERT INTO `BGTS` (`iduser`, `idbook`, `DATE`) VALUES (7,2,'2022-08-28'),(9,2,'2022-10-07');
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `newid` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(70) DEFAULT NULL,
  `Author` varchar(70) DEFAULT NULL,
  `Year` year DEFAULT NULL,
  `ISBN` varchar(14) DEFAULT NULL,
  `count` int DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `picture` varchar(100) NOT NULL,
  PRIMARY KEY (`newid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
INSERT INTO `books` (`newid`, `Name`, `Author`, `Year`, `ISBN`, `count`, `genre`, `picture`) VALUES (1,'Биология','В. В. Пасечник',2019,'9785090721400',1,'etc','https://pictures.abebooks.com/isbn/9785090721400-us-300.jpg'),(2,'География','ггг',2000,'9785090717335',1,'etc','https://pictures.abebooks.com/isbn/9785090717335-us-300.jpg'),(3,'Обществознание 9 ','Л. Н. Боголюбов',2018,'9785090704274',1,'etc','https://pictures.abebooks.com/isbn/9785090704274-us-300.jpg'),(4,'451 градус по Фаренгейту','Рэй Брэдбери',2019,'9785041045272',1,'Роман','https://pictures.abebooks.com/isbn/9785041045272-us-300.jpg');
UNLOCK TABLES;

--
-- Table structure for table `disks`
--

DROP TABLE IF EXISTS `disks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `disks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(70) DEFAULT NULL,
  `Author` varchar(70) DEFAULT NULL,
  `Code` varchar(30) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disks`
--

LOCK TABLES `disks` WRITE;
INSERT INTO `disks` (`id`, `Name`, `Author`, `Code`, `Description`) VALUES (1,'OP','op','78457','Tdxt'),(2,'IUU','IUT','999999999999','IIIIIYVTY'),(3,'Диск','аВТОР','5435','описание'),(4,'Диск','аВТОР','5435','описание');
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
INSERT INTO `genre` (`id`, `genre`) VALUES (1,'Роман'),(2,'Классика'),(3,'Боевик'),(4,'Драмма'),(5,'Фантастика'),(6,'etc'),(8,'Детектив'),(10,'Триллер');
UNLOCK TABLES;

--
-- Table structure for table `toobook`
--

DROP TABLE IF EXISTS `toobook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `toobook` (
  `idbook` int NOT NULL,
  `iduser` int NOT NULL,
  `DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toobook`
--

LOCK TABLES `toobook` WRITE;
INSERT INTO `toobook` (`idbook`, `iduser`, `DATE`) VALUES (2,6,'2022-08-11');
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `class` varchar(3) DEFAULT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
INSERT INTO `users` (`id`, `name`, `status`, `class`, `password`) VALUES (1,'Шагидуллин Дамир Рустемович',1,'9А','misterpika20');
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-30 15:25:19
