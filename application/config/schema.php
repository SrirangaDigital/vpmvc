<?php

define('DB_SCHEMA', 'CREATE DATABASE IF NOT EXISTS :db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci');

define('METADATA_TABLE_L1_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L1 . '` (
  `authorname` varchar(1000) NOT NULL,
  `salutation` varchar(200),
  `authid` int(10) AUTO_INCREMENT,
  PRIMARY KEY (`authid`)) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('METADATA_TABLE_L2_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L2 . '` (
  `theme` varchar(150) NOT NULL,
  `title` varchar(300) NOT NULL,
  `feature` varchar(100),
  `text` varchar(1000),
  `authid` int(10),
  `volume` varchar(50),
  `year` varchar(50),
  `month` varchar(250),
  `issue` varchar(5),
  `page` varchar(20),
  `ID` int(10) AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');
	
define('METADATA_TABLE_L3_SCHEMA', 'CREATE TABLE `' . METADATA_TABLE_L3 . '` (
  `volume` varchar(50) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `cur_page` varchar(50),
  `text` varchar(50))
  ENGINE=MyISAM DEFAULT CHARSET=utf8mb4');

define('CHAR_ENCODING_SCHEMA', 'SET NAMES utf8mb4');

?>
