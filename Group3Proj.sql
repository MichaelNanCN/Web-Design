-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: hotel
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
  `book_id` int NOT NULL AUTO_INCREMENT,
  `guest_id_FK` int DEFAULT NULL,
  `room_id_FK` int DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `breakfast` int DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `room_type_id` int DEFAULT NULL,
  `preference_id_FK` int DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE,
  KEY `guest_id_FK_idx` (`guest_id_FK`) USING BTREE,
  KEY `room_id_FK_idx` (`room_id_FK`) USING BTREE,
  KEY `preference_id_FK_idx` (`preference_id_FK`) USING BTREE,
  CONSTRAINT `guest_id_FK` FOREIGN KEY (`guest_id_FK`) REFERENCES `guest` (`guest_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `preference_id_FK` FOREIGN KEY (`preference_id_FK`) REFERENCES `preference` (`preference_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `room_id_FK` FOREIGN KEY (`room_id_FK`) REFERENCES `room` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (26,NULL,NULL,NULL,NULL,'2022-12-05','2022-12-09',2,NULL),(27,NULL,NULL,NULL,NULL,'0002-02-02','0002-02-02',2,NULL),(33,NULL,NULL,NULL,NULL,'0002-02-02','0002-02-02',2,NULL),(34,NULL,NULL,NULL,NULL,'2022-12-15','2022-12-22',4,NULL),(35,NULL,NULL,NULL,NULL,'2022-12-15','2022-12-22',4,NULL),(36,NULL,NULL,NULL,NULL,'2022-12-08','2022-12-22',3,NULL),(37,NULL,NULL,NULL,NULL,'2022-12-08','2022-12-22',3,NULL),(38,NULL,NULL,NULL,NULL,'2022-12-16','2022-12-27',5,NULL),(39,NULL,NULL,NULL,NULL,'2022-12-07','2022-12-08',5,NULL),(40,NULL,NULL,NULL,NULL,'2022-12-07','2022-12-08',5,NULL),(41,NULL,NULL,NULL,NULL,'2022-12-07','2022-12-21',4,NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest`
--

DROP TABLE IF EXISTS `guest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest` (
  `guest_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `loyalty_card_number` int DEFAULT NULL,
  PRIMARY KEY (`guest_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest`
--

LOCK TABLES `guest` WRITE;
/*!40000 ALTER TABLE `guest` DISABLE KEYS */;
/*!40000 ALTER TABLE `guest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preference`
--

DROP TABLE IF EXISTS `preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preference` (
  `preference_id` int NOT NULL AUTO_INCREMENT,
  `floor` int DEFAULT NULL,
  `smoke_free` int DEFAULT NULL,
  PRIMARY KEY (`preference_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preference`
--

LOCK TABLES `preference` WRITE;
/*!40000 ALTER TABLE `preference` DISABLE KEYS */;
/*!40000 ALTER TABLE `preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `price` int DEFAULT NULL,
  `num_of_guest` int DEFAULT NULL,
  `room_type_FK` int DEFAULT NULL,
  PRIMARY KEY (`room_id`) USING BTREE,
  KEY `room_type_FK_idx` (`room_type_FK`) USING BTREE,
  CONSTRAINT `room_type_FK` FOREIGN KEY (`room_type_FK`) REFERENCES `room_type` (`room_type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (1,150,2,1),(2,150,2,1),(3,150,2,1),(4,150,2,1),(5,150,2,1),(6,150,2,1),(7,150,2,1),(8,155,2,2),(9,155,2,2),(10,155,2,2),(11,155,2,2),(12,155,2,2),(13,155,2,2),(14,155,2,2),(15,160,2,3),(16,160,2,3),(17,165,2,4),(18,165,2,4),(19,300,2,5),(20,310,2,6);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_type`
--

DROP TABLE IF EXISTS `room_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room_type` (
  `room_type_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bed_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bed_number` int DEFAULT NULL,
  `num_available_room` int DEFAULT NULL,
  PRIMARY KEY (`room_type_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_type`
--

LOCK TABLES `room_type` WRITE;
/*!40000 ALTER TABLE `room_type` DISABLE KEYS */;
INSERT INTO `room_type` VALUES (1,'Suite Queen','Queen',2,2),(2,'Suite King','King',1,2),(3,'Deluxe Queen','Queen',2,3),(4,'Deluxe King','King',1,3),(5,'Superior Queen','Queen',2,5),(6,'Superior King','King',1,5);
/*!40000 ALTER TABLE `room_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-05 23:09:08
