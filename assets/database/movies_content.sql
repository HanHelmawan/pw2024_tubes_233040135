-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2024 at 08:35 AM
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
-- Table structure for table `movies_content`
--

CREATE TABLE `movies_content` (
  `content_id` int NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_movies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `url_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies_content`
--

INSERT INTO `movies_content` (`content_id`, `content_title`, `content_movies`, `url_content`, `content_photo`, `admin_id`) VALUES
(2, 'KKN di Desa Penari (2022)', 'Film horor yang diangkat dari kisah nyata tentang sekelompok mahasiswa KKN yang mengalami kejadian mistis di sebuah desa terpencil.', 'https://www.imdb.com/title/tt11013610/', 'KKN.jpg', 1),
(3, 'Pengabdi Setan 2: Communion (2022)', 'Sekuel dari film Pengabdi Setan (2017) yang menceritakan teror Ibu dan anak-anaknya yang kembali menghantui keluarga Rini.', 'https://m.21cineplex.com/gui.movie_details.php?sid=&movie_id=12PS2C', 'PENGABDI SETAN.jpg', 1),
(4, 'Miracle in Cell No. 7 (2022)', 'Film drama yang mengharukan tentang seorang ayah yang dipenjara karena tuduhan pembunuhan dan berusaha untuk menjaga hubungan dengan putrinya.', 'https://www.imdb.com/title/tt11799822/', 'MIRACLE IN CELL NO.7.jpg', 1),
(5, 'Ngeri-ngeri Sedap (2022)', 'Film komedi keluarga yang menceritakan tentang empat orang anak yang pulang kampung untuk menyelesaikan masalah keluarga.', 'https://m.21cineplex.com/gui.movie_details.php?sid=DBL&movie_id=12NNSP', 'NGERI.jpg', 1),
(6, 'Ivanna (2022)', 'Film horor yang diangkat dari novel Risa Saraswati dengan judul yang sama, menceritakan teror hantu Ivanna di sebuah panti asuhan.', 'https://www.imdb.com/title/tt11448138/', 'IVANNA.jpg', 1),
(7, 'Habibie & Ainun (2012)', 'Film biografi yang menceritakan kisah cinta B.J. Habibie dan Ainun Habibie, dari masa muda hingga menjadi pasangan suami istri.', 'https://www.imdb.com/title/tt2589132/', 'HABIBI.jpg', 1),
(8, 'Ada Apa dengan Cinta (2002)', 'Film drama romantis yang ikonik tentang kisah cinta remaja di era 90-an.', 'https://www.imdb.com/title/tt0307920/', 'AADC.jpg', 1),
(9, 'Laskar Pelangi (2008)', 'Film drama yang diangkat dari novel Andrea Hirata dengan judul yang sama, menceritakan kisah inspiratif tentang anak-anak di Belitung yang berjuang untuk mendapatkan pendidikan.', 'https://21cineplex.com/slowmotion/laskar-pelangi-siap-produksi,38.htm', 'LASKAR.jpg', 1),
(10, 'Ayat-ayat Cinta (2008)', 'Film drama religi yang diangkat dari novel Habiburrahman El Shirazy dengan judul yang sama, menceritakan kisah cinta seorang wanita Indonesia dengan pria Mesir.', 'https://id.wikipedia.org/wiki/Ayat-Ayat_Cinta_(film)', 'AYAT AYAT CINTA.jpg', 1),
(11, 'Warkop DKI Reborn: Jangkrik Boss! Part 1 (2016)', 'Film komedi yang merupakan reboot dari film Warkop DKI Dono, Kasino, Indro, dengan cerita yang lebih modern.', 'https://www.imdb.com/title/tt5882398/', 'WARKOP.jpg', 1),
(12, 'Produser Buka Suara Usai Film Vina Banjir Kritik Netizen', 'Produser film Vina: Sebelum 7 Hari, Dheeraj Khalwani atau K.K. Dheeraj, buka suara terkait gelombang kritik yang muncul.', 'https://www.cnnindonesia.com/hiburan/20240516201032-220-1098658/produser-buka-suara-usai-film-vina-banjir-kritik-netizen', 'dheeraj-khalwani_169.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies_content`
--
ALTER TABLE `movies_content`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `judul` (`content_title`),
  ADD KEY `admin` (`admin_id`);
ALTER TABLE `movies_content` ADD FULLTEXT KEY `konten` (`content_movies`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies_content`
--
ALTER TABLE `movies_content`
  MODIFY `content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies_content`
--
ALTER TABLE `movies_content`
  ADD CONSTRAINT `movies_content_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
