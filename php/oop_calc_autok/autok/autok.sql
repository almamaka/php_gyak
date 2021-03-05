-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Hoszt: 127.0.0.1
-- Létrehozás ideje: 2018. Feb 07. 22:16
-- Szerver verzió: 5.6.17
-- PHP verzió: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `autok`
--
CREATE DATABASE IF NOT EXISTS `autok` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `autok`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `auto_info`
--

CREATE TABLE IF NOT EXISTS `auto_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Marka` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Tipus` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `Evjarat` varchar(4) COLLATE utf8_hungarian_ci NOT NULL,
  `Ar` int(10) NOT NULL,
  `img` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=8 ;

--
-- A tábla adatainak kiíratása `auto_info`
--

INSERT INTO `auto_info` (`id`, `Marka`, `Tipus`, `Evjarat`, `Ar`, `img`) VALUES
(1, 'audi', 'A8', '2010', 12000000, 'audi_a8.jpg'),
(2, 'bmw', 'm3', '2000', 4500000, 'bmw_m3.jpg'),
(3, 'honda', 'accord', '2015', 6800000, 'honda_accord.jpg'),
(4, 'honda', 'civic', '2012', 3500000, 'honda_civic.jpg'),
(5, 'opel', 'astra', '2001', 800000, 'opel_astra.jpg'),
(6, 'opel', 'vectra', '2009', 2300000, 'opel_vectra.jpg'),
(7, 'renault', 'clio', '1999', 400000, 'renault_clio.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
