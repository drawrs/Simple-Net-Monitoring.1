-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 03:00 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `net-monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE IF NOT EXISTS `blok` (
  `id_blok` int(50) NOT NULL AUTO_INCREMENT,
  `name_blok` varchar(255) NOT NULL,
  `telp_blok` varchar(100) NOT NULL,
  `add_blok` longtext NOT NULL,
  `sum_client` int(100) NOT NULL,
  `pusat_client` varchar(100) NOT NULL,
  PRIMARY KEY (`id_blok`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `name_blok`, `telp_blok`, `add_blok`, `sum_client`, `pusat_client`) VALUES
(1, 'Random Stasiun I', '(023) 131-2032', 'Jl. Siliwangi', 0, '0'),
(2, 'Random Stasiun III', '(021) 102-3512', 'Jati barang coy', 0, '0'),
(3, 'Random Stasiun II', '(023) 122-3511', 'Jl. mekar sucisaa', 0, '0'),
(4, 'Kantor I', '(021) 539-2322', 'Jl. jalan', 0, '0'),
(6, 'Kantor III', '(021) 619-2312', 'Entahlah', 0, '0'),
(11, 'Kantor DAOP Tiga', '(100) 009-9992', 'Kejaksanan', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(50) NOT NULL AUTO_INCREMENT,
  `id_blok` int(50) NOT NULL,
  `ip_client` varchar(50) NOT NULL,
  `name_client` varchar(255) NOT NULL,
  `status_client` enum('Connected','Disconnected','Destination net unreachable','Destination host unreachable','Request timed out') NOT NULL,
  PRIMARY KEY (`id_client`,`ip_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_blok`, `ip_client`, `name_client`, `status_client`) VALUES
(3, 1, '192.168.43.1', 'My Wifi Hotspot', 'Connected'),
(5, 3, '145.52.12.1', 'Random Host', 'Disconnected'),
(9, 1, '127.0.0.1', 'Localhost', 'Connected'),
(13, 6, '10.0.3.2', 'IT3CN DAOP II', 'Connected'),
(14, 11, '10.0.3.3', 'IT3CN DAOP III', 'Connected'),
(15, 11, '10.0.3.4', 'IT3CN DAOP IV', 'Connected'),
(16, 11, '10.0.3.10', 'IT3CN DAOP X', 'Connected'),
(17, 11, '10.0.3.5', 'IT3CN DAOP VE', 'Connected'),
(18, 11, '10.0.3.9', 'IT3CN DAOP VII', 'Connected'),
(19, 11, '10.0.3.6', 'IT3CN DAOP VIII', 'Connected'),
(20, 11, '10.0.3.7', 'IT3CN DAOP VXI', 'Connected'),
(21, 11, '10.0.3.8', 'IT3CN DAOP XIIX', 'Connected'),
(23, 11, '10.0.3.15', 'IT3CN DAOP EAa', 'Connected'),
(26, 3, '12.123.0.1', 'Suka suka', 'Disconnected');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_client` varchar(100) NOT NULL,
  `date_log` varchar(25) NOT NULL,
  `hour_log` varchar(25) NOT NULL,
  `status_log` int(5) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_client`, `date_log`, `hour_log`, `status_log`) VALUES
(96, '5', '05 Feb 2016', '20', 0),
(97, '26', '05 Feb 2016', '20', 0),
(98, '16', '05 Feb 2016', '19', 0),
(110, '23', '05 Feb 2016', '20', 0),
(111, '21', '05 Feb 2016', '20', 0),
(112, '14', '05 Feb 2016', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `email_user` varchar(255) NOT NULL,
  `pwd_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`,`email_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pwd_user`, `name_user`) VALUES
(1, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
