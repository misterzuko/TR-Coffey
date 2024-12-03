-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 04:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`email`, `username`, `password`) VALUES
('admin@local.com', 'ADMIN', 'ADMIN#1234'),
('andre@gmai.com', '123', '123'),
('andre@gmail.com', '123', '123'),
('andregans@gmail.com', 'gans', '123'),
('andreonie@gmail.com', '123', '123'),
('anjas@gmail.com', '123', '123'),
('apabenar@gmail.com', 'ADMIN', 'ADMIN#1234'),
('halloges@gmail.com', 'ADMIN', 'ADMIN#1234'),
('komang@gmail.com', 'Andre ganteng', '123'),
('test@gmail.com', '123', '123'),
('testing@gmail.com', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `harga_barang` double NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`) VALUES
(1, 'Kopi Arabica', 20000, 73),
(2, 'Kopi Robusta', 20000, 0),
(3, 'Kopi Liberika', 20000, 34),
(4, 'Kopi Luwak', 20000, 98),
(5, 'Kopi Tubruk', 20000, 38),
(6, 'Kopi Macchiato', 20000, 200),
(7, 'Es Batu', 2000, 50),
(8, 'Cup kecil', 1000, 29),
(9, 'Cup Regular', 2000, 0),
(10, 'Cup besar', 3000, 38),
(11, 'Topping bakso', 2000, 0),
(12, 'Topping kelapa', 4000, 5),
(13, 'Topping ban', 6000, 496),
(14, 'Topping abon', 1000, 26);

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
  `kembalian` double DEFAULT 0,
  `metode_pembayaran` varchar(30) NOT NULL,
  `status_pesanan` varchar(30) NOT NULL,
  `tanggal_pemesanan` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_recordhistory`
--

INSERT INTO `tb_recordhistory` (`id_pesanan`, `email`, `nama_pemesan`, `jenis_kopi`, `jenis_penyajian`, `jenis_topping`, `ukuran_cup`, `total`, `kembalian`, `metode_pembayaran`, `status_pesanan`, `tanggal_pemesanan`) VALUES
(1, NULL, 'rexcode', 'Kopi Arabica', 'Panas', 'Topping Karamel', 'Cup Small', 25000, 0, 'tunai', 'Diproses', '2024-12-03'),
(2, 'andre@gmail.com', '123', 'Kopi Liberika', 'Panas', 'Topping abon', 'Cup besar', 23000, 0, 'tunai', 'Selesai', '2024-12-03'),
(3, 'andre@gmail.com', '123', 'Kopi Arabica', 'Panas', 'Topping kelapa', 'Cup besar', 25000, 0, 'tunai', 'Selesai', '2024-12-03'),
(4, 'andre@gmail.com', '123', 'Kopi Arabica', 'Panas', 'Topping abon', 'Cup besar', 23000, 0, 'tunai', 'Diproses', '2024-12-03'),
(5, 'andre@gmail.com', '123', 'Kopi Liberika', 'Panas', 'Topping abon', 'Cup besar', 23000, 0, 'tunai', 'Selesai', '2024-12-03'),
(6, 'andre@gmail.com', '123', 'Kopi Arabica', 'Panas', 'Topping abon', 'Cup besar', 23000, 0, 'tunai', 'Selesai', '2024-12-03'),
(23, 'andre@gmail.com', '123', 'Kopi Liberika', 'Panas', 'Topping kelapa', 'Cup kecil', 23000, 0, 'tunai', 'Diproses', '2024-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pembeli` varchar(45) NOT NULL,
  `total_harga` double NOT NULL,
  `nama_pesanan` text NOT NULL,
  `tanggal_pembelian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_recordhistory`
--
ALTER TABLE `tb_recordhistory`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_email` (`email`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_recordhistory`
--
ALTER TABLE `tb_recordhistory`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

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
