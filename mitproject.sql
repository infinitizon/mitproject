-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: mitproject
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `attempt_answer`
--

DROP TABLE IF EXISTS `attempt_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attempt_answer` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_attempt` bigint(20) NOT NULL,
  `questions_r_k` bigint(20) NOT NULL,
  `answer_given` varchar(4000) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_attempt_answer_quiz_attempt1_idx` (`quiz_attempt`),
  KEY `fk_attempt_answer_questions1_idx` (`questions_r_k`),
  CONSTRAINT `fk_attempt_answer_questions1` FOREIGN KEY (`questions_r_k`) REFERENCES `questions` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attempt_answer_quiz_attempt1` FOREIGN KEY (`quiz_attempt`) REFERENCES `quiz_attempt` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200309 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attempt_answer`
--

LOCK TABLES `attempt_answer` WRITE;
/*!40000 ALTER TABLE `attempt_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `attempt_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `par_id` bigint(20) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `content` varchar(5000) DEFAULT NULL,
  `users_r_k` bigint(20) NOT NULL,
  `record_type` bigint(20) DEFAULT 0,
  `ius_yn` tinyint(1) DEFAULT 1,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_cms_users1_idx` (`users_r_k`),
  CONSTRAINT `fk_cms_users1` FOREIGN KEY (`users_r_k`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200229 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms`
--

LOCK TABLES `cms` WRITE;
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` VALUES (20200212,0,'Tutorials','link-label','home','\n<div class=\"col-sm-9\">\n                <div class=\"row\">\n                    <div class=\"col-sm-7\">\n                        <h1>HTML</h1>\n                        <h5>The major language for building web pages</h5>\n                        <div class=\"fakeimg\"><a href=\"#\" class=\"btn btn-light\">LEARN HTML</a></div>\n                    </div>\n                    <div class=\"col-sm-5 code-display\">\n<pre class=\"prettyprint lang-html linenums\">\n&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;title&gt;HTML Tutorial&lt;/title&gt;\n&lt;body&gt;\n  &lt;h1&gt;Hello student&lt;/h1&gt;\n&lt;/body&gt;\n&lt;/html&gt;\n</pre>\n<a class=\"btn btn-primary\" href=\"javascript:;\" id=\"tryOutHTML\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\"\n  data-lang=\"html\" data-node=\"endpoint\" data-content=\"Web/?lang=html&content=<!DOCTYPE html>%0A<html>%0A<title>HTML Tutorial</title>%0A<body>%0A  <h1>Hello student</h1>%0A</body>%0A</html>\" >Try it out</a>\n                    </div>\n                </div>\n              \n                <div class=\"row\">&nbsp;</div>\n                <div class=\"row\">\n                  <div class=\"col-sm-6 code-display\">\n<pre class=\"prettyprint lang-css linenums\">\nbody {\n  background-color: lightblue;\n}\n\nh1 {\n  color: white;\n  text-align: center;\n}\n\np {\n  font-family: verdana;\n  font-size: 20px;\n}\n</pre>\n                  </div>\n                    <div class=\"col-sm-6\">\n                        <h1>CSS</h1>\n                        <h5>This helps us to make our sites beautiful</h5>\n                        <div class=\"fakeimg\"><a href=\"#\" class=\"btn btn-light\">LEARN CSS</a></div>\n                    </div>\n                </div>\n                <div class=\"row\">&nbsp;</div>\n                <div class=\"row bg-secondary\">\n                  <div class=\"col-sm-12\">\n                    <div class=\"row m-5\">\n                      <div class=\"col-sm-6\">\n                        <div class=\"card text-center bg-light\">\n                          <div class=\"card-body\">\n                            <h2>PHP</h2>\n                            <h6 class=\"card-subtitle mb-2 text-muted\">A server side programming language</h6>\n                            <a href=\"#\" class=\"btn btn-secondary mt-5\">LEARN PHP</a>\n                          </div>\n                        </div>\n                      </div>\n                      <div class=\"col-sm-6\">\n                        <div class=\"card text-center bg-light\">\n                          <div class=\"card-body\">\n                            <h2>Python</h2>\n                            <h6 class=\"card-subtitle mb-2 text-muted\">A programming language</h6>\n                            <a href=\"#\" class=\"btn btn-secondary mt-5\">LEARN PYTHON</a>\n                          </div>\n                        </div>\n                      </div>\n                    </div>\n                  </div>\n                </div>\n            </div>',20190131,NULL,1,NULL,'2020-02-14 15:51:48'),(20200213,0,'HTML','html','fab fa-html5','',20190131,20200139,1,NULL,'2020-02-20 08:09:55'),(20200214,0,'PHP','php','fab fa-php',NULL,20190131,20200139,1,NULL,'2020-02-20 08:09:55'),(20200215,0,'PYTHON','python','fab fa-python',NULL,20190131,20200139,1,NULL,'2020-02-20 08:09:55'),(20200216,20200213,'HTML Intro','html/intro',NULL,'<div class=\"col-sm-9\">                 <div class=\"progress\">                     <div class=\"progress-bar progress-bar-striped progress-bar-animated\" style=\"width:1%\">1%</div>                 </div>                 HTML is a markup language for buiding pages on the web.                 <ul>                     <li>The acronym HTML stands for HyperText Markup Language</li>                     <li>HTML has <em>\"elements\"</em> they look like this...&lt;b&gt; </li>                     <li>The elements are called <b><em>tags</em></b> </li>                     <li>Most elements have a start and end tags e.g &lt;title&gt; and &lt;/title&gt;</li>                 </ul>                 <h2>A simple example</h2>                 <div class=\"row\">                     <div class=\"col-sm-12 code-display\"> <pre class=\"prettyprint lang-html linenums\"> &lt;!DOCTYPE html&gt; &lt;html&gt; &lt;title&gt;My Site Title&lt;/title&gt; &lt;body&gt;   &lt;h2&gt;My Site Heading&lt;/h2&gt;   &lt;p&gt;A nice paragraph&lt;/p&gt;   &lt;b&gt;<b>Some bold text</b>&lt;/b&gt; &lt;/body&gt; &lt;/html&gt; </pre> <a class=\"btn btn-primary\" href=\"javascript:;\" id=\"tryOutHTML\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\"     data-lang=\"html\" data-node=\"endpoint\" data-content=\"Web/?lang=html&url=http://localhost&content=<!DOCTYPE html>%0A<html>%0A<title>My Site Title</title>%0A<body>%0A  <h2>My Site Heading</h2>%0A  <p>A nice paragraph</p>%0A  <b>Some bold text</b>%0A</body>%0A</html>\" >Try it out</a>                     </div>                 </div>                 <h2>Example Result</h2>                 <div class=\"row\">                     <div class=\"col-sm-12\">                         <img src=\"<?php echo WEB_ROOT.\"tutorial/assets/images/myPage.png\" ?>\" />                     </div>                 </div>                 <div class=\"row\">                     <div class=\"col-sm-12\">                         <h2>Let\'s drill down on the example</h2>                         <ul>                             <li>A web page often begins with the <span class=\"code-display text-danger\">&lt;!DOCTYPE html&gt;</span> declaration it tells us that the document is HTML5. It must appear only once at the top of a page</li>                             <li>The <span class=\"code-display text-danger\">&lt;html&gt;</span> element is the root element of an HTML page. Notice it <em>starts</em> and <em>ends</em> our code</li>                             <li>We put meta information, like page title, scripts and other information in the <span class=\"code-display text-danger\">&lt;head&gt;</span> element </li>                             <li>Everything we see on the page is written inside the <span class=\"code-display text-danger\">&lt;body&gt;</span> element </li>                             <li>Inside the &lt;body&gt;, we can have things like the <span class=\"code-display text-danger\">&lt;h2&gt;</span> heading element, a paragraph <span class=\"code-display text-danger\">&lt;p&gt;</span> or even bold a text with <span class=\"code-display text-danger\">&lt;b&gt;</span></li>                         </ul>                     </div>                 </div>                 <div class=\"row\">                     <div class=\"col-sm-12\">                         <a href=\"<?php echo WEB_ROOT.\"tutorial/html/editor.php\" ?>\" class=\"btn btn-sm btn-primary float-right\">Next =>> &nbsp;&nbsp;&nbsp;Editor</a>                     </div>                 </div>             </div>           </div>',20190131,20200140,1,NULL,'2020-02-14 15:51:48'),(20200217,20200213,'HTML Editors','html/editor',NULL,'\n            <div class=\"col-sm-9\">\n                <div class=\"progress\">\n                    <div class=\"progress-bar progress-bar-striped progress-bar-animated\" style=\"width:2%\">2%</div>\n                </div>\n                <h2>You need an HTML Editor</h2>\n                <p>In this tutorial, you will <b>not</b> need an editor because I provide a Try It Yourself link for each assignment.</p>\n                However, if you want to follow along on your computer, you will need an HTML editor.<br />\n                All computers come with an editor called...notepad (Windows) or TextEdit (Mac)\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">\n                    <hr>\n                    <p><h3>Step 1 (open an editor)</h3></p>\n                    <p><b>On Windows</b></p>\n                    <p>Open the start screen and search for notepad</p>\n                    <p><b>On Mac</b></p>\n                    <p>Open Start > Programs > Accessories > Notepad</p>\n                    <hr>\n                    <p><h3>Step 2 (Write your html code)</h3></p>\n                    <p>Write (don\'t copy. It is better you write) the code below</p>\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12 code-display\">\n<pre class=\"lang-html\">\n&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;title&gt;My Site Title&lt;/title&gt;\n&lt;body&gt;\n  &lt;h2&gt;My Site Heading&lt;/h2&gt;\n  &lt;p&gt;A nice paragraph&lt;/p&gt;\n  &lt;b&gt;<b>Some bold text</b>&lt;/b&gt;\n&lt;/body&gt;\n&lt;/html&gt;\n</pre></div></div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">\n                    <hr>\n                    <p><h3>Save the file as HTML</h3></p>\n                    <p>Save the file to your computer by selecting <b>File > Save as</b> and giving it a name of your choice. Here we use <b>index.html</b> </p>\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">\n                        <hr>\n                        <p><h3>View it in your browser</h3></p>\n                        <p>Open the file you just saved in your favourite browser. The result should look like this:</p>\n                        <img src=\"<?php echo WEB_ROOT.\"tutorial/assets/images/myPage.png\" ?>\" />\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">\n                        <hr>\n                        <p><h3>Our Online Editor</h3></p>\n                        <p>Like we said previously, we would be using our online editor. So Let us run that code in our editor. \n                            <a class=\"btn btn-primary\" href=\"javascript:;\" id=\"tryOutHTML\" data-toggle=\"modal\" data-target=\"#exampleModalCenter\"\n                            data-lang=\"html\" data-node=\"endpoint\" data-content=\"Web/?lang=html&url=http://localhost&content=<!DOCTYPE html>%0A<html>%0A<title>My Site Title</title>%0A<body>%0A  <h2>My Site Heading</h2>%0A  <p>A nice paragraph</p>%0A  <b>Some bold text</b>%0A</body>%0A</html>\" >Try it out</a>\n                        </p>\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">&nbsp;</div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-6\">\n                        <a href=\"<?php echo WEB_ROOT.\"tutorial/html/editor.php\" ?>\" class=\"btn btn-sm btn-primary\">Editor &nbsp;&nbsp;&nbsp;<<= Previous</a>\n                    </div>\n                    <div class=\"col-sm-6\">\n                        <a href=\"<?php echo WEB_ROOT.\"tutorial/html/quiz.php\" ?>\" class=\"btn btn-sm btn-primary float-right\">Next =>> &nbsp;&nbsp;&nbsp;Quiz:</a>\n                    </div>\n                </div>\n                <div class=\"row\">\n                    <div class=\"col-sm-12\">&nbsp;</div>\n                </div>\n            </div>',20190131,20200140,1,NULL,'2020-02-14 15:51:48'),(20200218,0,'Setup','link-label','fas fa-user-cog',NULL,20190131,NULL,1,'2020-02-14 13:59:05','2020-02-20 08:09:55'),(20200219,0,'My Profile','profile','fas fa-user',NULL,20190131,NULL,1,'2020-02-14 16:51:47','2020-02-20 08:09:55'),(20200220,0,'Admin','admin','fas fa-user-cog',NULL,20190131,NULL,1,'2020-02-14 16:51:48','2020-02-20 08:09:55'),(20200221,20200220,'Manage Courses','courses',NULL,NULL,20190131,NULL,1,'2020-02-14 16:51:48','2020-02-18 10:43:48'),(20200222,20200220,'Manage Lectures','lectures',NULL,NULL,20190131,NULL,1,'2020-02-14 16:51:48','2020-02-18 10:43:48'),(20200223,20200220,'Manage Users','users',NULL,NULL,20190131,NULL,1,'2020-02-14 16:51:48',NULL),(20200224,20200220,'CBT',NULL,NULL,NULL,20190131,0,1,'2020-02-25 12:24:54',NULL),(20200225,20200224,'Question Bank','questions',NULL,NULL,20190131,0,1,'2020-02-25 12:26:53','2020-02-25 11:42:19'),(20200226,20200224,'Quiz','quiz',NULL,NULL,20190131,0,1,'2020-02-25 12:26:53',NULL),(20200227,20200224,'Results','result',NULL,NULL,20190131,0,1,'2020-02-25 12:26:53',NULL),(20200228,20200213,'20200229','html/qui1',NULL,'A simple quiz',20190131,20200141,1,'2020-03-09 12:14:29',NULL);
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_type` bigint(20) NOT NULL,
  `question` varchar(2000) DEFAULT NULL,
  `answers` varchar(4000) DEFAULT NULL,
  `users_r_k` bigint(20) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp() COMMENT '			',
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_quiz_questions_t_wb_lov_idx` (`question_type`),
  KEY `fk_questions_users1_idx` (`users_r_k`),
  CONSTRAINT `fk_questions_users1` FOREIGN KEY (`users_r_k`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_questions_t_wb_lov` FOREIGN KEY (`question_type`) REFERENCES `t_wb_lov` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (20200131,20200134,'\n                                \n                                Question is crazy                            ','[{\"exm_qst_vld\":\"false\",\"exm_qst_ans\":\"\\n                                    <p>2<\\/p>                                \"},{\"exm_qst_vld\":\"true\",\"exm_qst_ans\":\"\\n                                    <p>3<\\/p>                                \"},{\"exm_qst_vld\":\"false\",\"exm_qst_ans\":\"\\n                                    <p>5<\\/p>                                \"}]',20190131,'2020-02-29 18:05:51','2020-02-29 19:09:43'),(20200132,20200135,'Multi Question Multi Answer Question','[{\"exm_qst_vld\":\"false\",\"exm_qst_ans\":\"\\n                                    <p>Good<\\/p>                                \"},{\"exm_qst_vld\":\"true\",\"exm_qst_ans\":\"\\n                                    <p>Bad<\\/p>                                \"},{\"exm_qst_vld\":\"true\",\"exm_qst_ans\":\"\\n                                    <p>Not sure<\\/p>                                \"},{\"exm_qst_vld\":\"false\",\"exm_qst_ans\":\"\\n                                    <p>Up to you<\\/p>                                \"}]',20190131,'2020-02-29 21:03:39',NULL),(20200133,20200136,'MTC','[{\"exm_qst_ans\":\"Abimbola\",\"exm_qst_vld\":\"Hassan\"},{\"exm_qst_ans\":\"Bisolu\",\"exm_qst_vld\":\"Omojola\"},{\"exm_qst_ans\":\"Daniel\",\"exm_qst_vld\":\"Fayokunumi\"}]',20190131,'2020-03-09 11:52:47','2020-02-29 19:09:43');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(200) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `max_attempts` int(11) DEFAULT NULL,
  `min_pass_pct` int(11) DEFAULT NULL,
  `correct_scr` int(11) DEFAULT NULL,
  `incorrect_scr` int(11) DEFAULT NULL,
  `allowed_ip` varchar(45) DEFAULT NULL,
  `view_ans_after` tinyint(1) DEFAULT NULL,
  `open_quiz` tinyint(1) DEFAULT NULL,
  `users_r_k` bigint(20) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_quiz_users1_idx` (`users_r_k`),
  CONSTRAINT `fk_quiz_users1` FOREIGN KEY (`users_r_k`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200230 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (20200229,'Some Quiz','<p><br></p>','2020-03-09 11:55:18','2021-03-09 11:55:18',10,10,50,1,0,'',1,0,20190131,'2020-03-09 11:56:25',NULL);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_attempt`
--

DROP TABLE IF EXISTS `quiz_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_attempt` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `quiz_r_k` bigint(20) NOT NULL,
  `user_r_k` bigint(20) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_quiz_attempt_users1_idx` (`user_r_k`),
  KEY `fk_quiz_attempt_quiz1_idx` (`quiz_r_k`),
  CONSTRAINT `fk_quiz_attempt_quiz1` FOREIGN KEY (`quiz_r_k`) REFERENCES `quiz` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_attempt_users1` FOREIGN KEY (`user_r_k`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200131 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_attempt`
--

LOCK TABLES `quiz_attempt` WRITE;
/*!40000 ALTER TABLE `quiz_attempt` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz_attempt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_questions` (
  `r_k` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_r_k` bigint(20) NOT NULL,
  `questions_r_k` bigint(20) NOT NULL,
  `question_order` tinyint(4) DEFAULT NULL,
  `users_r_k` bigint(20) NOT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`),
  KEY `fk_quiz_questions_quiz1_idx` (`quiz_r_k`),
  KEY `fk_quiz_questions_questions1_idx` (`questions_r_k`),
  KEY `fk_quiz_questions_users1_idx` (`users_r_k`),
  CONSTRAINT `fk_quiz_questions_questions1` FOREIGN KEY (`questions_r_k`) REFERENCES `questions` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_questions_quiz1` FOREIGN KEY (`quiz_r_k`) REFERENCES `quiz` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_quiz_questions_users1` FOREIGN KEY (`users_r_k`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200304 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (20200302,20200229,20200131,1,20190131,'2020-03-09 11:57:30',NULL),(20200303,20200229,20200132,2,20190131,'2020-03-09 11:57:33',NULL);
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_wb_lov`
--

DROP TABLE IF EXISTS `t_wb_lov`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_wb_lov` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `par_id` bigint(20) DEFAULT NULL,
  `def_id` varchar(45) DEFAULT NULL,
  `val_id` varchar(45) DEFAULT NULL,
  `val_dsc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`r_k`)
) ENGINE=InnoDB AUTO_INCREMENT=20200142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_wb_lov`
--

LOCK TABLES `t_wb_lov` WRITE;
/*!40000 ALTER TABLE `t_wb_lov` DISABLE KEYS */;
INSERT INTO `t_wb_lov` VALUES (20200131,0,'USR-TP','SPR-ADM','SUPER_ADMIN'),(20200132,0,'USR-TP','TCH','TEACHER'),(20200133,0,'USR-TP','STD','STUDENT'),(20200134,0,'QST-TP','MCSA','Multiple Choice Single Answer'),(20200135,0,'QST-TP','MCMA','Multiple Choice Multiple Answers'),(20200136,0,'QST-TP','MTC','Match The Column'),(20200137,0,'QST-TP','SA','Short Answer'),(20200138,0,'QST-TP','LA','Long Answer'),(20200139,0,'CMS-REC-TP','CRS','Course'),(20200140,0,'CMS-REC-TP','LCT','Lecture'),(20200141,0,'CMS-REC-TP','QUZ','Quiz');
/*!40000 ALTER TABLE `t_wb_lov` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `r_k` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`r_k`)
) ENGINE=InnoDB AUTO_INCREMENT=20190135 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (20190131,'infinitizon@gmail.com','c20ad4d76fe97759aa27a0c99bff6710',1,'2020-02-11 14:08:12',NULL),(20190133,'aa@bb.com','202cb962ac59075b964b07152d234b70',1,'2020-03-14 01:12:30','2020-03-14 00:14:03'),(20190134,'learner@project.com','c20ad4d76fe97759aa27a0c99bff6710',1,'2020-03-14 12:25:08',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_user_type`
--

DROP TABLE IF EXISTS `users_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_user_type` (
  `r_k` int(11) NOT NULL AUTO_INCREMENT,
  `user` bigint(20) NOT NULL,
  `user_type` bigint(20) NOT NULL,
  PRIMARY KEY (`r_k`),
  KEY `fk_user_userType_users1_idx` (`user`),
  KEY `fk_user_userType_t_wb_lov1_idx` (`user_type`),
  CONSTRAINT `fk_user_userType_t_wb_lov1` FOREIGN KEY (`user_type`) REFERENCES `t_wb_lov` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_userType_users1` FOREIGN KEY (`user`) REFERENCES `users` (`r_k`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20200214 DEFAULT CHARSET=utf8 COMMENT='This table helps to hold relationship between users and user types';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_user_type`
--

LOCK TABLES `users_user_type` WRITE;
/*!40000 ALTER TABLE `users_user_type` DISABLE KEYS */;
INSERT INTO `users_user_type` VALUES (20200211,20190131,20200131),(20200212,20190133,20200132),(20200213,20190134,20200131);
/*!40000 ALTER TABLE `users_user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-03 21:42:27
