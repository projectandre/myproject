-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2022 at 07:54 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arkatama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `keterangan_barang` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `gambar_barang` varchar(500) NOT NULL,
  `status_produk` varchar(35) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `kondisi_barang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `keterangan_barang`, `id_kategori`, `harga_barang`, `gambar_barang`, `status_produk`, `stok_barang`, `kondisi_barang`) VALUES
(1, 'Sepatu', 'Sepatu All Star', 1, 3000000, 'sepatu.jpg', 'disetujui', 0, ''),
(2, 'Sepatu Converse', 'Sepatu Converse Baru 2022', 1, 710000, 'sepatu2.jpg', 'disetujui', 0, ''),
(3, 'Sepatu Vans', 'Sepatu Vans Ori 100% 2022', 1, 1000000, 'sepatu3.jpg', 'disetujui', 0, ''),
(4, 'Sepatu Patrobas', 'Sepatu Patrobas Ori 2019', 1, 1300000, 'sepatu4.jpg', 'disetujui', 0, ''),
(5, 'Sepatu Sneakers', 'Sepatu New Sneakers Ori 2021', 1, 1700000, 'sepatu5.jpg', 'disetujui', 0, ''),
(15, 'Asus VivoBook 14 A413', 'New tahun 2022', 10, 13499000, 'laptop1.jpg', 'disetujui', 0, ''),
(16, 'Tester add', 'New tahun 2022', 11, 13499000, '5585332.jpg', 'disetujui', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_penjualan`
--

CREATE TABLE `tabel_detail_penjualan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_detail_penjualan`
--

INSERT INTO `tabel_detail_penjualan` (`id_detail_pemesanan`, `id_pemesanan`, `id_barang`, `harga_satuan`, `jumlah`, `sub_total`) VALUES
(7, 7, 2, 710000, 1, 710000),
(8, 7, 3, 1000000, 1, 1000000),
(9, 8, 1, 3000000, 1, 3000000),
(10, 8, 4, 1300000, 2, 2600000),
(11, 9, 4, 1300000, 3, 3900000),
(12, 9, 1, 3000000, 2, 6000000),
(14, 11, 3, 1000000, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hero`
--

CREATE TABLE `tabel_hero` (
  `id_hero` int(11) NOT NULL,
  `gambar_hero` varchar(125) NOT NULL,
  `judul_hero` varchar(35) NOT NULL,
  `teks_hero` varchar(255) NOT NULL,
  `status_hero` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_hero`
--

INSERT INTO `tabel_hero` (`id_hero`, `gambar_hero`, `judul_hero`, `teks_hero`, `status_hero`) VALUES
(2, 'hero1.jpg', 'Selamat Datang di Arkatama Store', 'Digitalisasi Bisnis Anda bersama Arkatama, Perusahaan Konsultan IT dan Software House', 'disetujui'),
(3, 'hero2.png', 'Team Profesional Dibidangnya', 'Pengembangan Aplikasi dan Software Custom Sesuai Kebutuhan Pengguna', 'disetujui'),
(4, 'hero3.png', 'Raih Kemudahan Bisnis Anda', 'AMD Academy Merupakan Produk Layanan Arkatama Kepada Para Mitra Dalam Bidang Digital Marketing dan IT Training Center', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian'),
(6, 'Jasa Software'),
(10, 'Handphone '),
(11, 'Jasa Web');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_keranjang`
--

CREATE TABLE `tabel_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_pemesanan` int(11) NOT NULL,
  `no_order` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `jenis_ongkir` varchar(100) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `no_resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id_pemesanan`, `no_order`, `id_user`, `tgl_pemesanan`, `biaya_kirim`, `total_bayar`, `status`, `no_telp`, `alamat`, `kota`, `provinsi`, `kurir`, `jenis_ongkir`, `bukti_transfer`, `atas_nama`, `nama_bank`, `no_rekening`, `no_resi`) VALUES
(7, '278469', 6, '2022-12-16', 9000, 1719000, 'Diterima', '082295644497', 'Puri Indah Residence', '', '', 'tiki', 'ECO Economy Service', '1671519955-foto_beranda.jpeg', 'nama', 'bank', 'rek', 'JNE2235623'),
(8, '935630', 8, '2022-12-16', 11000, 5611000, 'Order', '082295644497', 'Puri Indah Residence', '', '', 'pos', 'Pos Reguler Pos Reguler', '', '', '', '', ''),
(9, '204698', 6, '2022-12-20', 12000, 9912000, 'Diterima', '082295644497', 'Puri Indah Residence', '', '', 'pos', 'Pos Reguler Pos Reguler', '1671524928-foto_beranda.jpeg', 'Kamandanu', 'Mandiri', '13132323', 'PS67665623'),
(11, '843285', 6, '2022-12-30', 20000, 1020000, 'Order', '082295644497', 'alamat', 'Indramayu', 'Jawa Barat', 'pos', 'Pos Reguler Pos Reguler', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto_user` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `email`, `password`, `foto_user`, `role_id`) VALUES
(1, 'Andre Agung', 'andre@gmail.com', '$2y$10$NTy8jMHNeotJWBdPl/z85uKtYUppjML5QEkAUhBTot7VQsgNR23VW', 'default.jpg', 1),
(2, 'Budi Tester', 'budi@gmail.com', '$2y$10$NTy8jMHNeotJWBdPl/z85uKtYUppjML5QEkAUhBTot7VQsgNR23VW', 'default.jpg', 2),
(6, 'Kamandanu', 'kamandanu@gmail.com', '$2y$10$YRsnAy8qwj.2eOLmx/tGk.6Y/Ziq8H3pBkYMTKi6xKCpyYVDgjJgS', 'default.jpg', 3),
(7, 'pulpen', 'matakreasinusantara@gmail.com', '$2y$10$0r46eK4pwG5JtKc7MM4RZOWWEg0WL58ruH7wVEjO5r9dH3AKoVVh6', 'default.jpg', 3),
(8, 'Alzam Gibran', 'gibran@gmail.com', '$2y$10$zPbcX.0EtIJpANzAd3kiMuvP/dqlBrXK4AYEQSAb299DmZTTYw7n6', 'default.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `tabel_hero`
--
ALTER TABLE `tabel_hero`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_hero`
--
ALTER TABLE `tabel_hero`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  ADD CONSTRAINT `tabel_detail_penjualan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `tabel_penjualan` (`id_pemesanan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
