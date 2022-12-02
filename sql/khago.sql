-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2022 at 03:30 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khago`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `id`) VALUES
('trieuvn123', 'trieu123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `product_id`, `user_id`, `start_date`) VALUES
(17, '{\"id\":[\"3\",\"2\"],\"dem\":[\"4\",\"2\"],\"hinh\":[\"khoga2.jpg\",\"khoga1.jpg\"],\"gia\":[\"69000\",\"59000\"]}', 2, '12/01/2022'),
(18, '{\"id\":[\"4\",\"3\"],\"dem\":[\"3\",\"1\"],\"hinh\":[\"khoga3.png\",\"khoga2.jpg\"],\"gia\":[\"79000\",\"69000\"]}', 2, '12/01/2022'),
(19, '{\"id\":[\"8\",\"11\"],\"dem\":[\"3\",\"4\"],\"hinh\":[\"khobo3.jpg\",\"khomuc3.jpg\"],\"gia\":[\"1399000\",\"2099000\"]}', 2, '12/01/2022'),
(20, '{\"id\":[\"1\",\"2\"],\"dem\":[\"3\",\"1\"],\"hinh\":[\"khoga0.jpg\",\"khoga1.jpg\"],\"gia\":[\"50000\",\"59000\"]}', 2, '12/01/2022');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `count` int(11) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `count`, `detail`, `type`) VALUES
(1, 'Khô gà loại 0', 50000, 'khoga0.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt gà 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'arrival'),
(2, 'Khô gà loại 1', 59000, 'khoga1.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt gà 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'arrival'),
(3, 'Khô gà loại 2', 69000, 'khoga2.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt gà 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'arrival'),
(4, 'Khô gà loại 3', 79000, 'khoga3.png', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt gà 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'arrival'),
(5, 'Khô bò loại 0', 1099000, 'khobo0.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt bò 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'special'),
(6, 'Khô bò loại 1', 1199000, 'khobo1.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt bò 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'special'),
(7, 'Khô bò loại 2', 1199000, 'khobo2.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt bò 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'special'),
(8, 'Khô bò loại 3', 1399000, 'khobo3.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt bò 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'best'),
(9, 'Khô mực loại 1', 1699000, 'khomuc1.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt mực 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'best'),
(10, 'Khô mực loại 2', 1899000, 'khomuc2.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt mực 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'best'),
(11, 'Khô mực loại 3', 2099000, 'khomuc3.jpg', 100, 'Nhãn hiệu Kha Gồ là dự án tập hợp các đặt sản vùng miền, hướng dẫn các hộ kinh doanh chuẩn hoá sản xuất để đạt được các chứng nhận ATVSTP nhằm nâng cao chất lượng cũng như mở rộng thị trường, cải thiện sinh kế cho nguời dân các làng nghề.\r\nMang hàng Việt ra thế giới: xây dựng đội ngũ có năng lực về ngoại thương để đưa các sản phẩm của Việt Nam đi ra thị trường quốc tế\r\nBarcode: 8938530880101\r\nThành phần: Thịt mực 95%,đường, lá chanh 1%, ớt 1%, gia vị khác 3%\r\nHDSD: Dùng ngay khi mở bao bì     \r\nBảo quản: Bảo quản nơi khô thoáng, tránh ánh nắng trực tiếp\r\nThông tin cảnh báo: Không dùng nếu dị ứng với các thành phần của sản phẩm.\r\nKhối lượng tịnh: 50g', 'best');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserName` varchar(200) NOT NULL,
  `PassWord` varchar(200) NOT NULL,
  `AdminName` varchar(200) NOT NULL,
  `ID` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `PassWord`, `AdminName`, `ID`) VALUES
('admin', 'admin', 'admin1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
