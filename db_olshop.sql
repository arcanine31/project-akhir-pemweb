-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 06:28 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `asesoris`
--

CREATE TABLE `asesoris` (
  `id_asesoris` int(11) NOT NULL,
  `nama_asesoris` varchar(100) NOT NULL,
  `diskripsi` text NOT NULL,
  `harga` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  `merek` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kat_asesoris` int(11) NOT NULL,
  `status` enum('aktif','tdk_aktif','terhapus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asesoris`
--

INSERT INTO `asesoris` (`id_asesoris`, `nama_asesoris`, `diskripsi`, `harga`, `gambar`, `merek`, `stok`, `id_kat_asesoris`, `status`) VALUES
(1, 'Herp Keychain', 'asdasdas', '8.10', 'trollface.jpg', 'MEME Factory', 10, 1, 'aktif'),
(2, 'Phone Case custom', 'custom made phone case', '10', 'roam-free-nz-iphone-case-by-cabinsupplyco.jpeg', '-', 0, 2, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_asesoris` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_asesoris`, `jumlah`, `id_pembeli`) VALUES
(1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `id_detil_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_asesoris` int(11) NOT NULL,
  `jml_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `hak_akses` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'kasir', 'kasir', 'kasir', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `kat_asesoris`
--

CREATE TABLE `kat_asesoris` (
  `id_kat_asesoris` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kat_asesoris`
--

INSERT INTO `kat_asesoris` (`id_kat_asesoris`, `nama_kategori`) VALUES
(1, 'Keychain'),
(2, 'Case');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`, `telp`, `kota`, `provinsi`, `email`, `password`) VALUES
(1, 'maw', 'masww', '0983338', 'malang', 'jawa timur', 'aaa@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `bukti_pembayaran` text DEFAULT NULL,
  `status_pembelian` enum('terima','tolak','menunggu_konfirm','belum_konfirm') NOT NULL DEFAULT 'belum_konfirm',
  `id_verifikator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asesoris`
--
ALTER TABLE `asesoris`
  ADD PRIMARY KEY (`id_asesoris`),
  ADD KEY `id_kat_asesoris` (`id_kat_asesoris`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`id_detil_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_asesoris` (`id_asesoris`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD KEY `id_kasir` (`id_kasir`);

--
-- Indexes for table `kat_asesoris`
--
ALTER TABLE `kat_asesoris`
  ADD PRIMARY KEY (`id_kat_asesoris`),
  ADD KEY `id_kat_asesoris` (`id_kat_asesoris`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_verifikator` (`id_verifikator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asesoris`
--
ALTER TABLE `asesoris`
  MODIFY `id_asesoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `id_detil_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kat_asesoris`
--
ALTER TABLE `kat_asesoris`
  MODIFY `id_kat_asesoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asesoris`
--
ALTER TABLE `asesoris`
  ADD CONSTRAINT `asesoris_ibfk_1` FOREIGN KEY (`id_kat_asesoris`) REFERENCES `kat_asesoris` (`id_kat_asesoris`) ON UPDATE NO ACTION;

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`id_asesoris`) REFERENCES `asesoris` (`id_asesoris`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_verifikator`) REFERENCES `kasir` (`id_kasir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
