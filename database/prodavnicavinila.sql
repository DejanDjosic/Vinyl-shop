-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 05:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnicavinila`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(30) NOT NULL,
  `Ime` varchar(30) NOT NULL,
  `Prezime` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Sifra` varchar(30) NOT NULL,
  `Uloga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `Ime`, `Prezime`, `Email`, `Sifra`, `Uloga`) VALUES
(1, 'Admin', 'admin', 'ddjosic@gmail.com', 'admin', '1'),
(2, 'Vanja', 'Poljcic', 'vanja.poljcic@gmail.com', '1234', '2'),
(3, 'Aleksandar', 'Denic', 'aco4denic@gmail.com', 'aca', '2');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id_narudzbenica` int(30) NOT NULL,
  `id_korisnika` int(30) NOT NULL,
  `id_proizvoda` int(30) NOT NULL,
  `cena` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id_narudzbenica`, `id_korisnika`, `id_proizvoda`, `cena`) VALUES
(1, 2, 2, 6400),
(2, 3, 3, 4900),
(3, 3, 3, 9000),
(4, 3, 1, 6400),
(5, 3, 2, 3400),
(6, 2, 8, 4300),
(7, 2, 8, 4300),
(8, 2, 4, 9100),
(9, 2, 1, 5800);

-- --------------------------------------------------------

--
-- Table structure for table `vinil`
--

CREATE TABLE `vinil` (
  `IdVinila` int(30) NOT NULL,
  `Album` varchar(30) NOT NULL,
  `Izvodjac` varchar(30) NOT NULL,
  `Cena` varchar(30) NOT NULL,
  `Trajanje` varchar(30) NOT NULL,
  `Zanr` varchar(30) NOT NULL,
  `Label` varchar(30) NOT NULL,
  `Slika` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vinil`
--

INSERT INTO `vinil` (`IdVinila`, `Album`, `Izvodjac`, `Cena`, `Trajanje`, `Zanr`, `Label`, `Slika`) VALUES
(1, 'Once More Round the Sun', 'Mastodon', '3000', '55', 'Sludge', 'Reprise Records', 'mastodon.jpg'),
(2, 'Talking Book', 'Stevie Wonder', '3400', '43', 'Pop', 'Retown Records', 'Talking_Book.jpg'),
(3, 'Nothing but the Best', 'Frank Sinatra', '2600', '74', 'Jazz', 'Capitol Records', 'franksinatra.jpg'),
(4, 'Danzig', 'Danzig', '6500', '40', 'Rock', 'Def American Recordings', 'danzig.jpg'),
(5, 'The Very Best Of Daryl Hall & ', 'Daryl Hall & John Oates', '2300', '74', 'Pop', 'RCA', 'halloates.jpg'),
(6, 'The Eminem Show', 'Eminem', '2800', '77', 'Rap', 'Aftermath Entertainment', 'eminem.jpg'),
(7, 'Give Me Convenience or Give Me', 'Dead Kennedys', '1800', '51', 'Rock', 'Alternative Tentacles', 'deadkennedys.jpg'),
(8, 'Powerslave', 'Iron Maiden', '1700', '50', 'Heavy Metal', 'Parlophone', 'ironmaiden.jpg'),
(9, 'The Hunter', 'Mastodon', '1400', '52', 'Sludge', 'Reprise Records', 'thehunter.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`);

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`id_narudzbenica`);

--
-- Indexes for table `vinil`
--
ALTER TABLE `vinil`
  ADD PRIMARY KEY (`IdVinila`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
