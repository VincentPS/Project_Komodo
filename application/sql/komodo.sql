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
-- Databank: `komodo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `abilities`
--

CREATE TABLE IF NOT EXISTS `abilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `changeStat` varchar(64) COLLATE utf8_bin NOT NULL,
  `changeMin` int(11) NOT NULL,
  `changeMax` int(11) NOT NULL,
  `costStat` varchar(64) COLLATE utf8_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `rounds` int(11) NOT NULL,
  `desc` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `changeStat`, `changeMin`, `changeMax`, `costStat`, `cost`, `rounds`, `desc`, `image`) VALUES
(1, 'Very Small Heal', 'hp', 12, 18, 'mp', 1, 1, 'Heals a very litle amount of hp', 'verySmallHeal.png'),
(2, 'Attack', 'hp', -8, -12, 'mp', 0, 1, 'Deals damage.', 'damage.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestiary`
--

CREATE TABLE IF NOT EXISTS `bestiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `pdef` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `onhp100` text COLLATE utf8_bin NOT NULL,
  `onhp90` text COLLATE utf8_bin NOT NULL,
  `onhp80` text COLLATE utf8_bin NOT NULL,
  `onhp70` text COLLATE utf8_bin NOT NULL,
  `onhp60` text COLLATE utf8_bin NOT NULL,
  `onhp50` text COLLATE utf8_bin NOT NULL,
  `onhp40` text COLLATE utf8_bin NOT NULL,
  `onhp30` text COLLATE utf8_bin NOT NULL,
  `onhp20` text COLLATE utf8_bin NOT NULL,
  `onhp10` text COLLATE utf8_bin NOT NULL,
  `dropItem` text COLLATE utf8_bin NOT NULL,
  `dropRate` text COLLATE utf8_bin NOT NULL,
  `dropAmount` text COLLATE utf8_bin NOT NULL,
  `region` text COLLATE utf8_bin NOT NULL,
  `desc` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `bestiary`
--

INSERT INTO `bestiary` (`id`, `name`, `hp`, `mp`, `patk`, `matk`, `pdef`, `mdef`, `agi`, `exp`, `gold`, `onhp100`, `onhp90`, `onhp80`, `onhp70`, `onhp60`, `onhp50`, `onhp40`, `onhp30`, `onhp20`, `onhp10`, `dropItem`, `dropRate`, `dropAmount`, `region`, `desc`, `image`) VALUES
(1, 'Bread', 50, 10, 15, 20, 10, 5, 5, 100, 50, '2', '', '', '', '', '', '', '', '', '', '1', '50', '1', '1', 'It''s Bread', 'bread.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `pdef` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `effect` text COLLATE utf8_bin NOT NULL,
  `type` varchar(64) COLLATE utf8_bin NOT NULL,
  `desc` text COLLATE utf8_bin NOT NULL,
  `image` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `name`, `hp`, `mp`, `patk`, `matk`, `pdef`, `mdef`, `agi`, `gold`, `effect`, `type`, `desc`, `image`) VALUES
(1, 'Bread', 0, 0, 0, 0, 0, 0, 0, 50, '1', 'item', 'Heals 15 hp.', 'breadItem.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
