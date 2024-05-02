/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.10-MariaDB : Database - local_youtube
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`local_youtube` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `local_youtube`;

/*Table structure for table `add_item_category` */

DROP TABLE IF EXISTS `add_item_category`;

CREATE TABLE `add_item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `v_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `add_item_category` */

insert  into `add_item_category`(`id`,`v_item_id`,`user_id`,`category_id`,`created_at`) values (1,13,1,0,'2020-03-27 20:47:27'),(2,13,1,26,'2020-03-27 20:48:28'),(3,13,1,27,'2020-03-27 21:05:20'),(4,1,1,28,'2020-03-28 04:12:17'),(5,1,1,29,'2020-03-28 04:12:25');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(40) NOT NULL,
  `category_icon` varchar(400) NOT NULL,
  `subscribe` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`category_name`,`category_icon`,`subscribe`,`created_at`,`is_active`) values (1,'秀逸な発想','4_3.jpg',1,'2022-03-05 00:00:00',1),(2,'作者は天才','2_11.jpg',2,'2020-03-05 00:00:00',1),(3,'プロの仕業','2_3.jpg',3,'2020-03-05 00:00:00',1),(4,'是非とも欲しい','2020-02-05_22h20_53.png',4,'2020-03-05 00:00:00',1),(5,'理想の生活','2020-03-05_18h25_13.png',5,'2020-03-05 00:00:00',1),(6,'懐かしい光景','2020-03-05_18h28_18.png',6,'2020-03-05 00:00:00',1),(27,'qwertyui','default.png',0,'2020-03-27 21:05:20',0),(28,'test','default.png',0,'2020-03-28 04:12:17',0),(29,'add_category','default.png',0,'2020-03-28 04:12:25',0);

/*Table structure for table `commit` */

DROP TABLE IF EXISTS `commit`;

CREATE TABLE `commit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `i_item_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `commit` varchar(4096) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `commit` */

insert  into `commit`(`id`,`user_id`,`i_item_id`,`v_item_id`,`commit`,`created_at`) values (1,1,4,0,'123123123213213123123123',NULL),(2,0,4,0,'sadfsadfsadf','2019-12-19 09:37:20'),(3,0,1,0,'sadfdasfasf','2019-12-19 10:03:28'),(4,1,4,0,'rqasdfdasferq34234','2019-12-19 10:04:38'),(5,1,1,0,'124sdagsdffgaf','2019-12-19 10:04:45'),(6,1,0,5,'sadfasdfdsaf','2019-12-19 14:26:17'),(7,1,0,5,'asdfadsfadsf','2019-12-19 14:26:20'),(8,1,0,5,'q32423weferf','2019-12-19 14:26:24'),(9,1,0,1,'dfgsdg','2019-12-19 15:30:17'),(10,1,0,1,'qwrqewrwer','2019-12-19 15:30:21'),(11,1,0,1,'fdasfadsfdsfdsfdsf','2019-12-19 15:30:28'),(12,1,0,2,'gdfasfsafdsfdsaf','2019-12-19 15:31:02'),(13,1,0,2,'asdfdsafdsafasdf','2019-12-19 15:31:05'),(14,1,4,0,'very nice','2020-02-11 02:24:09'),(15,1,0,12,'great!','2020-03-26 09:29:54'),(16,1,0,12,'プロの仕業','2020-03-26 09:32:28');

/*Table structure for table `img_items` */

DROP TABLE IF EXISTS `img_items`;

CREATE TABLE `img_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `views` int(11) NOT NULL,
  `favorite` int(11) NOT NULL,
  `media` varchar(250) DEFAULT NULL,
  `disgust` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_video` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `img_items` */

insert  into `img_items`(`id`,`title`,`category`,`views`,`favorite`,`media`,`disgust`,`created_at`,`is_active`,`is_video`) values (1,'Wedding Screenshots','1',11,63,'1.mp4',2,'2019-06-14 05:51:25',1,0),(2,'Camping Screenshots','2',12,0,'2.mp4',0,'2019-06-14 05:56:10',1,0),(3,'Music Video Screenshots','3',1,35,'3.mp4',5,'2019-06-14 06:49:02',1,0),(4,'Birthday Screenshots','1',2,457,'4.mp4',1,'2019-06-14 22:33:26',1,0),(5,'Holiday Screenshots','1',15,0,'5.mp4',0,'2019-06-14 22:37:01',1,0),(6,'自然の風景','2',16,43,'6.mp4',0,'2019-06-15 03:59:15',1,0),(7,'asdfasdfasdf','3',17,35,'7.mp4',1,'2019-06-15 05:30:26',1,0),(9,'wwwwwww','3',18,0,'2.mp4',0,'2019-06-15 05:39:58',1,0),(12,'Test comment repeat','2',1,0,'4.mp4',0,'2019-06-19 16:06:04',1,0),(44,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(45,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(46,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(47,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(48,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(49,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(50,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(51,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(52,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(53,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(54,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(55,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(56,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0),(57,'','',2,0,NULL,0,'0000-00-00 00:00:00',1,0),(58,'','',1,0,NULL,0,'0000-00-00 00:00:00',1,0);

/*Table structure for table `item_images` */

DROP TABLE IF EXISTS `item_images`;

CREATE TABLE `item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `img_url` varchar(400) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

/*Data for the table `item_images` */

insert  into `item_images`(`id`,`item_id`,`img_url`,`description`) values (1,1,'1_1.jpg','First item first img'),(2,1,'1_2.jpg','First item second img'),(3,2,'2_1.jpg','Second item first img'),(4,2,'2_2.jpg','Second item second img'),(5,3,'3_1.jpg','Third item first img'),(6,3,'3_2.jpg','Third item second img'),(7,3,'3_3.jpg','Third item third img'),(8,1,'1_3.jpg','First item third img'),(9,4,'4_1.jpg','Happy Birthday first img'),(10,4,'4_2.jpg','Happy Birthday second img'),(11,4,'4_3.jpg','Happy Birthday third img'),(12,4,'4_4.jpg','Happy Birthday fourth img'),(13,4,'5_5.jpg','Happy Birthday fifth img'),(14,5,'6_1.jpg','Good weekend first img'),(15,5,'6_2.jpg','Good weekend second img'),(16,5,'6_3.jpg','Good weekend third img'),(17,5,'6_4.jpg','Good weekend fourth img'),(18,6,'8_1.jpg','路面電車の写真'),(19,6,'8_2.jpg','本の写真'),(20,6,'8_5.jpg','船と鳥の写真'),(21,6,'2_3.jpg','大きくて長い橋'),(22,7,'5_4.jpg','1111111111'),(23,7,'3_5.jpg','22222222'),(24,7,'3_21.jpg','333333'),(28,9,'4_32.jpg','aaaaaaaaa'),(29,9,'2_31.jpg','bbbbbbb'),(30,9,'6_21.jpg','cccccccccc'),(31,9,'5_51.jpg','ddddddd'),(32,1,'2_5.jpg','First item fourth img'),(36,1,'4_33.jpg','fifth img'),(37,2,'2_4.jpg','aaaaaaaaaaaaaaaaa'),(42,12,'5_42.jpg','111111111111'),(43,12,'2_41.jpg','22222222222'),(44,12,'2_51.jpg','333333333'),(45,12,'4_5.jpg','4444444444');

/*Table structure for table `item_views` */

DROP TABLE IF EXISTS `item_views`;

CREATE TABLE `item_views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(100) NOT NULL DEFAULT 0,
  `v_item_id` int(100) DEFAULT 0,
  `ip_address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item_views` */

insert  into `item_views`(`id`,`item_id`,`v_item_id`,`ip_address`) values (2,4,0,'::1'),(3,1,0,'127.0.0.1'),(4,3,0,'127.0.0.1'),(5,11,0,'127.0.0.1'),(6,2,0,'127.0.0.1'),(7,13,0,'127.0.0.1'),(8,12,0,'127.0.0.1'),(9,15,0,'127.0.0.1'),(10,4,0,'127.0.0.1'),(11,0,12,'127.0.0.1'),(12,0,13,'127.0.0.1'),(13,0,3,'127.0.0.1'),(14,6,0,'127.0.0.1'),(15,14,0,'127.0.0.1'),(16,0,14,'127.0.0.1'),(17,0,1,'127.0.0.1'),(18,0,4,'127.0.0.1'),(19,0,15,'127.0.0.1');

/*Table structure for table `mylist` */

DROP TABLE IF EXISTS `mylist`;

CREATE TABLE `mylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `mylist` */

insert  into `mylist`(`id`,`user_id`,`item_id`,`created_at`) values (1,1,1,'2020-02-11 02:22:15'),(2,1,4,'2020-02-11 02:22:38'),(3,1,7,'2020-02-11 02:26:05');

/*Table structure for table `session` */

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `session` */

insert  into `session`(`id`,`user_id`,`status`,`created_at`) values (1,'1',1,'2019-12-19 03:26:30');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `img_switching_second` int(11) NOT NULL,
  `admob_img` varchar(400) NOT NULL,
  `comment_size` float(10,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `setting` */

insert  into `setting`(`id`,`img_switching_second`,`admob_img`,`comment_size`) values (1,2,'IMG_38052.JPG',3.0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`created_at`) values (1,'123','123','202cb962ac59075b964b07152d234b70','2019-12-19 03:26:30');

/*Table structure for table `video_items` */

DROP TABLE IF EXISTS `video_items`;

CREATE TABLE `video_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `category` varchar(100) NOT NULL,
  `views` int(11) NOT NULL,
  `favorite` int(11) NOT NULL,
  `disgust` int(11) NOT NULL,
  `video_url` varchar(400) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_active` int(1) DEFAULT 1,
  `is_video` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Data for the table `video_items` */

insert  into `video_items`(`id`,`title`,`category`,`views`,`favorite`,`disgust`,`video_url`,`created_at`,`is_active`,`is_video`) values (1,'Wedding Videos','1',7,33,1,'1.mp4','2019-06-14 08:34:09',1,1),(2,'Party Video','3',22,56,6,'2.mp4','2019-06-17 08:06:36',1,1),(3,'Good Day Video','2',5,35,5,'3.mp4','2019-06-17 08:16:24',1,1),(4,'Happy Birthday Video','1',6,34,0,'4.mp4','2019-06-17 08:44:21',1,1),(11,'Today My Life Video','2',25,45,0,'5.mp4','2019-06-17 10:32:45',1,1),(12,'Max Budget - Important Video','3',7,233,1,'6.mp4','2019-06-17 10:33:56',1,1),(13,'Love me, Love my dog','4',7,89,1,'7.mp4','2019-06-17 10:35:24',1,1),(14,'test','5',5,1,1,'2020-01-31_23h57_30.mp4','2020-02-11 02:23:08',1,1),(15,'test','6',7,2,3,'2020-02-10_10h03_02.mp4','2020-02-11 02:25:07',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
