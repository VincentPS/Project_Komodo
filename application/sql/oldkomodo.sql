-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 09 mrt 2017 om 09:05
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `oldkomodo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestiary`
--

CREATE TABLE IF NOT EXISTS `bestiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `pdef` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `drop` text NOT NULL,
  `desc` text NOT NULL,
  `level` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `bestiary`
--

INSERT INTO `bestiary` (`id`, `name`, `hp`, `mp`, `patk`, `matk`, `pdef`, `mdef`, `agi`, `exp`, `gold`, `drop`, `desc`, `level`) VALUES
(1, 'skeleton', 140, 20, 30, 10, 10, 45, 12, 180, 100, 'bone:20:1', 'This is a cool skeleton... get over it!', '2'),
(2, 'garbageLord', 800, 30, 60, 0, 20, 60, 2, 1255, 500, 'trash:100:5', 'Big ass trash monster.', 'boss'),
(3, 'carrotory', 50, 10, 15, 8, 8, 2, 10, 65, 30, 'carrot:20:1', 'A carrot with an eye. This species likes to be useless and orange most of the time.', '1'),
(4, 'pumpKing', 300, 100, 30, 5, 25, 0, 2, 300, 150, 'pumpkinHelmet:100:1,pumpkinBread:50:2,pumpkin:100:3', 'The king of veggies.', 'boss'),
(5, 'onionBro', 30, 0, 18, 0, 30, 5, 0, 75, 25, 'woodenShield:10:1', 'Onion? Bro!', '1'),
(6, 'leeque', 75, 0, 20, 0, 15, 5, 10, 100, 50, 'woodenSpear:10:1', 'A chic leek.', '1'),
(7, 'wheatly', 2, 0, 15, 0, 1000, 1000, 100, 80, 40, 'wheat:50:1,goldenMagicRing:10:1', 'A dodgy wheat. Dealing damage is hard because you''re very likely to miss or deal just 1 damage.', '1'),
(8, 'pumpling', 90, 0, 15, 0, 0, 25, 2, 80, 40, 'pumpkin:40:1', 'A tiny pumpkin with an evil smile.', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gear`
--

CREATE TABLE IF NOT EXISTS `gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `pdef` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `recipe` text NOT NULL,
  `desc` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `gear`
--

INSERT INTO `gear` (`id`, `name`, `hp`, `mp`, `patk`, `matk`, `pdef`, `mdef`, `agi`, `gold`, `recipe`, `desc`, `type`) VALUES
(1, 'steelHelmet', 0, 0, 0, 0, 7, 3, 0, 150, '', 'Just a steel regular helmet.', 'helmet'),
(2, 'woodenShield', 0, 0, 0, 0, 5, 5, 0, 30, '', 'A wooden shield. Watch out for fire magic!', 'shield'),
(3, 'woodenSpear', 0, 0, 13, 0, 0, 0, 5, 30, '', 'A wooden spear. AKA a sharp stick.', 'weapon'),
(4, 'commonerLeggings', 0, 0, 0, 0, 5, 5, 0, 40, '', 'Nice blue starter pants.', 'leggings'),
(5, 'commonerShirt', 0, 0, 0, 0, 5, 5, 0, 40, '', 'Your starter gear. Don''t think we would have given you dragonbone armor or something.', 'shirt'),
(6, 'copperSword', 0, 0, 15, 0, 0, 0, 0, 50, '', 'A regular copper sword.', 'weapon'),
(7, 'goldenMagicRing', 0, 0, 0, 10, 0, 0, 0, 150, '', 'A golden ring that contains magic power.', 'accessory'),
(8, 'copperAxe', 0, 0, 17, 0, 2, 0, 0, 170, '', 'A copper axe. Its blade can block some more damage then a sword would. pretty handy if you ask me.', 'weapon'),
(9, 'leatherShield', 0, 0, 0, 0, 7, 7, 3, 200, '', 'A dodgy and strong shield... At least for now.', 'shield');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `desc` text NOT NULL,
  `effect` text NOT NULL,
  `recipe` text NOT NULL,
  `gold` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `name`, `desc`, `effect`, `recipe`, `gold`) VALUES
(1, 'medicine', 'Heals around 30 HP to a single ally.', 'heal:30:hp', '', 16),
(2, 'damage', 'Deals damage.', 'damage:30:hp', '', 50),
(3, 'trash', 'One big pile of useless.', '', '', 2),
(4, 'bone', 'Just a bone.', '', '', 30),
(5, 'carrot', 'The body of a Carrotory. It looks quite tasty tho and heals around 15 HP.', 'heal:15:hp', '', 18),
(6, 'pumpkinBread', 'A delicious piece of bread. it heals around 15 MP. ', 'heal:15:mp', 'wheat:2,pumpkin:1', 50),
(7, 'wheat', 'Just wheat.', '', '', 26),
(8, 'pumpkin', 'Making some pumpkinBread with it would be nice.', '', '', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
