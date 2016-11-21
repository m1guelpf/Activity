-- Tokens table
CREATE TABLE IF NOT EXISTS `tokens` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `Website` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
-- Activity table
CREATE TABLE IF NOT EXISTS `activity` (
  `activityId` int(5) NOT NULL AUTO_INCREMENT,
  `activityType` int(2) NOT NULL,
  `activityTitle` text,
  `activityDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ipAddress` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `userAgent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`activityId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
