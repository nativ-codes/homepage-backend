-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2022 at 12:58 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u759211190_nativ_codes_cp`
--

-- --------------------------------------------------------

--
-- Table structure for table `market_indexes`
--

CREATE TABLE `market_indexes` (
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_updated` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `currency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_placement` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `market_indexes`
--

INSERT INTO `market_indexes` (`name`, `symbol`, `last_updated`, `country`, `is_active`, `currency`, `currency_placement`) VALUES
('Bucharest Exchange Trading', 'BET-20', '7/29/2022', 'ro', 1, 'lei', 'right'),
('Deutscher Aktien Index', 'DAX-40', '', 'de', 1, '€', 'right'),
('Dow Jones Industrial Average', 'DJIA-30', '', 'us', 1, '$', 'left'),
('Cotation Assistée en Continu', 'CAC-40', '', 'fr', 1, '€', 'right'),
('Financial Times Stock Exchange', 'FTSE-100', '', 'uk', 1, '£', 'left');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2022 at 01:00 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u759211190_nativ_codes_cp`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_index` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`name`, `symbol`, `weight`, `market_index`) VALUES
('FONDUL PROPRIETATEA', 'FP', '19.77', 'BET'),
('OMV PETROM S.A.', 'SNP', '18.93', 'BET'),
('BANCA TRANSILVANIA S.A.', 'TLV', '18.24', 'BET'),
('S.N.G.N. ROMGAZ S.A.', 'SNG', '10.77', 'BET'),
('BRD - GROUPE SOCIETE GENERALE S.A.', 'BRD', '7.00', 'BET'),
('S.N. NUCLEARELECTRICA S.A.', 'SNN', '5.48', 'BET'),
('MedLife S.A.', 'M', '3.49', 'BET'),
('Digi Communications N.V.', 'DIGI', '2.96', 'BET'),
('S.N.T.G.N. TRANSGAZ S.A.', 'TGN', '2.73', 'BET'),
('SOCIETATEA ENERGETICA ELECTRICA S.A.', 'EL', '2.20', 'BET'),
('ONE UNITED PROPERTIES', 'ONE', '1.94', 'BET'),
('TERAPLAST SA', 'TRP', '1.60', 'BET'),
('C.N.T.E.E. TRANSELECTRICA', 'TEL', '1.04', 'BET'),
('TTS (TRANSPORT TRADE SERVICES)', 'TTS', '0.79', 'BET'),
('AQUILA PART PROD COM', 'AQ', '0.61', 'BET'),
('PURCARI WINERIES PUBLIC COMPANY LIMITED', 'WINE', '0.58', 'BET'),
('ALRO S.A.', 'ALR', '0.56', 'BET'),
('CONPET SA', 'COTE', '0.45', 'BET'),
('BURSA DE VALORI BUCURESTI SA', 'BVB', '0.43', 'BET'),
('Sphera Franchise Group', 'SFG', '0.40', 'BET');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
