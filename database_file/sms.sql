-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: sms
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `class_holders`
--

DROP TABLE IF EXISTS `class_holders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_holders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL,
  `view_class_name` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_holders`
--

LOCK TABLES `class_holders` WRITE;
/*!40000 ALTER TABLE `class_holders` DISABLE KEYS */;
INSERT INTO `class_holders` VALUES (1,'jhs1a','JHS 1A','2018-08-01 17:38:24'),(2,'jhs1b','JHS 1B','2018-08-01 17:38:24'),(3,'jhs1c','JHS 1C','2018-08-01 17:38:24'),(4,'jhs2a','JHS 2A','2018-08-01 17:38:24'),(5,'jhs2b','JHS 2B','2018-08-01 17:38:24'),(6,'jhs2c','JHS 2C','2018-08-01 17:38:24'),(7,'jhs3a','JHS 3A','2018-08-01 17:38:24'),(8,'jhs3b','JHS 3B','2018-08-01 17:38:24'),(9,'jhs3c','JHS 3C','2018-08-01 17:38:24');
/*!40000 ALTER TABLE `class_holders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facuties_tbl`
--

DROP TABLE IF EXISTS `facuties_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facuties_tbl` (
  `faculties_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`faculties_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facuties_tbl`
--

LOCK TABLES `facuties_tbl` WRITE;
/*!40000 ALTER TABLE `facuties_tbl` DISABLE KEYS */;
INSERT INTO `facuties_tbl` VALUES (3,'Peter','fggffgfg');
/*!40000 ALTER TABLE `facuties_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_full_class`
--

DROP TABLE IF EXISTS `school_full_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_full_class` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(50) NOT NULL,
  `view_class_name` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_full_class`
--

LOCK TABLES `school_full_class` WRITE;
/*!40000 ALTER TABLE `school_full_class` DISABLE KEYS */;
INSERT INTO `school_full_class` VALUES (1,'jhs1','JHS 1','2018-08-01 19:17:34'),(2,'jhs2','JHS 2','2018-08-01 19:17:34'),(3,'jhs3','JHS 3','2018-08-01 19:17:34');
/*!40000 ALTER TABLE `school_full_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_score_sheet`
--

DROP TABLE IF EXISTS `stu_score_sheet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_score_sheet` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `student_id` int(20) NOT NULL,
  `class_score` int(20) NOT NULL,
  `exam_score` int(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_score_sheet`
--

LOCK TABLES `stu_score_sheet` WRITE;
/*!40000 ALTER TABLE `stu_score_sheet` DISABLE KEYS */;
INSERT INTO `stu_score_sheet` VALUES (1,2,2,3,'2018-07-19 06:29:30'),(2,3,50,4,'2018-07-19 06:30:09'),(3,1,6,7,'2018-07-19 12:51:24');
/*!40000 ALTER TABLE `stu_score_sheet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_score_tbl`
--

DROP TABLE IF EXISTS `stu_score_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_score_tbl` (
  `ss_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stu_id` varchar(50) NOT NULL,
  `faculties_id` varchar(50) NOT NULL,
  `sub_id` varchar(50) NOT NULL,
  `miderm` float NOT NULL,
  `final` float NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_score_tbl`
--

LOCK TABLES `stu_score_tbl` WRITE;
/*!40000 ALTER TABLE `stu_score_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `stu_score_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_tbl_2018`
--

DROP TABLE IF EXISTS `stu_tbl_2018`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_tbl_2018` (
  `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `student_class` varchar(12) NOT NULL,
  `sub_english_grade` int(10) NOT NULL DEFAULT '0',
  `sub_english_exams` int(10) NOT NULL DEFAULT '0',
  `sub_english_total` int(10) NOT NULL DEFAULT '0',
  `sub_maths_grade` int(10) NOT NULL DEFAULT '0',
  `sub_maths_exams` int(10) NOT NULL DEFAULT '0',
  `sub_maths_total` int(10) NOT NULL DEFAULT '0',
  `sub_science_grade` int(10) NOT NULL DEFAULT '0',
  `sub_science_exams` int(10) NOT NULL DEFAULT '0',
  `sub_science_total` int(10) NOT NULL DEFAULT '0',
  `sub_social_grade` int(10) NOT NULL DEFAULT '0',
  `sub_social_exams` int(10) NOT NULL DEFAULT '0',
  `sub_social_total` int(10) NOT NULL DEFAULT '0',
  `sub_rme_grade` int(10) NOT NULL DEFAULT '0',
  `sub_rme_exams` int(10) NOT NULL DEFAULT '0',
  `sub_rme_total` int(10) NOT NULL DEFAULT '0',
  `sub_ict_grade` int(10) NOT NULL DEFAULT '0',
  `sub_ict_exams` int(10) NOT NULL DEFAULT '0',
  `sub_ict_total` int(10) NOT NULL DEFAULT '0',
  `sub_bdt_grade` int(10) NOT NULL DEFAULT '0',
  `sub_bdt_exams` int(10) NOT NULL DEFAULT '0',
  `sub_bdt_total` int(10) NOT NULL DEFAULT '0',
  `sub_gh_lang_grade` int(10) NOT NULL DEFAULT '0',
  `sub_gh_lang_exams` int(10) NOT NULL DEFAULT '0',
  `sub_gh_lang_total` int(10) NOT NULL DEFAULT '0',
  `english_grade` int(11) NOT NULL DEFAULT '0',
  `maths_grade` int(11) NOT NULL DEFAULT '0',
  `social_grade` int(11) NOT NULL DEFAULT '0',
  `science_grade` int(11) NOT NULL DEFAULT '0',
  `rme_grade` int(11) NOT NULL DEFAULT '0',
  `bdt_grade` int(11) NOT NULL DEFAULT '0',
  `ict_grade` int(11) NOT NULL DEFAULT '0',
  `gh_lang_grade` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `stu_conduct` varchar(100) NOT NULL,
  `stu_intrest` varchar(100) NOT NULL,
  `stu_attitude` varchar(100) NOT NULL,
  `teachers_remarks` varchar(100) NOT NULL,
  `attendance` varchar(10) NOT NULL,
  `promotion` varchar(10) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_tbl_2018`
--

LOCK TABLES `stu_tbl_2018` WRITE;
/*!40000 ALTER TABLE `stu_tbl_2018` DISABLE KEYS */;
INSERT INTO `stu_tbl_2018` VALUES (1,'ISAAC','DARKO','male','1999-04-12','nungua','0545734735','darkoisaac20@gmail.com','jhs1a',30,40,70,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'Well-Behaved','Reading','Respectful','More_Room_For_Improvement','122',''),(2,'EDMUND','AMO-KOI ','male','1999-03-12','ADENTA','0567876890','','jhs1a',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(3,'SUSANA','ADOLEY','female','2000-02-09','NUNGUA','0243273894','','jhs2a',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(4,'AGNES','ODONKOR','female','2000-05-10','NUNGUA','0556456789','agnesod@gmail.com','jhs2a',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(5,'JEMIMAH','LARNYOR','female','1999-12-01','BAATSONA','0587990900','jm@gmail.com','jhs1b',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(6,'GILBERT','ADJEI','male','2001-09-18','LASHIBI','0267876909','','jhs1b',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(7,'MICHAEL','BORKETEY','male','1999-04-07','ACHIMOTA','0573394939','','jhs2b',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(8,'ELIZABETH','FRIMPONGMAA','female','2000-06-15','ASHAIMAN','0270299039','lizzyfrimp@gmail.com','jhs2b',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(9,'WILSON','NUTAKOR','male','2001-10-23','MADINA','0555555555','wilson@gmail.com','jhs1c',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','',''),(10,'FELICIA','OPOKU','female','2002-07-22','ODOKOR','0234792945','','jhs1c',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'','','','','','');
/*!40000 ALTER TABLE `stu_tbl_2018` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects_taught`
--

DROP TABLE IF EXISTS `subjects_taught`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects_taught` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL,
  `view_subject_name` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects_taught`
--

LOCK TABLES `subjects_taught` WRITE;
/*!40000 ALTER TABLE `subjects_taught` DISABLE KEYS */;
INSERT INTO `subjects_taught` VALUES (1,'english','English','2018-08-01 19:19:46'),(2,'maths','Maths','2018-08-01 19:19:46'),(3,'social','Social Studies','2018-08-01 19:19:46'),(4,'science','Science','2018-08-01 19:19:46'),(5,'bdt','BDT','2018-08-01 19:19:46'),(6,'ict','ICT','2018-08-01 19:19:46'),(7,'rme','RME','2018-08-01 19:19:46'),(8,'gh_lang','Ghanaian Language','2018-08-01 19:19:46');
/*!40000 ALTER TABLE `subjects_taught` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_tbl`
--

DROP TABLE IF EXISTS `teacher_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_login_info` int(100) NOT NULL DEFAULT '0',
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `classes` varchar(20) NOT NULL,
  `subject_taught` varchar(20) NOT NULL,
  `teacher_type` varchar(50) NOT NULL,
  `teacher_type_class` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_tbl`
--

LOCK TABLES `teacher_tbl` WRITE;
/*!40000 ALTER TABLE `teacher_tbl` DISABLE KEYS */;
INSERT INTO `teacher_tbl` VALUES (1,2,'FRANCIS','NYAME','1989-07-11','Teshie','Degree','yes','0246785673','francisnyame@gmail.com','jhs1','english','class_teacher','jhs1a','2018-08-04 15:48:54'),(2,3,'STEPEHN','FOSU','1990-03-05','KLAGON','Degree','no','0238459933','ofosustephen@gmail.com','jhs1','english','class_teacher','jhs1a','2018-08-04 16:16:25'),(3,4,'EMMANUEL','AMEWONU','1993-07-08','LA','Degree','no','0234737488','emmame@gmail.com','jhs3','science','class_teacher','jhs1b','2018-08-04 16:41:42'),(4,5,'PATRICK','FOFIE','1993-08-17','KPOJO','Degree','yes','0547885800','patfof@gmail.com','jhs2','maths','class_teacher','jhs2b','2018-08-04 16:56:34'),(5,6,'NELSON','OSEI','1985-08-15','SHIASHI','Degree','no','0555909349','nelsonosei78@gmail.com','jhs3','ict','class_teacher','jhs1c','2018-08-04 17:05:06');
/*!40000 ALTER TABLE `teacher_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_tbl` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

LOCK TABLES `users_tbl` WRITE;
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` VALUES (1,'admin','admin','Admin'),(2,'stephen','1234','Teacher'),(3,'stephen','1234','Teacher'),(4,'emmanuel','1234','Teacher'),(5,'patrick','1234','Teacher'),(6,'nelson','1234','Teacher');
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `years_holder`
--

DROP TABLE IF EXISTS `years_holder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `years_holder` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `year_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `years_holder`
--

LOCK TABLES `years_holder` WRITE;
/*!40000 ALTER TABLE `years_holder` DISABLE KEYS */;
INSERT INTO `years_holder` VALUES (1,'2018'),(2,'2019');
/*!40000 ALTER TABLE `years_holder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sms'
--

--
-- Dumping routines for database 'sms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-04 22:20:01
