-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 12:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040135`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies_content`
--

CREATE TABLE `movies_content` (
  `content_id` int NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_movies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies_content`
--

INSERT INTO `movies_content` (`content_id`, `content_title`, `content_movies`, `url_content`, `content_photo`) VALUES
(2, 'KKN di Desa Penari (2022)', 'Film horor yang diangkat dari kisah nyata tentang sekelompok mahasiswa KKN yang mengalami kejadian mistis di sebuah desa terpencil.', 'https://www.imdb.com/title/tt11013610/', 'KKN.jpg'),
(3, 'Pengabdi Setan 2: Communion (2022)', 'Sekuel dari film Pengabdi Setan (2017) yang menceritakan teror Ibu dan anak-anaknya yang kembali menghantui keluarga Rini.', 'https://m.21cineplex.com/gui.movie_details.php?sid=&movie_id=12PS2C', 'PENGABDI SETAN.jpg'),
(4, 'Miracle in Cell No. 7 (2022)', 'Film drama yang mengharukan tentang seorang ayah yang dipenjara karena tuduhan pembunuhan dan berusaha untuk menjaga hubungan dengan putrinya.', 'https://www.imdb.com/title/tt11799822/', 'MIRACLE IN CELL NO.7.jpg'),
(5, 'Ngeri-ngeri Sedap (2022)', 'Film komedi keluarga yang menceritakan tentang empat orang anak yang pulang kampung untuk menyelesaikan masalah keluarga.', 'https://m.21cineplex.com/gui.movie_details.php?sid=DBL&movie_id=12NNSP', 'NGERI.jpg'),
(6, 'Ivanna (2022)', 'Film horor yang diangkat dari novel Risa Saraswati dengan judul yang sama, menceritakan teror hantu Ivanna di sebuah panti asuhan.', 'https://www.imdb.com/title/tt11448138/', 'IVANNA.jpg'),
(7, 'Habibie & Ainun (2012)', 'Film biografi yang menceritakan kisah cinta B.J. Habibie dan Ainun Habibie, dari masa muda hingga menjadi pasangan suami istri.', 'https://www.imdb.com/title/tt2589132/', 'HABIBI.jpg'),
(8, 'Ada Apa dengan Cinta (2002)', 'Film drama romantis yang ikonik tentang kisah cinta remaja di era 90-an.', 'https://www.imdb.com/title/tt0307920/', 'AADC.jpg'),
(9, 'Laskar Pelangi (2008)', 'Film drama yang diangkat dari novel Andrea Hirata dengan judul yang sama, menceritakan kisah inspiratif tentang anak-anak di Belitung yang berjuang untuk mendapatkan pendidikan.', 'https://21cineplex.com/slowmotion/laskar-pelangi-siap-produksi,38.htm', 'LASKAR.jpg'),
(10, 'Ayat-ayat Cinta (2008)', 'Film drama religi yang diangkat dari novel Habiburrahman El Shirazy dengan judul yang sama, menceritakan kisah cinta seorang wanita Indonesia dengan pria Mesir.', 'https://id.wikipedia.org/wiki/Ayat-Ayat_Cinta_(film)', 'AYAT AYAT CINTA.jpg'),
(11, 'Warkop DKI Reborn: Jangkrik Boss! Part 1 (2016)', 'Film komedi yang merupakan reboot dari film Warkop DKI Dono, Kasino, Indro, dengan cerita yang lebih modern.', 'https://www.imdb.com/title/tt5882398/', 'WARKOP.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username_admin` (`admin_username`);

--
-- Indexes for table `movies_content`
--
ALTER TABLE `movies_content`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `judul` (`content_title`);
ALTER TABLE `movies_content` ADD FULLTEXT KEY `konten` (`content_movies`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email_user`),
  ADD KEY `username_user` (`username_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movies_content`
--
ALTER TABLE `movies_content`
  MODIFY `content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
