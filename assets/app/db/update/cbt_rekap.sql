-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2021 pada 13.34
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
-- Database: `garuda_cbt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_rekap`
--

CREATE TABLE `cbt_rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `tp` varchar(20) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `smt` varchar(20) NOT NULL,
  `id_jadwal` varchar(250) NOT NULL,
  `id_jenis` varchar(250) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `id_bank` varchar(250) NOT NULL,
  `bank_kelas` mediumtext NOT NULL,
  `bank_kode` varchar(20) NOT NULL,
  `bank_level` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `tgl_mulai` varchar(22) NOT NULL,
  `tgl_selesai` varchar(22) NOT NULL,
  `tampil_pg` int(3) NOT NULL,
  `jawaban_pg` longtext NOT NULL,
  `tampil_esai` int(3) NOT NULL,
  `jawaban_esai` longtext NOT NULL,
  `bobot_pg` int(3) NOT NULL,
  `bobot_esai` int(3) NOT NULL,
  `id_guru` varchar(250) NOT NULL,
  `nama_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
