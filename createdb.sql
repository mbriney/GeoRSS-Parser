# ************************************************************
# Sequel Pro SQL dump
# Version 3365
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 174.143.132.192 (MySQL 5.0.77-log)
# Database: 407620_mattmap
# Generation Time: 2011-07-25 11:08:26 -0400
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table travel
# ------------------------------------------------------------

CREATE TABLE `travel` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `guid` char(64) character set latin1 collate latin1_bin NOT NULL default '',
  `title` text,
  `latitude` varchar(64) default NULL,
  `longitude` varchar(64) default NULL,
  `dateadded` timestamp NULL default NULL,
  `city` varchar(125) default NULL,
  `state` varchar(2) default NULL,
  `country` varchar(2) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `guid` (`guid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
