-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2016 at 04:10 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kitambul_isho`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE IF NOT EXISTS `doc_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`id`, `category`) VALUES
(1, 'NATIONAL ID CARD'),
(2, 'PASSPORT'),
(3, 'DRIVER''S LICENCE'),
(4, 'NHIF CARD'),
(5, 'NSSF CARD'),
(6, 'KCPE CERTIFICATE'),
(9, 'KCSE CERTIFICATE');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `message` varchar(800) DEFAULT NULL,
  `d_time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mydocs`
--

CREATE TABLE IF NOT EXISTS `mydocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(45) DEFAULT NULL,
  `item_no` varchar(45) DEFAULT NULL,
  `item_name` varchar(145) DEFAULT NULL,
  `owner` varchar(145) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `d_time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mydocs`
--

INSERT INTO `mydocs` (`id`, `item_type`, `item_no`, `item_name`, `owner`, `description`, `d_time`) VALUES
(1, 'NATIONAL ID CARD', '23662213', 'JIM KABOBOGO', 'JIM', 'Id card.', NULL),
(4, 'NHIF CARD', '5488772', 'JIM KABOBOGO', 'JIM', 'Medical Card.', '2016-01-06 08:01:39.00000'),
(6, 'NSSF CARD', '77745', 'JIM KABOBOGO', 'JIM', 'Uzeeni card.', '2016-01-06 08:01:52.00000'),
(8, 'DRIVER''S LICENCE', '9998999', 'JIM KABOBOGO', 'JIM', 'Moti.', NULL),
(9, 'NATIONAL ID CARD', '29548537', 'NELSON AMEYO', 'CRUSHCAFETERIA', 'Na', '2016-01-07 08:01:11.00000'),
(10, 'NATIONAL ID CARD', '3425168', 'EUGEAN', 'EUGEAN', 'Found', '2016-01-08 20:01:12.00000'),
(11, 'NSSF CARD', '3455677', 'EUGEAN', 'EUGEAN', 'Misplaced', '2016-01-08 20:01:19.00000'),
(12, 'NATIONAL ID CARD', '29621588', 'PETER SITUMA MUNYASI', 'MUNYASI', 'ID', '2016-01-13 14:01:03.00000'),
(13, 'NATIONAL ID CARD', '31940285', 'ERICK KHAEMBA', 'ERICK KHAEMBA', 'serial number - 234198315', '2016-01-14 12:01:00.00000'),
(14, 'NSSF CARD', '2010031229', 'ERICK KHAEMBA', 'ERICK KHAEMBA', 'employers no - 0207267X', '2016-01-14 12:01:17.00000'),
(15, 'KCPE CERTIFICATE', '0548242', 'KHAEMBA ERICK', 'ERICK KHAEMBA', 'date printed : 090824', '2016-01-14 12:01:05.00000'),
(16, 'KCPE CERTIFICATE', NULL, '', 'HILLARY ', 'index 345000122 \r\nRONOH K HILLARY\r\n', '2016-01-14 12:01:37.00000'),
(17, 'NHIF CARD', 'R5992482', 'ERICK', 'ERICK KHAEMBA', 'member no ; R5992482', '2016-01-14 12:01:15.00000');

-- --------------------------------------------------------

--
-- Table structure for table `reporter`
--

CREATE TABLE IF NOT EXISTS `reporter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(145) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(45) DEFAULT NULL,
  `item_no` varchar(45) DEFAULT NULL,
  `item_name` varchar(145) DEFAULT NULL,
  `reporter` varchar(145) DEFAULT NULL,
  `drop_point` varchar(145) DEFAULT NULL,
  `claim` varchar(1) DEFAULT '0',
  `tel` varchar(45) DEFAULT NULL,
  `email` varchar(145) DEFAULT NULL,
  `d_time` varchar(25) DEFAULT NULL,
  `c_time` varchar(25) DEFAULT NULL,
  `claimer` varchar(145) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `item_type`, `item_no`, `item_name`, `reporter`, `drop_point`, `claim`, `tel`, `email`, `d_time`, `c_time`, `claimer`) VALUES
(7, 'NATIONAL ID CARD', '22344', 'JIMAN MABRU', 'MOHAMMED', 'EASTLIE POLICE', '1', '0277589', 'agnes.moragwa@gmail.com', NULL, '2016-01-06 13:01:04.00000', 'Anonymous'),
(8, 'NATIONAL ID CARD', '25669857', 'KILILI KILILO', 'KIMANI WA IRIRA', 'MAKUENI', '1', '045897', 'lenny@kililo.com', NULL, '2016-01-06 13:01:19.00000', 'Anonymous'),
(9, 'NSSF CARD', '23665641', 'KAUJI NMWANGA', 'BILLY MUHATI', 'KISAUNI', '1', '0144589777', 'wkimani@waspafrica.com', NULL, '2016-01-06 12:01:32.00000', NULL),
(10, 'NATIONAL ID CARD', '2366577', 'BEATRICE KAVULI', 'SESSION UNSET', 'KENYATTA HOSPITAL', '1', 'Session Unset', 'Session Unset', NULL, '2016-01-06 13:01:38.00000', 'Anonymous'),
(11, 'NATIONAL ID CARD', '3665444', 'KIMANI', 'ki', 'NAIROBI SCHOOL', '1', '02800555355', 'sanaa@samsung.com', NULL, '2016-01-06 13:01:04.00000', 'Anonymous'),
(13, 'DRIVER''S LICENCE', '9668855', 'KINUTHIA KAMAU', 'GEORGE THUO', 'GITHURAI', '0', '+254715445588', 'thuo@gmail.com', '2016-01-06 11:01:51.00000', NULL, NULL),
(14, 'NATIONAL ID CARD', '29548537', 'NELSON AMEYO', 'NELSON AMEYO', 'GPO', '0', '+254706266712', 'nelson@blackpay.co.ke', '2016-01-07 08:01:09.00000', NULL, NULL),
(16, 'DRIVER''S LICENCE', '28261557', 'EDWIN TIM WATIMA', 'TIM', 'KISUMU ', '0', '+254722885947', 'watima53@gmail. com', '2016-01-08 12:01:55.00000', NULL, NULL),
(17, 'NATIONAL ID CARD', '20957751', 'DORCAS MONGINA RATEMO', 'DORCAS', 'KASARANI ', '0', '+254726292808', 'dorrcc@gmail.com', '2016-01-12 17:01:59.00000', NULL, NULL),
(20, 'NATIONAL ID CARD', '30325063', 'ANDREW MUKOFU MMUCHI', 'KIRUI', 'GOLDEN MINE PARK GATE(WITH GUARDS)-BABADOGO', '0', '+254734636396', 'sakongkirui@gmail.com', '2016-01-14 17:01:36.00000', NULL, NULL),
(22, 'KCSE CERTIFICATE', '31117315', 'ABDIRASHID M. AHMED', 'ABDIRASHID', 'EASTLEIGH', '0', '+254722608517', 'dr.kampala114@hotmail.com', '2016-01-15 01:01:18.00000', NULL, NULL),
(24, 'NATIONAL ID CARD', '31053313', 'SULEIMAN MAHAT BILLE', 'SULEIMAN MAHAT BILLE', 'GARISSA ', '0', '+254702741012', 'nuuruz22@gmail.com', '2016-01-15 07:01:48.00000', NULL, NULL),
(26, 'NATIONAL ID CARD', '10576096', 'ABUBAKAR MAALIM ALI', 'ALLAN ONYANGO ANGUDI', 'MEDIA DATA LINKS,TSS TOWERS 2ND FLOOR', '0', '+254423884855', 'scoaste12@yahoo.com', '2016-01-15 15:01:39.00000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(14) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `d_time` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `username`, `name`, `email`, `tel`, `pass`, `d_time`) VALUES
(8, 'JIM', 'SAMSUNG', 'sanaa@samsung.com', '02800555355', '332532dcfaa1cbf61e2a266bd723612c', NULL),
(10, 'CRUSHCAFETERIA', 'NELSON AMEYO', 'nelson@blackpay.co.ke', '+254706266712', 'ff9830c42660c1dd1942844f8069b74a', '2016-01-07 08:01:34.00000'),
(11, 'CNDONGA', 'CHARLES NDONGA', 'charles.ndonga7@gmail.com', '+254717423660', 'bf309a8879cd5fd30bd16d7a056df511', '2016-01-07 20:01:10.00000'),
(12, 'JAYJAY', 'JAYA', 'ignatiusojiambo@yahoo.com', '+254706151591', 'c241a97fa1a58fe5e6b8d66060f746ac', '2016-01-08 10:01:23.00000'),
(13, 'TIMS', 'EDWIN WATIMA ', 'watima53@gmail.com', '+254722885947', '5acb2d18d9f3a993f311a8dc7da3ee48', '2016-01-08 12:01:24.00000'),
(14, 'EUGEAN', 'EUGEAN', 'eugeanamudavi2@gmail.com', '+254752690628', 'fa447cc272d332cbe76da425d1f57699', '2016-01-08 17:01:09.00000'),
(15, 'KSAM', 'SAM', 'samu625@gmail.com', '+254726865331', 'e505758c62b7202b76a7f5acde776905', '2016-01-08 20:01:06.00000'),
(16, 'CLWANGA', 'CHARLES MISICKO LWANGA', 'clwanga@geosolutionskenya.com', '+254788191009', 'f4f767ac06ec423a77b9e08158167b2d', '2016-01-10 12:01:11.00000'),
(17, 'OKODEE', 'ERICK', 'eriwalker03@yahoo.com', '+254724279705', '671c0a3074dac47955ea0219859131d0', '2016-01-10 22:01:25.00000'),
(18, 'DEVNULL', 'DEVNULL', 'dn@riseup.net', '+254752334109', 'f643f08f95b1bdb521d3dd4b54b6720e', '2016-01-11 08:01:39.00000'),
(19, 'OUMABAROS', 'BARASA OUMA', 'oumabaros@gmail.com', '+254724399191', '599fa0c243953e76f87372e61cacaec2', '2016-01-11 11:01:19.00000'),
(20, 'DORRCC@GMAIL.COM', 'DORCAS', 'dorrcc@gmail.com', '+254726292808', '938f95e9fd8d24eb09e945fe755a736a', '2016-01-12 17:01:41.00000'),
(21, 'MUNYASI', 'PETER MUNYASI', 'psmunyasi@gmail.com', '+25407153025', 'abe10f7e5afbbb3a79ce619739541149', '2016-01-13 14:01:40.00000'),
(22, 'NYANGAU JOSEPHAT TOM', 'NYAMGAU JOSEPHAT TOM', 'josphatmrefu@gmail.com', '+254711189229', '618a422b583e4c419db0bac7495ede91', '2016-01-14 10:01:23.00000'),
(23, 'ERICK KHAEMBA', 'ERICK KHAEMBA', 'khaembaerick@gmail.com', '+254704025528', '7d8e5bf92bb7422175e97c445131cf31', '2016-01-14 11:01:50.00000'),
(24, 'HILLARY', 'RONOH K HILLARY', 'ronohhillary94@yahoo.com', '+254717713648', 'b4ce5bda1957f3ded81a2916671ddf0d', '2016-01-14 12:01:01.00000'),
(25, 'MOSES ODHIAMBO ALUKO', 'MOSES ODHIAMBO ALUKO', 'alukomoses@99.com', '+254707227400', 'd41d8cd98f00b204e9800998ecf8427e', '2016-01-14 14:01:31.00000'),
(26, 'VINCENT  MOMANYI', 'VINCENT MOMANYI', 'Viniemomanyanyi@gmail.com', '+254724015373', 'baee68a2a97f625dabcc42e9f7a75a0c', '2016-01-14 15:01:40.00000'),
(27, 'VINCENT MOMANYI', 'ANTONY O MOMANYI', 'Viniemomanyanyi@gmail.com', '+254724015373', 'baee68a2a97f625dabcc42e9f7a75a0c', '2016-01-14 15:01:58.00000'),
(28, 'DENNOH', 'KIPNGENO DENNIS', 'kdeniecet@gmail.com', '+254723084926', '0b8e35d8162a89f5aca0614e784683bb', '2016-01-14 15:01:08.00000'),
(29, 'ROBBY', 'ROBINSON', 'kbtrobinson@gmail.com', '+254712255214', 'c54cd2826b69ac5667299f861ad15abb', '2016-01-14 15:01:00.00000'),
(30, 'NUURUZ', 'SULEIMAN MAHAT BILLE', 'nuuruz22@gmail.com', '+254702741012', '8b84a1810b59dcadeb1df77c05bf651b', '2016-01-15 07:01:47.00000'),
(31, 'MAJU KIBWAGIZO', 'JUMA ABDALLA ALI', 'kibwagizo56@gmail.com', '+254716454696', '2ca5a91651f99b3c769a538a225c459b', '2016-01-15 10:01:18.00000'),
(32, 'EDWIN MUNENE', 'EDWIN MUNENE', 'emunene78@gmail.com', '+254700217890', '82ee33cd8c0726b71a5fbb3613bf6d2a', '2016-01-15 12:01:56.00000'),
(33, 'CAREN ATIENO', 'CAREN', 'wanzala.caren@yahoo.com', '+254729641722', '8c249675aea6c3cbd91661bbae767ff1', '2016-01-15 15:01:24.00000'),
(34, 'COASTE', 'ALLAN ONYANGO ANGUDI', 'scoaste12@yahoo.com', '+25423884855', '376d55a7ca6df2ee2b02f3fd454298b7', '2016-01-15 15:01:39.00000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
