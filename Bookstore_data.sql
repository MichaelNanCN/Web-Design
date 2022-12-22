-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `bookId` int NOT NULL AUTO_INCREMENT,
  `categoryId` int DEFAULT NULL,
  `title` varchar(800) DEFAULT NULL,
  `author` varchar(800) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `readNow` int DEFAULT NULL,
  PRIMARY KEY (`bookId`),
  KEY `categoryId_FK_idx` (`categoryId`),
  CONSTRAINT `categoryId_FK` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,1,'Accounting Principles','Jerry J. Weygandt',27.32,'account_principles.png',1),(2,1,'Accounting','Peter J Eisen',7.73,'accounting_peter.png',1),(3,1,'Accounting','Dr. Carl S Warren',12.01,'accounting_w&r&d.png',0),(4,1,'Intermediate Accounting','Donald E. Kieso',24.99,'inter_account.png',1),(5,2,'Currency Trading','Paul Mladjenovic',17.25,'currency_trading.png',1),(6,2,'Currency Wars','James Rickards',7.36,'currency_war_james.png',1),(7,2,'Currency War','Lawrence B Lindsey',19.76,'currency_war_lawrence.png',0),(8,2,'Hard Currency','Stuart M Kaminsky',117.60,'hard_currency.png',1),(9,3,'The Lords of Easy Money','Christopher Leonard',16.92,'easy_money.png',1),(10,3,'Securitization and the...','Bonnie G Buchanan',130.83,'global_economy.png',1),(11,3,'The Politics of Heritage...','Derek R. Peterson',34.67,'politics_africa.png',0),(12,3,'The World Economy','W W Rostow, PH.D.',72.01,'poor_rich_rich_slow.png',1),(13,4,'The Beardstown Ladies...','Leslie Whitaker',6.00,'common_investment.png',0),(14,4,'Investments','Alan Marcus',14.34,'investment_b&k&m.png',1),(15,4,'Investments','William F. Sharpe',17.04,'investment_william.png',1),(16,4,'ISE Investments','Zvi Bodie',70.60,'ise_investment.png',1);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Accounting'),(2,'Currency'),(3,'Economy History'),(4,'Investment');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-12 23:12:17
