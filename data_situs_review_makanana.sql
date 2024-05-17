-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 06:26 PM
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
-- Database: `data_situs_review_makanana`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_makanan`
--

CREATE TABLE `jenis_makanan` (
  `id_jenis` int NOT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_makanan`
--

INSERT INTO `jenis_makanan` (`id_jenis`, `jenis`) VALUES
(2, 'Makanan Ringan'),
(1, 'Makanan Utama');

-- --------------------------------------------------------

--
-- Table structure for table `kesulitan`
--

CREATE TABLE `kesulitan` (
  `id_kesulitan` int NOT NULL,
  `tingkat_kesulitan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kesulitan`
--

INSERT INTO `kesulitan` (`id_kesulitan`, `tingkat_kesulitan`) VALUES
(1, 'Mudah'),
(2, 'Sederhana'),
(3, 'Sulit');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `tingkat_kesulitan` varchar(20) NOT NULL,
  `bahan_baku` longtext NOT NULL,
  `gambar` varchar(9999) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `jenis` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama_makanan`, `tingkat_kesulitan`, `bahan_baku`, `gambar`, `deskripsi`, `jenis`) VALUES
(1, 'Nasi Goreng', 'Sederhana', 'Nasi, Telur, Bawang Merah, Bawang Putih', 'https://assets.unileversolutions.com/recipes-v2/242794.jpg', 'Nasi goreng adalah makanan khas Indonesia yang terbuat dari nasi yang digoreng bersama bumbu dan bahan lainnya.', 'Makanan Utama'),
(2, 'Sate Ayam', 'Sulit', 'Daging Ayam, Bumbu Sate, Kecap, Bawang Merah', 'https://www.dapurkobe.co.id/wp-content/uploads/sate-ayam.jpg', 'Sate ayam adalah makanan yang terbuat dari potongan daging ayam yang ditusuk dan dipanggang, disajikan dengan bumbu kacang.', 'Makanan Utama'),
(3, 'Pisang Goreng', 'Mudah', 'Pisang, Tepung Terigu, Tepung Beras, Gula', 'https://www.astronauts.id/blog/wp-content/uploads/2023/11/Berbagai-Resep-Pisang-Goreng-Crispy-dan-Legit-Sejak-Gigitan-Pertama.jpg', 'Pisang goreng adalah camilan yang terbuat dari pisang yang digoreng setelah dilumuri adonan tepung.', 'Makanan Ringan'),
(4, 'Soto Ayam', 'Sederhana', 'Daging Ayam, Bumbu Soto, Lontong, Bawang Goreng', 'https://jogja.disway.id/upload/5f8893b14c6fe4e24da321d667a764d6.jpg', 'Soto ayam adalah sup ayam khas Indonesia yang disajikan dengan kuah bening, daging ayam, sayuran, dan bawang goreng.', 'Makanan Utama'),
(5, 'Gado-Gado', 'Sulit', 'Kentang, Tahu, Telur, Kacang Panjang, Lontong', 'https://www.warisankuliner.com/gfx/recipes/temp_thumb-1629362058.jpg', 'Gado-gado adalah salah satu makanan khas Indonesia yang terdiri dari sayuran yang direbus dan dicampur dengan bumbu kacang.', 'Makanan Utama'),
(6, 'Ayam Goreng', 'Sederhana', 'Daging Ayam, Tepung Terigu, Bumbu Ayam', 'https://asset.kompas.com/crops/93Z7RqI2kT4QMVlgmPgqScwgW80=/0x298:750x798/750x500/data/photo/2020/09/25/5f6da653c1860.jpg', 'Ayam goreng adalah makanan yang terbuat dari potongan daging ayam yang digoreng dengan tepung dan bumbu khas.', 'Makanan Utama'),
(7, 'Bakso', 'Sulit', 'Daging Sapi, Tepung Tapioka, Telur, Bawang Goreng', 'https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/08/02034124/ini-resep-bakso-malang-lezat-yang-menggugah-selera-halodoc.jpg', 'Bakso adalah bola daging yang terbuat dari campuran daging sapi dan tepung tapioka, disajikan dengan kuah kaldu dan mie.', 'Makanan Ringan'),
(8, 'Rendang', 'Sulit', 'Daging Sapi, Santan, Bumbu Rendang', 'https://asset.kompas.com/crops/Ag85xs7DjO0ANkDXx1SMTyCFGuI=/0x15:1170x795/750x500/data/photo/2022/04/18/625d11bdb6f29.jpg', 'Rendang adalah masakan daging sapi yang dimasak dengan santan dan rempah-rempah khas Minangkabau.', 'Makanan Utama'),
(9, 'Martabak Manis', 'Sederhana', 'Tepung Terigu, Telur, Susu, Coklat, Kacang', 'https://www.dapurkobe.co.id/wp-content/uploads/martabak-8-rasa.jpg', 'Martabak manis adalah makanan Indonesia berupa pancake tebal yang diisi dengan coklat, kacang, atau keju.', 'Makanan Ringan'),
(10, 'Sambal Goreng Kentang', 'Sulit', 'Kentang, Santan, Bumbu Sambal Goreng', 'https://www.masakapahariini.com/wp-content/uploads/2021/05/sambal-kentang-disajikan-500x300.jpg', 'Sambal goreng kentang adalah masakan Indonesia yang terbuat dari kentang yang digoreng dan dimasak dengan bumbu sambal goreng.', 'Makanan Utama'),
(11, 'Pempek', 'Sulit', 'Ikan Tenggiri, Tepung Sagu, Telur, Bumbu Pempek', 'https://cdn1-production-images-kly.akamaized.net/I_WjnwIzrBmdtuIsNb3LNuE0Tps=/0x32:666x407/800x450/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3275929/original/019852800_1603432162-Pempek_Palembang__Nefri_Inge_.jpeg', 'Pempek adalah makanan khas Palembang yang terbuat dari ikan tenggiri yang digiling, dicampur dengan tepung sagu, dan dibentuk bulat.', 'Makanan Utama'),
(12, 'Soto Betawi', 'Sulit', 'Daging Sapi, Santan, Bumbu Soto Betawi', 'https://asset.kompas.com/crops/FJsfTo1_vUpYO-lLGU94wLyIJJ8=/3x0:700x465/750x500/data/photo/2020/06/21/5eef911260b5c.jpg', 'Soto Betawi adalah varian soto khas Betawi yang terbuat dari daging sapi dan santan, disajikan dengan bumbu kacang dan tomat.', 'Makanan Utama');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ulasan`
--

CREATE TABLE `tabel_ulasan` (
  `id` int NOT NULL,
  `user` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rating` int NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_ulasan`
--

INSERT INTO `tabel_ulasan` (`id`, `user`, `rating`, `comment`) VALUES
(1, 'Pengguna1', 4, 'Makanan enak, pelayanan bagus'),
(1, 'Pengguna2', 5, 'Sangat puas dengan makanannya'),
(2, 'Pengguna3', 3, 'Cukup baik untuk harganya'),
(2, 'Pengguna4', 2, 'Rasa kurang terasa'),
(3, 'Pengguna5', 5, 'Top markotop!'),
(3, 'Pengguna6', 4, 'Rekomendasi untuk pecinta makanan'),
(4, 'Pengguna7', 1, 'Sangat kecewa, makanan tidak sesuai harapan'),
(4, 'Pengguna8', 3, 'Cukup lumayan untuk sekadar ngemil'),
(5, 'Pengguna9', 4, 'Rasa makanan terjaga dengan baik'),
(5, 'Pengguna10', 5, 'Lezat dan sehat!'),
(6, 'Pengguna11', 2, 'Kurang suka dengan rasa makanannya'),
(6, 'Pengguna12', 3, 'Biasa saja, tidak ada yang istimewa'),
(7, 'Pengguna13', 4, 'Makanan yang enak dengan harga terjangkau'),
(7, 'Pengguna14', 5, 'Pelayanan ramah dan makanan lezat'),
(8, 'Pengguna15', 3, 'Sangat puas dengan pilihan menu'),
(8, 'Pengguna16', 4, 'Rasa makanan cukup enak'),
(9, 'Pengguna17', 2, 'Kualitas makanan mengecewakan'),
(9, 'Pengguna18', 1, 'Tidak suka dengan rasa makanannya'),
(10, 'Pengguna19', 5, 'Makanan yang luar biasa!'),
(10, 'Pengguna20', 4, 'Sangat disarankan untuk dicoba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `jenis_makanan` (`jenis`);

--
-- Indexes for table `kesulitan`
--
ALTER TABLE `kesulitan`
  ADD PRIMARY KEY (`id_kesulitan`),
  ADD KEY `tingkat_kesulitan` (`tingkat_kesulitan`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_makanan` (`jenis`),
  ADD KEY `tingkat_kesulitan` (`tingkat_kesulitan`);

--
-- Indexes for table `tabel_ulasan`
--
ALTER TABLE `tabel_ulasan`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kesulitan`
--
ALTER TABLE `kesulitan`
  MODIFY `id_kesulitan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `jenis_makanan` (`jenis`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `makanan_ibfk_2` FOREIGN KEY (`tingkat_kesulitan`) REFERENCES `kesulitan` (`tingkat_kesulitan`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
