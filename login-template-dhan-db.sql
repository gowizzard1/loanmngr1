-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 09:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login-template-dhan-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(5, 'admin123', '$2y$10$S/QbPtbITtk2IKdWP7LSdezFZHrquHtzjWEDVyS..Sw3O7/vIQ./S', 'admin123@admin.com'),
(10, 'Dragon', '$2y$10$A5AdWQg2r0GQsk/8lI4b.e2E48fvzLItRZKlOil52EwlpwWOxfIAy', 'dragon@ortizlab.com');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`firstname`, `lastname`, `telephone`, `address`, `id`) VALUES
('Capital_Ddy', NULL, '', '', 1),
('Ddy', NULL, '', '', 2),
('AJA', NULL, '', '', 3),
('Lyra Vega', NULL, '', '', 4),
('Em Ariate', NULL, '', '', 5),
('Paul Jamila', NULL, '', '', 6),
('Erica Jeremias', NULL, '', '', 7),
('Amy Lacaste', NULL, '', '', 8),
('Jocelyn Corpus', NULL, '', '', 9),
('Gloria Doctor', NULL, '', '', 10),
('Sali Oro', NULL, '', '', 11),
('Rosita Legaspi', NULL, '', '', 12),
('Hera Mabini', NULL, '', '', 13),
('Liboy Mabini', NULL, '', '', 14),
('Marissa Garados', NULL, '', '', 15),
('Lyra Ganace', NULL, '', '', 16),
('Alvin Jordan', NULL, '', '', 17),
('Edmund Banares', NULL, '', '', 18),
('Allan Discarga', NULL, '', '', 19),
('Arlene Gallego', NULL, '', '', 20),
('Razel Prudencio', NULL, '', '', 21),
('Pepito valderama', NULL, '', '', 22),
('Analyn Jesalva', NULL, '', '', 23),
('Pansay', NULL, '', '', 24),
('Excess', NULL, '', '', 25),
('Leonard Doctor', NULL, '', '', 26),
('Paul Jamila_1', NULL, '', '', 27),
('Rolly', NULL, '', '', 28),
('Dante_old Allow', NULL, '', '', 29),
('Avigail', NULL, '', '', 30),
('Alvin Kulapad', NULL, '', '', 31),
('Valerie Del Rosario', NULL, '', '', 32),
('Che', NULL, '', '', 33),
('Erlinda Dalia', NULL, '', '', 34),
('Jenny Enaje', NULL, '', '', 35),
('Noel Paraiso', NULL, '', '', 36),
('Jun ', NULL, '', '', 37),
('Cynthia Doctor', NULL, '', '', 38),
('Tess', NULL, '', '', 39),
('Kristel Faye', NULL, '', '', 40),
('Rogielyn Dollison', NULL, '', '', 41),
('Doncillo', NULL, '', '', 42),
('Adrian Kulapad', NULL, '', '', 43),
('Lany Jetajobe', NULL, '', '', 44),
('Wilson Chan ', NULL, '', '', 45),
('Mary Joy Descarga', NULL, '', '', 46),
('Amar Garados', NULL, '', '', 47),
('Erickson Descarga', NULL, '', '', 48);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `rate` float NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Unpaid',
  `date` date NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `client_id`, `amount`, `rate`, `status`, `date`, `code`) VALUES
(1, 4, 5000, 0, 'Unpaid', '2016-07-30', 'Lyra073016'),
(2, 4, 3000, 0, 'Unpaid', '2016-11-01', 'LyraV110116'),
(3, 5, 20000, 0, 'Unpaid', '2016-08-08', 'Em080816'),
(4, 6, 5000, 0, 'Unpaid', '2016-08-11', 'Paul081116'),
(5, 6, 3000, 0, 'Unpaid', '2016-10-14', 'Paul101416'),
(6, 6, 3000, 0, 'Unpaid', '2016-10-22', 'Paul102216'),
(7, 7, 4000, 0, 'Unpaid', '2016-08-19', 'Erica081916'),
(8, 7, 6000, 0, 'Unpaid', '2016-10-12', 'Erica101216'),
(9, 7, 5000, 0, 'Unpaid', '2016-12-11', 'Erica121116'),
(10, 8, 5000, 0, 'Unpaid', '2016-08-30', 'AmyL083016'),
(11, 9, 3000, 0, 'Unpaid', '2016-09-27', 'jocelyn092716'),
(12, 10, 9500, 0, 'Unpaid', '2016-10-03', 'Gloria100316'),
(13, 10, 9500, 0, 'Unpaid', '2016-10-11', 'Gloria0002'),
(14, 10, 11000, 0, 'Unpaid', '2016-11-09', 'Gloria110916'),
(15, 11, 3000, 0, 'Unpaid', '2016-10-15', 'Sali101516'),
(16, 12, 1000, 0, 'Unpaid', '2016-10-19', 'Rosita101916'),
(17, 12, 1000, 0, 'Unpaid', '2016-10-27', 'Rosita102716'),
(18, 13, 3000, 0, 'Unpaid', '2016-10-28', 'Hera102816'),
(19, 14, 5000, 0, 'Unpaid', '2016-10-10', 'Liboy101016'),
(20, 14, 2000, 0, 'Unpaid', '2016-12-02', 'Liboy0002'),
(21, 15, 3000, 0, 'Unpaid', '2016-11-15', 'Marissa111516'),
(22, 15, 2000, 0, 'Unpaid', '2016-11-13', 'Marissa111316'),
(23, 15, 3000, 0, 'Unpaid', '2016-12-17', 'Marissa121716'),
(24, 16, 15000, 0, 'Unpaid', '2016-11-12', 'lyraG111216'),
(25, 17, 5000, 0, 'Unpaid', '2016-11-18', 'Alvin111816'),
(26, 18, 8000, 0, 'Unpaid', '2016-11-20', 'Edmund112016'),
(27, 19, 2500, 0, 'Unpaid', '2016-11-22', 'allan112216'),
(28, 20, 1000, 0, 'Unpaid', '2016-11-29', 'Arlene112916'),
(29, 21, 1000, 0, 'Unpaid', '2016-12-13', 'Razel121316'),
(30, 22, 1500, 0, 'Unpaid', '2016-12-13', 'Pepit121316'),
(31, 23, 10000, 0, 'Unpaid', '2016-10-14', 'Analyn101416'),
(32, 23, 5000, 0, 'Unpaid', '2016-11-02', 'Analyn110216'),
(33, 23, 1000, 0, 'Unpaid', '2016-11-05', 'Analyn1105016'),
(34, 23, 4000, 0, 'Unpaid', '2016-11-10', 'Analyn111016'),
(35, 23, 12000, 0, 'Unpaid', '2017-01-16', 'Analyn011617'),
(36, 23, 4000, 0, 'Unpaid', '2016-12-13', 'Analyn121316'),
(37, 14, 5000, 0, 'Unpaid', '2017-01-07', 'Liboy010717'),
(38, 24, 1500, 0, 'Unpaid', '2017-01-05', 'Pansay010517'),
(39, 19, 3000, 0, 'Unpaid', '2016-12-23', 'allan122316'),
(40, 9, 2000, 0, 'Unpaid', '2016-12-11', 'jocelyn121116'),
(41, 17, 20000, 0, 'Unpaid', '2017-01-16', 'Alvin011617'),
(42, 26, 5000, 0, 'Unpaid', '2017-01-19', 'Leonard011917'),
(43, 27, 9000, 0, 'Unpaid', '2017-01-16', 'Paul Jamila_1_011617'),
(44, 19, 3000, 0, 'Unpaid', '2017-01-23', 'allan012317'),
(45, 10, 1000, 0, 'Unpaid', '2017-02-02', 'Gloria020217'),
(46, 23, 3000, 0, 'Unpaid', '2017-02-02', 'Analyn020217'),
(47, 24, 1000, 0, 'Unpaid', '2017-02-02', 'Pansay020217'),
(48, 21, 2000, 0, 'Unpaid', '2017-02-12', 'Razel021217'),
(49, 15, 7000, 0, 'Unpaid', '2017-02-13', 'Marissa021317'),
(50, 19, 3000, 0, 'Unpaid', '2017-02-23', 'Allan022317'),
(51, 22, 1000, 0, 'Unpaid', '2017-02-27', 'Pepito022717'),
(52, 21, 1500, 0, 'Unpaid', '2017-02-28', 'Razel022817'),
(53, 14, 3000, 0, 'Unpaid', '2017-03-03', 'Liboy030317'),
(54, 28, 3000, 0, 'Unpaid', '2017-03-03', 'Rolly030317'),
(55, 28, 2000, 0, 'Unpaid', '2017-03-05', 'Rolly030517'),
(56, 21, 6500, 0, 'Unpaid', '2017-03-10', 'Razel031017'),
(57, 29, 2000, 0, 'Unpaid', '2017-03-10', 'Dante_old Allow03101'),
(58, 19, 3000, 0, 'Unpaid', '2017-03-18', 'Allan031817'),
(59, 30, 2000, 0, 'Unpaid', '2017-03-24', 'Avigail032417'),
(60, 30, 1000, 0, 'Unpaid', '2017-03-28', 'Avigail032817'),
(61, 31, 9000, 0, 'Unpaid', '2017-04-16', 'AlvinK041617'),
(62, 19, 2500, 0, 'Unpaid', '2017-03-23', 'Allan032317'),
(63, 19, 5000, 0, 'Unpaid', '2017-04-22', 'Allan042217'),
(64, 32, 3000, 0, 'Unpaid', '2017-05-06', 'Valerie050617'),
(65, 23, 5000, 0, 'Unpaid', '2017-05-30', 'Analyn053017'),
(66, 30, 4000, 0, 'Unpaid', '2017-06-05', 'Avi060517'),
(67, 17, 25000, 0, 'Unpaid', '2017-06-06', 'Alvin060617'),
(68, 23, 10000, 0, 'Unpaid', '2017-05-15', 'Analyn061517'),
(69, 6, 5000, 0, 'Unpaid', '2017-06-20', 'Paul062017'),
(70, 19, 4000, 0, 'Unpaid', '2017-06-23', 'Allan062317'),
(71, 14, 5000, 0, 'Unpaid', '2017-07-11', 'Liboy071117'),
(72, 32, 3000, 0, 'Unpaid', '2017-07-18', 'Valerie071817'),
(73, 21, 3000, 0, 'Unpaid', '2017-07-18', 'Razel071817'),
(74, 28, 1000, 0, 'Unpaid', '2017-07-21', 'Rolly072117'),
(75, 19, 5000, 0, 'Unpaid', '2017-07-22', 'Allan072217'),
(76, 34, 1000, 0, 'Unpaid', '2017-07-30', 'Erlinda073017'),
(77, 35, 1000, 0, 'Unpaid', '2017-07-30', 'Jenny073017'),
(78, 21, 2000, 0, 'Unpaid', '2017-08-11', 'Razel081117'),
(79, 19, 5000, 0, 'Unpaid', '2017-08-23', 'Allan082317'),
(80, 34, 1000, 0, 'Unpaid', '2017-08-25', 'Erlinda082517'),
(81, 36, 5000, 0, 'Unpaid', '2017-09-01', 'Noel090117'),
(82, 37, 2000, 0, 'Unpaid', '2017-09-07', 'Jun090717'),
(83, 32, 7000, 0, 'Unpaid', '2017-09-11', 'Valerie091117'),
(84, 38, 5000, 0, 'Unpaid', '2017-09-13', 'Cynthia091317'),
(85, 19, 5000, 0, 'Unpaid', '2017-09-23', 'Allan092317'),
(86, 39, 5000, 0, 'Unpaid', '2017-09-30', 'Tess093017'),
(87, 14, 10000, 0, 'Unpaid', '2017-10-04', 'Liboy100417'),
(88, 40, 5000, 0, 'Unpaid', '2017-10-07', 'Kristel100717'),
(89, 41, 5000, 0, 'Unpaid', '2017-10-07', 'Rogielyn100717'),
(90, 42, 15000, 0, 'Unpaid', '2017-10-16', 'Doncillo101617'),
(91, 19, 5000, 0, 'Unpaid', '2017-10-20', 'Allan102017'),
(92, 21, 5000, 0, 'Unpaid', '2017-10-20', 'Razel102017'),
(93, 22, 1000, 0, 'Unpaid', '2017-10-30', 'Pepito103017'),
(94, 14, 3000, 0, 'Unpaid', '2017-11-04', 'Liboy110417'),
(95, 43, 3000, 0, 'Unpaid', '2017-11-08', 'Adrian110817'),
(96, 21, 25000, 0, 'Unpaid', '2017-11-09', 'Razel110917'),
(97, 32, 1500, 0, 'Unpaid', '2017-11-13', 'Valerie111317'),
(98, 44, 5000, 0, 'Unpaid', '2017-11-17', 'Lany111717'),
(99, 45, 5000, 0, 'Unpaid', '2017-11-18', 'Wilson111817'),
(100, 14, 10000, 0, 'Unpaid', '2017-11-18', 'Liboy1118/17'),
(101, 46, 2000, 0, 'Unpaid', '2017-11-19', 'MaryJoy111917'),
(102, 47, 2000, 0, 'Unpaid', '2017-11-21', 'Amar112117'),
(103, 40, 5000, 0, 'Unpaid', '2017-11-22', 'Kristel112217'),
(104, 19, 5000, 0, 'Unpaid', '2017-11-23', 'Allan112317'),
(105, 14, 5000, 0, 'Unpaid', '2017-11-23', 'Liboy112317'),
(106, 48, 1000, 0, 'Unpaid', '2017-11-30', 'Erickson113017'),
(107, 47, 7000, 0, 'Unpaid', '2017-12-10', 'Amar121017'),
(108, 48, 1000, 0, 'Unpaid', '2017-12-12', 'Erickson1212/17'),
(109, 43, 2000, 0, 'Unpaid', '2017-12-13', 'Adrian121317'),
(110, 19, 5000, 0, 'Unpaid', '2017-12-15', 'Allan121517');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `loan_id` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `loan_id`, `amount`, `date`, `description`) VALUES
(6, 'Lyra073016', 500, '2016-08-30', 'Interest'),
(7, 'Lyra073016', 500, '2016-09-30', 'Interest'),
(8, 'Lyra073016', 500, '2016-10-30', 'Interest'),
(9, 'Lyra073016', 500, '2016-11-30', 'Interest'),
(10, 'Lyra073016', 500, '2016-12-30', 'Interest'),
(11, 'LyraV110116', 300, '2016-12-01', 'Interest'),
(12, 'LyraV110116', 300, '2017-01-01', 'Interest'),
(13, 'Em080816', 2000, '2016-09-08', 'Interest'),
(14, 'Em080816', 2000, '2016-10-08', 'Interest'),
(15, 'Em080816', 2000, '2016-11-08', 'Interest'),
(16, 'Em080816', 2000, '2016-12-08', 'Interest'),
(17, 'Em080816', 2000, '2017-01-08', 'Interest'),
(18, 'Paul081116', 500, '2016-09-01', 'Interest'),
(19, 'Paul081116', 3000, '2016-09-01', 'Payment'),
(20, 'Paul081116', 200, '2016-10-11', 'Interest'),
(21, 'Paul081116', 2000, '2016-10-11', 'Payment'),
(22, 'Paul101416', 300, '2016-11-14', 'Interest'),
(23, 'Paul101416', 300, '2016-12-14', 'Interest'),
(24, 'Paul101416', 300, '2017-01-14', 'Interest'),
(25, 'Paul102216', 300, '2016-11-22', 'Interest'),
(26, 'Paul102216', 300, '2016-12-22', 'Interest'),
(27, 'Erica081916', 400, '2016-09-19', 'Interest'),
(28, 'Erica081916', 4000, '2016-09-19', 'Payment'),
(29, 'Erica101216', 600, '2016-11-12', 'Interest'),
(30, 'Erica101216', 5000, '2016-11-12', 'Payment'),
(31, 'Erica101216', 100, '2016-12-09', 'Interest'),
(32, 'Erica101216', 1000, '2016-12-09', 'Payment'),
(33, 'AmyL083016', 500, '2016-09-30', 'Interest'),
(34, 'AmyL083016', 500, '2016-10-30', 'Interest'),
(35, 'AmyL083016', 500, '2016-11-30', 'Interest'),
(36, 'AmyL083016', 500, '2016-12-30', 'Interest'),
(37, 'jocelyn092716', 600, '2016-10-27', 'Interest'),
(38, 'jocelyn092716', 3000, '2016-10-27', 'Payment'),
(39, 'Gloria100316', 285, '2016-10-10', 'Interest'),
(40, 'Gloria100316', 9500, '2016-10-10', 'Payment'),
(41, 'Gloria0002', 950, '2016-11-09', 'Interest'),
(42, 'Gloria0002', 9500, '2016-11-09', 'Payment'),
(43, 'Gloria110916', 1100, '2016-12-09', 'Interest'),
(44, 'Sali101516', 500, '2016-12-12', 'Interest'),
(45, 'Sali101516', 2000, '2016-12-12', 'Payment'),
(46, 'Sali101516', 100, '2016-12-15', 'Interest'),
(47, 'Sali101516', 1100, '2016-12-15', 'Payment'),
(48, 'Rosita101916', 100, '2016-11-19', 'Interest'),
(49, 'Rosita101916', 100, '2016-12-19', 'Interest'),
(50, 'Rosita101916', 100, '2017-01-19', 'Interest'),
(51, 'Rosita102716', 100, '2016-11-27', 'Interest'),
(52, 'Rosita102716', 100, '2016-12-27', 'Interest'),
(53, 'Rosita102716', 100, '2017-01-27', 'Interest'),
(54, 'Hera102816', 450, '2016-12-18', 'Interest'),
(55, 'Hera102816', 3000, '2016-12-18', 'Payment'),
(56, 'Liboy101016', 500, '2016-11-10', 'Interest'),
(57, 'Liboy101016', 5000, '2016-11-10', 'Payment'),
(58, 'Liboy0002', 200, '2017-01-02', 'Interest'),
(59, 'Liboy0002', 2000, '2017-01-02', 'Payment'),
(60, 'Marissa111516', 300, '2016-12-15', 'Interest'),
(61, 'Marissa111516', 3000, '2016-12-15', 'Payment'),
(62, 'Marissa111316', 200, '2016-12-13', 'Interest'),
(63, 'Marissa111316', 2000, '2016-12-13', 'Payment'),
(64, 'lyraG111216', 1500, '2016-12-12', 'Interest'),
(65, 'Alvin111816', 500, '2016-12-18', 'Interest'),
(66, 'Edmund112016', 800, '2016-12-20', 'Interest'),
(67, 'allan112216', 250, '2016-12-14', 'Interest'),
(68, 'allan112216', 2500, '2016-12-14', 'Payment'),
(69, 'Arlene112916', 100, '2016-12-29', 'Interest'),
(70, 'Pepit121316', 75, '2016-12-17', 'Interest'),
(71, 'Pepit121316', 1500, '2016-12-17', 'Payment'),
(72, 'Analyn101416', 1000, '2016-11-03', 'Interest'),
(73, 'Analyn101416', 10000, '2016-11-03', 'Payment'),
(74, 'Analyn110216', 700, '2016-12-17', 'Interest'),
(75, 'Analyn1105016', 200, '2016-12-17', 'Interest'),
(76, 'Analyn111016', 600, '2016-12-17', 'Interest'),
(77, 'Analyn110216', 700, '2017-01-16', 'Interest'),
(78, 'Analyn1105016', 200, '2017-01-16', 'Interest'),
(79, 'Analyn111016', 600, '2017-01-16', 'Interest'),
(80, 'Analyn121316', 400, '2016-12-16', 'Interest'),
(81, 'Analyn121316', 4000, '2016-12-16', 'Payment'),
(82, 'Razel121316', 100, '2017-01-18', 'Interest'),
(83, 'Razel121316', 1000, '2017-01-18', 'Payment'),
(84, 'Analyn011617', 1200, '2017-01-18', 'Interest'),
(85, 'allan122316', 300, '2017-01-23', 'Interest'),
(86, 'allan122316', 3000, '2017-01-23', 'Payment'),
(87, 'Pansay010517', 150, '2017-01-24', 'Interest'),
(88, 'Pansay010517', 1500, '2017-01-24', 'Payment'),
(89, 'Alvin111816', 500, '2017-01-18', 'Interest'),
(90, 'lyraG111216', 1500, '2017-01-12', 'Interest'),
(91, 'Gloria110916', 1100, '2017-01-09', 'Interest'),
(92, 'Erica121116', 500, '2017-01-11', 'Interest'),
(93, 'Rosita101916', 100, '2017-02-04', 'Interest'),
(94, 'Rosita101916', 1000, '2017-02-04', 'Payment'),
(95, 'Rosita102716', 100, '2017-02-04', 'Interest'),
(96, 'Rosita102716', 1000, '2017-02-04', 'Payment'),
(97, 'Lyra073016', 500, '2017-02-06', 'Interest'),
(98, 'Gloria110916', 1100, '2017-02-11', 'Interest'),
(99, 'Leonard011917', 500, '2017-02-11', 'Interest'),
(100, 'Marissa121716', 300, '2017-02-11', 'Interest'),
(101, 'Marissa121716', 300, '2017-02-11', 'Interest'),
(102, 'Marissa121716', 3000, '2017-02-11', 'Payment'),
(103, 'Leonard011917', 500, '2017-02-11', 'Interest'),
(104, 'Gloria020217', 100, '2017-02-11', 'Interest'),
(105, 'Erica121116', 500, '2017-02-12', 'Interest'),
(106, 'Liboy010717', 500, '2017-02-15', 'Interest'),
(107, 'allan012317', 300, '2017-02-15', 'Interest'),
(108, 'allan012317', 3000, '2017-02-15', 'Payment'),
(109, 'Alvin111816', 500, '2017-02-15', 'Interest'),
(110, 'Alvin011617', 2000, '2017-02-15', 'Interest'),
(111, 'Analyn110216', 500, '2017-02-21', 'Interest'),
(112, 'Analyn1105016', 100, '2017-02-21', 'Interest'),
(113, 'Analyn111016', 400, '2017-02-21', 'Interest'),
(114, 'Analyn011617', 1200, '2017-02-21', 'Interest'),
(115, 'Analyn020217', 300, '2017-02-21', 'Interest'),
(116, 'Liboy010717', 5000, '2017-02-22', 'Payment'),
(117, 'Arlene112916', 200, '2017-03-01', 'Interest'),
(118, 'Arlene112916', 1000, '2017-03-01', 'Payment'),
(119, 'Rolly030317', 100, '2017-03-05', 'Interest'),
(120, 'Rolly030317', 3000, '2017-03-05', 'Payment'),
(121, 'Pansay020217', 100, '2017-03-06', 'Interest'),
(122, 'Gloria110916', 1100, '2017-03-11', 'Interest'),
(123, 'Gloria020217', 100, '2017-03-11', 'Interest'),
(124, 'Leonard011917', 500, '2017-03-11', 'Interest'),
(125, 'Marissa021317', 700, '2017-03-11', 'Interest'),
(126, 'Razel021217', 200, '2017-03-12', 'Interest'),
(127, 'Razel022817', 150, '2017-03-17', 'Interest'),
(128, 'Alvin011617', 2000, '2017-03-17', 'Interest'),
(129, 'Erica121116', 500, '2017-03-17', 'Interest'),
(130, 'Allan022317', 300, '2017-03-18', 'Interest'),
(131, 'Allan022317', 3000, '2017-03-18', 'Payment'),
(132, 'Alvin011617', 10000, '2017-03-22', 'Payment'),
(133, 'Analyn110216', 500, '2017-04-01', 'Interest'),
(134, 'Analyn1105016', 100, '2017-04-01', 'Interest'),
(135, 'Analyn111016', 400, '2017-04-01', 'Interest'),
(136, 'Analyn011617', 1200, '2017-04-01', 'Interest'),
(137, 'Analyn020217', 300, '2017-04-01', 'Interest'),
(138, 'LyraV110116', 300, '2017-04-01', 'Interest'),
(139, 'LyraV110116', 300, '2017-04-01', 'Interest'),
(140, 'LyraV110116', 300, '2017-04-01', 'Interest'),
(141, 'LyraV110116', 3000, '2017-04-01', 'Payment'),
(142, 'Rolly030517', 200, '2017-04-02', 'Interest'),
(143, 'Pepito022717', 100, '2017-04-03', 'Interest'),
(144, 'Paul101416', 300, '2017-04-03', 'Interest'),
(145, 'Paul101416', 300, '2017-04-03', 'Interest'),
(146, 'Paul101416', 3000, '2017-04-03', 'Payment'),
(147, 'Paul102216', 300, '2017-04-03', 'Interest'),
(148, 'Pansay020217', 100, '2017-04-04', 'Interest'),
(149, 'Liboy030317', 300, '2017-04-08', 'Interest'),
(150, 'Liboy030317', 3000, '2017-04-08', 'Payment'),
(151, 'Marissa021317', 700, '2017-04-09', 'Interest'),
(152, 'Dante_oldAllow031017', 2000, '2017-04-09', 'Payment'),
(153, 'Erica121116', 500, '2017-04-12', 'Interest'),
(154, 'Alvin111816', 500, '2017-04-16', 'Interest'),
(155, 'Alvin111816', 500, '2017-04-16', 'Interest'),
(156, 'Alvin011617', 1000, '2017-04-16', 'Interest'),
(157, 'Alvin011617', 3000, '2017-04-16', 'Payment'),
(158, 'Leonard011917', 500, '2017-04-18', 'Interest'),
(159, 'Gloria110916', 1100, '2017-04-18', 'Interest'),
(160, 'Allan031817', 300, '2017-04-19', 'Interest'),
(161, 'Allan031817', 3000, '2017-04-19', 'Payment'),
(162, 'Allan032317', 250, '2017-04-19', 'Interest'),
(163, 'Allan032317', 2500, '2017-04-19', 'Payment'),
(164, 'Gloria020217', 100, '2017-04-19', 'Interest'),
(165, 'Gloria020217', 0, '2017-04-19', 'payment'),
(166, 'Edmund112016', 800, '2017-04-19', 'Payment'),
(167, 'Edmund112016', 800, '2017-04-19', 'Interest'),
(168, 'Edmund112016', 800, '2017-04-19', 'Interest'),
(169, 'Edmund112016', 800, '2017-04-19', 'Interest'),
(170, 'Edmund112016', 8000, '2017-04-19', 'Payment'),
(171, 'Avigail032417', 200, '2017-04-19', 'Interest'),
(172, 'Avigail032417', 2000, '2017-04-19', 'Payment'),
(173, 'Avigail032817', 100, '2017-04-19', 'Interest'),
(174, 'Avigail032817', 1000, '2017-04-19', 'Payment'),
(175, 'Em080816', 2000, '2017-05-01', 'Interest'),
(176, 'Em080816', 2000, '2017-05-01', 'Interest'),
(177, 'Em080816', 2000, '2017-05-01', 'Interest'),
(178, 'Em080816', 20000, '2017-05-01', 'Payment'),
(179, 'Pepito022717', 100, '2017-05-02', 'Interest'),
(180, 'Rolly030517', 200, '2017-05-02', 'Interest'),
(181, 'Paul102216', 3000, '2017-05-02', 'Payment'),
(182, 'Pansay020217', 100, '2017-05-04', 'Interest'),
(183, 'Analyn110216', 500, '2017-05-04', 'Interest'),
(184, 'Analyn1105016', 100, '2017-05-04', 'Interest'),
(185, 'Analyn111016', 400, '2017-05-04', 'Interest'),
(186, 'Analyn011617', 1200, '2017-05-04', 'Interest'),
(187, 'Analyn020217', 300, '2017-05-04', 'Interest'),
(188, 'Rolly030517', 1000, '2017-05-02', 'Payment'),
(189, 'Gloria110916', 1100, '2017-05-12', 'Interest'),
(190, 'Leonard011917', 500, '2017-05-12', 'Interest'),
(191, 'Gloria020217', 100, '2017-05-12', 'Interest'),
(192, 'Erica121116', 500, '2017-05-16', 'Interest'),
(193, 'AlvinK041617', 900, '2017-05-17', 'Interest'),
(194, 'AlvinK041617', 9000, '2017-05-17', 'Payment'),
(195, 'Alvin111816', 500, '2017-05-17', 'Interest'),
(196, 'Alvin011617', 700, '2017-05-17', 'Interest'),
(197, 'Pepito022717', 100, '2017-06-05', 'Interest'),
(198, 'Alvin111816', 5000, '2017-06-06', 'Payment'),
(199, 'Alvin011617', 7000, '2017-06-06', 'Payment'),
(200, 'AmyL083016', 500, '2017-05-06', 'Interest'),
(201, 'AmyL083016', 500, '2017-05-06', 'Interest'),
(202, 'AmyL083016', 500, '2017-05-06', 'Interest'),
(203, 'AmyL083016', 500, '2017-05-06', 'Interest'),
(204, 'AmyL083016', 500, '2017-05-06', 'Interest'),
(205, 'AmyL083016', 5000, '2017-05-06', 'Payment'),
(206, 'Analyn110216', 500, '2017-06-08', 'Interest'),
(207, 'Analyn1105016', 100, '2017-06-08', 'Interest'),
(208, 'Analyn111016', 400, '2017-06-08', 'Interest'),
(209, 'Analyn011617', 1200, '2017-06-08', 'Interest'),
(210, 'Analyn020217', 300, '2017-06-08', 'Interest'),
(211, 'Analyn053017', 1800, '2017-06-08', 'Interest'),
(212, 'Analyn053017', 5000, '2017-06-08', 'Payment'),
(213, 'Rolly030517', 100, '2017-06-08', 'Interest'),
(214, 'Valerie050617', 300, '2017-06-08', 'Interest'),
(215, 'Valerie050617', 3000, '2017-06-08', 'Payment'),
(216, 'Razel021217', 200, '2017-06-09', 'Interest'),
(217, 'Razel022817', 150, '2017-06-09', 'Interest'),
(218, 'Razel031017', 650, '2017-06-09', 'Interest'),
(219, 'Razel021217', 200, '2017-06-09', 'Interest'),
(220, 'Razel022817', 150, '2017-06-09', 'Interest'),
(221, 'Razel031017', 650, '2017-06-09', 'Interest'),
(222, 'Razel021217', 200, '2017-06-09', 'Interest'),
(223, 'Razel022817', 150, '2017-06-09', 'Interest'),
(224, 'Razel031017', 650, '2017-06-09', 'Interest'),
(225, 'jocelyn121116', 200, '2017-06-09', 'Interest'),
(226, 'jocelyn121116', 200, '2017-06-09', 'Interest'),
(227, 'jocelyn121116', 200, '2017-06-09', 'Interest'),
(228, 'jocelyn121116', 200, '2017-06-09', 'Interest'),
(229, 'jocelyn121116', 200, '2017-06-09', 'Interest'),
(230, 'Marissa021317', 700, '2017-06-10', 'Interest'),
(231, 'Marissa021317', 700, '2017-06-10', 'Interest'),
(232, 'Allan042217', 500, '2017-05-22', 'Interest'),
(233, 'Analyn061517', 500, '2017-05-20', 'Interest'),
(234, 'Analyn061517', 5000, '2017-05-20', 'Payment'),
(235, 'Allan042217', 500, '2017-06-20', 'Interest'),
(236, 'Allan042217', 5000, '2017-06-20', 'Payment'),
(237, 'Pansay020217', 100, '2017-06-27', 'Interest'),
(238, 'Pansay020217', 100, '2017-06-27', 'Interest'),
(239, 'Pansay020217', 1000, '2017-06-27', 'Payment'),
(240, 'Paul062017', 5000, '2017-06-27', 'Payment'),
(241, 'Analyn110216', 500, '2017-07-02', 'Interest'),
(242, 'Analyn1105016', 100, '2017-07-02', 'Interest'),
(243, 'Analyn111016', 400, '2017-07-02', 'Interest'),
(244, 'Analyn011617', 1200, '2017-07-02', 'Interest'),
(245, 'Analyn020217', 300, '2017-07-02', 'Interest'),
(246, 'Analyn061517', 250, '2017-07-02', 'Interest'),
(247, 'Rolly030517', 100, '2017-07-03', 'Interest'),
(248, 'Rolly030517', 1000, '2017-07-03', 'Payment'),
(249, 'Pepito022717', 100, '2017-07-04', 'Interest'),
(250, 'Avi060517', 400, '2017-07-07', 'Interest'),
(251, 'Avi060517', 4000, '2017-07-07', 'Payment'),
(252, 'Razel021217', 200, '2017-07-11', 'Interest'),
(253, 'Razel022817', 150, '2017-07-11', 'Interest'),
(254, 'Razel031017', 650, '2017-07-11', 'Interest'),
(255, 'Allan062317', 400, '2007-07-07', 'Interest'),
(256, 'Allan062317', 4000, '2007-07-07', 'Payment'),
(257, 'Loan', 3500, '2017-07-22', 'Payment'),
(258, 'Liboy071117', 500, '2017-08-01', 'Interest'),
(259, 'Pepito022717', 100, '2017-08-03', 'Interest'),
(260, 'Lyra073016', 3000, '2017-08-07', 'Interest'),
(261, 'Lyra073016', 5000, '2017-08-07', 'Payment'),
(262, 'Valerie071817', 300, '2017-08-17', 'Interest'),
(263, 'Valerie071817', 3000, '2017-08-17', 'Payment'),
(264, 'Liboy071117', 500, '2017-08-20', 'Interest'),
(265, 'Allan072217', 500, '2017-08-21', 'Interest'),
(266, 'Allan072217', 5000, '2017-08-21', 'Payment'),
(267, 'Rolly072117', 100, '2017-08-21', 'Interest'),
(268, 'Erlinda073017', 100, '2017-08-23', 'Interest'),
(269, 'Erlinda073017', 1000, '2017-08-23', 'Payment'),
(270, 'PaulJamila_1_011617', 5000, '2017-08-23', 'Payment'),
(271, 'Pepito022717', 100, '2017-09-04', 'Interest'),
(272, 'Analyn110216', 500, '2017-09-07', 'Interest'),
(273, 'Analyn1105016', 100, '2017-09-07', 'Interest'),
(274, 'Analyn111016', 400, '2017-09-07', 'Interest'),
(275, 'Analyn011617', 1200, '2017-09-07', 'Interest'),
(276, 'Analyn020217', 300, '2017-09-07', 'Interest'),
(277, 'Analyn061517', 500, '2017-09-07', 'Interest'),
(278, 'Analyn110216', 500, '2017-09-07', 'Interest'),
(279, 'Analyn1105016', 100, '2017-09-07', 'Interest'),
(280, 'Analyn111016', 400, '2017-09-07', 'Interest'),
(281, 'Analyn011617', 1200, '2017-09-07', 'Interest'),
(282, 'Analyn020217', 300, '2017-09-07', 'Interest'),
(283, 'Analyn061517', 500, '2017-09-07', 'Interest'),
(284, 'Analyn110216', 5000, '2017-09-07', 'Payment'),
(285, 'Analyn1105016', 1000, '2017-09-07', 'Payment'),
(286, 'Analyn111016', 4000, '2017-09-07', 'Payment'),
(287, 'Analyn011617', 12000, '2017-09-07', 'Payment'),
(288, 'Analyn020217', 3000, '2017-09-07', 'Payment'),
(289, 'Analyn061517', 5000, '2017-09-07', 'Payment'),
(290, 'PaulJamila_1_011617', 1000, '2017-09-09', 'Interest'),
(291, 'PaulJamila_1_011617', 4000, '2017-09-09', 'Payment'),
(292, 'Marissa021317', 2100, '2017-09-13', 'Interest'),
(293, 'Gloria110916', 11000, '2017-09-17', 'Paympent'),
(294, 'Gloria020217', 1000, '2017-09-17', 'Paympent'),
(295, 'Leonard011917', 5000, '2017-09-17', 'Paympent'),
(296, 'Allan082317', 500, '2017-09-21', 'Interest'),
(297, 'Allan082317', 5000, '2017-09-21', 'Payment'),
(298, 'Jenny073017', 200, '2017-09-24', 'Interest'),
(299, 'Liboy071117', 500, '2017-09-25', 'Interest'),
(300, 'Razel021217', 400, '2017-09-25', 'Interest'),
(301, 'Razel022817', 300, '2017-09-25', 'Interest'),
(302, 'Razel031017', 1300, '2017-09-25', 'Interest'),
(303, 'Razel071817', 600, '2017-09-25', 'Interest'),
(304, 'Razel081117', 200, '2017-09-25', 'Interest'),
(305, 'Erica121116', 2000, '2017-09-30', 'Interest'),
(306, 'Erica121116', 5000, '2017-09-30', 'Payment'),
(307, 'Pepito022717', 100, '2017-10-04', 'Interest'),
(308, 'Erlinda082517', 100, '2017-10-10', 'Interest'),
(309, 'Valerie091117', 700, '2017-10-18', 'Interest'),
(310, 'Valerie091117', 7000, '2017-10-18', 'Payment'),
(311, 'Liboy071117', 500, '2017-10-19', 'Interest'),
(312, 'Liboy100417', 1000, '2017-10-19', 'Interest'),
(313, 'Allan092317', 500, '2017-10-20', 'Interest'),
(314, 'Allan092317', 5000, '2017-10-20', 'Payment'),
(315, 'Noel090117', 1000, '2017-09-18', 'Payment'),
(316, 'Noel090117', 2000, '2017-09-30', 'Payment'),
(317, 'Noel090117', 520, '2017-10-26', 'Interest'),
(318, 'Noel090117', 2000, '2017-10-26', 'Payment'),
(319, 'lyraG111216', 13500, '2017-10-27', 'Interest'),
(320, 'lyraG111216', 15000, '2017-10-27', 'Payment'),
(321, 'Tess093017', 500, '2017-10-29', 'Interest'),
(322, 'Kristel100717', 1500, '2017-10-31', 'Payment'),
(323, 'Rogielyn100717', 1500, '2017-10-31', 'Payment'),
(324, 'Pepito022717', 100, '2017-11-02', 'Interest'),
(325, 'Razel021217', 200, '2017-11-08', 'Interest'),
(326, 'Razel022817', 150, '2017-11-08', 'Interest'),
(327, 'Razel031017', 650, '2017-11-08', 'Interest'),
(328, 'Razel071817', 300, '2017-11-08', 'Interest'),
(329, 'Razel081117', 200, '2017-11-08', 'Interest'),
(330, 'Razel102017', 500, '2017-11-08', 'Interest'),
(331, 'Razel021217', 2000, '2017-11-08', 'Payment'),
(332, 'Razel022817', 1500, '2017-11-08', 'Payment'),
(333, 'Razel031017', 6500, '2017-11-08', 'Payment'),
(334, 'Razel071817', 3000, '2017-11-08', 'Payment'),
(335, 'Razel081117', 2000, '2017-11-08', 'Payment'),
(336, 'Razel102017', 5000, '2017-11-08', 'Payment'),
(337, 'Liboy110417', 3000, '2017-11-15', 'Payment'),
(338, 'Liboy100417', 1000, '2017-11-15', 'Interest'),
(339, 'Liboy071117', 500, '2017-11-15', 'Interest'),
(340, 'Rogielyn100717', 1500, '2017-11-16', 'Payment'),
(341, 'Kristel100717', 1500, '2017-11-17', 'Payment'),
(342, 'Allan102017', 500, '2017-11-20', 'Interest'),
(343, 'Allan102017', 5000, '2017-11-20', 'Payment'),
(344, 'Cynthia091317', 1000, '2017-11-23', 'Interest'),
(345, 'Amar112117', 200, '2017-11-25', 'Interest'),
(346, 'Amar112117', 2000, '2017-11-25', 'Payment'),
(347, 'MaryJoy111917', 100, '2017-11-30', 'Interest'),
(348, 'MaryJoy111917', 2000, '2017-11-30', 'Payment'),
(349, 'Kristel100717', 1500, '2017-12-01', 'Payment'),
(350, 'Tess093017', 500, '2017-12-02', 'Interest'),
(351, 'Wilson111817', 1500, '2017-12-02', 'Payment'),
(352, 'Marissa021317', 1400, '2017-12-03', 'Interest'),
(353, 'Pepito022717', 100, '2017-12-04', 'Interest'),
(354, 'Erickson113017', 50, '2017-12-04', 'Interest'),
(355, 'Erickson113017', 1000, '2017-12-04', 'Payment'),
(356, 'Rogielyn100717', 1500, '2017-12-04', 'Payment'),
(357, 'Valerie111317', 150, '2017-12-08', 'Interest'),
(358, 'Valerie111317', 1500, '2017-12-08', 'Payment'),
(359, 'Jenny073017', 100, '2017-12-08', 'Interest'),
(360, 'Rolly072117', 100, '2017-12-09', 'Interest'),
(361, 'Rolly072117', 1000, '2017-12-09', 'Payment'),
(362, 'Kristel100717', 1000, '2017-12-09', 'Interest'),
(363, 'Kristel100717', 500, '2017-12-09', 'Payment'),
(364, 'Adrian110817', 300, '2017-12-10', 'Interest'),
(365, 'Adrian110817', 3000, '2017-12-10', 'Payment'),
(366, 'Rolly072117', 200, '2017-12-14', 'Interest'),
(367, 'Rogielyn100717', 500, '2017-12-14', 'Payment'),
(368, 'Rogielyn100717', 1000, '2017-12-14', 'Interest'),
(369, 'Wilson111817', 1500, '2017-12-14', 'Payment'),
(370, 'Allan112317', 500, '2017-12-15', 'Interest'),
(371, 'Allan112317', 5000, '2017-12-15', 'Payment'),
(372, 'Lany111717', 1500, '2017-12-15', 'Payment'),
(373, 'Liboy112317', 500, '2017-12-15', 'Interest'),
(374, 'Marissa021317', 700, '2017-12-16', 'Interest'),
(375, 'jocelyn121116', 2000, '2017-12-18', 'Payment');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `charge` float NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `group_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
