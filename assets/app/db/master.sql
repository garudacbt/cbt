-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2021 pada 13.59
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
-- Struktur dari tabel `bulan`
--

DROP TABLE IF EXISTS `bulan`;
CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL,
  `nama_bln` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_bank_soal`
--

DROP TABLE IF EXISTS `cbt_bank_soal`;
CREATE TABLE `cbt_bank_soal` (
  `id_bank` int(11) NOT NULL,
  `bank_jenis_id` int(11) NOT NULL DEFAULT 0,
  `bank_kode` varchar(255) NOT NULL DEFAULT '0',
  `bank_level` varchar(225) NOT NULL,
  `bank_kelas` varchar(255) NOT NULL,
  `bank_mapel_id` int(11) NOT NULL,
  `bank_jurusan_id` int(11) NOT NULL DEFAULT 0,
  `bank_guru_id` int(11) NOT NULL,
  `bank_nama` varchar(250) NOT NULL,
  `kkm` int(3) DEFAULT 0,
  `jml_soal` int(5) NOT NULL DEFAULT 0,
  `jml_esai` int(5) NOT NULL DEFAULT 0,
  `tampil_pg` int(5) NOT NULL DEFAULT 0,
  `tampil_esai` int(5) NOT NULL DEFAULT 0,
  `bobot_pg` int(5) NOT NULL DEFAULT 0,
  `bobot_esai` int(5) NOT NULL DEFAULT 0,
  `opsi` int(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `soal_agama` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_durasi_siswa`
--

DROP TABLE IF EXISTS `cbt_durasi_siswa`;
CREATE TABLE `cbt_durasi_siswa` (
  `id_durasi` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` int(10) NOT NULL,
  `mulai` varchar(22) DEFAULT NULL,
  `selesai` varchar(22) DEFAULT NULL,
  `reset` int(1) NOT NULL DEFAULT 0 COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_jadwal`
--

DROP TABLE IF EXISTS `cbt_jadwal`;
CREATE TABLE `cbt_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `durasi_ujian` int(5) NOT NULL,
  `pengawas` longtext DEFAULT NULL,
  `acak_soal` int(1) NOT NULL,
  `acak_opsi` int(1) NOT NULL,
  `hasil_tampil` int(1) NOT NULL,
  `token` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `ulang` int(1) NOT NULL,
  `reset_login` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_jawaban`
--

DROP TABLE IF EXISTS `cbt_jawaban`;
CREATE TABLE `cbt_jawaban` (
  `id_jawaban` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `jawaban_benar` longtext NOT NULL,
  `koreksi` int(1) NOT NULL COMMENT '0 = belum dikoreksi, else point essai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_jenis`
--

DROP TABLE IF EXISTS `cbt_jenis`;
CREATE TABLE `cbt_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_kelas_ruang`
--

DROP TABLE IF EXISTS `cbt_kelas_ruang`;
CREATE TABLE `cbt_kelas_ruang` (
  `id_kelas_ruang` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL DEFAULT 0,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `set_siswa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_kop_absensi`
--

DROP TABLE IF EXISTS `cbt_kop_absensi`;
CREATE TABLE `cbt_kop_absensi` (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  `proktor` varchar(100) DEFAULT NULL,
  `pengawas_1` varchar(100) DEFAULT NULL,
  `pengawas_2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_kop_absensi`
--

INSERT INTO `cbt_kop_absensi` VALUES
(123456, 'MADRASAH TSANAWIYAH AL HASAN', 'DAFTAR KEHADIRAN', 'PENILAIAN TENGAH SEMESTER', 'TP: 2020/2021 SMT:II', 'Nama Proktor', ' Pengawas 1', ' Pengawas 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_kop_berita`
--

DROP TABLE IF EXISTS `cbt_kop_berita`;
CREATE TABLE `cbt_kop_berita` (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_kop_berita`
--

INSERT INTO `cbt_kop_berita` VALUES
(123456, 'MADRASAH TSANAWIYAH AL HASAN', 'BERITA ACARA PELAKSANAAN', 'PENILAIAN AKHIR SEMESTER (P A T)', 'Tahun Pelajaran: 2020/2021 Semester: I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_kop_kartu`
--

DROP TABLE IF EXISTS `cbt_kop_kartu`;
CREATE TABLE `cbt_kop_kartu` (
  `id_set_kartu` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  `tanggal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_kop_kartu`
--

INSERT INTO `cbt_kop_kartu` VALUES
(123456, 'MADRASAH TSANAWIYAH', 'KARTU PESERTA', 'PENILAIAN AKHIR SEMESTER (P A T)', 'Tahun Pelajaran: 2020/2021 Semester: I', '20 Des 2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_nilai`
--

DROP TABLE IF EXISTS `cbt_nilai`;
CREATE TABLE `cbt_nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `pg_benar` int(3) NOT NULL,
  `pg_nilai` int(2) NOT NULL,
  `essai_nilai` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_nomor_peserta`
--

DROP TABLE IF EXISTS `cbt_nomor_peserta`;
CREATE TABLE `cbt_nomor_peserta` (
  `id_nomor` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `nomor_peserta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_pengawas`
--

DROP TABLE IF EXISTS `cbt_pengawas`;
CREATE TABLE `cbt_pengawas` (
  `id_pengawas` int(11) NOT NULL,
  `id_jadwal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_rekap`
--

DROP TABLE IF EXISTS `cbt_rekap`;
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_rekap_nilai`
--

DROP TABLE IF EXISTS `cbt_rekap_nilai`;
CREATE TABLE `cbt_rekap_nilai` (
  `id_rekap_nilai` int(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `tp` varchar(20) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `smt` varchar(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `mulai` varchar(20) NOT NULL,
  `selesai` varchar(20) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `bobot_pg` int(11) NOT NULL,
  `jawaban_pg` longtext NOT NULL,
  `nilai_pg` varchar(10) NOT NULL,
  `bobot_esai` int(11) NOT NULL,
  `jawaban_esai` longtext NOT NULL,
  `nilai_esai` varchar(10) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_ruang`
--

DROP TABLE IF EXISTS `cbt_ruang`;
CREATE TABLE `cbt_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_ruang`
--

INSERT INTO `cbt_ruang` VALUES
(1, 'Kel 1', 'LAB-KOM-K1'),
(2, 'Kel 2', 'LAB-KOM-K2'),
(3, 'Kel 3', 'LAB-KOM-K3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_sesi`
--

DROP TABLE IF EXISTS `cbt_sesi`;
CREATE TABLE `cbt_sesi` (
  `id_sesi` int(11) NOT NULL,
  `nama_sesi` varchar(50) NOT NULL,
  `kode_sesi` varchar(10) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_sesi`
--

INSERT INTO `cbt_sesi` VALUES
(1, 'Sesi 1', 'S1', '07:00:00', '10:00:00', 1),
(2, 'Sesi 2', 'S2', '08:00:00', '22:30:00', 1),
(3, 'Sesi 3', 'S3', '08:00:00', '22:30:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_sesi_siswa`
--

DROP TABLE IF EXISTS `cbt_sesi_siswa`;
CREATE TABLE `cbt_sesi_siswa` (
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `smt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_soal`
--

DROP TABLE IF EXISTS `cbt_soal`;
CREATE TABLE `cbt_soal` (
  `id_soal` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL DEFAULT 0,
  `jenis` int(2) NOT NULL,
  `nomor_soal` int(11) NOT NULL DEFAULT 0,
  `file` varchar(255) DEFAULT NULL,
  `file1` mediumtext DEFAULT NULL,
  `tipe_file` varchar(50) DEFAULT NULL,
  `soal` longtext DEFAULT NULL,
  `opsi_a` longtext DEFAULT NULL,
  `opsi_b` longtext DEFAULT NULL,
  `opsi_c` longtext DEFAULT NULL,
  `opsi_d` longtext DEFAULT NULL,
  `opsi_e` longtext DEFAULT NULL,
  `file_a` varchar(255) DEFAULT NULL,
  `file_b` varchar(255) DEFAULT NULL,
  `file_c` varchar(255) DEFAULT NULL,
  `file_d` varchar(255) DEFAULT NULL,
  `file_e` varchar(255) DEFAULT NULL,
  `jawaban` varchar(5) DEFAULT NULL,
  `created_on` int(11) DEFAULT NULL,
  `updated_on` int(11) DEFAULT NULL,
  `tampilkan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_soal_siswa`
--

DROP TABLE IF EXISTS `cbt_soal_siswa`;
CREATE TABLE `cbt_soal_siswa` (
  `id_soal_siswa` varchar(50) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_soal` int(11) DEFAULT NULL,
  `id_siswa` int(11) NOT NULL,
  `jenis_soal` int(1) NOT NULL,
  `no_soal_alias` int(4) NOT NULL,
  `opsi_alias_a` varchar(1) DEFAULT NULL,
  `opsi_alias_b` varchar(1) DEFAULT NULL,
  `opsi_alias_c` varchar(1) DEFAULT NULL,
  `opsi_alias_d` varchar(1) DEFAULT NULL,
  `opsi_alias_e` varchar(1) DEFAULT NULL,
  `jawaban_alias` longtext DEFAULT NULL,
  `jawaban_siswa` longtext DEFAULT NULL,
  `jawaban_benar` longtext DEFAULT NULL,
  `point_essai` int(3) DEFAULT 0,
  `soal_end` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cbt_token`
--

DROP TABLE IF EXISTS `cbt_token`;
CREATE TABLE `cbt_token` (
  `token` varchar(6) NOT NULL,
  `auto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cbt_token`
--

INSERT INTO `cbt_token` VALUES
('BDEFLU', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` VALUES
(1, 'admin', 'Administrator'),
(2, 'guru', 'Pembuat Soal dan ujian'),
(3, 'siswa', 'Peserta Ujian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

DROP TABLE IF EXISTS `hari`;
CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL,
  `nama_hri` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_guru`
--

DROP TABLE IF EXISTS `jabatan_guru`;
CREATE TABLE `jabatan_guru` (
  `id_jabatan_guru` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `mapel_kelas` longtext DEFAULT NULL,
  `ekstra_kelas` longtext DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_catatan_mapel`
--

DROP TABLE IF EXISTS `kelas_catatan_mapel`;
CREATE TABLE `kelas_catatan_mapel` (
  `id_catatan` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_guru` int(11) NOT NULL,
  `level` varchar(1) NOT NULL DEFAULT '0',
  `tgl` date NOT NULL,
  `text` text NOT NULL,
  `readed` varchar(22) NOT NULL DEFAULT '0',
  `reading` longtext DEFAULT NULL COMMENT 'array id_siswa yang membaca',
  `jml` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_catatan_wali`
--

DROP TABLE IF EXISTS `kelas_catatan_wali`;
CREATE TABLE `kelas_catatan_wali` (
  `id_catatan` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=semua siswa, 2=per siswa',
  `level` varchar(1) NOT NULL COMMENT '1=saran, 2=teguran, 3=peringatan, 4=sangsi',
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `readed` varchar(22) NOT NULL DEFAULT '0',
  `reading` longtext DEFAULT NULL,
  `jml` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_ekstra`
--

DROP TABLE IF EXISTS `kelas_ekstra`;
CREATE TABLE `kelas_ekstra` (
  `id_kelas_ekstra` varchar(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `ekstra` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_jadwal_kbm`
--

DROP TABLE IF EXISTS `kelas_jadwal_kbm`;
CREATE TABLE `kelas_jadwal_kbm` (
  `id_kbm` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kbm_jam_pel` int(11) NOT NULL,
  `kbm_jam_mulai` varchar(5) NOT NULL,
  `kbm_jml_mapel_hari` int(11) NOT NULL,
  `istirahat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_jadwal_mapel`
--

DROP TABLE IF EXISTS `kelas_jadwal_mapel`;
CREATE TABLE `kelas_jadwal_mapel` (
  `id_jadwal` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_jadwal_materi`
--

DROP TABLE IF EXISTS `kelas_jadwal_materi`;
CREATE TABLE `kelas_jadwal_materi` (
  `id_kjm` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jadwal_materi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_jadwal_tugas`
--

DROP TABLE IF EXISTS `kelas_jadwal_tugas`;
CREATE TABLE `kelas_jadwal_tugas` (
  `id_kjt` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jadwal_tugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_materi`
--

DROP TABLE IF EXISTS `kelas_materi`;
CREATE TABLE `kelas_materi` (
  `id_materi` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT 1,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `kode_materi` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `materi_kelas` text NOT NULL,
  `id_mapel` int(11) NOT NULL DEFAULT 0,
  `kode_mapel` varchar(300) DEFAULT NULL,
  `judul_materi` text NOT NULL,
  `isi_materi` longtext NOT NULL,
  `file` longtext DEFAULT NULL,
  `link_file` varchar(255) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_struktur`
--

DROP TABLE IF EXISTS `kelas_struktur`;
CREATE TABLE `kelas_struktur` (
  `id_kelas` int(11) NOT NULL,
  `ketua` int(11) NOT NULL,
  `wakil_ketua` int(11) NOT NULL,
  `sekretaris_1` int(11) NOT NULL,
  `sekretaris_2` int(11) NOT NULL,
  `bendahara_1` int(11) NOT NULL,
  `bendahara_2` int(11) NOT NULL,
  `sie_ekstrakurikuler` int(11) NOT NULL,
  `sie_upacara` int(11) NOT NULL,
  `sie_olahraga` int(11) NOT NULL,
  `sie_keagamaan` int(11) NOT NULL,
  `sie_keamanan` int(11) NOT NULL,
  `sie_ketertiban` int(11) NOT NULL,
  `sie_kebersihan` int(11) NOT NULL,
  `sie_keindahan` int(11) NOT NULL,
  `sie_kesehatan` int(11) NOT NULL,
  `sie_kekeluargaan` int(11) NOT NULL,
  `sie_humas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_tugas`
--

DROP TABLE IF EXISTS `kelas_tugas`;
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_guru`
--

DROP TABLE IF EXISTS `level_guru`;
CREATE TABLE `level_guru` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `level_guru`
--

INSERT INTO `level_guru` VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Bimbingan Konseling'),
(4, 'Walikelas'),
(5, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_kelas`
--

DROP TABLE IF EXISTS `level_kelas`;
CREATE TABLE `level_kelas` (
  `id_level` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `level_kelas`
--

INSERT INTO `level_kelas` VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_group` text NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_materi`
--

DROP TABLE IF EXISTS `log_materi`;
CREATE TABLE `log_materi` (
  `id_log` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `text` longtext DEFAULT NULL,
  `file` mediumtext DEFAULT NULL,
  `nilai` varchar(3) DEFAULT NULL,
  `catatan` mediumtext DEFAULT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_tugas`
--

DROP TABLE IF EXISTS `log_tugas`;
CREATE TABLE `log_tugas` (
  `id_log` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `text` longtext DEFAULT NULL,
  `file` text DEFAULT NULL,
  `nilai` varchar(3) DEFAULT NULL,
  `catatan` mediumtext DEFAULT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_ujian`
--

DROP TABLE IF EXISTS `log_ujian`;
CREATE TABLE `log_ujian` (
  `id_log` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_ekstra`
--

DROP TABLE IF EXISTS `master_ekstra`;
CREATE TABLE `master_ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(100) NOT NULL,
  `kode_ekstra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_ekstra`
--

INSERT INTO `master_ekstra` VALUES
(5, 'Pramuka', 'PRAM'),
(6, 'Baca Tulis Al Quran', 'BTQ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_guru`
--

DROP TABLE IF EXISTS `master_guru`;
CREATE TABLE `master_guru` (
  `id_guru` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nip` char(17) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `kode_guru` varchar(6) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `no_ktp` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_jalan` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `rt_rw` varchar(8) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `dusun` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kelurahan` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kabupaten` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `provinsi` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kode_pos` int(6) DEFAULT NULL,
  `kewarganegaraan` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nuptk` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `jenis_ptk` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgs_tambahan` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `status_pegawai` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `status_aktif` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `status_nikah` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `keahlian_isyarat` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `npwp` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `foto` longtext CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_guru`
--

INSERT INTO `master_guru` VALUES
(1, 0, '123456', 'Saya', NULL, NULL, 'guru1', 'guru123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_hari_efektif`
--

DROP TABLE IF EXISTS `master_hari_efektif`;
CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int(11) NOT NULL,
  `jml_hari_efektif` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jurusan`
--

DROP TABLE IF EXISTS `master_jurusan`;
CREATE TABLE `master_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deletable` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_jurusan`
--

INSERT INTO `master_jurusan` VALUES
(0, 'NON JURUSAN', 'NON', 1, 0),
(1, 'IPA', 'IPA', 1, 0),
(2, 'IPS', 'IPS', 1, 0),
(3, 'BAHASA', 'BAHASA', 1, 0),
(77, 'KEAGAMAAN', 'AGAMA', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kelas`
--

DROP TABLE IF EXISTS `master_kelas`;
CREATE TABLE `master_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kode_kelas` varchar(20) DEFAULT NULL,
  `jurusan_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jumlah_siswa` longtext DEFAULT NULL,
  `set_siswa` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_mapel`
--

DROP TABLE IF EXISTS `master_mapel`;
CREATE TABLE `master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `kelompok` varchar(5) NOT NULL DEFAULT '-',
  `bobot_p` int(11) NOT NULL DEFAULT 0,
  `bobot_k` int(11) NOT NULL DEFAULT 0,
  `jenjang` int(1) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL,
  `urutan_tampil` int(3) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `deletable` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_mapel`
--

INSERT INTO `master_mapel` VALUES
(1, 'Al Quran-Hadis', 'QH', 'A', 0, 0, 1, 1, 1, 0, 0),
(2, 'Fiqih', 'FQH', 'A', 0, 0, 1, 1, 2, 0, 0),
(3, 'Akidah Akhlak', 'AA', 'A', 0, 0, 1, 1, 3, 0, 0),
(4, 'Sejarah Kebudayaan Islam', 'SKI', 'A', 0, 0, 1, 1, 4, 0, 0),
(5, 'Bahasa Arab', 'BAR', 'A', 0, 0, 1, 2, 5, 0, 0),
(6, 'Bahasa Indonesia', 'BIND', 'A', 0, 0, 1, 2, 6, 1, 0),
(7, 'Bahasa Inggris', 'BING', 'A', 0, 0, 1, 2, 7, 0, 0),
(8, 'Matematika', 'MTK', 'A', 0, 0, 1, 2, 8, 1, 0),
(9, 'Ilmu Pengetahuan Alam', 'IPA', 'A', 0, 0, 1, 2, 9, 1, 0),
(10, 'Ilmu Pengetahuan Sosial', 'IPS', 'A', 0, 0, 1, 2, 10, 1, 0),
(11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKn', 'A', 0, 0, 1, 2, 11, 1, 0),
(12, 'Pendidikan Jasmani Olah Raga dan Kesehatan', 'PJOK', 'B', 0, 0, 1, 3, 12, 1, 0),
(13, 'Seni Budaya', 'SB', 'B', 0, 0, 2, 3, 13, 1, 0),
(14, 'Prakarya', 'PRA', 'B', 0, 0, 2, 3, 14, 1, 0),
(15, 'SBdP', 'SBDP', 'B', 0, 0, 0, 3, 13, 1, 0),
(16, 'Akhlak', 'AK', 'C', 0, 0, 3, 0, 16, 1, 0),
(17, 'Antropologi', 'ANT', 'C', 0, 0, 3, 0, 17, 1, 0),
(18, 'Bahasa Arab', 'BAR', 'C', 0, 0, 3, 0, 18, 1, 0),
(19, 'Bahasa dan Sastra Asing Lainnya', 'BSAL', 'C', 0, 0, 3, 0, 19, 1, 0),
(20, 'Bahasa dan Sastra Indonesia', 'BSIN', 'C', 0, 0, 3, 0, 20, 1, 0),
(21, 'Bahasa dan Sastra Inggris', 'BSING', 'C', 0, 0, 3, 0, 21, 1, 0),
(22, 'Bahasa Jepang', 'JPN', 'C', 0, 0, 3, 0, 22, 1, 0),
(23, 'Bahasa Jerman', 'JRM', 'C', 0, 0, 3, 0, 23, 1, 0),
(24, 'Biologi', 'BIO', 'C', 0, 0, 3, 0, 24, 1, 0),
(25, 'Ekonomi', 'EKN', 'C', 0, 0, 3, 0, 25, 1, 0),
(26, 'Fikih', 'FQH', 'C', 0, 0, 3, 0, NULL, 1, 0),
(27, 'Fikih - Ushul Fikih', 'UFQH', 'C', 0, 0, 3, 0, NULL, 1, 0),
(28, 'Fisika', 'FIS', 'C', 0, 0, 3, 0, NULL, 1, 0),
(29, 'Geografi', 'GEO', 'C', 0, 0, 3, 0, NULL, 1, 0),
(30, 'Hadis - Ilmu Hadis', 'HA', 'C', 0, 0, 3, 0, NULL, 1, 0),
(31, 'Ilmu Kalam', 'IK', 'C', 0, 0, 3, 0, NULL, 1, 0),
(32, 'Informatika', 'INF', 'C', 0, 0, 3, 0, NULL, 1, 0),
(33, 'Keterampilan', 'KTR', 'C', 0, 0, 3, 0, NULL, 1, 0),
(34, 'Kimia', 'KIM', 'C', 0, 0, 3, 0, NULL, 1, 0),
(35, 'Prakarya dan Kewirausahaan', 'PK', 'B', 0, 0, 3, 0, NULL, 1, 0),
(36, 'Sejarah', 'SEJ', 'C', 0, 0, 3, 0, NULL, 1, 0),
(37, 'Sejarah Indonesia', 'SJI', 'A', 0, 0, 3, 0, NULL, 1, 0),
(38, 'Sosiologi', 'SOS', 'C', 0, 0, 3, 0, NULL, 1, 0),
(39, 'Tafsir - Ilmu Tafsir', 'TT', 'C', 0, 0, 3, 0, NULL, 1, 0),
(40, 'Bahasa Sunda', 'BSUND', 'MULOK', 0, 0, 1, 0, 14, 1, 1),
(41, 'Pendidikan Agama dan Budi Pekerti', 'PABP', 'A', 0, 0, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_siswa`
--

DROP TABLE IF EXISTS `master_siswa`;
CREATE TABLE `master_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nis` char(20) NOT NULL,
  `nisn` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'siswa.png',
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `status_keluarga` enum('1','2','3') NOT NULL DEFAULT '1',
  `anak_ke` int(2) DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `rt` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `rw` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kelurahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `skhun` int(11) DEFAULT NULL,
  `nama_ayah` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_ayah` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pendidikan_ayah` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_ayah` longtext DEFAULT NULL,
  `nama_ibu` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_ibu` int(15) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_ibu` longtext DEFAULT NULL,
  `nama_wali` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pendidikan_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_wali` int(15) DEFAULT NULL,
  `alamat_wali` longtext DEFAULT NULL,
  `tahun_masuk` date NOT NULL,
  `kelas_awal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_siswa`
--

INSERT INTO `master_siswa` VALUES
(1, 'treded', '123456', '12345677', NULL, 'L', 'satu', 'siswa123', '123456jpg', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_smt`
--

DROP TABLE IF EXISTS `master_smt`;
CREATE TABLE `master_smt` (
  `id_smt` int(11) NOT NULL,
  `smt` varchar(10) NOT NULL,
  `nama_smt` varchar(10) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_smt`
--

INSERT INTO `master_smt` VALUES
(1, 'Ganjil', 'I (satu)', 0),
(2, 'Genap', 'II (dua)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_tp`
--

DROP TABLE IF EXISTS `master_tp`;
CREATE TABLE `master_tp` (
  `id_tp` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_tp`
--

INSERT INTO `master_tp` VALUES
(1, '2020/2021', 1),
(2, '2021/2022', 0),
(3, '2022/2023', 0),
(4, '2023/2024', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `dari` int(11) NOT NULL COMMENT 'user',
  `dari_group` int(11) NOT NULL,
  `kepada` varchar(50) NOT NULL COMMENT 'group',
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments` (
  `id_comment` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `dari_group` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_reply`
--

DROP TABLE IF EXISTS `post_reply`;
CREATE TABLE `post_reply` (
  `id_reply` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `dari_group` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_admin_setting`
--

DROP TABLE IF EXISTS `rapor_admin_setting`;
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_catatan_wali`
--

DROP TABLE IF EXISTS `rapor_catatan_wali`;
CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` longtext DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_data_catatan`
--

DROP TABLE IF EXISTS `rapor_data_catatan`;
CREATE TABLE `rapor_data_catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int(2) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `rank` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_data_fisik`
--

DROP TABLE IF EXISTS `rapor_data_fisik`;
CREATE TABLE `rapor_data_fisik` (
  `id_fisik` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_data_sikap`
--

DROP TABLE IF EXISTS `rapor_data_sikap`;
CREATE TABLE `rapor_data_sikap` (
  `id_sikap` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int(2) NOT NULL,
  `sikap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_fisik`
--

DROP TABLE IF EXISTS `rapor_fisik`;
CREATE TABLE `rapor_fisik` (
  `id_fisik` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `kondisi` longtext NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_kikd`
--

DROP TABLE IF EXISTS `rapor_kikd`;
CREATE TABLE `rapor_kikd` (
  `id_kikd` int(11) NOT NULL,
  `id_mapel_kelas` int(11) NOT NULL,
  `aspek` int(1) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `materi_kikd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_kkm`
--

DROP TABLE IF EXISTS `rapor_kkm`;
CREATE TABLE `rapor_kkm` (
  `id_kkm` int(11) NOT NULL,
  `kkm` int(3) DEFAULT 0,
  `bobot_ph` int(3) DEFAULT 0,
  `bobot_pts` int(3) DEFAULT 0,
  `bobot_pas` int(3) DEFAULT 0,
  `bobot_absen` int(3) DEFAULT 0,
  `beban_jam` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_nilai_akhir`
--

DROP TABLE IF EXISTS `rapor_nilai_akhir`;
CREATE TABLE `rapor_nilai_akhir` (
  `id_nilai_akhir` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `akhir` int(3) DEFAULT NULL,
  `predikat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_nilai_ekstra`
--

DROP TABLE IF EXISTS `rapor_nilai_ekstra`;
CREATE TABLE `rapor_nilai_ekstra` (
  `id_nilai_ekstra` int(11) NOT NULL,
  `id_ekstra` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `predikat` varchar(1) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_nilai_harian`
--

DROP TABLE IF EXISTS `rapor_nilai_harian`;
CREATE TABLE `rapor_nilai_harian` (
  `id_nilai_harian` bigint(20) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(3) NOT NULL,
  `p1` varchar(3) DEFAULT NULL,
  `p2` varchar(3) DEFAULT NULL,
  `p3` varchar(3) DEFAULT NULL,
  `p4` varchar(3) DEFAULT NULL,
  `p5` varchar(3) DEFAULT NULL,
  `p6` varchar(3) DEFAULT NULL,
  `p7` varchar(3) DEFAULT NULL,
  `p8` varchar(3) DEFAULT NULL,
  `p_rata_rata` varchar(4) DEFAULT NULL,
  `p_predikat` enum('A','B','C','D') DEFAULT NULL,
  `p_deskripsi` longtext DEFAULT NULL,
  `k1` varchar(3) DEFAULT NULL,
  `k2` varchar(3) DEFAULT NULL,
  `k3` varchar(3) DEFAULT NULL,
  `k4` varchar(3) DEFAULT NULL,
  `k5` varchar(3) DEFAULT NULL,
  `k6` varchar(3) DEFAULT NULL,
  `k7` varchar(3) DEFAULT NULL,
  `k8` varchar(3) DEFAULT NULL,
  `k_rata_rata` varchar(4) DEFAULT NULL,
  `k_predikat` enum('A','B','C','D') DEFAULT NULL,
  `k_deskripsi` longtext DEFAULT NULL,
  `jml` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_nilai_pts`
--

DROP TABLE IF EXISTS `rapor_nilai_pts`;
CREATE TABLE `rapor_nilai_pts` (
  `id_nilai_pts` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `predikat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_nilai_sikap`
--

DROP TABLE IF EXISTS `rapor_nilai_sikap`;
CREATE TABLE `rapor_nilai_sikap` (
  `id_nilai_sikap` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) DEFAULT NULL,
  `nilai` longtext NOT NULL,
  `deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor_prestasi`
--

DROP TABLE IF EXISTS `rapor_prestasi`;
CREATE TABLE `rapor_prestasi` (
  `id_ranking` int(11) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `ranking` int(3) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `p1` varchar(100) NOT NULL,
  `p1_desk` varchar(100) NOT NULL,
  `p2` varchar(100) NOT NULL,
  `p2_desk` varchar(100) NOT NULL,
  `p3` varchar(100) NOT NULL,
  `p3_desk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `kode_sekolah` varchar(10) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `nss` varchar(20) DEFAULT NULL,
  `jenjang` int(5) DEFAULT NULL,
  `kepsek` varchar(50) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `tanda_tangan` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `web` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `logo_kanan` text DEFAULT NULL,
  `logo_kiri` text DEFAULT NULL,
  `versi` varchar(10) DEFAULT NULL,
  `ip_server` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `server` varchar(50) DEFAULT NULL,
  `id_server` varchar(50) DEFAULT NULL,
  `sekolah_id` varchar(50) DEFAULT NULL,
  `db_versi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` VALUES
(1, 1, 1),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
CREATE TABLE `users_profile` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `jabatan` text DEFAULT NULL,
  `level_access` int(11) NOT NULL DEFAULT 0,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`);

--
-- Indeks untuk tabel `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `cbt_durasi_siswa`
--
ALTER TABLE `cbt_durasi_siswa`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indeks untuk tabel `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `cbt_jawaban`
--
ALTER TABLE `cbt_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `cbt_kelas_ruang`
--
ALTER TABLE `cbt_kelas_ruang`
  ADD PRIMARY KEY (`id_kelas_ruang`);

--
-- Indeks untuk tabel `cbt_kop_absensi`
--
ALTER TABLE `cbt_kop_absensi`
  ADD PRIMARY KEY (`id_kop`);

--
-- Indeks untuk tabel `cbt_kop_berita`
--
ALTER TABLE `cbt_kop_berita`
  ADD PRIMARY KEY (`id_kop`);

--
-- Indeks untuk tabel `cbt_kop_kartu`
--
ALTER TABLE `cbt_kop_kartu`
  ADD PRIMARY KEY (`id_set_kartu`);

--
-- Indeks untuk tabel `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `cbt_nomor_peserta`
--
ALTER TABLE `cbt_nomor_peserta`
  ADD PRIMARY KEY (`id_nomor`);

--
-- Indeks untuk tabel `cbt_pengawas`
--
ALTER TABLE `cbt_pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indeks untuk tabel `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  ADD PRIMARY KEY (`id_rekap_nilai`);

--
-- Indeks untuk tabel `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `cbt_sesi_siswa`
--
ALTER TABLE `cbt_sesi_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `cbt_soal_siswa`
--
ALTER TABLE `cbt_soal_siswa`
  ADD PRIMARY KEY (`id_soal_siswa`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`);

--
-- Indeks untuk tabel `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`id_jabatan_guru`);

--
-- Indeks untuk tabel `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `kelas_ekstra`
--
ALTER TABLE `kelas_ekstra`
  ADD PRIMARY KEY (`id_kelas_ekstra`);

--
-- Indeks untuk tabel `kelas_jadwal_kbm`
--
ALTER TABLE `kelas_jadwal_kbm`
  ADD PRIMARY KEY (`id_kbm`);

--
-- Indeks untuk tabel `kelas_jadwal_mapel`
--
ALTER TABLE `kelas_jadwal_mapel`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kelas_jadwal_materi`
--
ALTER TABLE `kelas_jadwal_materi`
  ADD PRIMARY KEY (`id_kjm`);

--
-- Indeks untuk tabel `kelas_jadwal_tugas`
--
ALTER TABLE `kelas_jadwal_tugas`
  ADD PRIMARY KEY (`id_kjt`);

--
-- Indeks untuk tabel `kelas_materi`
--
ALTER TABLE `kelas_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`);

--
-- Indeks untuk tabel `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indeks untuk tabel `level_guru`
--
ALTER TABLE `level_guru`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `level_kelas`
--
ALTER TABLE `level_kelas`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_materi`
--
ALTER TABLE `log_materi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `log_tugas`
--
ALTER TABLE `log_tugas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `log_ujian`
--
ALTER TABLE `log_ujian`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `master_ekstra`
--
ALTER TABLE `master_ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indeks untuk tabel `master_guru`
--
ALTER TABLE `master_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  ADD PRIMARY KEY (`id_hari_efektif`);

--
-- Indeks untuk tabel `master_jurusan`
--
ALTER TABLE `master_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `master_mapel`
--
ALTER TABLE `master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `master_siswa`
--
ALTER TABLE `master_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `master_smt`
--
ALTER TABLE `master_smt`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indeks untuk tabel `master_tp`
--
ALTER TABLE `master_tp`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indeks untuk tabel `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `post_reply`
--
ALTER TABLE `post_reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indeks untuk tabel `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  ADD PRIMARY KEY (`id_catatan_wali`);

--
-- Indeks untuk tabel `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indeks untuk tabel `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  ADD PRIMARY KEY (`id_sikap`);

--
-- Indeks untuk tabel `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indeks untuk tabel `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  ADD PRIMARY KEY (`id_kikd`);

--
-- Indeks untuk tabel `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  ADD PRIMARY KEY (`id_kkm`);

--
-- Indeks untuk tabel `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  ADD PRIMARY KEY (`id_nilai_akhir`);

--
-- Indeks untuk tabel `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  ADD PRIMARY KEY (`id_nilai_ekstra`);

--
-- Indeks untuk tabel `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`);

--
-- Indeks untuk tabel `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  ADD PRIMARY KEY (`id_nilai_pts`);

--
-- Indeks untuk tabel `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  ADD PRIMARY KEY (`id_nilai_sikap`);

--
-- Indeks untuk tabel `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `uc_email` (`email`) USING BTREE;

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indeks untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_pengawas`
--
ALTER TABLE `cbt_pengawas`
  MODIFY `id_pengawas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  MODIFY `id_rekap_nilai` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_sesi_siswa`
--
ALTER TABLE `cbt_sesi_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas_materi`
--
ALTER TABLE `kelas_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level_guru`
--
ALTER TABLE `level_guru`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_ujian`
--
ALTER TABLE `log_ujian`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_ekstra`
--
ALTER TABLE `master_ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_guru`
--
ALTER TABLE `master_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  MODIFY `id_hari_efektif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_jurusan`
--
ALTER TABLE `master_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_mapel`
--
ALTER TABLE `master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_siswa`
--
ALTER TABLE `master_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_smt`
--
ALTER TABLE `master_smt`
  MODIFY `id_smt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_tp`
--
ALTER TABLE `master_tp`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post_reply`
--
ALTER TABLE `post_reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  MODIFY `id_catatan_wali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  MODIFY `id_fisik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  MODIFY `id_sikap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  MODIFY `id_fisik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  MODIFY `id_kikd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  MODIFY `id_kkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  MODIFY `id_nilai_akhir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  MODIFY `id_nilai_ekstra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  MODIFY `id_nilai_harian` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  MODIFY `id_nilai_pts` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  MODIFY `id_nilai_sikap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
