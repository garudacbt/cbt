-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2021 pada 20.59
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
-- Database: `main_garuda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_tugas`
--

CREATE TABLE `kelas_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT 1,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `kode_tugas` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tugas_kelas` text NOT NULL,
  `id_mapel` int(11) NOT NULL DEFAULT 0,
  `kode_mapel` varchar(300) DEFAULT NULL,
  `judul_tugas` text NOT NULL,
  `isi_tugas` longtext NOT NULL,
  `file` longtext DEFAULT NULL,
  `link_file` varchar(255) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeks untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
