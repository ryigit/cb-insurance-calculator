-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: products
-- Generation Time: 2023-08-08 00:27:19.1450
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `canBeInsured` tinyint(1) NOT NULL,
  `extraFee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=842 DEFAULT CHARSET=latin1;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `salesPrice` float NOT NULL,
  `productTypeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=861867 DEFAULT CHARSET=latin1;

INSERT INTO `product_types` (`id`, `name`, `canBeInsured`, `extraFee`) VALUES
(12, 'MP3 players', 0, 0),
(21, 'Laptops', 1, 500),
(32, 'Smartphones', 1, 500),
(33, 'Digital cameras', 1, 0),
(35, 'SLR cameras', 0, 0),
(124, 'Washing machines', 1, 0),
(841, 'Laptops', 0, 0);

INSERT INTO `products` (`id`, `name`, `salesPrice`, `productTypeId`) VALUES
(572770, 'Samsung WW80J6400CW EcoBubble', 475, 124),
(715990, 'Canon Powershot SX620 HS Black', 195, 33),
(725435, 'Cowon Plenue D Gold', 299.99, 12),
(735246, 'AEG L8FB86ES', 699, 124),
(735296, 'Canon EOS 5D Mark IV Body', 2699, 35),
(767490, 'Canon EOS 77D + 18-55mm IS STM', 749, 35),
(780829, 'Panasonic Lumix DC-TZ90 Silver', 319, 33),
(805073, 'Haier HW80-B14636', 449, 124),
(819148, 'Nikon D3500 + AF-P DX 18-55mm f/3.5-5.6G VR', 469, 35),
(827074, 'Samsung Galaxy S10 Plus 128 GB Black', 699, 32),
(828519, 'Huawei P30 Lite 128 GB Black', 219, 32),
(832845, 'Apple iPod Touch (2019) 32 GB Space Gray', 229, 12),
(836194, 'Sony CyberShot DSC-RX100 VII', 1129, 33),
(836676, 'Sandisk Clip Sport Plus Blue', 74.99, 12),
(837856, 'Lenovo Chromebook C330-11 81HY000MMH', 299, 21),
(838978, 'Asus ZenBook UX334FAC-A3066T', 1149, 841),
(858421, 'Lenovo IdeaPad L340-15IRH Gaming 81LK01FUMH', 779, 21),
(859366, 'OnePlus 8 Pro 128GB Black 5G', 886, 32),
(861866, 'Apple MacBook Pro 13\\\" (2020) MXK52N/A Space Gray', 1749, 21);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;