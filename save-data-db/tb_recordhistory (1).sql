-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 10:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_recordhistory`
--

CREATE TABLE `tb_recordhistory` (
  `id_pesanan` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `jenis_kopi` varchar(30) NOT NULL,
  `jenis_penyajian` varchar(30) NOT NULL,
  `jenis_topping` varchar(30) NOT NULL,
  `ukuran_cup` varchar(30) NOT NULL,
  `total` double NOT NULL,
  `kembalian` double DEFAULT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `tanggal_pemesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_recordhistory`
--

INSERT INTO `tb_recordhistory` (`id_pesanan`, `email`, `nama_pemesan`, `jenis_kopi`, `jenis_penyajian`, `jenis_topping`, `ukuran_cup`, `total`, `kembalian`, `metode_pembayaran`, `status_pesanan`, `tanggal_pemesanan`) VALUES
(2, NULL, 'rexcode', 'Kopi Arabica', 'Dingin', 'Topping Karamel', 'Regular', 26000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(3, NULL, 'rexcode', 'Kopi Liberika', 'Dingin', 'Topping Karamel', 'Small', 25000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(4, NULL, 'rexcode', 'Kopi Robusta ', 'Dingin', 'Topping Karamel', 'Small', 25000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(5, NULL, 'rexcode', 'Kopi Robusta ', 'Panas', 'Topping Cream', 'Small', 23000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(6, NULL, 'rexcode', 'Kopi Liberika', 'Dingin', 'Topping Karamel', 'Regular', 26000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(7, NULL, 'rexcode', 'Kopi Liberika', 'Panas', 'Topping Karamel', 'Regular', 26000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(8, NULL, 'rexcode', 'Kopi Liberika', 'Panas', 'Topping Karamel', 'Small', 25000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(9, NULL, 'rexcode', 'Kopi Luwak', 'Dingin', 'Topping Ban', 'Large', 29000, NULL, 'non-tunai', 'Diproses', '0000-00-00'),
(10, NULL, 'rexcode', 'Kopi Liberika', 'Panas', 'Topping Cream', 'Small', 23000, NULL, 'tunai', 'Diproses', '0000-00-00'),
(11, NULL, 'rexcode', 'Kopi Arabica', 'Panas', 'Topping Karamel', 'Regular', 26000, NULL, 'tunai', 'Diproses', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_recordhistory`
--
ALTER TABLE `tb_recordhistory`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_recordhistory`
--
ALTER TABLE `tb_recordhistory`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_recordhistory`
--
ALTER TABLE `tb_recordhistory`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `tb_akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
