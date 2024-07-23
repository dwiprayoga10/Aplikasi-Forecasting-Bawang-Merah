-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2024 pada 07.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataset`
--

CREATE TABLE `dataset` (
  `dataactual_id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `luas_panen` decimal(10,2) NOT NULL,
  `produksi` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dataset`
--

INSERT INTO `dataset` (`dataactual_id`, `tahun`, `kecamatan`, `luas_panen`, `produksi`) VALUES
(1, 2020, 'Warungpring', 126351.00, 247847.00),
(2, 2020, 'Banjarharjo', 120.50, 2500.75),
(3, 2020, 'Bantarkawung', 110.20, 2300.60),
(4, 2020, 'Brebes', 95.30, 2100.45),
(5, 2020, 'Bulakamba', 130.70, 2700.90),
(6, 2020, 'Bumiayu', 115.80, 2400.30),
(7, 2020, 'Jatibarang', 98.40, 2000.55),
(8, 2020, 'Kersana', 105.10, 2200.70),
(9, 2020, 'Ketanggungan', 125.60, 2600.85),
(10, 2020, 'Larangan', 100.90, 2050.40),
(11, 2020, 'Losari', 112.30, 2350.65),
(12, 2020, 'Paguyangan', 107.70, 2250.50),
(13, 2020, 'Salem', 119.60, 2450.80),
(14, 2020, 'Sirampog', 102.50, 2100.95),
(15, 2020, 'Songgom', 108.90, 2200.60),
(16, 2020, 'Tanjung', 113.40, 2300.75),
(17, 2020, 'Tonjong', 97.20, 2000.20),
(18, 2020, 'Wanasari', 121.80, 2500.45),
(19, 2021, 'Banjarharjo', 120.50, 2500.75),
(20, 2021, 'Bantarkawung', 110.20, 2300.60),
(21, 2021, 'Brebes', 95.30, 2100.45),
(22, 2021, 'Bulakamba', 130.70, 2700.90),
(23, 2021, 'Bumiayu', 115.80, 2400.30),
(24, 2021, 'Jatibarang', 98.40, 2000.55),
(25, 2021, 'Kersana', 105.10, 2200.70),
(26, 2021, 'Ketanggungan', 125.60, 2600.85),
(27, 2021, 'Larangan', 100.90, 2050.40),
(28, 2021, 'Losari', 112.30, 2350.65),
(29, 2021, 'Paguyangan', 107.70, 2250.50),
(30, 2021, 'Salem', 119.60, 2450.80),
(31, 2021, 'Sirampog', 102.50, 2100.95),
(32, 2021, 'Songgom', 108.90, 2200.60),
(33, 2021, 'Tanjung', 113.40, 2300.75),
(34, 2021, 'Tonjong', 97.20, 2000.20),
(35, 2021, 'Wanasari', 121.80, 2500.45),
(36, 2022, 'Banjarharjo', 120.50, 2500.75),
(37, 2022, 'Bantarkawung', 110.20, 2300.60),
(38, 2022, 'Brebes', 95.30, 2100.45),
(39, 2022, 'Bulakamba', 130.70, 2700.90),
(40, 2022, 'Bumiayu', 115.80, 2400.30),
(41, 2022, 'Jatibarang', 98.40, 2000.55),
(42, 2022, 'Kersana', 105.10, 2200.70),
(43, 2022, 'Ketanggungan', 125.60, 2600.85),
(44, 2022, 'Larangan', 100.90, 2050.40),
(45, 2022, 'Losari', 112.30, 2350.65),
(46, 2022, 'Paguyangan', 107.70, 2250.50),
(47, 2022, 'Salem', 119.60, 2450.80),
(48, 2022, 'Sirampog', 102.50, 2100.95),
(49, 2022, 'Songgom', 108.90, 2200.60),
(50, 2022, 'Tanjung', 113.40, 2300.75),
(51, 2022, 'Tonjong', 97.20, 2000.20),
(52, 2022, 'Wanasari', 121.80, 2500.45),
(53, 2023, 'Banjarharjo', 120.50, 2500.75),
(54, 2023, 'Bantarkawung', 110.20, 2300.60),
(55, 2023, 'Brebes', 95.30, 2100.45),
(56, 2023, 'Bulakamba', 130.70, 2700.90),
(57, 2023, 'Bumiayu', 115.80, 2400.30),
(58, 2023, 'Jatibarang', 98.40, 2000.55),
(59, 2023, 'Kersana', 105.10, 2200.70),
(60, 2023, 'Ketanggungan', 125.60, 2600.85),
(61, 2023, 'Larangan', 100.90, 2050.40),
(62, 2023, 'Losari', 112.30, 2350.65),
(63, 2023, 'Paguyangan', 107.70, 2250.50),
(64, 2023, 'Salem', 119.60, 2450.80),
(65, 2023, 'Sirampog', 102.50, 2100.95),
(66, 2023, 'Songgom', 108.90, 2200.60),
(67, 2023, 'Tanjung', 113.40, 2300.75),
(68, 2023, 'Tonjong', 97.20, 2000.20),
(69, 2023, 'Wanasari', 121.80, 2500.45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kec_id` int(11) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `kode_kecamatan` varchar(15) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`kec_id`, `nama_kecamatan`, `kode_kecamatan`, `description`, `created`, `updated`) VALUES
(6, 'Banjarharjo', '52265', 'Kecamatan di bagian utara Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(7, 'Bantarkawung', '52274', 'Kecamatan di bagian barat daya Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(8, 'Brebes', '52212', 'Kecamatan pusat pemerintahan Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(9, 'Bulakamba', '52253', 'Kecamatan di bagian timur laut Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(10, 'Bumiayu', '52273', 'Kecamatan di bagian selatan Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(11, 'Jatibarang', '52261', 'Kecamatan di bagian timur Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(12, 'Kersana', '52264', 'Kecamatan di bagian barat laut Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(13, 'Ketanggungan', '52263', 'Kecamatan di bagian barat Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(14, 'Larangan', '52262', 'Kecamatan di bagian tengah Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(15, 'Losari', '52255', 'Kecamatan di bagian timur Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(16, 'Paguyangan', '52276', 'Kecamatan di bagian selatan Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(17, 'Salem', '52275', 'Kecamatan di bagian tenggara Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(18, 'Sirampog', '52272', 'Kecamatan di bagian selatan Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(19, 'Songgom', '52266', 'Kecamatan di bagian utara Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(20, 'Tanjung', '52254', 'Kecamatan di bagian timur laut Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(21, 'Tonjong', '52271', 'Kecamatan di bagian selatan Kabupaten Brebes', '2024-07-03 11:55:30', NULL),
(22, 'Wanasari', '52256', 'Kecamatan di bagian utara Kabupaten Brebes', '2024-07-03 11:55:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Mohammad Nur Fawaiq', 'Pati', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Steven', 'Jakarta', 2),
(7, 'tukijo', '340a39682c12f1d7e1634686e5315eefa7f22c59', 'Tukijo Jos', 'Pati', 2),
(8, 'tukiyem2', '474da69c3c12f61cdc9932a134f971d1c2496b92', 'Tukiyem Yes', 'Purwodadi', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`dataactual_id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kec_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataset`
--
ALTER TABLE `dataset`
  MODIFY `dataactual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
