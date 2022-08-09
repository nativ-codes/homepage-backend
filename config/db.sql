-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 10:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nativ_codes_cp39`
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
('Bucharest Exchange Trading', 'BET-20', '8/9/2022', 'ro', 1, 'lei', 'right'),
('Deutscher Aktien Index', 'DAX-40', '20 June 2022', 'de', 1, '€', 'right'),
('Dow Jones Industrial Average', 'DJIA-30', ' 08/08/2022', 'us', 1, '$', 'left'),
('Cotation Assistée en Continu', 'CAC-40', 'March 31, 2022', 'fr', 1, '€', 'right'),
('Financial Times Stock Exchange', 'FTSE-100', '', 'uk', 1, '£', 'left');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 10:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nativ_codes_cp39`
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
('FONDUL PROPRIETATEA', 'FP', '19.15', 'BET-20'),
('BANCA TRANSILVANIA S.A.', 'TLV', '18.93', 'BET-20'),
('OMV PETROM S.A.', 'SNP', '18.70', 'BET-20'),
('S.N.G.N. ROMGAZ S.A.', 'SNG', '10.50', 'BET-20'),
('BRD - GROUPE SOCIETE GENERALE S.A.', 'BRD', '7.39', 'BET-20'),
('S.N. NUCLEARELECTRICA S.A.', 'SNN', '5.53', 'BET-20'),
('MedLife S.A.', 'M', '3.50', 'BET-20'),
('Digi Communications N.V.', 'DIGI', '2.93', 'BET-20'),
('S.N.T.G.N. TRANSGAZ S.A.', 'TGN', '2.75', 'BET-20'),
('SOCIETATEA ENERGETICA ELECTRICA S.A.', 'EL', '2.33', 'BET-20'),
('ONE UNITED PROPERTIES', 'ONE', '1.88', 'BET-20'),
('TERAPLAST SA', 'TRP', '1.56', 'BET-20'),
('C.N.T.E.E. TRANSELECTRICA', 'TEL', '1.04', 'BET-20'),
('TTS (TRANSPORT TRADE SERVICES)', 'TTS', '0.78', 'BET-20'),
('AQUILA PART PROD COM', 'AQ', '0.61', 'BET-20'),
('PURCARI WINERIES PUBLIC COMPANY LIMITED', 'WINE', '0.58', 'BET-20'),
('ALRO S.A.', 'ALR', '0.56', 'BET-20'),
('CONPET SA', 'COTE', '0.45', 'BET-20'),
('BURSA DE VALORI BUCURESTI SA', 'BVB', '0.43', 'BET-20'),
('Sphera Franchise Group', 'SFG', '0.39', 'BET-20'),
('Adidas', 'ADS', '2.5', 'DAX-40'),
('Airbus', 'AIR', '4.8', 'DAX-40'),
('Allianz', 'ALV', '6.8', 'DAX-40'),
('BASF', 'BAS', '3.8', 'DAX-40'),
('Bayer', 'BAYN', '5.5', 'DAX-40'),
('Beiersdorf', 'BEI', '', 'DAX-40'),
('BMW', 'BMW', '2.3', 'DAX-40'),
('Brenntag', 'BNR', '0.9', 'DAX-40'),
('Continental', 'CON', '0.7', 'DAX-40'),
('Covestro', '1COV', '0.6', 'DAX-40'),
('Daimler Truck', 'DTG', '1.1', 'DAX-40'),
('Deutsche Bank', 'DBK', '1.7', 'DAX-40'),
('Deutsche Börse', 'DB1', '2.5', 'DAX-40'),
('Deutsche Post', 'DPW', '3.1', 'DAX-40'),
('Deutsche Telekom', 'DTE', '5.6', 'DAX-40'),
('E.ON', 'EOAN', '1.7', 'DAX-40'),
('Fresenius', 'FRE', '1.1', 'DAX-40'),
('Fresenius Medical Care', 'FME', '0.9', 'DAX-40'),
('Hannover Re', 'HNR1', '0.7', 'DAX-40'),
('HeidelbergCement', 'HEI', '0.7', 'DAX-40'),
('HelloFresh', 'HFG', '0.4', 'DAX-40'),
('Henkel', 'HEN3', '0.9', 'DAX-40'),
('Infineon Technologies', 'IFX', '2.7', 'DAX-40'),
('Linde', 'LIN', '10.8', 'DAX-40'),
('Mercedes-Benz Group', 'MBG', '4.9', 'DAX-40'),
('Merck', 'MRK', '1.8', 'DAX-40'),
('MTU Aero Engines', 'MTX', '0.8', 'DAX-40'),
('Munich Re', 'MUV2', '2.8', 'DAX-40'),
('Porsche', 'PAH3', '0.9', 'DAX-40'),
('Puma', 'PUM', '0.6', 'DAX-40'),
('Qiagen', 'QIA', '0.8', 'DAX-40'),
('RWE', 'RWE', '2.2', 'DAX-40'),
('SAP', 'SAP', '8.2', 'DAX-40'),
('Sartorius', 'SRT3', '0.7', 'DAX-40'),
('Siemens', 'SIE', '6.8', 'DAX-40'),
('Siemens Healthineers', 'SHL', '1.1', 'DAX-40'),
('Symrise', 'SY1', '1.1', 'DAX-40'),
('Volkswagen Group', 'VOW3', '2.4', 'DAX-40'),
('Vonovia', 'VNA', '2.0', 'DAX-40'),
('UnitedHealth Group Incorporated', 'UNH', '10.766961', 'DJIA-30'),
('Goldman Sachs Group Inc.', 'GS', '6.715406', 'DJIA-30'),
('Home Depot Inc.', 'HD', '6.259726', 'DJIA-30'),
('Microsoft Corporation', 'MSFT', '5.624664', 'DJIA-30'),
('McDonald&#039;s Corporation', 'MCD', '5.152731', 'DJIA-30'),
('Amgen Inc.', 'AMGN', '4.961912', 'DJIA-30'),
('Visa Inc. Class A', 'V', '4.280299', 'DJIA-30'),
('Honeywell International Inc.', 'HON', '3.892038', 'DJIA-30'),
('Salesforce Inc.', 'CRM', '3.807363', 'DJIA-30'),
('Caterpillar Inc.', 'CAT', '3.728306', 'DJIA-30'),
('Johnson &amp; Johnson', 'JNJ', '3.415089', 'DJIA-30'),
('Boeing Company', 'BA', '3.328608', 'DJIA-30'),
('Apple Inc.', 'AAPL', '3.308142', 'DJIA-30'),
('Travelers Companies Inc.', 'TRV', '3.210023', 'DJIA-30'),
('American Express Company', 'AXP', '3.155847', 'DJIA-30'),
('Chevron Corporation', 'CVX', '3.078195', 'DJIA-30'),
('3M Company', 'MMM', '2.979274', 'DJIA-30'),
('Procter &amp; Gamble Company', 'PG', '2.914865', 'DJIA-30'),
('International Business Machines Corporation', 'IBM', '2.66084', 'DJIA-30'),
('Walmart Inc.', 'WMT', '2.560514', 'DJIA-30'),
('JPMorgan Chase &amp; Co.', 'JPM', '2.29445', 'DJIA-30'),
('NIKE Inc. Class B', 'NKE', '2.287427', 'DJIA-30'),
('Walt Disney Company', 'DIS', '2.189309', 'DJIA-30'),
('Merck &amp; Co. Inc.', 'MRK', '1.775565', 'DJIA-30'),
('Coca-Cola Company', 'KO', '1.263503', 'DJIA-30'),
('Dow Inc.', 'DOW', '1.046403', 'DJIA-30'),
('Cisco Systems Inc.', 'CSCO', '0.903333', 'DJIA-30'),
('Verizon Communications Inc.', 'VZ', '0.893702', 'DJIA-30'),
('Walgreens Boots Alliance Inc.', 'WBA', '0.792172', 'DJIA-30'),
('Intel Corporation', 'INTC', '0.709905', 'DJIA-30'),
('LVMH', 'MC', '11.67', 'CAC-40'),
('TOTALENERGIES', 'TTE', '7.48', 'CAC-40'),
('SANOFI', 'SAN', '6.81', 'CAC-40'),
('L\'OREAL', 'OR', '5.91', 'CAC-40'),
('SCHNEIDER ELECTRIC', 'SU', '5.61', 'CAC-40'),
('AIR LIQUIDE', 'AI', '4.87', 'CAC-40'),
('AIRBUS', 'AIR', '4.21', 'CAC-40'),
('BNP PARIBAS ACT.A', 'BNP', '3.78', 'CAC-40'),
('AXA', 'CS', '3.54', 'CAC-40'),
('ESSILORLUXOTTICA', 'EL', '3.33', 'CAC-40'),
('VINCI', 'DG', '3.24', 'CAC-40'),
('KERING', 'KER', '2.80', 'CAC-40'),
('PERNOD RICARD', 'RI', '2.70', 'CAC-40'),
('HERMES INTL', 'RMS', '2.65', 'CAC-40'),
('SAFRAN', 'SAF', '2.37', 'CAC-40'),
('DANONE', 'BN', '2.12', 'CAC-40'),
('CAPGEMINI', 'CAP', '2.10', 'CAC-40'),
('STELLANTIS NV', 'STLA', '1.95', 'CAC-40'),
('DASSAULT SYSTEMES', 'DSY', '1.92', 'CAC-40'),
('SAINT GOBAIN', 'SGO', '1.68', 'CAC-40'),
('STMICROELECTRONICS', 'STM', '1.63', 'CAC-40'),
('LEGRAND', 'LR', '1.50', 'CAC-40'),
('ENGIE', 'ENGI', '1.41', 'CAC-40'),
('MICHELIN', 'ML', '1.35', 'CAC-40'),
('TELEPERFORMANCE', 'TEP', '1.32', 'CAC-40'),
('ORANGE', 'ORA', '1.29', 'CAC-40'),
('SOCIETE GENERALE', 'GLE', '1.28', 'CAC-40'),
('ARCELORMITTAL SA', 'MT', '1.27', 'CAC-40'),
('VEOLIA ENVIRON.', 'VIE', '1.23', 'CAC-40'),
('CREDIT AGRICOLE', 'ACA', '0.98', 'CAC-40'),
('PUBLICIS GROUPE SA', 'PUB', '0.82', 'CAC-40'),
('THALES', 'HO', '0.79', 'CAC-40'),
('CARREFOUR', 'CA', '0.75', 'CAC-40'),
('EUROFINS SCIENT.', 'ERF', '0.72', 'CAC-40'),
('WORLDLINE', 'WLN', '0.61', 'CAC-40'),
('VIVENDI SE', 'VIV', '0.59', 'CAC-40'),
('UNIBAIL-RODAMCO-WE', 'URW', '0.52', 'CAC-40'),
('ALSTOM', 'ALO', '0.44', 'CAC-40'),
('BOUYGUES', 'EN', '0.43', 'CAC-40'),
('RENAULT', 'RNO', '0.32', 'CAC-40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
