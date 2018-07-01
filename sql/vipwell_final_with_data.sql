-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Erstellungszeit: 02. Februar 2007 um 00:16
-- Server Version: 5.0.27
-- PHP-Version: 5.2.0
-- 
-- Datenbank: `vipwell`
-- 

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `persons`
-- 

CREATE TABLE `persons` (
  `forename` varchar(40) collate latin1_general_ci NOT NULL,
  `surname` varchar(40) collate latin1_general_ci NOT NULL,
  `login` varchar(40) collate latin1_general_ci NOT NULL,
  `password` varchar(40) collate latin1_general_ci NOT NULL,
  `email` varchar(40) collate latin1_general_ci NOT NULL,
  `type` varchar(40) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle `persons`
-- 

INSERT INTO `persons` VALUES ('Xingyuan', 'Yang', 'xing', '2e2b6533a81bc15430cf65de46dc097eeb5ba70c', 'xing@bind.ding', 'admin');
INSERT INTO `persons` VALUES ('Konrad', 'Hoeffner', 'konrad', '2e2b6533a81bc15430cf65de46dc097eeb5ba70c', 'konrad@hallo.de', 'user');
INSERT INTO `persons` VALUES ('Albrecht', 'Hoeffner', 'albrecht', '2e2b6533a81bc15430cf65de46dc097eeb5ba70c', 'albus@popalbus.de', 'user');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `products`
-- 

CREATE TABLE `products` (
  `name` varchar(40) collate latin1_general_ci default NULL,
  `id` int(40) unsigned NOT NULL auto_increment,
  `quantity` int(40) unsigned NOT NULL,
  `category` varchar(40) collate latin1_general_ci NOT NULL,
  `price` int(40) unsigned NOT NULL,
  `description` varchar(500) collate latin1_general_ci NOT NULL,
  `image_small` varchar(40) collate latin1_general_ci NOT NULL,
  `image_large` varchar(40) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=993 ;

-- 
-- Daten für Tabelle `products`
-- 

INSERT INTO `products` VALUES ('Brilliant Ruby Ring', 1, 10, 'ring', 1500, 'These are so treasured, we are almost out of stock before we put them on the storefront!', 'ring1_small.jpg', 'ring1_large.jpg');
INSERT INTO `products` VALUES ('Necklace1', 2, 15, 'necklace', 3500, 'A golden necklace for those special days.', 'necklace1_small.jpg', 'necklace1_large.jpg');
INSERT INTO `products` VALUES ('ring2', 4, 30, 'ring', 2000, 'You won''t be going to that party without this and you know it.', 'ring2_small.jpg', 'ring2_large.jpg');
INSERT INTO `products` VALUES ('Hat', 5, 20, 'ring', 4000, 'Wanna be just uber-cool? Than this hip hat is just the hit on your head.', 'hat1_small.jpg', 'hat1_large.jpg');
INSERT INTO `products` VALUES ('Neclace2', 6, 20, 'ring', 2000, 'Isn''t she cute? Even you can be like her if you just buy it NOW.', 'necklace2_small.jpg', 'necklace2_large.jpg');
INSERT INTO `products` VALUES ('Necklace3', 7, 20, 'ring', 2000, 'Dont leave home without it... !', 'necklace3_small.jpg', 'necklace3_large.jpg');
INSERT INTO `products` VALUES ('Scarf1', 8, 20, 'ring', 2000, 'Regardless of how you feel, our scarf blends perfectly with in your emotions.', 'scarf1_small.jpg', 'scarf1_large.jpg');
INSERT INTO `products` VALUES ('scarf2', 9, 20, 'ring', 2000, 'The color of the wind makes this winter more vivid.  ', 'scarf2_small.jpg', 'scarf2_large.jpg');
INSERT INTO `products` VALUES ('scarf3', 10, 20, 'ring', 2000, 'For those plushy times of yours...', 'scarf3_small.jpg', 'scarf3_large.jpg');

-- --------------------------------------------------------

-- 
-- Tabellenstruktur für Tabelle `sales`
-- 

CREATE TABLE `sales` (
  `person_login` varchar(40) collate latin1_general_ci NOT NULL,
  `product_id` int(40) NOT NULL,
  `quantity` int(40) NOT NULL,
  `timestamp` int(40) NOT NULL,
  PRIMARY KEY  (`person_login`,`product_id`,`timestamp`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Daten für Tabelle `sales`
-- 

