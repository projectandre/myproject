-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2023 pada 19.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_samsat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_data`
--

CREATE TABLE `tabel_data` (
  `id_data` int(11) NOT NULL,
  `nama_kantor` varchar(40) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `npp` varchar(12) NOT NULL,
  `grade` varchar(12) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `informasi` varchar(120) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_data`
--

INSERT INTO `tabel_data` (`id_data`, `nama_kantor`, `petugas`, `npp`, `grade`, `alamat`, `informasi`, `latitude`, `longitude`) VALUES
(3, 'SAMSAT KALIANDA', 'Heru Hermawan, ST, AAAIK', '821024839', 'J', 'Kalianda', 'll', '-5.7127694975182495', '105.58705019161188'),
(7, 'SAMSAT PESAWARAN', 'Marsaulina Cindurita, SE', '760620800', 'J', 'Pesawaran', '', '-5.368011667376611', '105.19365260387801'),
(11, 'SAMSAT PRINGSEWU', 'Ade Yusriyanti, SE, AAAIK', '860923000', 'J', 'Pringsewu', '', '-5.370393694798238', '104.92967527504246'),
(12, 'SAMSAT TANGGAMUS', 'Yudha Irawan, SE', '840924399', 'K', '', '', '-5.502956351537152', '104.63990579038557'),
(13, 'SAMSAT MALL KARTINI', 'Sesaria Indri Hastari, ST, MM', '800520150', 'K', '', '', '-5.416888540509599', '105.25394300867542'),
(14, 'SAMSAT LADIES MBK', 'Mega Putri Yuniar', '991901239B', 'LBJR', '', '', '-5.382184292978365', '105.25913641672425'),
(15, 'SAMSAT MALL NATAR', 'Stefanus Yonatan', '981901249B', 'LBJR', '', '', '-5.309454703481882', '105.19349723137354'),
(16, 'SAMSAT GERAI CONTAINER', 'Nanda Nugraha', '911736029', 'K', '', '', '-5.447603864472146', '105.30193728883613'),
(17, 'SAMLING II BDL', 'Dwi Hendro Aji Pranolo', '921432589', 'K', '', '', '-5.4489197855059075', '105.26452771045248'),
(18, 'SAMSAT MALL CHANDRA', 'Cinthya Charismawati', '821024839', 'K', '', '', '-5.4110773747900405', '105.2608480909193'),
(19, 'SAMLING I BDL', 'Bayu Septya Yuda', '971901269B', 'LBJR', '', '', '-5.394574331905298', '105.29472964107912'),
(21, 'SAMSAT UPC BDL', 'Ellisa Octaviani', '911330530', 'M', '', '', '-5.374242989614591', '105.22384189717789'),
(22, 'SAMLING PADANG CERMIN', 'Rizki Fadillah Fathoni', '971901229B', 'LBJR', '', '', '-5.290815935862852', '105.05634430070388'),
(23, 'SAMSAT DESA HANURA', 'Rizki Fadillah Fathoni', '971901229B', 'LBJR', '', '', '-5.531422882947321', '105.23665947459821'),
(24, 'SAMLING KALIANDA 3', 'Heru Hermawan, ST, AAAIK', '821024839', 'J', '', '', '-5.5838127', '105.5214075'),
(25, 'SAMLING TANGGAMUS 2', 'Yudha Irawan, SE', '840924399', 'K', '', '', '-5.508082', '104.489611'),
(26, 'SAMLING TALANG PADANG', 'Yudha Irawan, SE', '840924399', 'K', '', '', '-5.364209', '104.855225'),
(27, 'SAMLING JATI AGUNG', 'Didi Suprayadi', '971901279B', 'LBJR', '', '', '-5.320168', '105.288656'),
(28, 'SAMSAT BANDAR LAMPUNG', 'Malka Prima, SIP, MIP, CRMO', '871127409', 'J', '', '', '-5.374517805784923', '105.22335858085205'),
(34, 'Samsat ABC', 'Andre', '918212B', '', '', '', '-5.459170861555616', '105.26670455932619');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(7, 'Andre Agung', 'admin', '$2y$10$NTy8jMHNeotJWBdPl/z85uKtYUppjML5QEkAUhBTot7VQsgNR23VW'),
(8, 'Jasa Raharja', 'jasaraharja', '$2y$10$Mj.6xwewTTRlpsi/kQYZBeXzeSwVgWo0A54J24pEFfYRaG/DU7wQ6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_data`
--
ALTER TABLE `tabel_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_data`
--
ALTER TABLE `tabel_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
