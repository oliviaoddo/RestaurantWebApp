-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: menu_DB
-- ------------------------------------------------------
-- Server version	5.7.15

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `protien` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Mushroom Pizza',10,'Our delicious thin crust with Mozzarella and Shiitake Mushrooms','Pizza',897,8,33,5,11,'2016-10-05'),(2,'Cheese Pizza',9,'Our delicious thin crust with Mozzarella cheese and marinara sauce','Pizza',855,7,32,6,10,'2016-10-05'),(3,'Pepperoni Pizza',10,'Our delicious thin crust with Mozzarella cheese, marinara sauce, and Pepperoni.','Pizza',865,9,34,9,12,'2016-10-05'),(4,'Hawaiian Pizza',12,'Our delicious thin crust with Mozzarella cheese, ham, and pineapple','Pizza',954,8,37,7,14,'2016-10-05'),(5,'BLT',9,'Bacon, lettuce, and tomato on a french roll','Sandwich',864,9,28,6,10,'2016-10-05'),(6,'Steak Sandwich',13,'Steak, grilled onions, jack cheese, on sour dough','Sandwich',975,9,31,12,9,'2016-10-05'),(7,'Breakfast Sandwich',7,'Egg, cheddar cheese, and ham on an english muffin','Sandwich',675,6,25,14,7,'2016-10-05'),(8,'Chicken Panini',10,'Grilled chicken breast, jack cheese, avocado, and tomatoes on white bread','Sandwich',1000,12,32,13,9,'2016-10-05'),(9,'Turkey Panini',10,'Turkey breast, jack cheese, mushrooms, pesto on wheat bread','Sandwich',989,9,34,14,6,'2016-10-05'),(10,'Cobb Salad',13,'Chopped salad greens, tomato, crisp bacon, boiled, grilled or roasted chicken breast, hard-boiled egg, avocado, chives','Salad',1200,13,15,11,7,'2016-10-05'),(11,'Ceaser Salad',12,'Romaine lettuce and croutons dressed with parmesan cheese, lemon juice, olive oil,','Salad',1134,9,10,6,10,'2016-10-05'),(12,'Peach Salad',13,'Mixed greens, feta cheese, peach, crutons, balsamic dressing','Salad',925,6,11,4,14,'2016-10-05'),(13,'Pear Salad',13,'Mixed greens, walnuts, cheese, pear, balsamic dressing','Salad',940,6,17,6,15,'2016-10-05'),(14,'Chicken Noodle',5,'Shredded chicken, carrots, celery, broth','Soup',625,5,10,14,13,'2016-10-05'),(15,'Tomato Basil',4,'Creamy tomato, basil puree with a toasted cruton','Soup',564,8,23,3,9,'2016-10-05'),(16,'Potato Cheese',5,'Potatoes, cheese, bacon, broccoli','Soup',530,9,40,7,6,'2016-10-05'),(17,'French Onion',4,'Meat stock and onions, and often served gratinéed with croutons and cheese on top','Soup',560,6,24,4,5,'2016-10-05'),(18,'Pesto Pasta',11,'Penne pasta with parmesan cheese and creamy pesto','Pasta',1156,6,41,7,9,'2016-10-05'),(19,'Mac n\' Cheese',9,'Elbow pasta with creamy cheddar cheese sauce','Pasta',979,9,44,4,11,'2016-10-05'),(20,'Tortellini',10,'Tortellini stuffed with five cheeses in an alfredo sauce','Pasta',1450,9,36,5,9,'2016-10-05'),(21,'Spaghetti',12,'Ground beef, mushrooms, onions, marinara sauce, spaghetti noodles','Pasta',1076,9,43,12,11,'2016-10-05');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-10 10:43:01
