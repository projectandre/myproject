-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2023 pada 19.52
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
-- Database: `db_arkatama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `keterangan_barang` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `gambar_barang` varchar(125) NOT NULL,
  `status_produk` varchar(15) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(35) NOT NULL,
  `berat_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `keterangan_barang`, `id_kategori`, `harga_barang`, `gambar_barang`, `status_produk`, `stok_barang`, `kondisi_barang`, `berat_barang`) VALUES
(15, 'Asus VivoBook 14 A413', 'Prosesor Intel Core i7-1165G7 quad-core (8 thread) 1.2-2.8 GHz TurboBoost 4,7GHz, Memori RAM 8GB DDR4-3200MHz, onboard', 12, 13499000, 'laptop1.jpg', 'disetujui', 20, 'Baru', 1400),
(20, 'HP Omen 16', 'AMD Ryzen™ 7 5800H (up to 4.4 GHz maxboost clock, 16 MB L3 cache, 8 cores,16 threads), 16 Gb Ram DDR4, SSD 512 GB', 12, 23499000, 'laptop2.jpg', 'disetujui', 12, 'Baru', 2300),
(21, 'Iphone 12 Pro Max', 'Storage 128Gb, Ram 6Gb', 10, 15000000, 'hp1.jpg', 'disetujui', 12, 'Baru', 228),
(24, 'Fujifilm X-T4', 'Fujifilm X-T4 hadir dengan fitur-fitur baru yang bikin ngiler! Mulai dari sensor 26MP APS-C yang dapat memotret foto beresolusi tinggi dan merekam video 4K dengan 60p 10-bit internal recording dan kecepatan 60fps.', 14, 13500000, 'f1.png', 'disetujui', 13, 'Baru', 607),
(25, 'Nikon D3500', 'Nikon D3500 dibekali dengan sensor 24MP beresolusi tinggi dengan hasil gambar yang super jernih, dan memiliki kapabilitas video 1080p/60fps.', 14, 4700000, 'f2.png', 'disetujui', 6, 'Baru', 415),
(26, 'Canon EOS RP', 'Kecepatan fokus 0,05 det. , Sensor CMOS full-frame 26,2MP', 14, 14300000, 'f3_1.png', 'disetujui', 9, 'Baru', 485),
(27, 'Canon EOS 1500D', 'Sensor CMOS APS-C 24,1 megapiksel &amp; DIGIC 4+, ISO 100 – 6400 Standar (dapat diperluas hingga 12800)', 14, 6500000, 'image_5.png', 'disetujui', 13, 'Baru', 475),
(28, 'OPPO A55', 'RAM 4GB, ROM 64GB', 10, 2500000, '244491_lpkgco.png', 'disetujui', 7, 'Baru', 193),
(29, 'Realme 9i', 'Snapdragon 680, RAM 6GB, ROM 128GB', 10, 2800000, '97565_L_1.jpg', 'disetujui', 9, 'Baru', 190),
(30, 'Acer Aspire 3 Slim A315', 'Celeron N5100, 4GB, 256GB SSD, Win 11 Home', 12, 4750000, 'Acer-Aspire-3-Slim-A314-22-R430-1.jpg', 'disetujui', 12, 'Baru', 1700),
(31, 'Acer Chromebook Spin 713', 'Intel Core i5-1135G7, 256GB PCIe SSD, 8Gb Ram.', 12, 5000000, 'ACER-CHROMEBOOK-CP713-1.jpg', 'disetujui', 1, 'Baru', 1300),
(32, 'Mouse Wireless ROBOT M205', 'Sensor optik 1600 DPI, tetap efektif hingga jangkauan 10 meter', 1, 40000, 'mouse11.jpg', 'disetujui', 28, 'Baru', 45),
(33, 'Keyboard Redragon KUMARA K552 RGB', 'High quality mechanical switches, 87 keys', 1, 350000, 'ke1.jpg', 'disetujui', 9, 'Baru', 600),
(37, 'Laptop CAS', '1212212', 1, 1212212, 'home.png', 'belum disetujui', 12, 'baru', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_detail_penjualan`
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
-- Dumping data untuk tabel `tabel_detail_penjualan`
--

INSERT INTO `tabel_detail_penjualan` (`id_detail_pemesanan`, `id_pemesanan`, `id_barang`, `harga_satuan`, `jumlah`, `sub_total`) VALUES
(99, 94, 25, 4700000, 1, 4700000),
(100, 95, 28, 2500000, 2, 5000000),
(101, 96, 30, 4750000, 1, 4750000),
(102, 96, 33, 350000, 1, 350000),
(103, 97, 32, 40000, 2, 80000);

--
-- Trigger `tabel_detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tabel_detail_penjualan` FOR EACH ROW BEGIN 
	UPDATE tabel_barang
    SET stok_barang = stok_barang-NEW.jumlah
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_hero`
--

CREATE TABLE `tabel_hero` (
  `id_hero` int(11) NOT NULL,
  `gambar_hero` varchar(125) NOT NULL,
  `judul_hero` varchar(50) NOT NULL,
  `teks_hero` varchar(255) NOT NULL,
  `status_hero` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_hero`
--

INSERT INTO `tabel_hero` (`id_hero`, `gambar_hero`, `judul_hero`, `teks_hero`, `status_hero`) VALUES
(2, 'hero1.jpg', 'Selamat Datang di Arkatama Store', 'Arkatama Store Menghadirkan Banyak Produk/Layanan Terbaik Untuk Kebutuhan Anda.', 'belum disetujui'),
(3, 'hero2.png', 'Team Profesional Dibidangnya', 'Pengembangan Aplikasi dan Software Custom Sesuai Kebutuhan Pengguna', 'disetujui'),
(4, 'hero3.png', 'Raih Kemudahan Bisnis Anda', 'AMD Academy Merupakan Produk Layanan Arkatama Kepada Para Mitra Dalam Bidang Digital Marketing dan IT Training Center', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komputer &amp; Aksesoris'),
(10, 'Handphone '),
(12, 'Laptop'),
(14, 'Kamera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keranjang`
--

CREATE TABLE `tabel_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_pemesanan` int(11) NOT NULL,
  `no_order` varchar(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `jenis_ongkir` varchar(50) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `no_resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id_pemesanan`, `no_order`, `id_user`, `tgl_pemesanan`, `biaya_kirim`, `total_bayar`, `status`, `no_telp`, `alamat`, `kota`, `provinsi`, `kurir`, `jenis_ongkir`, `bukti_transfer`, `atas_nama`, `nama_bank`, `no_rekening`, `no_resi`) VALUES
(94, '178199', 21, '2023-02-14', 51000, 4751000, 'Order', '081379886085', 'Jl merak 4A no.192', 'Lampung Utara', 'Lampung', 'jne', 'OKE Ongkos Kirim Ekonomis', '', '', '', '', ''),
(95, '119962', 21, '2023-02-14', 36000, 5036000, 'Ditolak', '081379886085', 'Jl merak 4A no.192', 'Bandar Lampung', 'Lampung', 'pos', 'Pos Reguler Pos Reguler', '1676353282-buktibayar.jpeg', 'Andre Agung', 'BRI', '222323', ''),
(96, '428562', 21, '2023-02-14', 102000, 5202000, 'Diterima', '081379886085', 'Jl merak 4A no.192', 'Lampung Utara', 'Lampung', 'jne', 'OKE Ongkos Kirim Ekonomis', '1676353236-buktibayar.jpeg', 'Andre Agung', 'BRI', '5221843029248031', '88721232122'),
(97, '305562', 21, '2023-02-17', 46000, 126000, 'Diterima', '08199910999', 'Jl Duren, No 32. Kec. Tanjung Aman', 'Metro', 'Lampung', 'jne', 'OKE Ongkos Kirim Ekonomis', '1676610207-buktibayar.jpeg', 'Andre Agung', 'BRI', '144412112134323', '1212313');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_role`
--

CREATE TABLE `tabel_role` (
  `role_id` int(2) NOT NULL,
  `nama_role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_role`
--

INSERT INTO `tabel_role` (`role_id`, `nama_role`) VALUES
(1, 'Manager'),
(2, 'Admin/Staff Penjualan'),
(3, 'Customers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_testimoni`
--

CREATE TABLE `tabel_testimoni` (
  `id_testi` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_testimoni`
--

INSERT INTO `tabel_testimoni` (`id_testi`, `komentar`, `id_user`) VALUES
(20, 'Bagus', 21),
(21, 'Terima Kasih..', 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `email`, `password`, `role_id`) VALUES
(1, 'Manager Arkatama', 'manager@gmail.com', '$2y$10$07y3OI4BkuzwzOsbuMID7Op8L40g1xijGL7xKT5E3mdJbCIbySFpi', 1),
(2, 'Admin Arkatama', 'admin@gmail.com', '$2y$10$NTy8jMHNeotJWBdPl/z85uKtYUppjML5QEkAUhBTot7VQsgNR23VW', 2),
(9, 'Vivi Shantika', 'vivi@gmail.com', '$2y$10$RFCRJSIgHxHXEyWRrTADJu/ddG4SjVXsSXxjxSHRNGx0CEDnvGoKC', 3),
(10, 'Nana Shinta', 'nana@gmail.com', '$2y$10$KAfqMkRf5zpbCrop.hD9FO0BKAR5b1BYTbqudHkYy/ws4ACOOAWUm', 3),
(18, 'halland', 'hell@gmail.com', '$2y$10$vXsYVGEfoyxUCUClxVJS0e1aIlbXrJhfqNYm5KiEMRJnwXbX75avO', 1),
(19, 'Arkatama Store 2', 'arkatama@gmail.com', '$2y$10$C2V5Sflzf404ng4LYsTgcedWkqz8PkfSJcYbyzvzHh76Bu9ZtGUcu', 2),
(20, 'Hani', 'hani@gmail.com', '$2y$10$J3/oEO9uuphpzFv4PE4Meug2V3MwcKRSncs0T/X24bOYPaQE7WqYS', 3),
(21, 'Andre Agung', 'andre@gmail.com', '$2y$10$GttOtX4Zx7RjPgjEAGNoaeLA76q89ebJsKHtbSjVpUkqO16L1sZ7K', 3),
(22, 'Budi', 'budi@gmail.com', '$2y$10$opVPvu59iOier4WW6rdxV.4e/ZHvXn4H0EYpJZXdau6kRsvkmJZD2', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  ADD PRIMARY KEY (`id_detail_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `tabel_detail_penjualan_ibfk_3` (`id_barang`);

--
-- Indeks untuk tabel `tabel_hero`
--
ALTER TABLE `tabel_hero`
  ADD PRIMARY KEY (`id_hero`);

--
-- Indeks untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `tabel_penjualan_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tabel_role`
--
ALTER TABLE `tabel_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  ADD PRIMARY KEY (`id_testi`),
  ADD KEY `tabel_testimoni_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `tabel_hero`
--
ALTER TABLE `tabel_hero`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `tabel_role`
--
ALTER TABLE `tabel_role`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD CONSTRAINT `tabel_barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tabel_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_detail_penjualan`
--
ALTER TABLE `tabel_detail_penjualan`
  ADD CONSTRAINT `tabel_detail_penjualan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `tabel_penjualan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_detail_penjualan_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD CONSTRAINT `tabel_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`),
  ADD CONSTRAINT `tabel_keranjang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD CONSTRAINT `tabel_penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_testimoni`
--
ALTER TABLE `tabel_testimoni`
  ADD CONSTRAINT `tabel_testimoni_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_penjualan` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD CONSTRAINT `tabel_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tabel_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
