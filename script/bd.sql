DELIMITER ;

CREATE DATABASE  IF NOT EXISTS `BOLAO`;
USE `BOLAO`;

-- --------------------------------------------------------------------------------
-- TABLES
-- --------------------------------------------------------------------------------

CREATE TABLE `USERS` (
  `ID_USER` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `NAME` VARCHAR(255) DEFAULT NULL,
  `EMAIL` VARCHAR(255) DEFAULT NULL,
  `USERNAME` VARCHAR(10) DEFAULT NULL,
  `PASSWORD` VARCHAR(255) DEFAULT NULL,
  `ACTIVE` INT(11) DEFAULT NULL,
  `ACCESS_LEVEL` INT(11) DEFAULT NULL,
  PRIMARY KEY  (`ID_USER`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=LATIN1;

CREATE TABLE `BET` (
  `ID_BET` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `ID_USER` SMALLINT(6) UNSIGNED NOT NULL,
  `VALUE` DECIMAL(10,2) DEFAULT NULL,
  `RESULT1` SMALLINT(6) DEFAULT NULL,
  `RESULT2` SMALLINT(6) DEFAULT NULL,
  PRIMARY KEY  (`ID_BET`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=LATIN1;

CREATE TABLE `GAMES` (
  `ID_GAME` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `TEAM1` VARCHAR(255) DEFAULT NULL,
  `TEAM2` VARCHAR(255) DEFAULT NULL,
  `VALUE` DECIMAL(10,2) DEFAULT NULL,
  `DATE` DATE DEFAULT NULL,
  `HOUR` TIME DEFAULT NULL,
  `ACTIVE` INT(11) DEFAULT NULL,
  PRIMARY KEY  (`ID_GAME`)
) 
  
-- --------------------------------------------------------------------------------
-- STORED PROCEDURES
-- --------------------------------------------------------------------------------

DELIMITER $$

CREATE PROCEDURE `SX_USERS`(
	INOUT PID_USER INT,
	IN PNAME VARCHAR(255), 
	IN PEMAIL VARCHAR(255), 
	IN PUSERNAME VARCHAR(10),
	IN PPASSWORD VARCHAR(255), 
	IN PACTIVE INT,
	IN PACCESS_LEVEL INT
)
BEGIN
	INSERT INTO USERS VALUES (PID_USER,PNAME,PEMAIL,PUSERNAME,PPASSWORD,PACTIVE,PACCESS_LEVEL)
		ON DUPLICATE KEY
	UPDATE NAME=PNAME,EMAIL=PEMAIL,USERNAME=PUSERNAME,PASSWORD=PPASSWORD,ACTIVE=PACTIVE,ACCESS_LEVEL=PACCESS_LEVEL;   

	SELECT LAST_INSERT_ID() INTO PID_USER;
END

DELIMITER $$

CREATE PROCEDURE `SX_BET`(
	INOUT PID_BET INT,
	IN PID_USER SMALLINT(6),
	IN PVALUE DECIMAL(10,2), 
	IN PRESULT1 SMALLINT(6), 
	IN PRESULT2 SMALLINT(6)
)
BEGIN
    	INSERT INTO BET VALUES (PID_BET,PID_USER,PVALUE,PRESULT1,PRESULT2)
		ON DUPLICATE KEY
    	UPDATE ID_BET=PID_BET,ID_USER=PID_USER,VALUE=PVALUE,RESULT1=PRESULT1,
		RESULT2=PRESULT2;   

	SELECT LAST_INSERT_ID() INTO PID_BET;
END

DELIMITER $$

CREATE PROCEDURE `SX_GAMES`(
	INOUT PID_GAME INT,
	IN PTEAM1 VARCHAR(255),
	IN PTEAM2 VARCHAR(255), 
	IN PVALUE DECIMAL(10,2), 
	IN PDATE DATE,
	IN PHOUR TIME,
	IN PACTIVE INT
)
BEGIN
    	INSERT INTO GAMES VALUES (PID_GAME,PTEAM1,PTEAM2,PVALUE,PDATE,PHOUR,PACTIVE)
		ON DUPLICATE KEY
    	UPDATE ID_GAME=PID_GAME,TEAM1=PTEAM1,TEAM2=PTEAM2,VALUE=PVALUE,
		DATE=PDATE,HOUR=PHOUR,ACTIVE=PACTIVE;   

	SELECT LAST_INSERT_ID() INTO PID_GAME;
END
