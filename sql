 DROP TABLE IF EXISTS `cms_cat`;
CREATE TABLE IF NOT EXISTS `cms_cat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `catid` int(100) NOT NULL,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;





DROP TABLE IF EXISTS `cms_title`;
CREATE TABLE IF NOT EXISTS `cms_title` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `catid` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `verifi` int(1) NOT NULL,
  `count` int(10) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `authorid` int(10) NOT NULL,
  `geshi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;