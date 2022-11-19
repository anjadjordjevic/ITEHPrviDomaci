-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 05:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watches`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `watch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `content`, `watch_id`) VALUES
(1, 'Iva', 'Odlican odnos cene i kvaliteta', 2),
(2, 'Marko', 'Sve pohvale', 3),
(3, 'Jana', 'Sjajan sat, prezadovoljna sam!', 1),
(4, 'Ivan', 'Dobar sat', 3);

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `username`, `title`, `gender`, `price`, `img`) VALUES
(2, 'Anja', 'Festina s26', 'muski', 170, 'http://cdn.shopify.com/s/files/1/0288/2253/6252/products/f20511_4.png?v=1645026261'),
(3, 'Marko', 'Festina f16760-4', 'muski', 220, 'https://tupigi.it/pimages/OROLOGIO-FESTINA-TIMELESS-CHRONOGRAPH-F6854-6-AZZURO-CINTURINO-A-extra-big-7371-970.png'),
(4, 'Marko', 'TAG Heuer Formula 1', 'muski', 3000, 'https://www.thejewelleryeditor.com/media/images_thumbnails/filer_public_thumbnails/old/53002/TAG%20Heuer%20watch.png__1536x0_q75_crop-scale_subsampling-2_upscale-false.png'),
(10, 'Anja', 'Michael Kors Parker Rose-Gold', 'zenski', 300, 'https://cdn.shopify.com/s/files/1/0506/8037/products/MK6832_main_5f488f03-f1eb-4108-825e-526d3c48a5b5.png?v=1607477565'),
(11, 'Marko', 'Rolex Day-Date', 'muski', 15000, 'https://www.theluxuryhut.com/wp-content/uploads/2021/05/sell-rolex-online.png'),
(12, 'Marko', 'Paul Hewitt Analogue Classic Quartz', 'zenski', 280, 'https://www.paul-hewitt.rs/wp-content/uploads/2016/08/1-8-400x400.png'),
(19, 'Anja', 'Rolex Yacht Master 2', 'muski', 21000, 'https://www.pngmart.com/files/6/Watch-PNG-Transparent-HD-Photo.png'),
(21, 'Anja', 'Festina W F20403/1', 'zenski', 630, 'https://static6.festinagroup.com/product/festina/watches/detail/big/f20403_1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
