-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2019 at 04:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `kd_akun` char(8) NOT NULL,
  `nama_akun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`kd_akun`, `nama_akun`) VALUES
('101', 'Kas'),
('112', 'Piutang'),
('126', 'Persediaan(supplies)'),
('201', 'Utang'),
('400', 'Pendapatan Penjualan'),
('511', 'Beban Gaji'),
('512', 'Beban Listrik,air,telp'),
('602', 'Beban sewa gedung');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'Buku tulis', 3500, 300),
(2, 'Buku Gambar', 5500, 200),
(3, 'Pensil 2B Pilot', 1500, 500),
(4, 'Bolpoin Standart ', 2500, 500),
(5, 'Pensil Warna isi 12', 24000, 150),
(6, 'Tas sekolah SMP', 200000, 80);

-- --------------------------------------------------------

--
-- Table structure for table `dtl_trans`
--

CREATE TABLE `dtl_trans` (
  `kd_dtl_trans` int(11) NOT NULL,
  `kd_transaksi` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_utang`
--

CREATE TABLE `dtl_utang` (
  `kd_dtl_utang` int(11) NOT NULL,
  `kd_utang` int(11) NOT NULL,
  `tgl_cicil` date NOT NULL,
  `Nominal_cicil` int(11) NOT NULL,
  `kd_akun_kredit` char(8) NOT NULL,
  `kd_akun_debit` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `kd_pengeluaran` int(11) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `nominal_keluar` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_akun_kredit` char(8) NOT NULL,
  `kd_akun_debit` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_bayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tunai`
--

CREATE TABLE `tunai` (
  `kd_tunai` int(11) NOT NULL,
  `kd_transaksi` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `kd_akun_debit` char(8) NOT NULL,
  `kd_akun_kredit` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utang`
--

CREATE TABLE `utang` (
  `kd_utang` int(11) NOT NULL,
  `kd_transaksi` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `kd_akun_debit` char(8) NOT NULL,
  `kd_akun_kredit` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kd_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
  ADD PRIMARY KEY (`kd_dtl_trans`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `kd_trans` (`kd_transaksi`);

--
-- Indexes for table `dtl_utang`
--
ALTER TABLE `dtl_utang`
  ADD PRIMARY KEY (`kd_dtl_utang`),
  ADD KEY `kd_akun_kredit` (`kd_akun_kredit`),
  ADD KEY `kd_akun_debit` (`kd_akun_debit`),
  ADD KEY `kd_utang` (`kd_utang`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`kd_pengeluaran`),
  ADD KEY `kd_akun_kredit` (`kd_akun_kredit`),
  ADD KEY `kd_akun_debit` (`kd_akun_debit`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `tunai`
--
ALTER TABLE `tunai`
  ADD PRIMARY KEY (`kd_tunai`),
  ADD KEY `kd_transaksi` (`kd_transaksi`),
  ADD KEY `kd_akun_debit` (`kd_akun_debit`),
  ADD KEY `kd_akun_kredit` (`kd_akun_kredit`);

--
-- Indexes for table `utang`
--
ALTER TABLE `utang`
  ADD PRIMARY KEY (`kd_utang`),
  ADD KEY `kd_akun_kredit` (`kd_akun_kredit`),
  ADD KEY `kd_akun_debit` (`kd_akun_debit`),
  ADD KEY `kd_transaksi` (`kd_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
  MODIFY `kd_dtl_trans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtl_utang`
--
ALTER TABLE `dtl_utang`
  MODIFY `kd_dtl_utang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `kd_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tunai`
--
ALTER TABLE `tunai`
  MODIFY `kd_tunai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utang`
--
ALTER TABLE `utang`
  MODIFY `kd_utang` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtl_trans`
--
ALTER TABLE `dtl_trans`
  ADD CONSTRAINT `dtl_trans_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `dtl_trans_ibfk_2` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `dtl_utang`
--
ALTER TABLE `dtl_utang`
  ADD CONSTRAINT `dtl_utang_ibfk_1` FOREIGN KEY (`kd_akun_kredit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `dtl_utang_ibfk_2` FOREIGN KEY (`kd_akun_debit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `dtl_utang_ibfk_3` FOREIGN KEY (`kd_utang`) REFERENCES `utang` (`kd_utang`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`kd_akun_kredit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`kd_akun_debit`) REFERENCES `akun` (`kd_akun`);

--
-- Constraints for table `tunai`
--
ALTER TABLE `tunai`
  ADD CONSTRAINT `tunai_ibfk_2` FOREIGN KEY (`kd_akun_debit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `tunai_ibfk_3` FOREIGN KEY (`kd_akun_kredit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `tunai_ibfk_4` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `utang`
--
ALTER TABLE `utang`
  ADD CONSTRAINT `utang_ibfk_1` FOREIGN KEY (`kd_akun_kredit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `utang_ibfk_2` FOREIGN KEY (`kd_akun_debit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `utang_ibfk_3` FOREIGN KEY (`kd_akun_kredit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `utang_ibfk_4` FOREIGN KEY (`kd_akun_debit`) REFERENCES `akun` (`kd_akun`),
  ADD CONSTRAINT `utang_ibfk_5` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
