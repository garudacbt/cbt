-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2021 pada 15.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garuda_mi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_admin_setting`
--

CREATE TABLE `rapor_admin_setting` (
  `id_setting` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `kkm_tunggal` int(1) NOT NULL DEFAULT 0,
  `kkm` int(3) DEFAULT NULL,
  `bobot_ph` int(3) DEFAULT NULL,
  `bobot_pts` int(3) DEFAULT NULL,
  `bobot_pas` int(3) DEFAULT NULL,
  `bobot_absen` int(3) DEFAULT NULL,
  `tgl_rapor_akhir` text NOT NULL DEFAULT 'tanggal rapor',
  `tgl_rapor_pts` text NOT NULL DEFAULT 'tanggal rapor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rapor_admin_setting`
--

INSERT INTO `rapor_admin_setting` (`id_setting`, `id_tp`, `id_smt`, `kkm_tunggal`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `tgl_rapor_akhir`, `tgl_rapor_pts`) VALUES
(1, 0, 0, 1, 70, 40, 30, 30, NULL, '19 Jan 2021', '22 Jan 2021');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
