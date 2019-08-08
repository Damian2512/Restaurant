-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 08 aug 2019 om 18:02
-- Serverversie: 5.7.24
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_excellent`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestellingsnummer` int(11) NOT NULL,
  `gebruikersnummer` int(11) NOT NULL,
  `gerechtsnummer` text NOT NULL,
  `dranknummer` text NOT NULL,
  `toevoeging` text NOT NULL,
  `tafelnummer` int(11) NOT NULL,
  `datum_tijd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gerecht_voltooid` int(1) NOT NULL DEFAULT '0',
  `drank_voltooid` int(1) NOT NULL DEFAULT '0',
  `bestelling_afgerond` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingsnummer`, `gebruikersnummer`, `gerechtsnummer`, `dranknummer`, `toevoeging`, `tafelnummer`, `datum_tijd`, `gerecht_voltooid`, `drank_voltooid`, `bestelling_afgerond`) VALUES
(1, 0, '5', '12', ', Zonder geitenkaas', 12, '2019-01-23 14:50:57', 1, 1, 0),
(2, 0, '6, 4', '11', ', asgd', 12, '2019-01-23 14:52:06', 1, 1, 0),
(3, 0, '8, 9', '11', ', asgd', 12, '2019-01-23 14:53:54', 1, 1, 0),
(4, 0, '7, 10', '11, 9', ', asgd', 12, '2019-01-23 14:55:04', 1, 1, 0),
(5, 0, '3', '8, 10', ', , ', 1, '2019-01-23 16:05:36', 1, 1, 0),
(6, 0, '4', '9', '', 1, '2019-01-23 16:40:46', 0, 1, 0),
(7, 0, '9', '10', 'zonder geitenkaas', 2, '2019-01-23 16:42:34', 0, 1, 0),
(8, 0, '1', '14', '', 3, '2019-01-23 16:49:06', 1, 1, 0),
(9, 0, '1, 7', '9', 'zonder groenten, zonder tomaten, zonder uien', 23, '2019-01-23 16:57:58', 1, 1, 0),
(10, 0, '9, 3', '0', 'hi', 12, '2019-01-23 19:01:07', 1, 0, 0),
(11, 0, '1', '0', '', 0, '2019-01-23 21:37:11', 1, 0, 0),
(12, 0, '4, 7', '27', 'zonder ui, zonder zalm', 14, '2019-01-24 14:34:54', 1, 1, 0),
(13, 0, '3', '12', 'Zonder asperges', 12, '2019-01-24 14:44:08', 0, 1, 0),
(14, 0, '1, 2', '11', 'grws, asdewaa', 12, '2019-01-24 16:36:52', 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikersnummer` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `voornaam` varchar(256) NOT NULL,
  `achternaam` varchar(256) NOT NULL,
  `functie` int(1) NOT NULL,
  `telefoonnummer` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechten`
--

CREATE TABLE `gerechten` (
  `gerechtsnummer` int(11) NOT NULL,
  `gerechtsnaam` varchar(256) NOT NULL,
  `gerechtsomschrijving` text NOT NULL,
  `gerechtsprijs` int(11) NOT NULL,
  `gang` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gerechten`
--

INSERT INTO `gerechten` (`gerechtsnummer`, `gerechtsnaam`, `gerechtsomschrijving`, `gerechtsprijs`, `gang`) VALUES
(1, 'Tomatensoep', 'Een lekker tomatensoepje', 6, 8),
(2, 'Groentesoep', 'Een lekker groentesoepje', 4, 8),
(3, 'Aspergesoep', 'Een romige aspergesoep', 5, 8),
(4, 'Uiensoep', 'Een sappig uiensoepje', 4, 8),
(5, 'Salade met geitenkaas', 'Een lekker salade', 5, 7),
(6, 'Tonijnsalade', 'Een salade gemaakt van vers gevangen tonijn', 6, 7),
(7, 'Zalmsalade', 'Zalmsalade, met de hand gevangen door de kok', 6, 7),
(8, 'Koffie', 'Een lekker bakkie pleur', 2, 1),
(9, 'Thee', 'Een overheerlijk glaasje thee', 2, 1),
(10, 'Chocolademelk', 'Een romig kopje', 3, 1),
(11, 'Espresso', 'Een sterk bakkie pleur', 2, 1),
(12, 'Cappuchino', 'Pleur met melk', 3, 1),
(13, 'Koffie verkeerd', 'Koffie met erg veel melk', 3, 1),
(14, 'latte Machiatto', 'Lege bescrijving', 4, 1),
(15, 'Pilsner', 'Een koud pilsje', 3, 2),
(16, 'Weizen', 'Geen', 4, 2),
(17, 'Stender', 'Geen', 3, 2),
(18, 'Palm', 'Geen', 4, 2),
(19, 'Kasteel donker', 'Geen', 5, 2),
(20, 'Brugse zotte', 'Geen', 4, 2),
(21, 'Grimbergen dubbel', 'Geen', 4, 2),
(22, 'Per glas', 'Geen', 4, 3),
(23, 'Per fles', 'Geen', 18, 3),
(24, 'Seizoenswijn', 'Geen', 4, 3),
(25, 'Rode port', 'Geen', 3, 3),
(26, 'Tonic', 'Geen', 2, 4),
(27, 'Seven Up', 'Geen', 3, 4),
(28, 'Verse Jus', 'Geen', 4, 4),
(29, 'Chaudfontaine Rood', 'Geen', 3, 4),
(30, 'Chaudfontaine Blauw', 'Geen', 2, 4),
(31, 'Bitterballen met mosterd', 'Geen', 4, 5),
(32, 'Vlammetjes met chilisaus', 'Geen', 4, 5),
(33, 'Kipbites', 'Geen', 5, 5),
(34, 'Portie kaas met mosterd', 'Geen', 4, 6),
(35, 'Brood met kruidenboter', 'Geen', 5, 6),
(36, 'Portie salami worst', 'Geen', 4, 6),
(37, 'Gebakken makreel', 'Geen', 9, 9),
(38, 'Mosselen uit pan', 'Geen', 10, 9),
(39, 'Biefstuk in chamignonsaus', 'Geen', 12, 10),
(40, 'Wienerschnitzel', 'Geen', 10, 10),
(41, 'Bonengerecht met diverse groenten', 'Diverse groenten', 12, 11),
(42, 'Gebakken banaan', 'Geen', 11, 11),
(43, 'Black lady', 'Geen', 5, 12),
(44, 'Vruchtenijs', 'Geen', 3, 12),
(45, 'Chocolademousse', 'Geen', 5, 13),
(46, 'Vanillemousse', 'Geen', 4, 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `reserveringsnummer` int(11) NOT NULL,
  `gebruikersnummer` int(11) NOT NULL,
  `naam` varchar(256) NOT NULL,
  `datum` varchar(256) NOT NULL,
  `tijd` varchar(256) NOT NULL,
  `tafelnummer` int(11) NOT NULL,
  `personen` int(11) NOT NULL,
  `telefoonnummer` varchar(256) NOT NULL,
  `reservering_gebruikt` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`reserveringsnummer`, `gebruikersnummer`, `naam`, `datum`, `tijd`, `tafelnummer`, `personen`, `telefoonnummer`, `reservering_gebruikt`) VALUES
(10, 0, 'Wilbrink', '2019-02-19', '20:00', 1, 5, '45354364565', 0),
(11, 0, 'Berns', '2019-01-24', '12:00', 1, 1, '74748593025', 0),
(12, 0, 'asd', '2019-01-01', '20:00', 2, 12, '12435', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestellingsnummer`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruikersnummer`);

--
-- Indexen voor tabel `gerechten`
--
ALTER TABLE `gerechten`
  ADD PRIMARY KEY (`gerechtsnummer`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`reserveringsnummer`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `bestellingsnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruikersnummer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gerechten`
--
ALTER TABLE `gerechten`
  MODIFY `gerechtsnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `reserveringsnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
