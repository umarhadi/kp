-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 03:16 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
--
CREATE DATABASE IF NOT EXISTS `db_toko` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_toko`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) DEFAULT NULL,
  `img` text NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`, `img`, `deskripsi`) VALUES
(4, 'BR001', 8, 'RAM DDR3 4GB HYPERX PC-12800', 'Kingston', '550000', '600000', 'PCS', '32', '16 January 2021, 20:24', '13 August 2021, 11:58', 'kingston-hyperx-fury-rgb-8gb-ddr4-3600mhz-ram-memory.jpg', ''),
(6, '003', 9, 'Huntsman Tournament Edition - Linear Optical Switch Keyboard', 'Razer', '2000000', '2400000', 'Unit', '25', '29 April 2021, 18:47', '13 August 2021, 12:15', 'e839ba7c-892f-4f8c-affc-0c89b66a11d4.jpg', ''),
(7, '004', 9, 'Flash drive 1 TB', 'HP', '200000', '300000', 'Unit', '19', '1 August 2021, 23:26', '13 August 2021, 12:13', '9b94f2e0-dbf7-444e-a07d-9c245574b30f.jpg', ''),
(9, '005', 8, 'SSD BLUE 500GB / 2.5&quot; SATA 7mm SSD / 3D NAND SSDD', 'WD', '2400000', '2500000', 'Pcs', '51', '12 August 2021, 21:20', '13 August 2021, 11:57', 'wd-blue-3d-nand-sata-ssd-500gb-front.png', ''),
(10, '006', 8, 'Sandisk SSD 256GB', 'Sandisk ', '1450001', '1500000', 'Unit', '32', '13 August 2021, 2:21', '13 August 2021, 11:56', 'ultra-3d-sata-iii-ssd-left.png.thumb.1280.1280.png', ''),
(12, '007', 8, 'LCD LED ORIGINAL APPLE MACBOOK PRO 13', 'Apple', '895000', '950000', 'Unit', '13', '21 August 2021, 0:10', '21 August 2021, 0:36', '4015402e-f7dc-4492-b064-8c3aea563437.jpg', ''),
(13, '008', 8, 'RTX 3060 12GB GAMING X TRIO 12G GDDR6 RTX3060 192BIT', 'MSI ', '12350000', '12450000', 'Unit', '8', '21 August 2021, 0:11', NULL, 'cf24a5a4-82a1-4eab-9ba9-963958ec2a15.jpg', ''),
(14, '009', 9, 'Office Monitor LED Monitor SPC SM-19HD 19 inch', 'SPC', '1100000', '1150000', 'Unit', '18', '21 August 2021, 0:14', '21 August 2021, 0:16', '2f102948-6b9a-4bcc-9b84-d4923542c789.jpg', ''),
(15, '010', 9, 'B175 Wireless Mouse', 'Logitech', '180000', '200000', 'Unit', '34', '21 August 2021, 0:23', NULL, '68f1494f-ab98-410e-b000-4ed3029420d1.jpg', ''),
(16, '001', 8, 'liquid cooling', 'msi', '1200000', '1300000', 'Unit', '3', '21 August 2021, 14:03', NULL, 'b20f7da9-f102-4692-bd23-0b1e6d32013e.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(8, 'Suku Cadang', '16 January 2021, 20:15'),
(9, 'Aksesoris', '16 January 2021, 20:15');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `id_member`) VALUES
(1, 'umar', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 'toko', 'c4ca4238a0b923820dcc509a6f75849b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Kasir', 'Penajam Paser Utara', '082254243096', 'hi@umarhadi.xyz', 'giphy.gif', '6221773712712'),
(2, 'Pemilik', 'Petung', '088272712', 'pemilik@mahardika.co', 'e65a3d76-98fa-4c35-a082-b0480c00637c_43.jpeg', '2131232');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `jenis` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`, `jenis`) VALUES
(79, 'BR001', 0, '3', '1800000', '12 August 2021, 20:45', '08-2021', 'Online'),
(80, '005', 0, '3', '7500000', '13 August 2021, 13:21', '08-2021', 'Online'),
(81, '003', 1, '2', '4800000', '13 August 2021, 13:23', '08-2021', 'Offline'),
(82, '003', 0, '3', '7200000', '13 August 2021, 14:27', '08-2021', 'Online'),
(83, '003', 1, '2', '4800000', '19 August 2021, 14:02', '08-2021', 'Offline'),
(84, '006', 1, '1', '1500000', '21 August 2021, 0:06', '08-2021', 'Offline'),
(85, '006', 1, '2', '3000000', '21 August 2021, 14:03', '08-2021', 'Offline'),
(86, '001', 0, '2', '2600000', '21 August 2021, 14:06', '08-2021', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `jenis`, `nama`, `no_hp`) VALUES
(79, '006', 1, '2', '3000000', '21 August 2021, 14:03', 'Offline', '', ''),
(80, '001', 0, '2', '2600000', '21 August 2021, 14:06', 'Online', 'dadang wibisono', '82254243096');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'Mahardika Komputer', 'Jln. KM 18 Petung', '089618173609', 'umar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
