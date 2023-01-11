-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2023 at 03:52 AM
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
-- Database: `garuda_cbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_setting`
--

CREATE TABLE `api_setting` (
  `id` bigint(50) NOT NULL,
  `auto_sync` int(11) NOT NULL DEFAULT '0',
  `edit_profile_siswa` int(11) NOT NULL DEFAULT '0',
  `edit_profile_guru` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `api_token`
--

CREATE TABLE `api_token` (
  `id_api` bigint(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buku_induk`
--

CREATE TABLE `buku_induk` (
  `id_siswa` bigint(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `rombel_awal` varchar(50) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `jml_saudara_kandung` int(11) NOT NULL DEFAULT '0',
  `jml_saudara_tiri` int(11) NOT NULL DEFAULT '0',
  `jml_saudara_angkat` int(11) NOT NULL DEFAULT '0',
  `yatim` int(1) NOT NULL DEFAULT '0' COMMENT '0=ada orang-tua, 1=yatim, 2=yatim piatu',
  `tinggal_bersama` varchar(1) NOT NULL DEFAULT '1' COMMENT '1=orang-tua, 2=saudara, 3=wali, 4=asrama/pesantren, 5=kost, 6=lainnya',
  `jarak` varchar(10) DEFAULT NULL,
  `gol_darah` varchar(4) DEFAULT NULL,
  `penyakit` mediumtext,
  `kelainan_fisik` varchar(100) DEFAULT NULL,
  `kegemaran` longtext,
  `beasiswa` longtext,
  `no_ijazah_sebelumnya` varchar(50) DEFAULT NULL,
  `tahun_lulus_sebelumnya` varchar(10) DEFAULT NULL,
  `pindahan_dari` varchar(100) DEFAULT NULL,
  `alasan_kepindahan` varchar(200) DEFAULT NULL,
  `agama_ayah` varchar(20) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) DEFAULT NULL,
  `wn_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(50) DEFAULT NULL,
  `hidup_meninggal_ayah` varchar(50) DEFAULT NULL,
  `agama_ibu` varchar(50) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) DEFAULT NULL,
  `wn_ibu` varchar(50) DEFAULT NULL,
  `penghasilan_ibu` varchar(50) DEFAULT NULL,
  `hidup_meninggal_ibu` varchar(50) DEFAULT NULL,
  `tempat_lahir_wali` varchar(50) DEFAULT NULL,
  `agama_wali` varchar(20) DEFAULT NULL,
  `wn_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1= aktif, 2=lulus, 3=pindah, 4=keluar',
  `tahun_lulus` int(11) DEFAULT NULL,
  `no_ijazah` varchar(50) DEFAULT NULL,
  `kelas_akhir` varchar(50) DEFAULT NULL,
  `lanjut_ke` varchar(50) DEFAULT NULL,
  `pindah_ke` varchar(100) DEFAULT NULL,
  `alasan_pindah` varchar(100) DEFAULT NULL,
  `tgl_pindah` varchar(20) DEFAULT NULL,
  `bekerja_di` varchar(100) DEFAULT NULL,
  `catatan_penting` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL,
  `nama_bln` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES
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
-- Table structure for table `cbt_bank_soal`
--

CREATE TABLE `cbt_bank_soal` (
  `id_bank` bigint(50) NOT NULL,
  `bank_jenis_id` int(11) NOT NULL DEFAULT '0',
  `bank_kode` varchar(255) NOT NULL DEFAULT '0',
  `bank_level` varchar(225) NOT NULL,
  `bank_kelas` varchar(255) NOT NULL,
  `bank_mapel_id` bigint(50) DEFAULT NULL,
  `bank_jurusan_id` int(11) NOT NULL DEFAULT '0',
  `bank_guru_id` bigint(50) DEFAULT NULL,
  `bank_nama` varchar(250) NOT NULL,
  `kkm` int(3) DEFAULT '0',
  `jml_soal` int(5) NOT NULL DEFAULT '0',
  `jml_esai` int(5) NOT NULL DEFAULT '0',
  `tampil_pg` int(5) NOT NULL DEFAULT '0',
  `tampil_esai` int(5) NOT NULL DEFAULT '0',
  `bobot_pg` int(5) NOT NULL DEFAULT '0',
  `bobot_esai` int(5) NOT NULL DEFAULT '0',
  `opsi` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '0',
  `soal_agama` varchar(20) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `deskripsi` longtext,
  `jml_kompleks` int(3) NOT NULL DEFAULT '0',
  `tampil_kompleks` int(3) NOT NULL DEFAULT '0',
  `bobot_kompleks` int(2) NOT NULL DEFAULT '0',
  `jml_jodohkan` int(3) NOT NULL DEFAULT '0',
  `tampil_jodohkan` int(3) NOT NULL DEFAULT '0',
  `bobot_jodohkan` int(2) NOT NULL DEFAULT '0',
  `jml_isian` int(3) NOT NULL DEFAULT '0',
  `tampil_isian` int(3) NOT NULL DEFAULT '0',
  `bobot_isian` int(2) NOT NULL DEFAULT '0',
  `status_soal` int(11) NOT NULL DEFAULT '0' COMMENT '0=belum selesai, 1=sudah selesai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_durasi_siswa`
--

CREATE TABLE `cbt_durasi_siswa` (
  `id_durasi` varchar(50) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_jadwal` bigint(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` time DEFAULT NULL,
  `mulai` varchar(22) DEFAULT NULL,
  `selesai` varchar(22) DEFAULT NULL,
  `reset` int(1) NOT NULL DEFAULT '0' COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_jadwal`
--

CREATE TABLE `cbt_jadwal` (
  `id_jadwal` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_bank` bigint(50) DEFAULT NULL,
  `id_jenis` bigint(50) DEFAULT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `durasi_ujian` int(5) NOT NULL,
  `pengawas` longtext,
  `acak_soal` int(1) NOT NULL,
  `acak_opsi` int(1) NOT NULL,
  `hasil_tampil` int(1) NOT NULL,
  `token` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `ulang` int(1) NOT NULL,
  `reset_login` int(1) NOT NULL,
  `rekap` int(1) NOT NULL DEFAULT '0',
  `jam_ke` int(2) NOT NULL DEFAULT '0',
  `jarak` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_jenis`
--

CREATE TABLE `cbt_jenis` (
  `id_jenis` bigint(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbt_jenis`
--

INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES
(1, 'Penilaian Harian', 'PH'),
(2, 'Penilaian Tengah Semester', 'PTS'),
(3, 'Penilaian Akhir Semester', 'PAS'),
(4, 'Penilaian Akhir Tahun', 'PAT'),
(5, 'Ujian Madrasah Berbasis Komputer', 'UMBK'),
(6, 'Try Out', 'TO'),
(7, 'Simulasi', 'SIML');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kelas_ruang`
--

CREATE TABLE `cbt_kelas_ruang` (
  `id_kelas_ruang` varchar(50) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL DEFAULT '0',
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `set_siswa` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_absensi`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_berita`
--

CREATE TABLE `cbt_kop_berita` (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_kop_kartu`
--

CREATE TABLE `cbt_kop_kartu` (
  `id_set_kartu` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  `tanggal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nilai`
--

CREATE TABLE `cbt_nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `pg_benar` int(3) DEFAULT '0',
  `pg_nilai` varchar(10) DEFAULT '0',
  `essai_nilai` varchar(10) DEFAULT '0',
  `id_siswa` varchar(50) DEFAULT NULL,
  `id_jadwal` varchar(50) DEFAULT NULL,
  `kompleks_nilai` varchar(10) DEFAULT '0',
  `jodohkan_nilai` varchar(10) DEFAULT '0',
  `isian_nilai` varchar(10) DEFAULT '0',
  `dikoreksi` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_nomor_peserta`
--

CREATE TABLE `cbt_nomor_peserta` (
  `id_nomor` varchar(50) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL DEFAULT '1',
  `nomor_peserta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_pengawas`
--

CREATE TABLE `cbt_pengawas` (
  `id_pengawas` varchar(50) NOT NULL,
  `id_jadwal` varchar(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_ruang` varchar(50) NOT NULL,
  `id_sesi` varchar(50) NOT NULL,
  `id_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_rekap`
--

CREATE TABLE `cbt_rekap` (
  `id_rekap` bigint(50) NOT NULL,
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
  `id_mapel` varchar(250) NOT NULL,
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
  `nama_guru` varchar(100) NOT NULL,
  `nama_kelas` mediumtext,
  `soal_kompleks` longtext,
  `soal_jodohkan` longtext,
  `soal_isian` longtext,
  `soal_essai` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_rekap_nilai`
--

CREATE TABLE `cbt_rekap_nilai` (
  `id_rekap_nilai` bigint(100) NOT NULL,
  `id_jadwal` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `tp` varchar(20) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `smt` varchar(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `id_bank` bigint(50) DEFAULT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT '0',
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
  `id_guru` bigint(50) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `no_peserta` varchar(100) DEFAULT NULL,
  `soal_kompleks` longtext,
  `soal_jodohkan` longtext,
  `soal_isian` longtext,
  `soal_essai` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_ruang`
--

CREATE TABLE `cbt_ruang` (
  `id_ruang` bigint(50) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbt_ruang`
--

INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES
(1, 'Ruang 1', 'LAB-KOM'),
(2, 'Ruang 2', 'R2'),
(3, 'Ruang 3', 'R3'),
(4, 'Ruang 4', 'R4'),
(5, 'Ruang 5', 'R5');

-- --------------------------------------------------------

--
-- Table structure for table `cbt_sesi`
--

CREATE TABLE `cbt_sesi` (
  `id_sesi` int(11) NOT NULL,
  `nama_sesi` varchar(50) NOT NULL,
  `kode_sesi` varchar(10) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbt_sesi`
--

INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES
(1, 'Sesi 1', 'S1', '07:30:00', '09:30:00', 1),
(2, 'Sesi 2', 'S2', '09:00:00', '12:30:00', 1),
(3, 'Sesi 3', 'S3', '10:30:00', '14:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbt_sesi_siswa`
--

CREATE TABLE `cbt_sesi_siswa` (
  `siswa_id` bigint(50) NOT NULL,
  `kelas_id` bigint(50) DEFAULT NULL,
  `ruang_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `smt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal`
--

CREATE TABLE `cbt_soal` (
  `id_soal` bigint(50) NOT NULL,
  `bank_id` bigint(50) DEFAULT NULL,
  `mapel_id` bigint(50) DEFAULT '0',
  `jenis` int(1) NOT NULL COMMENT '1=ganda, 2=ganda kompleks, 3=menjodohkan, 4=isian singkat, 5=uraian',
  `nomor_soal` bigint(50) DEFAULT '0',
  `file` varchar(255) DEFAULT NULL,
  `file1` mediumtext,
  `tipe_file` varchar(50) DEFAULT NULL,
  `soal` longtext,
  `opsi_a` longtext,
  `opsi_b` longtext,
  `opsi_c` longtext,
  `opsi_d` longtext,
  `opsi_e` longtext,
  `file_a` varchar(255) DEFAULT NULL,
  `file_b` varchar(255) DEFAULT NULL,
  `file_c` varchar(255) DEFAULT NULL,
  `file_d` varchar(255) DEFAULT NULL,
  `file_e` varchar(255) DEFAULT NULL,
  `jawaban` longtext,
  `created_on` bigint(50) DEFAULT NULL,
  `updated_on` bigint(50) DEFAULT NULL,
  `tampilkan` int(11) NOT NULL DEFAULT '0',
  `deskripsi` longtext NOT NULL,
  `kesulitan` int(2) NOT NULL DEFAULT '1' COMMENT 'tingkat kesulitan 1-10',
  `timer` int(1) NOT NULL DEFAULT '0' COMMENT '0=tidak, 1=ya',
  `timer_menit` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_soal_siswa`
--

CREATE TABLE `cbt_soal_siswa` (
  `id_soal_siswa` varchar(50) NOT NULL,
  `id_bank` bigint(50) DEFAULT NULL,
  `id_jadwal` bigint(50) DEFAULT NULL,
  `id_soal` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `jenis_soal` int(1) NOT NULL,
  `no_soal_alias` int(4) NOT NULL,
  `opsi_alias_a` varchar(1) DEFAULT NULL,
  `opsi_alias_b` varchar(1) DEFAULT NULL,
  `opsi_alias_c` varchar(1) DEFAULT NULL,
  `opsi_alias_d` varchar(1) DEFAULT NULL,
  `opsi_alias_e` varchar(1) DEFAULT NULL,
  `jawaban_alias` longtext,
  `jawaban_siswa` longtext,
  `jawaban_benar` longtext,
  `point_essai` int(3) DEFAULT '0',
  `soal_end` int(11) NOT NULL DEFAULT '0',
  `point_soal` varchar(5) NOT NULL DEFAULT '0',
  `nilai_koreksi` varchar(5) NOT NULL DEFAULT '0',
  `nilai_otomatis` int(11) NOT NULL DEFAULT '0' COMMENT '0=otomatis, 1=dari guru'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_token`
--

CREATE TABLE `cbt_token` (
  `token` varchar(6) NOT NULL,
  `auto` int(1) NOT NULL,
  `id_token` int(11) NOT NULL,
  `jarak` int(11) NOT NULL DEFAULT '0',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbt_token`
--

INSERT INTO `cbt_token` (`token`, `auto`, `id_token`, `jarak`, `updated`) VALUES
('HILZCX', 0, 1, 0, '2022-03-25 01:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'guru', 'Pembuat Soal dan ujian'),
(3, 'siswa', 'Peserta Ujian');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL,
  `nama_hri` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_guru`
--

CREATE TABLE `jabatan_guru` (
  `id_jabatan_guru` varchar(50) NOT NULL,
  `id_guru` bigint(50) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kelas` bigint(50) DEFAULT '0',
  `mapel_kelas` longtext,
  `ekstra_kelas` longtext,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_catatan_mapel`
--

CREATE TABLE `kelas_catatan_mapel` (
  `id_catatan` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_guru` bigint(50) DEFAULT NULL,
  `level` varchar(1) NOT NULL DEFAULT '0',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `readed` varchar(22) NOT NULL DEFAULT '0',
  `reading` longtext COMMENT 'array id_siswa yang membaca',
  `jml` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_catatan_wali`
--

CREATE TABLE `kelas_catatan_wali` (
  `id_catatan` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=semua siswa, 2=per siswa',
  `level` varchar(1) NOT NULL COMMENT '1=saran, 2=teguran, 3=peringatan, 4=sangsi',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `text` text NOT NULL,
  `readed` varchar(22) NOT NULL DEFAULT '0',
  `reading` longtext,
  `jml` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_ekstra`
--

CREATE TABLE `kelas_ekstra` (
  `id_kelas_ekstra` varchar(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `ekstra` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_kbm`
--

CREATE TABLE `kelas_jadwal_kbm` (
  `id_kbm` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `kbm_jam_pel` int(11) NOT NULL,
  `kbm_jam_mulai` varchar(5) NOT NULL,
  `kbm_jml_mapel_hari` int(11) NOT NULL,
  `istirahat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_mapel`
--

CREATE TABLE `kelas_jadwal_mapel` (
  `id_jadwal` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_mapel` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_jadwal_materi`
--

CREATE TABLE `kelas_jadwal_materi` (
  `id_kjm` varchar(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_materi` bigint(50) DEFAULT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `jadwal_materi` varchar(20) NOT NULL,
  `jenis` int(1) DEFAULT NULL COMMENT '1=materi, 2=tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_materi`
--

CREATE TABLE `kelas_materi` (
  `id_materi` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '1',
  `id_smt` int(11) NOT NULL DEFAULT '1',
  `kode_materi` text NOT NULL,
  `id_guru` bigint(50) DEFAULT NULL,
  `materi_kelas` text NOT NULL,
  `id_mapel` bigint(50) DEFAULT '0',
  `kode_mapel` varchar(300) DEFAULT NULL,
  `judul_materi` text NOT NULL,
  `isi_materi` longtext NOT NULL,
  `file` longtext,
  `link_file` varchar(255) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  `youtube` varchar(255) NOT NULL,
  `jenis` int(1) NOT NULL DEFAULT '1' COMMENT '1=materi, 2=tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_struktur`
--

CREATE TABLE `kelas_struktur` (
  `id_kelas` bigint(50) NOT NULL,
  `ketua` bigint(50) DEFAULT NULL,
  `wakil_ketua` bigint(50) DEFAULT NULL,
  `sekretaris_1` bigint(50) DEFAULT NULL,
  `sekretaris_2` bigint(50) DEFAULT NULL,
  `bendahara_1` bigint(50) DEFAULT NULL,
  `bendahara_2` bigint(50) DEFAULT NULL,
  `sie_ekstrakurikuler` bigint(50) DEFAULT NULL,
  `sie_upacara` bigint(50) DEFAULT NULL,
  `sie_olahraga` bigint(50) DEFAULT NULL,
  `sie_keagamaan` bigint(50) DEFAULT NULL,
  `sie_keamanan` bigint(50) DEFAULT NULL,
  `sie_ketertiban` bigint(50) DEFAULT NULL,
  `sie_kebersihan` bigint(50) DEFAULT NULL,
  `sie_keindahan` bigint(50) DEFAULT NULL,
  `sie_kesehatan` bigint(50) DEFAULT NULL,
  `sie_kekeluargaan` bigint(50) DEFAULT NULL,
  `sie_humas` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `level_guru`
--

CREATE TABLE `level_guru` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_guru`
--

INSERT INTO `level_guru` (`id_level`, `level`) VALUES
(1, 'Kepala Sekolah'),
(2, 'Wakil Kepala Sekolah'),
(3, 'Bimbingan Konseling'),
(4, 'Walikelas'),
(5, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `level_kelas`
--

CREATE TABLE `level_kelas` (
  `id_level` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_kelas`
--

INSERT INTO `level_kelas` (`id_level`, `level`) VALUES
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
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` bigint(50) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_materi`
--

CREATE TABLE `log_materi` (
  `id_log` varchar(50) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` bigint(50) DEFAULT NULL,
  `jam_ke` int(2) NOT NULL,
  `id_materi` varchar(50) NOT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `text` longtext,
  `file` mediumtext,
  `nilai` varchar(3) DEFAULT NULL,
  `catatan` mediumtext,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  `finish_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_ujian`
--

CREATE TABLE `log_ujian` (
  `id_log` bigint(50) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_jadwal` bigint(50) DEFAULT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  `reset` int(1) NOT NULL COMMENT '0=tidak reset, 1=reset',
  `finish_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_ekstra`
--

CREATE TABLE `master_ekstra` (
  `id_ekstra` bigint(50) NOT NULL,
  `nama_ekstra` varchar(100) NOT NULL,
  `kode_ekstra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_ekstra`
--

INSERT INTO `master_ekstra` (`id_ekstra`, `nama_ekstra`, `kode_ekstra`) VALUES
(1, 'Pramuka', 'PRAM'),
(2, 'Baca Tulis Al Quran', 'BTQ'),
(3, 'Tahfidz', 'TFZ');

-- --------------------------------------------------------

--
-- Table structure for table `master_guru`
--

CREATE TABLE `master_guru` (
  `id_guru` bigint(50) NOT NULL,
  `id_user` bigint(50) DEFAULT NULL,
  `nip` char(30) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `kode_guru` varchar(6) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
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
  `foto` longtext CHARACTER SET latin1 COLLATE latin1_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_hari_efektif`
--

CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int(11) NOT NULL,
  `jml_hari_efektif` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_jurusan`
--

CREATE TABLE `master_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `mapel_peminatan` longtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `deletable` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_jurusan`
--

INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `mapel_peminatan`, `status`, `deletable`) VALUES
(0, 'NON JURUSAN', 'NON', NULL, 1, 0),
(1, 'IPA', 'IPA', NULL, 1, 0),
(2, 'IPS', 'IPS', NULL, 1, 0),
(3, 'BAHASA', 'BAHASA', NULL, 1, 0),
(4, 'KEAGAMAAN', 'AGAMA', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_kelas`
--

CREATE TABLE `master_kelas` (
  `id_kelas` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kode_kelas` varchar(20) DEFAULT NULL,
  `jurusan_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `guru_id` bigint(50) DEFAULT NULL,
  `siswa_id` bigint(50) DEFAULT NULL,
  `jumlah_siswa` longtext,
  `set_siswa` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_kelompok_mapel`
--

CREATE TABLE `master_kelompok_mapel` (
  `id_kel_mapel` bigint(50) NOT NULL,
  `kode_kel_mapel` varchar(10) DEFAULT NULL,
  `nama_kel_mapel` varchar(100) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `id_parent` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_kelompok_mapel`
--

INSERT INTO `master_kelompok_mapel` (`id_kel_mapel`, `kode_kel_mapel`, `nama_kel_mapel`, `kategori`, `id_parent`) VALUES
(1, 'A', 'Kelompok A (Wajib)', 'WAJIB', 0),
(2, 'B', 'Kelompok B', 'WAJIB', 0),
(3, 'C', 'Kelompok C', 'PEMINATAN', 0),
(4, 'MULOK', 'Muatan Lokal', 'MULOK', 0),
(5, 'C1', 'Kelompok C1', 'PEMINATAN', 3),
(6, 'PAI', 'PAI', 'PAI (Kemenag)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_mapel`
--

CREATE TABLE `master_mapel` (
  `id_mapel` bigint(50) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `kelompok` varchar(5) NOT NULL DEFAULT '-',
  `bobot_p` int(11) NOT NULL DEFAULT '0',
  `bobot_k` int(11) NOT NULL DEFAULT '0',
  `jenjang` int(1) NOT NULL DEFAULT '0',
  `urutan` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `deletable` int(1) NOT NULL DEFAULT '1',
  `urutan_tampil` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_mapel`
--

INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`, `urutan_tampil`) VALUES
(1, 'Al Quran-Hadis', 'QH', 'PAI', 0, 0, 1, 1, 1, 0, 1),
(2, 'Fiqih', 'FQH', 'PAI', 0, 0, 1, 1, 1, 0, 3),
(3, 'Akidah Akhlak', 'AA', 'PAI', 0, 0, 1, 1, 1, 0, 2),
(4, 'Sejarah Kebudayaan Islam', 'SKI', 'PAI', 0, 0, 1, 1, 1, 0, 4),
(5, 'Bahasa Arab', 'BAR', 'A', 0, 0, 1, 2, 1, 0, 3),
(6, 'Bahasa Indonesia', 'BIND', 'A', 0, 0, 1, 2, 1, 0, 2),
(7, 'Bahasa Inggris', 'BING', 'A', 0, 0, 1, 2, 1, 0, 7),
(8, 'Matematika', 'MTK', 'A', 0, 0, 1, 2, 1, 0, 4),
(9, 'Ilmu Pengetahuan Alam', 'IPA', 'A', 0, 0, 1, 2, 1, 0, 5),
(10, 'Ilmu Pengetahuan Sosial', 'IPS', 'A', 0, 0, 1, 2, 1, 0, 6),
(11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKn', 'A', 0, 0, 1, 2, 1, 0, 1),
(12, 'Pendidikan Jasmani Olah Raga dan Kesehatan', 'PJOK', 'B', 0, 0, 1, 3, 1, 0, 2),
(13, 'Seni Budaya', 'SB', 'B', 0, 0, 2, 3, 1, 0, 1),
(14, 'Prakarya', 'PRA', 'B', 0, 0, 2, 3, 1, 0, 3),
(15, 'SBdP', 'SBDP', 'B', 0, 0, 0, 3, 0, 0, 1),
(16, 'Akhlak', 'AK', 'C', 0, 0, 3, 0, 0, 0, 19),
(17, 'Antropologi', 'ANT', 'C1', 0, 0, 3, 0, 1, 0, 4),
(18, 'Bahasa Arab (Peminatan)', 'BAR-P', 'C', 0, 0, 3, 0, 1, 0, 3),
(19, 'Bahasa dan Sastra Asing Lainnya', 'BSAL', 'C', 0, 0, 3, 0, 1, 0, 16),
(20, 'Bahasa dan Sastra Indonesia', 'BSIN', 'C', 0, 0, 3, 0, 1, 0, 15),
(21, 'Bahasa dan Sastra Inggris', 'BSING', 'C', 0, 0, 3, 0, 1, 0, 14),
(22, 'Bahasa Jepang', 'JPN', 'C', 0, 0, 3, 0, 1, 0, 18),
(23, 'Bahasa Jerman', 'JRM', 'C', 0, 0, 3, 0, 1, 0, 12),
(24, 'Biologi', 'BIO', 'C', 0, 0, 3, 0, 1, 0, 2),
(25, 'Ekonomi', 'EKN', 'C', 0, 0, 3, 0, 1, 0, 11),
(26, 'Fikih (Peminatan)', 'FQH-P', 'C', 0, 0, 3, 0, 1, 0, 4),
(27, 'Fikih - Ushul Fikih', 'UFQH', 'C', 0, 0, 3, 0, 1, 0, 5),
(28, 'Fisika', 'FIS', 'C1', 0, 0, 3, 0, 1, 0, 3),
(29, 'Geografi', 'GEO', 'C', 0, 0, 3, 0, 1, 0, 10),
(30, 'Hadis - Ilmu Hadis', 'HA', 'C', 0, 0, 3, 0, 1, 0, 6),
(31, 'Ilmu Kalam', 'IK', 'C', 0, 0, 3, 0, 1, 0, 7),
(32, 'Informatika', 'INF', 'C', 0, 0, 3, 0, 0, 0, 13),
(33, 'Keterampilan', 'KTR', 'C', 0, 0, 3, 0, 0, 0, 17),
(34, 'Kimia', 'KIM', 'C1', 0, 0, 3, 0, 1, 0, 2),
(35, 'Prakarya dan Kewirausahaan', 'PK', 'B', 0, 0, 3, 0, 0, 0, 3),
(36, 'Sejarah', 'SEJ', 'C', 0, 0, 3, 0, 1, 0, 8),
(37, 'Sejarah Indonesia', 'SJI', 'A', 0, 0, 3, 0, 1, 0, 5),
(38, 'Sosiologi', 'SOS', 'C', 0, 0, 3, 0, 1, 0, 9),
(39, 'Tafsir - Ilmu Tafsir', 'TT', 'C1', 0, 0, 3, 0, 1, 0, 1),
(40, 'Bahasa Sunda', 'BSUND', 'MULOK', 0, 0, 1, 0, 1, 1, 1),
(41, 'Pendidikan Agama dan Budi Pekerti', 'PABP', 'A', 0, 0, 1, 1, 1, 0, 1),
(42, 'Matematika (Peminatan)', 'MTK-P', 'C', 0, 0, 3, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_siswa`
--

CREATE TABLE `master_siswa` (
  `id_siswa` bigint(50) NOT NULL,
  `nisn` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kelas_awal` int(5) NOT NULL,
  `tahun_masuk` varchar(30) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` varchar(30) DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'siswa.png',
  `anak_ke` int(2) DEFAULT NULL,
  `status_keluarga` varchar(1) DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `rt` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `rw` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kelurahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` int(10) DEFAULT NULL,
  `nama_ayah` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir_ayah` varchar(50) DEFAULT NULL,
  `pendidikan_ayah` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_ayah` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_ayah` longtext,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `tgl_lahir_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_ibu` varchar(20) DEFAULT NULL,
  `alamat_ibu` longtext,
  `nama_wali` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_wali` varchar(20) DEFAULT NULL,
  `alamat_wali` longtext,
  `nik` varchar(30) NOT NULL,
  `warga_negara` varchar(20) NOT NULL,
  `uid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_smt`
--

CREATE TABLE `master_smt` (
  `id_smt` int(11) NOT NULL,
  `smt` varchar(10) NOT NULL,
  `nama_smt` varchar(10) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_smt`
--

INSERT INTO `master_smt` (`id_smt`, `smt`, `nama_smt`, `active`) VALUES
(1, 'Ganjil', 'I (satu)', 1),
(2, 'Genap', 'II (dua)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_tp`
--

CREATE TABLE `master_tp` (
  `id_tp` int(11) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_tp`
--

INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES
(1, '2020/2021', 0),
(2, '2021/2022', 0),
(3, '2022/2023', 1),
(4, '2023/2024', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` bigint(50) NOT NULL,
  `dari` bigint(50) DEFAULT NULL,
  `dari_group` bigint(50) DEFAULT NULL,
  `kepada` varchar(50) NOT NULL COMMENT 'group',
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id_comment` bigint(50) NOT NULL,
  `id_post` bigint(50) DEFAULT NULL,
  `dari` bigint(50) DEFAULT NULL,
  `dari_group` bigint(50) DEFAULT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) NOT NULL DEFAULT '1' COMMENT '1:pengumuman, 2:materi, 3:tugas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_reply`
--

CREATE TABLE `post_reply` (
  `id_reply` bigint(50) NOT NULL,
  `id_comment` bigint(50) DEFAULT NULL,
  `dari` bigint(50) DEFAULT NULL,
  `dari_group` bigint(50) DEFAULT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_admin_setting`
--

CREATE TABLE `rapor_admin_setting` (
  `id_setting` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `kkm_tunggal` int(1) NOT NULL DEFAULT '0',
  `kkm` int(3) DEFAULT NULL,
  `bobot_ph` int(3) DEFAULT NULL,
  `bobot_pts` int(3) DEFAULT NULL,
  `bobot_pas` int(3) DEFAULT NULL,
  `bobot_absen` int(3) DEFAULT NULL,
  `tgl_rapor_akhir` varchar(100) DEFAULT NULL,
  `tgl_rapor_kelas_akhir` varchar(100) DEFAULT NULL,
  `tgl_rapor_pts` varchar(100) DEFAULT NULL,
  `nip_kepsek` int(1) DEFAULT '0',
  `nip_walikelas` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_catatan_wali`
--

CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `nilai` longtext,
  `deskripsi` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_catatan`
--

CREATE TABLE `rapor_data_catatan` (
  `id_catatan` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `id_kelas` bigint(50) DEFAULT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int(2) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `rank` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_fisik`
--

CREATE TABLE `rapor_data_fisik` (
  `id_fisik` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `id_kelas` bigint(50) DEFAULT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_data_sikap`
--

CREATE TABLE `rapor_data_sikap` (
  `id_sikap` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `id_kelas` bigint(50) DEFAULT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int(2) NOT NULL,
  `sikap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_fisik`
--

CREATE TABLE `rapor_fisik` (
  `id_fisik` bigint(50) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `kondisi` longtext NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_kikd`
--

CREATE TABLE `rapor_kikd` (
  `id_kikd` bigint(50) NOT NULL,
  `id_mapel_kelas` bigint(50) DEFAULT NULL,
  `aspek` int(1) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `materi_kikd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_kkm`
--

CREATE TABLE `rapor_kkm` (
  `id_kkm` bigint(50) NOT NULL,
  `kkm` int(3) DEFAULT '0',
  `bobot_ph` int(3) DEFAULT '0',
  `bobot_pts` int(3) DEFAULT '0',
  `bobot_pas` int(3) DEFAULT '0',
  `bobot_absen` int(3) DEFAULT '0',
  `beban_jam` int(2) DEFAULT '0',
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `jenis` int(11) NOT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_mapel` bigint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_naik`
--

CREATE TABLE `rapor_naik` (
  `id_naik` bigint(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` bigint(50) NOT NULL,
  `naik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_akhir`
--

CREATE TABLE `rapor_nilai_akhir` (
  `id_nilai_akhir` bigint(50) NOT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) DEFAULT '0',
  `akhir` int(3) DEFAULT NULL,
  `predikat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_ekstra`
--

CREATE TABLE `rapor_nilai_ekstra` (
  `id_nilai_ekstra` bigint(50) NOT NULL,
  `id_ekstra` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `predikat` varchar(1) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_harian`
--

CREATE TABLE `rapor_nilai_harian` (
  `id_nilai_harian` bigint(50) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
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
  `p_predikat` varchar(1) DEFAULT NULL,
  `p_deskripsi` longtext,
  `k1` varchar(3) DEFAULT NULL,
  `k2` varchar(3) DEFAULT NULL,
  `k3` varchar(3) DEFAULT NULL,
  `k4` varchar(3) DEFAULT NULL,
  `k5` varchar(3) DEFAULT NULL,
  `k6` varchar(3) DEFAULT NULL,
  `k7` varchar(3) DEFAULT NULL,
  `k8` varchar(3) DEFAULT NULL,
  `k_rata_rata` varchar(4) DEFAULT NULL,
  `k_predikat` varchar(1) DEFAULT NULL,
  `k_deskripsi` longtext,
  `jml` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_pts`
--

CREATE TABLE `rapor_nilai_pts` (
  `id_nilai_pts` bigint(50) NOT NULL,
  `id_mapel` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) DEFAULT '0',
  `predikat` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_nilai_sikap`
--

CREATE TABLE `rapor_nilai_sikap` (
  `id_nilai_sikap` bigint(50) NOT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
  `id_kelas` bigint(50) DEFAULT NULL,
  `id_tp` int(11) NOT NULL DEFAULT '0',
  `id_smt` int(11) NOT NULL DEFAULT '0',
  `jenis` int(1) DEFAULT NULL,
  `nilai` longtext NOT NULL,
  `deskripsi` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rapor_prestasi`
--

CREATE TABLE `rapor_prestasi` (
  `id_ranking` bigint(50) NOT NULL,
  `id_kelas` bigint(100) DEFAULT NULL,
  `id_siswa` bigint(50) DEFAULT NULL,
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
-- Table structure for table `running_text`
--

CREATE TABLE `running_text` (
  `id_text` bigint(50) NOT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` bigint(50) NOT NULL,
  `kode_sekolah` varchar(10) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `npsn` varchar(10) DEFAULT NULL,
  `nss` varchar(20) DEFAULT NULL,
  `jenjang` int(5) DEFAULT NULL,
  `kepsek` varchar(50) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `tanda_tangan` text,
  `alamat` text,
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
  `logo_kanan` text,
  `logo_kiri` text,
  `versi` varchar(10) DEFAULT NULL,
  `ip_server` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `server` varchar(50) DEFAULT NULL,
  `id_server` varchar(50) DEFAULT NULL,
  `sekolah_id` varchar(50) DEFAULT NULL,
  `db_versi` varchar(10) DEFAULT NULL,
  `satuan_pendidikan` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id_user` bigint(50) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `jabatan` text,
  `level_access` int(11) NOT NULL DEFAULT '0',
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_setting`
--
ALTER TABLE `api_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_token`
--
ALTER TABLE `api_token`
  ADD PRIMARY KEY (`id_api`);

--
-- Indexes for table `buku_induk`
--
ALTER TABLE `buku_induk`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`);

--
-- Indexes for table `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cbt_durasi_siswa`
--
ALTER TABLE `cbt_durasi_siswa`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indexes for table `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `cbt_kelas_ruang`
--
ALTER TABLE `cbt_kelas_ruang`
  ADD PRIMARY KEY (`id_kelas_ruang`);

--
-- Indexes for table `cbt_kop_absensi`
--
ALTER TABLE `cbt_kop_absensi`
  ADD PRIMARY KEY (`id_kop`);

--
-- Indexes for table `cbt_kop_berita`
--
ALTER TABLE `cbt_kop_berita`
  ADD PRIMARY KEY (`id_kop`);

--
-- Indexes for table `cbt_kop_kartu`
--
ALTER TABLE `cbt_kop_kartu`
  ADD PRIMARY KEY (`id_set_kartu`);

--
-- Indexes for table `cbt_nilai`
--
ALTER TABLE `cbt_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `cbt_nomor_peserta`
--
ALTER TABLE `cbt_nomor_peserta`
  ADD PRIMARY KEY (`id_nomor`);

--
-- Indexes for table `cbt_pengawas`
--
ALTER TABLE `cbt_pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indexes for table `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  ADD PRIMARY KEY (`id_rekap_nilai`);

--
-- Indexes for table `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indexes for table `cbt_sesi_siswa`
--
ALTER TABLE `cbt_sesi_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `cbt_soal_siswa`
--
ALTER TABLE `cbt_soal_siswa`
  ADD PRIMARY KEY (`id_soal_siswa`);

--
-- Indexes for table `cbt_token`
--
ALTER TABLE `cbt_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`);

--
-- Indexes for table `jabatan_guru`
--
ALTER TABLE `jabatan_guru`
  ADD PRIMARY KEY (`id_jabatan_guru`);

--
-- Indexes for table `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `kelas_ekstra`
--
ALTER TABLE `kelas_ekstra`
  ADD PRIMARY KEY (`id_kelas_ekstra`);

--
-- Indexes for table `kelas_jadwal_kbm`
--
ALTER TABLE `kelas_jadwal_kbm`
  ADD PRIMARY KEY (`id_kbm`);

--
-- Indexes for table `kelas_jadwal_mapel`
--
ALTER TABLE `kelas_jadwal_mapel`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas_jadwal_materi`
--
ALTER TABLE `kelas_jadwal_materi`
  ADD PRIMARY KEY (`id_kjm`);

--
-- Indexes for table `kelas_materi`
--
ALTER TABLE `kelas_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`);

--
-- Indexes for table `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level_guru`
--
ALTER TABLE `level_guru`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `level_kelas`
--
ALTER TABLE `level_kelas`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_materi`
--
ALTER TABLE `log_materi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_ujian`
--
ALTER TABLE `log_ujian`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `master_ekstra`
--
ALTER TABLE `master_ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `master_guru`
--
ALTER TABLE `master_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  ADD PRIMARY KEY (`id_hari_efektif`);

--
-- Indexes for table `master_jurusan`
--
ALTER TABLE `master_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `master_kelompok_mapel`
--
ALTER TABLE `master_kelompok_mapel`
  ADD PRIMARY KEY (`id_kel_mapel`);

--
-- Indexes for table `master_mapel`
--
ALTER TABLE `master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `master_siswa`
--
ALTER TABLE `master_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `master_smt`
--
ALTER TABLE `master_smt`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indexes for table `master_tp`
--
ALTER TABLE `master_tp`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `post_reply`
--
ALTER TABLE `post_reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  ADD PRIMARY KEY (`id_catatan_wali`);

--
-- Indexes for table `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indexes for table `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indexes for table `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  ADD PRIMARY KEY (`id_sikap`);

--
-- Indexes for table `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  ADD PRIMARY KEY (`id_fisik`);

--
-- Indexes for table `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  ADD PRIMARY KEY (`id_kikd`);

--
-- Indexes for table `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  ADD PRIMARY KEY (`id_kkm`);

--
-- Indexes for table `rapor_naik`
--
ALTER TABLE `rapor_naik`
  ADD PRIMARY KEY (`id_naik`);

--
-- Indexes for table `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  ADD PRIMARY KEY (`id_nilai_akhir`);

--
-- Indexes for table `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  ADD PRIMARY KEY (`id_nilai_ekstra`);

--
-- Indexes for table `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  ADD PRIMARY KEY (`id_nilai_harian`);

--
-- Indexes for table `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  ADD PRIMARY KEY (`id_nilai_pts`);

--
-- Indexes for table `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  ADD PRIMARY KEY (`id_nilai_sikap`);

--
-- Indexes for table `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indexes for table `running_text`
--
ALTER TABLE `running_text`
  ADD PRIMARY KEY (`id_text`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `uc_email` (`email`) USING BTREE;

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_setting`
--
ALTER TABLE `api_setting`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_token`
--
ALTER TABLE `api_token`
  MODIFY `id_api` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku_induk`
--
ALTER TABLE `buku_induk`
  MODIFY `id_siswa` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cbt_bank_soal`
--
ALTER TABLE `cbt_bank_soal`
  MODIFY `id_bank` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_jadwal`
--
ALTER TABLE `cbt_jadwal`
  MODIFY `id_jadwal` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_jenis`
--
ALTER TABLE `cbt_jenis`
  MODIFY `id_jenis` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_rekap`
--
ALTER TABLE `cbt_rekap`
  MODIFY `id_rekap` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_rekap_nilai`
--
ALTER TABLE `cbt_rekap_nilai`
  MODIFY `id_rekap_nilai` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_ruang`
--
ALTER TABLE `cbt_ruang`
  MODIFY `id_ruang` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_sesi`
--
ALTER TABLE `cbt_sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_soal`
--
ALTER TABLE `cbt_soal`
  MODIFY `id_soal` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_token`
--
ALTER TABLE `cbt_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas_catatan_mapel`
--
ALTER TABLE `kelas_catatan_mapel`
  MODIFY `id_catatan` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_catatan_wali`
--
ALTER TABLE `kelas_catatan_wali`
  MODIFY `id_catatan` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_materi`
--
ALTER TABLE `kelas_materi`
  MODIFY `id_materi` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_struktur`
--
ALTER TABLE `kelas_struktur`
  MODIFY `id_kelas` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_guru`
--
ALTER TABLE `level_guru`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_ujian`
--
ALTER TABLE `log_ujian`
  MODIFY `id_log` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_ekstra`
--
ALTER TABLE `master_ekstra`
  MODIFY `id_ekstra` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_guru`
--
ALTER TABLE `master_guru`
  MODIFY `id_guru` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_hari_efektif`
--
ALTER TABLE `master_hari_efektif`
  MODIFY `id_hari_efektif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_jurusan`
--
ALTER TABLE `master_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id_kelas` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_kelompok_mapel`
--
ALTER TABLE `master_kelompok_mapel`
  MODIFY `id_kel_mapel` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_mapel`
--
ALTER TABLE `master_mapel`
  MODIFY `id_mapel` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_siswa`
--
ALTER TABLE `master_siswa`
  MODIFY `id_siswa` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_smt`
--
ALTER TABLE `master_smt`
  MODIFY `id_smt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_tp`
--
ALTER TABLE `master_tp`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id_comment` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_reply`
--
ALTER TABLE `post_reply`
  MODIFY `id_reply` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_admin_setting`
--
ALTER TABLE `rapor_admin_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_catatan_wali`
--
ALTER TABLE `rapor_catatan_wali`
  MODIFY `id_catatan_wali` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_catatan`
--
ALTER TABLE `rapor_data_catatan`
  MODIFY `id_catatan` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_fisik`
--
ALTER TABLE `rapor_data_fisik`
  MODIFY `id_fisik` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_data_sikap`
--
ALTER TABLE `rapor_data_sikap`
  MODIFY `id_sikap` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_fisik`
--
ALTER TABLE `rapor_fisik`
  MODIFY `id_fisik` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_kikd`
--
ALTER TABLE `rapor_kikd`
  MODIFY `id_kikd` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_kkm`
--
ALTER TABLE `rapor_kkm`
  MODIFY `id_kkm` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_akhir`
--
ALTER TABLE `rapor_nilai_akhir`
  MODIFY `id_nilai_akhir` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_ekstra`
--
ALTER TABLE `rapor_nilai_ekstra`
  MODIFY `id_nilai_ekstra` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_harian`
--
ALTER TABLE `rapor_nilai_harian`
  MODIFY `id_nilai_harian` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_pts`
--
ALTER TABLE `rapor_nilai_pts`
  MODIFY `id_nilai_pts` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_nilai_sikap`
--
ALTER TABLE `rapor_nilai_sikap`
  MODIFY `id_nilai_sikap` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rapor_prestasi`
--
ALTER TABLE `rapor_prestasi`
  MODIFY `id_ranking` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `running_text`
--
ALTER TABLE `running_text`
  MODIFY `id_text` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` bigint(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id_user` bigint(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
