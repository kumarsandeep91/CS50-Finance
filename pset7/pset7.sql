-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(10) NOT NULL,
  `price` float unsigned NOT NULL,
  `transaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (8,'MSFT',100,43,'BUY','2015-02-10 17:20:53'),(8,'MSFT',1000,42.64,'BUY','2015-02-10 17:23:50'),(8,'ibm',700,156.16,'SELL','2015-02-10 17:24:20'),(8,'AAPL',1500,121.33,'SELL','2015-02-10 17:26:03'),(8,'GOOGL',500,535.605,'SELL','2015-02-10 17:26:30'),(8,'INFY',2000,36.47,'SELL','2015-02-10 17:26:52'),(8,'FB',5000,75.16,'SELL','2015-02-10 17:27:19'),(8,'MSFT',1100,42.7,'SELL','2015-02-10 17:28:55'),(8,'SIRI',10000,3.745,'SELL','2015-02-10 17:29:13'),(8,'TWTR',1000,45.98,'SELL','2015-02-10 17:29:24'),(8,'YHOO',1000,43.03,'SELL','2015-02-10 17:29:33'),(8,'MSFT',2000,42.6999,'BUY','2015-02-10 17:30:32'),(8,'AAPL',1500,121.405,'BUY','2015-02-10 17:33:28'),(8,'YHOO',1000,43.02,'BUY','2015-02-10 17:34:06'),(8,'TWTR',1100,46.1,'BUY','2015-02-10 17:34:28'),(8,'GOOGL',1000,536.23,'BUY','2015-02-10 17:35:44'),(8,'IBM',1400,156.66,'BUY','2015-02-10 17:36:07'),(8,'FB',3000,75.2,'BUY','2015-02-10 17:37:01'),(8,'INFY',5000,36.43,'BUY','2015-02-10 17:37:57'),(11,'GOOGL',1000,535.93,'SELL','2015-02-10 17:49:32'),(11,'GOOGL',500,535.93,'BUY','2015-02-10 17:49:56'),(8,'fb',100,78.99,'BUY','2015-05-02 08:44:15'),(12,'fb',50,78.99,'BUY','2015-05-02 10:09:07');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(10) NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (8,'AAPL',1500),(8,'FB',3100),(8,'GOOGL',1000),(8,'IBM',1400),(8,'INFY',5000),(8,'MSFT',2000),(8,'TWTR',1100),(8,'YHOO',1000),(10,'msft',50),(11,'aapl',1100),(11,'fb',5100),(11,'GOOGL',500),(11,'msft',5000),(12,'fb',50);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '10000.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'belindazeng','$1$50$oxJEDBo9KDStnrhtnSzir0',10000.0000),(2,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000),(4,'malan','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000),(5,'rob','$1$HA$l5llES7AEaz8ndmSo5Ig41',10000.0000),(6,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',10000.0000),(7,'zamyla','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000),(8,'sandeep','$1$/6.HU0i2$LWqbx2Z/Dc8M85nd6DBnb/',94524.7000),(10,'mayur jaiswal','$1$ww.xMCDf$ov/YeqtXKmOnfUW4a2pjp.',10000.0000),(11,'rajni patel','$1$/2bnaz7V$WvuUaHA9XZhOPDfs8aosu1',277964.9500),(12,'test','$1$sG.0bYTU$u9caBh9ZiLhFDe5KGeIhB/',6050.5000),(13,'sony kurian','$1$hs4axKHz$bxgOHn7JQ2Nvg3nMTM4qi1',10000.0000);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-12 15:15:02
