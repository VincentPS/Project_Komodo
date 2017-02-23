-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 11 feb 2017 om 12:20
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
-- Tabelstructuur voor tabel `bestiary`
--

CREATE TABLE IF NOT EXISTS `bestiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `mdef` int(11) DEFAULT NULL,
  `pdef` int(11) DEFAULT NULL,
  `matk` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `drop` text NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `bestiary`
--

INSERT INTO `bestiary` (`id`, `name`, `hp`, `mp`, `mdef`, `pdef`, `matk`, `patk`, `agi`, `exp`, `gold`, `drop`, `desc`) VALUES
(1, 'skeleton', 100, 20, 8, 34, 0, 45, 12, 455, 200, 'bone:20:1', 'This is a cool skeleton... get over it!'),
(2, 'garbageLord', 600, 30, 60, 20, 0, 60, 2, 1255, 500, 'trash:100:5', 'Big ass trash monster');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gear`
--

CREATE TABLE IF NOT EXISTS `gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `mdef` int(11) NOT NULL,
  `pdef` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `patk` int(11) NOT NULL,
  `agi` int(11) NOT NULL,
  `gold` int(11) NOT NULL,
  `desc` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `gear`
--

INSERT INTO `gear` (`id`, `name`, `hp`, `mp`, `mdef`, `pdef`, `matk`, `patk`, `agi`, `gold`, `desc`, `type`) VALUES
(1, 'steel helmet', 0, 0, 5, 10, 0, 0, 0, 200, 'Just a steel regular helmet', 'helmet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(63) NOT NULL,
  `desc` text NOT NULL,
  `effect` text NOT NULL,
  `gold` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `name`, `desc`, `effect`, `gold`) VALUES
(1, 'medicine', 'Heals around 30 HP to a single ally', 'heal:30', 16),
(2, 'damage', 'Deals damamge', 'damage:30', 50),
(3, 'trash', 'One big pile of useless', '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
