-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 06:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koran`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `satuan` text NOT NULL,
  `keterangan` text NOT NULL,
  `isi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `kode`, `nama`, `satuan`, `keterangan`, `isi`) VALUES
(1, 'BBB', 'Epaper A3', 'lembar', 'Bahan Baku', 500),
(2, 'BBB', 'Tinta', 'botol', 'Bahan Baku', 0),
(3, 'BBB', 'Plat Cetakan', 'lembar', 'Bahan Penolong', 0),
(4, 'BBB', 'Campuran Tinta', 'botol', 'Bahan Penolong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE `beban` (
  `kode_beban` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`kode_beban`, `kode`, `nama`) VALUES
(1, 'BBN', 'Listrik'),
(2, 'BBN', 'Pabrik');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `no` int(11) NOT NULL,
  `kode_akun` varchar(3) NOT NULL,
  `nama` text NOT NULL,
  `header_akun` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`no`, `kode_akun`, `nama`, `header_akun`) VALUES
(1, '111', 'Kas', '1'),
(2, '153', 'Persediaan Produk Jadi', '1'),
(3, '151', 'Persediaan Bahan Baku', '1'),
(4, '502', 'BDP BBB', '5'),
(5, '503', 'BDP BTKL', '5'),
(6, '504', 'BDP BOP', '5'),
(7, '501', 'Harga Pokok Produksi', '5'),
(8, '152', 'Persediaan Bahan Penolong', '1'),
(9, '505', 'BOPs', '5'),
(10, '506', 'Biaya Gaji dan Upah', '5');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bbb`
--

CREATE TABLE `detail_bbb` (
  `no` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `kode_bahan` int(11) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bbb`
--

INSERT INTO `detail_bbb` (`no`, `kode_produk`, `kode_bahan`, `jumlah`) VALUES
(1, 1, 1, '4'),
(2, 1, 2, '2'),
(3, 1, 3, '16'),
(4, 1, 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beban`
--

CREATE TABLE `detail_beban` (
  `no` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `kode_beban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_beban`
--

INSERT INTO `detail_beban` (`no`, `kode_produk`, `kode_beban`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_biaya_tenagakerja`
--

CREATE TABLE `detail_biaya_tenagakerja` (
  `no` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `kode_pekerjaan` int(11) NOT NULL,
  `tarif` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_biaya_tenagakerja`
--

INSERT INTO `detail_biaya_tenagakerja` (`no`, `kode_produk`, `kode_pekerjaan`, `tarif`) VALUES
(1, 1, 1, '100000'),
(2, 1, 2, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pekerjaan`
--

CREATE TABLE `detail_pekerjaan` (
  `id_karyawan` int(11) NOT NULL,
  `kode_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `kode_pembelian` varchar(20) NOT NULL,
  `kode_bahan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `input_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`kode_pembelian`, `kode_bahan`, `harga_beli`, `jumlah`, `subtotal`, `input_jumlah`) VALUES
('2244147838', 1, 5000, 1000, 10000, 2),
('2244147838', 2, 5000, 2, 10000, 0),
('5161659138', 1, 9000, 1500, 27000, 3),
('5161659138', 3, 4000, 2, 8000, 0),
('5161659138', 2, 4000, 4, 16000, 0),
('2929761860', 4, 5000, 16, 80000, 0),
('5801514643', 1, 85000, 6000, 1020000, 12),
('5801514643', 2, 150000, 10, 1500000, 0),
('5801514643', 3, 25000, 28, 700000, 0),
('5801514643', 4, 20000, 5, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_produksi`
--

CREATE TABLE `detail_produksi` (
  `kode_produksi` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `biaya_bahan_baku` int(11) NOT NULL,
  `biaya_tenaga_kerja` int(11) NOT NULL,
  `biaya_overhead_pabrik` int(11) NOT NULL,
  `biaya_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_produksi`
--

INSERT INTO `detail_produksi` (`kode_produksi`, `kode_produk`, `biaya_bahan_baku`, `biaya_tenaga_kerja`, `biaya_overhead_pabrik`, `biaya_produksi`) VALUES
(1, 1, 980000, 600000, 620000, 2200000);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `no` int(11) NOT NULL,
  `kode_transaksi` text NOT NULL,
  `kode_akun` text NOT NULL,
  `tanggal` date NOT NULL,
  `posisi` text NOT NULL,
  `nominal` decimal(10,3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`no`, `kode_transaksi`, `kode_akun`, `tanggal`, `posisi`, `nominal`, `keterangan`) VALUES
(1, '2244147838', '151', '2019-12-10', 'Debit', '10000.000', 'Bahan Baku'),
(2, '2244147838', '111', '2019-12-10', 'Kredit', '10000.000', ''),
(3, '2244147838', '151', '2019-12-10', 'Debit', '10000.000', 'Bahan Baku'),
(4, '2244147838', '111', '2019-12-10', 'Kredit', '10000.000', ''),
(5, '5161659138', '151', '2019-12-11', 'Debit', '27000.000', 'Bahan Baku'),
(6, '5161659138', '111', '2019-12-11', 'Kredit', '27000.000', ''),
(7, '5161659138', '152', '2019-12-11', 'Debit', '8000.000', 'Bahan Penolong'),
(8, '5161659138', '111', '2019-12-11', 'Kredit', '8000.000', ''),
(9, '5161659138', '151', '2019-12-11', 'Debit', '16000.000', 'Bahan Baku'),
(10, '5161659138', '111', '2019-12-11', 'Kredit', '16000.000', ''),
(11, '2929761860', '152', '2019-12-16', 'Debit', '80000.000', 'Bahan Penolong'),
(12, '2929761860', '111', '2019-12-16', 'Kredit', '80000.000', ''),
(13, '5801514643', '151', '2019-12-16', 'Debit', '1020000.000', 'Bahan Baku'),
(14, '5801514643', '111', '2019-12-16', 'Kredit', '1020000.000', ''),
(15, '5801514643', '151', '2019-12-16', 'Debit', '1500000.000', 'Bahan Baku'),
(16, '5801514643', '111', '2019-12-16', 'Kredit', '1500000.000', ''),
(17, '5801514643', '152', '2019-12-16', 'Debit', '700000.000', 'Bahan Penolong'),
(18, '5801514643', '111', '2019-12-16', 'Kredit', '700000.000', ''),
(19, '5801514643', '152', '2019-12-16', 'Debit', '100000.000', 'Bahan Penolong'),
(20, '5801514643', '111', '2019-12-16', 'Kredit', '100000.000', ''),
(21, '2', '153', '2019-12-16', 'Debit', '2200000.000', ''),
(22, '2', '502', '2019-12-16', 'Kredit', '980000.000', ''),
(23, '2', '503', '2019-12-16', 'Kredit', '600000.000', ''),
(24, '2', '504', '2019-12-16', 'Kredit', '620000.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `kode_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `kode`, `nama`, `no_hp`, `kode_pekerjaan`) VALUES
(1, 'KYW', 'Widi', '087812244556', 1),
(2, 'KYW', 'Dinda', '087812244556', 1),
(3, 'KYW', 'kikiii', '087812244556', 2),
(4, 'KYW', 'Dela', '087812244556', 2),
(5, 'KYW', 'Didin', '087850339044', 1),
(6, 'KYW', 'Safira Delaila', '087830661960', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `kode` varchar(5) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`kode`, `nama`) VALUES
('BBB', 'bahan'),
('BBN', 'beban'),
('BTK', 'pekerjaan'),
('KRNBL', 'produk'),
('KYW', 'karyawan'),
('PMB', 'pembelian'),
('PMK', 'pemasok');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kode_pekerjaan` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`kode_pekerjaan`, `kode`, `nama`) VALUES
(1, 'BTK', 'Mencetak'),
(2, 'BTK', 'Mengemas');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `kode`, `nama`, `no_hp`, `alamat`) VALUES
(1, 'PMK', 'PT AMCO', '087850339045', 'Jln Adhyaksa'),
(2, 'PMK', 'Air Bening Jaya', '087830661966', 'Jl Pangarangan Sumenep'),
(3, 'PMK', 'Yogya Bojongsoang', '081999199180', 'Jl Terusan Buah Batu');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(20) NOT NULL,
  `no` int(11) NOT NULL,
  `kode` text NOT NULL,
  `tanggal` date NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `no`, `kode`, `tanggal`, `total`, `id_pemasok`, `status`) VALUES
('2244147838', 1, 'PMB', '2019-12-10', '20000.000', 2, 'Sudah Diproses'),
('2929761860', 3, 'PMB', '2019-12-12', '80000.000', 2, 'Sudah Diproses'),
('5161659138', 2, 'PMB', '2019-12-11', '51000.000', 2, 'Sudah Diproses'),
('5801514643', 4, 'PMB', '2019-12-16', '3320000.000', 1, 'Sudah Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(11) NOT NULL,
  `kode` text NOT NULL,
  `nama` text NOT NULL,
  `bbb` text NOT NULL,
  `btk` text NOT NULL,
  `bop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `kode`, `nama`, `bbb`, `btk`, `bop`) VALUES
(1, 'KRNBL', 'Koran Harian', 'Sudah Dibuat', 'Sudah Dibuat', 'Sudah Dibuat');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `kode_produksi` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya_produksi` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`kode_produksi`, `kode_produk`, `tanggal`, `jam`, `jumlah`, `biaya_produksi`) VALUES
(1, 1, '2019-12-16', '12:31:36', 1000, '2200000.000');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `kode_bahan` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_bahan`
--

INSERT INTO `stok_bahan` (`kode_bahan`, `stok`) VALUES
(1, 4500),
(2, 14),
(3, 14),
(4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `stok_produk`
--

CREATE TABLE `stok_produk` (
  `kode_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `posisi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `posisi`, `foto`) VALUES
(1, 'Ironman', 'ironman', '123456', 'Super Admin', ''),
(2, 'Putri Adelia', 'adel', '123456', 'Pemilik', '1.jpg'),
(3, 'Fanny Silvana', 'fsilvana', '123456', 'Produksi', '3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
  ADD PRIMARY KEY (`kode_beban`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_bbb`
--
ALTER TABLE `detail_bbb`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_biaya_tenagakerja`
--
ALTER TABLE `detail_biaya_tenagakerja`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `kode_pembelian` (`kode_pembelian`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode_pekerjaan`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `stok_produk`
--
ALTER TABLE `stok_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`kode_pembelian`) REFERENCES `pembelian` (`kode_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
