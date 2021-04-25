#
# TABLE STRUCTURE FOR: bulan
#

DROP TABLE IF EXISTS `bulan`;

CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL AUTO_INCREMENT,
  `nama_bln` varchar(25) NOT NULL,
  PRIMARY KEY (`id_bln`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (1, 'Januari');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (2, 'Februari');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (3, 'Maret');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (4, 'April');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (5, 'Mei');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (6, 'Juni');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (7, 'Juli');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (8, 'Agustus');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (9, 'September');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (10, 'Oktober');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (11, 'November');
INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES (12, 'Desember');


#
# TABLE STRUCTURE FOR: cbt_bank_soal
#

DROP TABLE IF EXISTS `cbt_bank_soal`;

CREATE TABLE `cbt_bank_soal` (
  `id_bank` int(11) NOT NULL AUTO_INCREMENT,
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
  `soal_agama` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;


#
# TABLE STRUCTURE FOR: cbt_durasi_siswa
#

DROP TABLE IF EXISTS `cbt_durasi_siswa`;

CREATE TABLE `cbt_durasi_siswa` (
  `id_durasi` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` int(10) NOT NULL,
  `mulai` varchar(22) DEFAULT NULL,
  `selesai` varchar(22) DEFAULT NULL,
  `reset` int(1) NOT NULL DEFAULT 0 COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua',
  PRIMARY KEY (`id_durasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_jadwal
#

DROP TABLE IF EXISTS `cbt_jadwal`;

CREATE TABLE `cbt_jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
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
  `reset_login` int(1) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;



#
# TABLE STRUCTURE FOR: cbt_jawaban
#

DROP TABLE IF EXISTS `cbt_jawaban`;

CREATE TABLE `cbt_jawaban` (
  `id_jawaban` varchar(50) NOT NULL,
  `jawaban` longtext NOT NULL,
  `jawaban_benar` longtext NOT NULL,
  `koreksi` int(1) NOT NULL COMMENT '0 = belum dikoreksi, else point essai',
  PRIMARY KEY (`id_jawaban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_jenis
#

DROP TABLE IF EXISTS `cbt_jenis`;

CREATE TABLE `cbt_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_kelas_ruang
#

DROP TABLE IF EXISTS `cbt_kelas_ruang`;

CREATE TABLE `cbt_kelas_ruang` (
  `id_kelas_ruang` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL DEFAULT 0,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `set_siswa` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kelas_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_kop_absensi
#

DROP TABLE IF EXISTS `cbt_kop_absensi`;

CREATE TABLE `cbt_kop_absensi` (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  `proktor` varchar(100) DEFAULT NULL,
  `pengawas_1` varchar(100) DEFAULT NULL,
  `pengawas_2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_kop_absensi` (`id_kop`, `header_1`, `header_2`, `header_3`, `header_4`, `proktor`, `pengawas_1`, `pengawas_2`) VALUES (123456, 'MADRASAH TSANAWIYAH AL HASAN', 'DAFTAR KEHADIRAN', 'PENILAIAN TENGAH SEMESTER', 'TP: 2020/2021 SMT:II', 'Nama Proktor', ' Pengawas 1', ' Pengawas 2');


#
# TABLE STRUCTURE FOR: cbt_kop_berita
#

DROP TABLE IF EXISTS `cbt_kop_berita`;

CREATE TABLE `cbt_kop_berita` (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_kop_berita` (`id_kop`, `header_1`, `header_2`, `header_3`, `header_4`) VALUES (123456, 'MADRASAH TSANAWIYAH AL HASAN', 'BERITA ACARA PELAKSANAAN', 'PENILAIAN AKHIR SEMESTER (P A T)', 'Tahun Pelajaran: 2020/2021 Semester: I');


#
# TABLE STRUCTURE FOR: cbt_kop_kartu
#

DROP TABLE IF EXISTS `cbt_kop_kartu`;

CREATE TABLE `cbt_kop_kartu` (
  `id_set_kartu` int(11) NOT NULL,
  `header_1` varchar(100) DEFAULT NULL,
  `header_2` varchar(100) DEFAULT NULL,
  `header_3` varchar(100) DEFAULT NULL,
  `header_4` varchar(100) DEFAULT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_set_kartu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_kop_kartu` (`id_set_kartu`, `header_1`, `header_2`, `header_3`, `header_4`, `tanggal`) VALUES (123456, 'MADRASAH TSANAWIYAH', 'KARTU PESERTA', 'PENILAIAN AKHIR SEMESTER (P A T)', 'Tahun Pelajaran: 2020/2021 Semester: I', '20 Des 2020');


#
# TABLE STRUCTURE FOR: cbt_nilai
#

DROP TABLE IF EXISTS `cbt_nilai`;

CREATE TABLE `cbt_nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `pg_benar` int(3) NOT NULL,
  `pg_nilai` int(2) NOT NULL,
  `essai_nilai` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_nomor_peserta
#

DROP TABLE IF EXISTS `cbt_nomor_peserta`;

CREATE TABLE `cbt_nomor_peserta` (
  `id_nomor` varchar(50) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `nomor_peserta` varchar(20) NOT NULL,
  PRIMARY KEY (`id_nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_pengawas
#

DROP TABLE IF EXISTS `cbt_pengawas`;

CREATE TABLE `cbt_pengawas` (
  `id_pengawas` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` text NOT NULL,
  PRIMARY KEY (`id_pengawas`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: cbt_ruang
#

DROP TABLE IF EXISTS `cbt_ruang`;

CREATE TABLE `cbt_ruang` (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (1, 'Kel 1', 'LAB-KOM-K1');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (2, 'Kel 2', 'LAB-KOM-K2');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (3, 'Kel 3', 'LAB-KOM-K3');


#
# TABLE STRUCTURE FOR: cbt_sesi
#

DROP TABLE IF EXISTS `cbt_sesi`;

CREATE TABLE `cbt_sesi` (
  `id_sesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sesi` varchar(50) NOT NULL,
  `kode_sesi` varchar(10) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id_sesi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES (1, 'Sesi 1', 'S1', '07:00:00', '10:00:00', 1);
INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES (2, 'Sesi 2', 'S2', '08:00:00', '22:30:00', 1);
INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES (3, 'Sesi 3', 'S3', '08:00:00', '22:30:00', 1);


#
# TABLE STRUCTURE FOR: cbt_sesi_siswa
#

DROP TABLE IF EXISTS `cbt_sesi_siswa`;

CREATE TABLE `cbt_sesi_siswa` (
  `siswa_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `smt_id` int(11) NOT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_soal
#

DROP TABLE IF EXISTS `cbt_soal`;

CREATE TABLE `cbt_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
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
  `tampilkan` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=1339 DEFAULT CHARSET=utf8;



#
# TABLE STRUCTURE FOR: cbt_soal_siswa
#

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
  `soal_end` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_soal_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_token
#

DROP TABLE IF EXISTS `cbt_token`;

CREATE TABLE `cbt_token` (
  `token` varchar(6) NOT NULL,
  `auto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_token` (`token`, `auto`) VALUES ('BDEFLU', 0);


#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES (2, 'guru', 'Pembuat Soal dan ujian');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES (3, 'siswa', 'Peserta Ujian');


#
# TABLE STRUCTURE FOR: hari
#

DROP TABLE IF EXISTS `hari`;

CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL AUTO_INCREMENT,
  `nama_hri` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hri`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (1, 'Senin');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (2, 'Selasa');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (3, 'Rabu');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (4, 'Kamis');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (5, 'Jum\'at');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (6, 'Sabtu');
INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES (7, 'Minggu');


#
# TABLE STRUCTURE FOR: jabatan_guru
#

DROP TABLE IF EXISTS `jabatan_guru`;

CREATE TABLE `jabatan_guru` (
  `id_jabatan_guru` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL DEFAULT 0,
  `mapel_kelas` longtext DEFAULT NULL,
  `ekstra_kelas` longtext DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26111', 261, 1, 0, 'a:0:{}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26112', 261, 1, 0, 'a:0:{}', NULL, 1, 2);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26211', 262, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"11\";s:10:\"nama_mapel\";s:40:\"Pendidikan Pancasila dan Kewarganegaraan\";s:11:\"kelas_mapel\";a:10:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";s:2:\"52\";}i:7;a:1:{s:5:\"kelas\";s:2:\"56\";}i:8;a:1:{s:5:\"kelas\";s:2:\"58\";}i:9;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26311', 263, 4, 52, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"10\";s:10:\"nama_mapel\";s:23:\"Ilmu Pengetahuan Sosial\";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"7\";}i:1;a:1:{s:5:\"kelas\";s:1:\"8\";}i:2;a:1:{s:5:\"kelas\";s:2:\"48\";}i:3;a:1:{s:5:\"kelas\";s:2:\"52\";}i:4;a:1:{s:5:\"kelas\";s:2:\"56\";}i:5;a:1:{s:5:\"kelas\";s:2:\"58\";}i:6;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:2:\"13\";s:10:\"nama_mapel\";s:11:\"Seni Budaya\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26312', 263, 2, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"10\";s:10:\"nama_mapel\";s:23:\"Ilmu Pengetahuan Sosial\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"74\";}i:1;a:1:{s:5:\"kelas\";s:2:\"75\";}i:2;a:1:{s:5:\"kelas\";s:2:\"76\";}i:3;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:2:\"13\";s:10:\"nama_mapel\";s:11:\"Seni Budaya\";s:11:\"kelas_mapel\";a:2:{i:0;a:1:{s:5:\"kelas\";s:2:\"75\";}i:1;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 1, 2);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26411', 264, 2, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"8\";s:10:\"nama_mapel\";s:10:\"Matematika\";s:11:\"kelas_mapel\";a:6:{i:0;a:1:{s:5:\"kelas\";s:1:\"8\";}i:1;a:1:{s:5:\"kelas\";s:2:\"48\";}i:2;a:1:{s:5:\"kelas\";s:2:\"52\";}i:3;a:1:{s:5:\"kelas\";s:2:\"56\";}i:4;a:1:{s:5:\"kelas\";s:2:\"58\";}i:5;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26511', 265, 5, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"1\";s:10:\"nama_mapel\";s:14:\"Al Quran-Hadis\";s:11:\"kelas_mapel\";a:10:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";s:2:\"52\";}i:7;a:1:{s:5:\"kelas\";s:2:\"56\";}i:8;a:1:{s:5:\"kelas\";s:2:\"58\";}i:9;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:1:\"2\";s:10:\"nama_mapel\";s:5:\"Fiqih\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26611', 266, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"9\";s:10:\"nama_mapel\";s:21:\"Ilmu Pengetahuan Alam\";s:11:\"kelas_mapel\";a:6:{i:0;a:1:{s:5:\"kelas\";s:1:\"7\";}i:1;a:1:{s:5:\"kelas\";s:1:\"8\";}i:2;a:1:{s:5:\"kelas\";s:2:\"52\";}i:3;a:1:{s:5:\"kelas\";s:2:\"56\";}i:4;a:1:{s:5:\"kelas\";s:2:\"58\";}i:5;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26711', 267, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"3\";s:10:\"nama_mapel\";s:16:\"Bahasa Indonesia\";s:11:\"kelas_mapel\";a:5:{i:0;a:1:{s:5:\"kelas\";s:1:\"2\";}i:1;a:1:{s:5:\"kelas\";s:2:\"52\";}i:2;a:1:{s:5:\"kelas\";s:2:\"56\";}i:3;a:1:{s:5:\"kelas\";s:2:\"58\";}i:4;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26712', 267, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"6\";s:10:\"nama_mapel\";s:16:\"Bahasa Indonesia\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"74\";}i:1;a:1:{s:5:\"kelas\";s:2:\"75\";}i:2;a:1:{s:5:\"kelas\";s:2:\"76\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 1, 2);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26812', 268, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"4\";s:10:\"nama_mapel\";s:24:\"Sejarah Kebudayaan Islam\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"74\";}i:1;a:1:{s:5:\"kelas\";s:2:\"75\";}i:2;a:1:{s:5:\"kelas\";s:2:\"76\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 1, 2);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('26911', 269, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"12\";s:10:\"nama_mapel\";s:42:\"Pendidikan Jasmani Olah Raga dan Kesehatan\";s:11:\"kelas_mapel\";a:10:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";s:2:\"52\";}i:7;a:1:{s:5:\"kelas\";s:2:\"56\";}i:8;a:1:{s:5:\"kelas\";s:2:\"58\";}i:9;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27011', 270, 4, 58, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"14\";s:10:\"nama_mapel\";s:8:\"Prakarya\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27111', 271, 4, 2, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"3\";s:10:\"nama_mapel\";s:16:\"Bahasa Indonesia\";s:11:\"kelas_mapel\";a:6:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"3\";}i:2;a:1:{s:5:\"kelas\";s:1:\"7\";}i:3;a:1:{s:5:\"kelas\";s:1:\"8\";}i:4;a:1:{s:5:\"kelas\";s:2:\"48\";}i:5;a:1:{s:5:\"kelas\";N;}}}}', 'a:0:{}', 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27112', 271, 4, 70, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"1\";s:10:\"nama_mapel\";s:14:\"Al Quran-Hadis\";s:11:\"kelas_mapel\";a:5:{i:0;a:1:{s:5:\"kelas\";s:2:\"69\";}i:1;a:1:{s:5:\"kelas\";s:2:\"70\";}i:2;a:1:{s:5:\"kelas\";s:2:\"74\";}i:3;a:1:{s:5:\"kelas\";s:2:\"75\";}i:4;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:1:\"6\";s:10:\"nama_mapel\";s:16:\"Bahasa Indonesia\";s:11:\"kelas_mapel\";a:5:{i:0;a:1:{s:5:\"kelas\";s:2:\"69\";}i:1;a:1:{s:5:\"kelas\";s:2:\"70\";}i:2;a:1:{s:5:\"kelas\";s:2:\"71\";}i:3;a:1:{s:5:\"kelas\";s:2:\"72\";}i:4;a:1:{s:5:\"kelas\";N;}}}}', 'a:2:{i:0;a:3:{s:9:\"id_ekstra\";s:1:\"5\";s:11:\"nama_ekstra\";s:7:\"Pramuka\";s:12:\"kelas_ekstra\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"69\";}i:1;a:1:{s:5:\"kelas\";s:2:\"70\";}i:2;a:1:{s:5:\"kelas\";s:2:\"71\";}i:3;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:9:\"id_ekstra\";s:1:\"6\";s:11:\"nama_ekstra\";s:19:\"Baca Tulis Al Quran\";s:12:\"kelas_ekstra\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"69\";}i:1;a:1:{s:5:\"kelas\";s:2:\"70\";}i:2;a:1:{s:5:\"kelas\";s:2:\"71\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', 1, 2);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27211', 272, 5, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"2\";s:10:\"nama_mapel\";s:11:\"Bahasa Arab\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:2:\"14\";s:10:\"nama_mapel\";s:11:\"Seni Budaya\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:1:\"7\";}i:1;a:1:{s:5:\"kelas\";s:1:\"8\";}i:2;a:1:{s:5:\"kelas\";s:2:\"48\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27311', 273, 5, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"1\";s:10:\"nama_mapel\";s:13:\"Akidah-Akhlak\";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:2:\"52\";}i:4;a:1:{s:5:\"kelas\";s:2:\"56\";}i:5;a:1:{s:5:\"kelas\";s:2:\"58\";}i:6;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:1:\"5\";s:10:\"nama_mapel\";s:12:\"Bahasa Sunda\";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27411', 274, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"4\";s:10:\"nama_mapel\";s:14:\"Bahasa Inggris\";s:11:\"kelas_mapel\";a:10:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";s:2:\"52\";}i:7;a:1:{s:5:\"kelas\";s:2:\"56\";}i:8;a:1:{s:5:\"kelas\";s:2:\"58\";}i:9;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27511', 275, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"9\";s:10:\"nama_mapel\";s:10:\"Matematika\";s:11:\"kelas_mapel\";a:5:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27611', 276, 5, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"2\";s:10:\"nama_mapel\";s:11:\"Bahasa Arab\";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:1:\"5\";s:10:\"nama_mapel\";s:12:\"Bahasa Sunda\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27711', 277, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"6\";s:10:\"nama_mapel\";s:5:\"Fiqih\";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27811', 278, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"4\";s:10:\"nama_mapel\";s:14:\"Bahasa Inggris\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('27911', 279, 5, 0, 'a:1:{i:0;a:3:{s:8:\"id_mapel\";s:1:\"7\";s:10:\"nama_mapel\";s:21:\"Ilmu Pengetahuan Alam\";s:11:\"kelas_mapel\";a:5:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:2:\"48\";}i:4;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);
INSERT INTO `jabatan_guru` (`id_jabatan_guru`, `id_guru`, `id_jabatan`, `id_kelas`, `mapel_kelas`, `ekstra_kelas`, `id_tp`, `id_smt`) VALUES ('28011', 280, 5, 0, 'a:2:{i:0;a:3:{s:8:\"id_mapel\";s:2:\"12\";s:10:\"nama_mapel\";s:9:\"Prakarya \";s:11:\"kelas_mapel\";a:7:{i:0;a:1:{s:5:\"kelas\";s:1:\"1\";}i:1;a:1:{s:5:\"kelas\";s:1:\"2\";}i:2;a:1:{s:5:\"kelas\";s:1:\"3\";}i:3;a:1:{s:5:\"kelas\";s:1:\"7\";}i:4;a:1:{s:5:\"kelas\";s:1:\"8\";}i:5;a:1:{s:5:\"kelas\";s:2:\"48\";}i:6;a:1:{s:5:\"kelas\";N;}}}i:1;a:3:{s:8:\"id_mapel\";s:2:\"14\";s:10:\"nama_mapel\";s:11:\"Seni Budaya\";s:11:\"kelas_mapel\";a:4:{i:0;a:1:{s:5:\"kelas\";s:2:\"52\";}i:1;a:1:{s:5:\"kelas\";s:2:\"56\";}i:2;a:1:{s:5:\"kelas\";s:2:\"58\";}i:3;a:1:{s:5:\"kelas\";N;}}}}', NULL, 1, 1);


#
# TABLE STRUCTURE FOR: kelas_catatan_mapel
#

DROP TABLE IF EXISTS `kelas_catatan_mapel`;

CREATE TABLE `kelas_catatan_mapel` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
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
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_catatan`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_catatan_wali
#

DROP TABLE IF EXISTS `kelas_catatan_wali`;

CREATE TABLE `kelas_catatan_wali` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
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
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_catatan`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: kelas_ekstra
#

DROP TABLE IF EXISTS `kelas_ekstra`;

CREATE TABLE `kelas_ekstra` (
  `id_kelas_ekstra` varchar(50) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `ekstra` longtext NOT NULL,
  PRIMARY KEY (`id_kelas_ekstra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('111', 1, 1, 1, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('211', 1, 1, 2, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('311', 1, 1, 3, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('4811', 1, 1, 48, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('5211', 1, 1, 52, 'a:2:{i:0;a:1:{s:6:\"ekstra\";s:1:\"5\";}i:1;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('5611', 1, 1, 56, 'a:2:{i:0;a:1:{s:6:\"ekstra\";s:1:\"5\";}i:1;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('5811', 1, 1, 58, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('6912', 1, 2, 69, 'a:3:{i:0;a:1:{s:6:\"ekstra\";s:1:\"5\";}i:1;a:1:{s:6:\"ekstra\";s:1:\"6\";}i:2;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('7012', 1, 2, 70, 'a:3:{i:0;a:1:{s:6:\"ekstra\";s:1:\"5\";}i:1;a:1:{s:6:\"ekstra\";s:1:\"6\";}i:2;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('711', 1, 1, 7, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('7112', 1, 2, 71, 'a:3:{i:0;a:1:{s:6:\"ekstra\";s:1:\"5\";}i:1;a:1:{s:6:\"ekstra\";s:1:\"6\";}i:2;a:1:{s:6:\"ekstra\";N;}}');
INSERT INTO `kelas_ekstra` (`id_kelas_ekstra`, `id_tp`, `id_smt`, `id_kelas`, `ekstra`) VALUES ('811', 1, 1, 8, 'a:1:{i:0;a:1:{s:6:\"ekstra\";N;}}');


#
# TABLE STRUCTURE FOR: kelas_jadwal_kbm
#

DROP TABLE IF EXISTS `kelas_jadwal_kbm`;

CREATE TABLE `kelas_jadwal_kbm` (
  `id_kbm` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kbm_jam_pel` int(11) NOT NULL,
  `kbm_jam_mulai` varchar(5) NOT NULL,
  `kbm_jml_mapel_hari` int(11) NOT NULL,
  `istirahat` text NOT NULL,
  PRIMARY KEY (`id_kbm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_jadwal_mapel
#

DROP TABLE IF EXISTS `kelas_jadwal_mapel`;

CREATE TABLE `kelas_jadwal_mapel` (
  `id_jadwal` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: kelas_jadwal_materi
#

DROP TABLE IF EXISTS `kelas_jadwal_materi`;

CREATE TABLE `kelas_jadwal_materi` (
  `id_kjm` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jadwal_materi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kjm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_jadwal_tugas
#

DROP TABLE IF EXISTS `kelas_jadwal_tugas`;

CREATE TABLE `kelas_jadwal_tugas` (
  `id_kjt` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jadwal_tugas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kjt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_materi
#

DROP TABLE IF EXISTS `kelas_materi`;

CREATE TABLE `kelas_materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
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
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB AUTO_INCREMENT=567 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_siswa
#

DROP TABLE IF EXISTS `kelas_siswa`;

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: kelas_struktur
#

DROP TABLE IF EXISTS `kelas_struktur`;

CREATE TABLE `kelas_struktur` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
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
  `sie_humas` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kelas_struktur` (`id_kelas`, `ketua`, `wakil_ketua`, `sekretaris_1`, `sekretaris_2`, `bendahara_1`, `bendahara_2`, `sie_ekstrakurikuler`, `sie_upacara`, `sie_olahraga`, `sie_keagamaan`, `sie_keamanan`, `sie_ketertiban`, `sie_kebersihan`, `sie_keindahan`, `sie_kesehatan`, `sie_kekeluargaan`, `sie_humas`) VALUES (58, 77, 82, 78, 98, 79, 110, 80, 107, 114, 109, 89, 106, 94, 108, 101, 113, 97);


#
# TABLE STRUCTURE FOR: kelas_tugas
#

DROP TABLE IF EXISTS `kelas_tugas`;

CREATE TABLE `kelas_tugas` (
  `id_tugas` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 1,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `kode_tugas` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `tugas_kelas` text NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `judul_tugas` text NOT NULL,
  `isi_tugas` longtext NOT NULL,
  `file` longtext DEFAULT NULL,
  `link_file` varchar(255) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `tgl_selesai` text NOT NULL,
  PRIMARY KEY (`id_tugas`)
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: level_guru
#

DROP TABLE IF EXISTS `level_guru`;

CREATE TABLE `level_guru` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `level_guru` (`id_level`, `level`) VALUES (1, 'Kepala Sekolah');
INSERT INTO `level_guru` (`id_level`, `level`) VALUES (2, 'Wakil Kepala Sekolah');
INSERT INTO `level_guru` (`id_level`, `level`) VALUES (3, 'Bimbingan Konseling');
INSERT INTO `level_guru` (`id_level`, `level`) VALUES (4, 'Walikelas');
INSERT INTO `level_guru` (`id_level`, `level`) VALUES (5, 'Guru');


#
# TABLE STRUCTURE FOR: level_kelas
#

DROP TABLE IF EXISTS `level_kelas`;

CREATE TABLE `level_kelas` (
  `id_level` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (1, 1);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (2, 2);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (3, 3);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (4, 4);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (5, 5);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (6, 6);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (7, 7);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (8, 8);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (9, 9);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (10, 10);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (11, 11);
INSERT INTO `level_kelas` (`id_level`, `level`) VALUES (12, 12);


#
# TABLE STRUCTURE FOR: log
#

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_group` text NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=890 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: log_materi
#

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
  `device` text NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: log_tugas
#

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
  `device` text NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: log_ujian
#

DROP TABLE IF EXISTS `log_ujian`;

CREATE TABLE `log_ujian` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text NOT NULL,
  `address` text NOT NULL,
  `agent` text NOT NULL,
  `device` text NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=39102 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: login_attempts
#

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: master_ekstra
#

DROP TABLE IF EXISTS `master_ekstra`;

CREATE TABLE `master_ekstra` (
  `id_ekstra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ekstra` varchar(100) NOT NULL,
  `kode_ekstra` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ekstra`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_ekstra` (`id_ekstra`, `nama_ekstra`, `kode_ekstra`) VALUES (5, 'Pramuka', 'PRAM');
INSERT INTO `master_ekstra` (`id_ekstra`, `nama_ekstra`, `kode_ekstra`) VALUES (6, 'Baca Tulis Al Quran', 'BTQ');


#
# TABLE STRUCTURE FOR: master_guru
#

DROP TABLE IF EXISTS `master_guru`;

CREATE TABLE `master_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto` longtext CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;

INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (261, 1558, '493775565730', 'HJ. NURHAYATI, S.Pd.I', NULL, NULL, '4937755657300092', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (263, 1559, '685775265330', 'DYAH SULISTIYANINGSIH,  SE', NULL, NULL, '6857752653300042', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uploads/profiles/e3262391fbbed85ea8eac41c4a6e8276.png');
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (264, 1560, '145475165330', 'NOVI LUKITA,  ST', NULL, NULL, '1454751653300023', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (265, 1561, '313574664830', 'IMAS SOBANDIAH,  S.Ag', NULL, NULL, '3135746648300083', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (266, 1562, '734375565730', 'INA NALUL FAUZAH,  S.Pd.I', NULL, NULL, '7343755657300053', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (267, 1563, '114475366130', 'JULAELAH,  S.Ag', NULL, NULL, '1144753661300003', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (268, 1564, '045075866130', 'KUSTINI,  S.Ag', NULL, NULL, '0450758661300013', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (269, 1565, '615274865220', 'ASEP DIDI,  S.Pd.I', NULL, NULL, '6152748652200013', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (270, 1566, '874775665720', 'ABDULLAH AL HASAN,  S.Pd', NULL, NULL, '8747756657200030', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/project3/uploads/profiles/049523079c13ac6eb4c878b98f2a0695.PNG');
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (271, 1567, '123456790', 'ANWAR SANUSI', 'fgfs@gmail.com', NULL, '123456790', '123456', '', '', '0000-00-00', 'Laki-Laki', 'Pilih Agam', '012345678', '', NULL, NULL, NULL, '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (272, 1568, '123456798', 'Prida Andini', NULL, NULL, '123456798', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (273, 1569, '123456789', 'Hikmatul Fadzilah Nurhamizah S.Ag', NULL, NULL, '123456789', 'uyuy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (274, 1570, '123456791', 'ANISAH,  S.Pd', NULL, NULL, '123456791', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (275, 1571, '123456792', 'HANA DESTIANA,  S.Pd', NULL, NULL, '123456792', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (276, 1572, '123456793', 'YUNI TSAMROTUL UYUN,  S.hum', NULL, NULL, '123456793', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (277, 1573, '123456794', 'A. Misbahudin,  S.Pd', NULL, NULL, '123456794', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (278, 1574, '123456795', 'TEXMANITA', NULL, NULL, '123456795', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (279, 1575, '123456796', 'BAKHTIAR EKA,  S.Si', NULL, NULL, '123456796', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (280, 1576, '123456797', 'Ika Purnamawati Sutrisman, AMa.Pd', NULL, NULL, '123456797', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (281, 1577, '09876543222221', 'Saya, S.Pd', NULL, 'A1', 'saya', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (282, 1578, '09878909876543', 'Kamu, M.Pd', NULL, 'A2', 'kamu', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (283, 1579, '09876543455678', 'Guru 3', NULL, 'CA', 'guru1', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (284, 1580, '09876565432432', 'Guru 4', NULL, 'AB', 'guru2', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (285, 1581, '345676545678', 'Guru 5', NULL, 'AC', 'guru3', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (286, 1582, '09878987654543', 'Guru 6', NULL, 'A6', 'guru4', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `master_guru` (`id_guru`, `id_user`, `nip`, `nama_guru`, `email`, `kode_guru`, `username`, `password`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat_jalan`, `rt_rw`, `dusun`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `kewarganegaraan`, `nuptk`, `jenis_ptk`, `tgs_tambahan`, `status_pegawai`, `status_aktif`, `status_nikah`, `tmt`, `keahlian_isyarat`, `npwp`, `foto`) VALUES (287, 1583, '234565', 'Guru 7', NULL, 'BA', 'guru5', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: master_hari_efektif
#

DROP TABLE IF EXISTS `master_hari_efektif`;

CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int(11) NOT NULL AUTO_INCREMENT,
  `jml_hari_efektif` int(3) NOT NULL,
  PRIMARY KEY (`id_hari_efektif`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_hari_efektif` (`id_hari_efektif`, `jml_hari_efektif`) VALUES (11, 97);


#
# TABLE STRUCTURE FOR: master_jurusan
#

DROP TABLE IF EXISTS `master_jurusan`;

CREATE TABLE `master_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deletable` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `status`, `deletable`) VALUES (0, 'NON JURUSAN', 'NON', 1, 0);
INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `status`, `deletable`) VALUES (1, 'IPA', 'IPA', 1, 0);
INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `status`, `deletable`) VALUES (2, 'IPS', 'IPS', 1, 0);
INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `status`, `deletable`) VALUES (3, 'BAHASA', 'BAHASA', 1, 0);
INSERT INTO `master_jurusan` (`id_jurusan`, `nama_jurusan`, `kode_jurusan`, `status`, `deletable`) VALUES (77, 'KEAGAMAAN', 'AGAMA', 0, 1);


#
# TABLE STRUCTURE FOR: master_kelas
#

DROP TABLE IF EXISTS `master_kelas`;

CREATE TABLE `master_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `kode_kelas` varchar(20) DEFAULT NULL,
  `jurusan_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `jumlah_siswa` longtext DEFAULT NULL,
  `set_siswa` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;


#
# TABLE STRUCTURE FOR: master_mapel
#

DROP TABLE IF EXISTS `master_mapel`;

CREATE TABLE `master_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `kelompok` varchar(5) NOT NULL DEFAULT '-',
  `bobot_p` int(11) NOT NULL DEFAULT 0,
  `bobot_k` int(11) NOT NULL DEFAULT 0,
  `jenjang` int(1) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `deletable` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (1, 'Al Quran-Hadis', 'QH', 'A', 0, 0, 1, 1, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (2, 'Fiqih', 'FQH', 'A', 0, 0, 1, 1, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (3, 'Akidah Akhlak', 'AA', 'A', 0, 0, 1, 1, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (4, 'Sejarah Kebudayaan Islam', 'SKI', 'A', 0, 0, 1, 1, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (5, 'Bahasa Arab', 'BAR', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (6, 'Bahasa Indonesia', 'BIND', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (7, 'Bahasa Inggris', 'BING', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (8, 'Matematika', 'MTK', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (9, 'Ilmu Pengetahuan Alam', 'IPA', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (10, 'Ilmu Pengetahuan Sosial', 'IPS', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKn', 'A', 0, 0, 1, 2, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (12, 'Pendidikan Jasmani Olah Raga dan Kesehatan', 'PJOK', 'B', 0, 0, 1, 3, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (13, 'Seni Budaya', 'SB', 'B', 0, 0, 2, 3, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (14, 'Prakarya', 'PRA', 'B', 0, 0, 2, 3, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (15, 'SBdP', 'SBDP', 'B', 0, 0, 0, 3, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (16, 'Akhlak', 'AK', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (17, 'Antropologi', 'ANT', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (18, 'Bahasa Arab', 'BAR', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (19, 'Bahasa dan Sastra Asing Lainnya', 'BSAL', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (20, 'Bahasa dan Sastra Indonesia', 'BSIN', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (21, 'Bahasa dan Sastra Inggris', 'BSING', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (22, 'Bahasa Jepang', 'JPN', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (23, 'Bahasa Jerman', 'JRM', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (24, 'Biologi', 'BIO', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (25, 'Ekonomi', 'EKN', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (26, 'Fikih', 'FQH', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (27, 'Fikih - Ushul Fikih', 'UFQH', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (28, 'Fisika', 'FIS', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (29, 'Geografi', 'GEO', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (30, 'Hadis - Ilmu Hadis', 'HA', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (31, 'Ilmu Kalam', 'IK', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (32, 'Informatika', 'INF', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (33, 'Keterampilan', 'KTR', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (34, 'Kimia', 'KIM', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (35, 'Prakarya dan Kewirausahaan', 'PK', 'B', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (36, 'Sejarah', 'SEJ', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (37, 'Sejarah Indonesia', 'SJI', 'A', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (38, 'Sosiologi', 'SOS', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (39, 'Tafsir - Ilmu Tafsir', 'TT', 'C', 0, 0, 3, 0, 1, 0);
INSERT INTO `master_mapel` (`id_mapel`, `nama_mapel`, `kode`, `kelompok`, `bobot_p`, `bobot_k`, `jenjang`, `urutan`, `status`, `deletable`) VALUES (40, 'Bahasa Sunda', 'BSUND', 'MULOK', 0, 0, 1, 0, 1, 1);


#
# TABLE STRUCTURE FOR: master_siswa
#

DROP TABLE IF EXISTS `master_siswa`;

CREATE TABLE `master_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
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
  `kelas_awal` int(5) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;

INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (1, 'Aini Nur Safitri', '54699992', '0054699992', NULL, '', '0054699992', '20219181', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (2, 'Alma Siti Nurazizah', '68562464', '0068562464', NULL, '', '0068562464', '20219182', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (3, 'Annisa Rahmawati', '62604925', '0062604925', NULL, '', '0062604925', '20219183', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (4, 'Arif Hidayatulloh', '37969320', '0037969320', NULL, '', '0037969320', '20219184', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (5, 'Asep Saepudin', '65925096', '0065925096', NULL, '', '0065925096', '20219185', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (6, 'Bagis Yul Selda', '55759083', '0055759083', NULL, '', '0055759083', '20219186', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (7, 'Beny Chandra Kuswara', '62314679', '0062314679', NULL, '', '0062314679', '20219187', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (8, 'Dadeh Prahara', '55885113', '0055885113', NULL, '', '0055885113', '20219188', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (9, 'Falisa Rahma Zulfa', '68549769', '0068549769', NULL, '', '0068549769', '20219189', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (10, 'Firman Saepul Adzni', '20219190', '20219190', NULL, '', '20219190', '20219190', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (11, 'Giza Aulia Ramadani', '67301269', '0067301269', NULL, '', '0067301269', '20219191', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (12, 'Gusti Mahendra', '20219192', '20219192', NULL, '', '20219192', '20219192', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (13, 'Intan Dwi Sulistyawati', '5276691', '0005276691', NULL, '', '0005276691', '20219193', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (14, 'Intan Nurhasanah', '54997474', '0054997474', NULL, '', '0054997474', '20219194', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (15, 'Joane Anggraeni', '59591151', '0059591151', NULL, '', '0059591151', '20219195', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (16, 'Lina Rosdiana', '68948543', '0068948543', NULL, '', '0068948543', '20219196', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (17, 'Lisa Aghnia Izani', '66392219', '0066392219', NULL, '', '0066392219', '20219197', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (18, 'Lulu Sopio', '56422821', '0056422821', NULL, '', '0056422821', '20219198', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (19, 'Melda Amelia', '59836250', '0059836250', NULL, '', '0059836250', '20219199', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (20, 'Meliana Navitalia', '77486587', '0077486587', NULL, '', '0077486587', '20219200', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (21, 'Mira', '54907252', '0054907252', NULL, '', '0054907252', '20219201', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (22, 'Moh.Arifin', '51168737', '0051168737', NULL, '', '0051168737', '20219202', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (23, 'Muchammad Mugni Abubakar', '45728797', '0045728797', NULL, '', '0045728797', '20219203', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (24, 'Muhit adnan', '42835169', '0042835169', NULL, '', '0042835169', '20219204', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (25, 'Nayla Fitri Ramadhani', '63639761', '0063639761', NULL, '', '0063639761', '20219205', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (26, 'Nurmayanti', '57120591', '0057120591', NULL, '', '0057120591', '20219206', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (27, 'Pipin Nurhalimah', '69709073', '0069709073', NULL, '', '0069709073', '20219207', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (28, 'Pristiyani', '74339535', '0074339535', NULL, '', '0074339535', '20219208', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (29, 'Rahma Wati', '58828948', '0058828948', NULL, '', '0058828948', '20219209', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (30, 'Rio Hardiansyah', '65324879', '0065324879', NULL, '', '0065324879', '20219210', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (31, 'Risma Desmayani', '59643078', '0059643078', NULL, '', '0059643078', '20219211', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (32, 'Salsa Bilatul Zahra', '67943006', '0067943006', NULL, '', '0067943006', '20219212', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (33, 'Sri Wulan', '59299736', '0059299736', NULL, '', '0059299736', '20219213', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (34, 'Tiara Julianty', '62119356', '0062119356', NULL, '', '0062119356', '20219214', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (35, 'Virgiawan Revallino', '66453296', '0066453296', NULL, '', '0066453296', '20219215', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (36, 'Wahyudin Ahmad maulana', '79381714', '0079381714', NULL, '', '0079381714', '20219216', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (37, 'Yoga Maulana', '63486549', '0063486549', NULL, '', '0063486549', '20219217', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (38, 'Yogi  Mulyadi', '67661458', '0067661458', NULL, '', '0067661458', '20219218', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (39, 'Abduhady Fahrudin', '57337829', '0057337829', NULL, '', '0057337829', '20219219', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (40, 'Agnia Nissa Dewinta', '69730034', '0069730034', NULL, '', '0069730034', '20219220', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (41, 'Ardri Ardani', '63380872', '0063380872', NULL, '', '0063380872', '20219221', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (42, 'Asep Leo Saputra', '59444374', '0059444374', NULL, '', '0059444374', '20219222', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (43, 'Azrie Ikhwansyah', '65067311', '0065067311', NULL, '', '0065067311', '20219223', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (44, 'Daud Fatrangga Adi', '55760160', '0055760160', NULL, '', '0055760160', '20219224', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (45, 'Deva Hawlla Arendi', '52539354', '0052539354', NULL, '', '0052539354', '20219225', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (46, 'Devi Nurhikmah', '54447138', '0054447138', NULL, '', '0054447138', '20219226', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (47, 'Dimas Nauval Falah', '68515156', '0068515156', NULL, '', '0068515156', '20219227', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (48, 'Fairuz Putra Sema', '69626674', '0069626674', NULL, '', '0069626674', '20219228', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (49, 'Febry Indriani', '65877687', '0065877687', NULL, '', '0065877687', '20219229', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (50, 'Gilang Maulana Putra', '66466221', '0066466221', NULL, '', '0066466221', '20219230', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (51, 'Hendra Faturahman', '68584256', '0068584256', NULL, '', '0068584256', '20219231', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (52, 'Indriyani', '43228039', '0043228039', NULL, '', '0043228039', '20219232', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (53, 'Latifa April Liyana', '53765441', '0053765441', NULL, '', '0053765441', '20219233', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (54, 'Mawar', '57229675', '0057229675', NULL, '', '0057229675', '20219234', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (55, 'Meisya Syabrina Sumarna Putri', '65214309', '0065214309', NULL, '', '0065214309', '20219235', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (56, 'Miftah Dealany', '62774392', '0062774392', NULL, '', '0062774392', '20219236', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (57, 'Mohammad Reza Firdaus', '66238745', '0066238745', NULL, '', '0066238745', '20219237', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (58, 'Muhamad Aditya Kurniawan', '62463805', '0062463805', NULL, '', '0062463805', '20219238', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (59, 'Muhamad Revan Maulana', '61764080', '0061764080', NULL, '', '0061764080', '20219239', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (60, 'Muhammad Imron Rosyadi', '56485437', '0056485437', NULL, '', '0056485437', '20219240', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (61, 'Niha Husada', '62270687', '0062270687', NULL, '', '0062270687', '20219241', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (62, 'Nimaz Yumalia Nastiti', '0067571217', '0067571217', NULL, '', '0067571217', '20219242', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (63, 'Nurul Wihida', '0056117142', '0056117142', NULL, '', '0056117142', '20219243', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (64, 'Puspa Karim', '0054267418', '0054267418', NULL, '', '0054267418', '20219244', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (65, 'Putra Saepudin', '0069920960', '0069920960', NULL, '', '0069920960', '20219245', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (66, 'Rekha Pratiwi', '0059328183', '0059328183', NULL, '', '0059328183', '20219246', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (67, 'Restu Hendrian Permana', '0062397356', '0062397356', NULL, '', '0062397356', '20219247', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (68, 'Restu Rahayu', '20219248', '20219248', NULL, '', '20219248', '20219248', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (69, 'RhyRhyn Dwiva Chatharhyna Arlant', '0069784593', '0069784593', NULL, '', '0069784593', '20219249', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (70, 'Rizki Wahyudi', '0059502162', '0059502162', NULL, '', '0059502162', '20219250', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (71, 'Sahira Qadriyah', '0069566346', '0069566346', NULL, '', '0069566346', '20219251', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (72, 'Sheila Ramadhani', '0062330181', '0062330181', NULL, '', '0062330181', '20219252', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (73, 'Siva Fauziah Nurpadilah', '0066517275', '0066517275', NULL, '', '0066517275', '20219253', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (74, 'Yunis Tiara', '0056995174', '0056995174', NULL, '', '0056995174', '20219254', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (75, 'Zahra Nabila', '0061021646', '0061021646', NULL, '', '0061021646', '20219255', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (76, 'Ahmad Iqbal Multazam', '0053086868', '0053086868', NULL, '', '0053086868', '20219256', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (77, 'Abdul Ghani Nurfajri', '56311290', '0056311290', NULL, '', '0056311290', '20219257', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (78, 'Adi Rosadi', '69962289', '0069962289', NULL, '', '0069962289', '20219258', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (79, 'Ainun Nisa', '58291726', '0058291726', NULL, '', '0058291726', '20219259', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (80, 'Alfian Rizki', '63261364', '0063261364', NULL, '', '0063261364', '20219260', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (81, 'Angga Al-Ghipari', '59348172', '0059348172', NULL, '', '0059348172', '20219261', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (82, 'Arya Putra Fuad Ardian', '63798481', '0063798481', NULL, '', '0063798481', '20219262', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (83, 'Aulia Wahidah', '67023281', '0067023281', NULL, '', '0067023281', '20219263', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (84, 'Cikal Adityani Kartika', '62124971', '0062124971', NULL, '', '0062124971', '20219264', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (85, 'Daffa Ariiq Faadhilah', '58770954', '0058770954', NULL, '', '0058770954', '20219265', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (86, 'Dhendra Mulyadi', '53145060', '0053145060', NULL, '', '0053145060', '20219266', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (87, 'Dian Andriani', '66710038', '0066710038', NULL, '', '0066710038', '20219267', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (88, 'Dimas Ariq Fadila', '54224030', '0054224030', NULL, '', '0054224030', '20219268', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (89, 'Dita Dwi Lestari', '59343182', '0059343182', NULL, '', '0059343182', '20219269', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (90, 'Eka Noviyanti', '52275517', '0052275517', NULL, '', '0052275517', '20219270', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (91, 'Faurina Aprillia Kartika', '62110150', '0062110150', NULL, '', '0062110150', '20219271', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (92, 'Fuad Badruz Zaman', '67191856', '0067191856', NULL, '', '0067191856', '20219272', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (93, 'Fuad Fakhruddin', '62846469', '0062846469', NULL, '', '0062846469', '20219273', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (94, 'Hilda Fauziah', '65363865', '0065363865', NULL, '', '0065363865', '20219274', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (95, 'Irwan Husni Sawali', '53503647', '0053503647', NULL, '', '0053503647', '20219275', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (96, 'Muhammad Adriansyah', '61292366', '0061292366', NULL, '', '0061292366', '20219276', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (97, 'Muhammad Baghdavis Alfarizi', '66655339', '0066655339', NULL, '', '0066655339', '20219277', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (98, 'Muhammad Yassin', '62204609', '0062204609', NULL, '', '0062204609', '20219278', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (99, 'Mutiah Fauzah Azib', '63486704', '0063486704', NULL, '', '0063486704', '20219279', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (100, 'Nadine Alifia Arifin', '0062400574', '0062400574', NULL, '', '0062400574', '20219280', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (101, 'Najwa Nur kholifah', '0065258957', '0065258957', NULL, '', '0065258957', '20219281', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (102, 'Rian Dirgantara', '0054870251', '0054870251', NULL, '', '0054870251', '20219282', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (103, 'Risma Tri Puspitawati', '0061665085', '0061665085', NULL, '', '0061665085', '20219283', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (104, 'Rizki Ramadhani', '0067179610', '0067179610', NULL, '', '0067179610', '20219284', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (105, 'Salsabila anggraeni', '0063656823', '0063656823', NULL, '', '0063656823', '20219285', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (106, 'Sifa Nurul Walidain', '0061519509', '0061519509', NULL, '', '0061519509', '20219286', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (107, 'Siti Muthiatul Latifah', '0065026406', '0065026406', NULL, '', '0065026406', '20219287', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (108, 'Sri Anjani', '0067558010', '0067558010', NULL, '', '0067558010', '20219288', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (109, 'Sri Handayani', '0057267373', '0057267373', NULL, '', '0057267373', '20219289', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (110, 'Syihabbudin Ilhammulloh', '0054242589', '0054242589', NULL, '', '0054242589', '20219290', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (111, 'Syipa Rapidah Aini', '0064045190', '0064045190', NULL, '', '0064045190', '20219291', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (112, 'Thorik Maulana', '0065429297', '0065429297', NULL, '', '0065429297', '20219292', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (113, 'Triadi Widi Asmoro', '0053382972', '0053382972', NULL, '', '0053382972', '20219293', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (114, 'Yusuf Nurochman', '0062757304', '0062757304', NULL, '', '0062757304', '20219294', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (115, 'Afriyansyah Ramadhan', '20217001', '20217001', NULL, '', '20217001', '20217001', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (116, 'Alpian Surya Pratama', '82467202', '0082467202', NULL, '', '0082467202', '20217002', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (117, 'Alya Nazihah', '771481773', '0771481773', NULL, '', '0771481773', '20217003', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (118, 'Ayudistia Sabila', '76337184', '0076337184', NULL, '', '0076337184', '20217005', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (119, 'Fahri Juliansyah', '20217006', '20217006', NULL, '', '20217006', '20217006', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (120, 'Ike Isma Wati', '3085189965', '3085189965', NULL, '', '3085189965', '20217007', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (121, 'Kikan Septi Rahmadhani', '75857921', '0075857921', NULL, '', '0075857921', '20217008', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (122, 'Melani', '83122472', '0083122472', NULL, '', '0083122472', '20217009', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (123, 'Muhammad Gibransyah', '86446836', '0086446836', NULL, '', '0086446836', '20217011', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (124, 'Pitri Anti Zahra', '89220208', '0089220208', NULL, '', '0089220208', '20217012', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (125, 'Raisyah Anggraeni', '84932997', '0084932997', NULL, '', '0084932997', '20217013', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (126, 'Rizky Anugrah', '20217014', '20217014', NULL, '', '20217014', '20217014', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (127, 'Rizky Aryanto', '89216740', '0089216740', NULL, '', '0089216740', '20217015', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (128, 'Sabihisma Asyari', '20217016', '20217016', NULL, '', '20217016', '20217016', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (129, 'Salman Alfarizi', '79990170', '0079990170', NULL, '', '0079990170', '20217017', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (130, 'Siti Sadiah', '88929540', '0088929540', NULL, '', '0088929540', '20217019', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (131, 'Tasya Afrilia', '77175293', '0077175293', NULL, '', '0077175293', '20217020', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (132, 'Varil Febri Valdian', '85937044', '0085937044', NULL, '', '0085937044', '20217021', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (133, 'Yudi Wahyudi', '76952183', '0076952183', NULL, '', '0076952183', '20217022', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (134, 'Siti Erna Nabila', '55332936', '0055332936', NULL, '', '0055332936', '20217044', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (135, 'Muhammad Sulthon Auliak', '20217060', '20217060', NULL, '', '20217060', '20217060', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (136, 'Pazar Shopiyan', '72862277', '0072862277', NULL, '', '0072862277', '20217261', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (137, 'Arip Saepudin', '20217004', '20217004', NULL, '', '20217004', '20217004', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (138, 'Muhamad Sigit', '88106841', '0088106841', NULL, '', '0088106841', '20217010', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (139, 'Siti Fatimah Farhatul Uyun', '88456617', '0088456617', NULL, '', '0088456617', '20217018', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (140, 'Ade Al Barkah', '83601988', '0083601988', NULL, '', '0083601988', '20217023', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (141, 'Adinda Nursyamsiah', '73401051', '0073401051', NULL, '', '0073401051', '20217024', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (142, 'Ahmad Muammar Hasbi Mubarok', '73542185', '0073542185', NULL, '', '0073542185', '20217025', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (143, 'Alfina Alfiyyaturrahma', '85470920', '0085470920', NULL, '', '0085470920', '20217026', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (144, 'Annisa Rismahaki', '84469513', '0084469513', NULL, '', '0084469513', '20217027', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (145, 'Aulya Salsabila Sujarwo', '85179260', '0085179260', NULL, '', '0085179260', '20217028', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (146, 'Bunga', '68514210', '0068514210', NULL, '', '0068514210', '20217029', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (147, 'Dede Sutisna', '20217030', '20217030', NULL, '', '20217030', '20217030', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (148, 'Deni Sonjaya', '20217031', '20217031', NULL, '', '20217031', '20217031', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (149, 'Dhea Fitria', '82545243', '0082545243', NULL, '', '0082545243', '20217032', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (150, 'Dimas Rizki Aprian', '82943193', '0082943193', NULL, '', '0082943193', '20217033', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (151, 'Intan Oktaviani', '84993036', '0084993036', NULL, '', '0084993036', '20217034', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (152, 'Jamaludin', '75483556', '0075483556', NULL, '', '0075483556', '20217035', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (153, 'Mega Indah Komala', '86786351', '0086786351', NULL, '', '0086786351', '20217036', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (154, 'Muhamad Gilang Ramadan', '58350135', '0058350135', NULL, '', '0058350135', '20217037', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (155, 'Muhammad Alwi Fauzan', '81168096', '0081168096', NULL, '', '0081168096', '20217038', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (156, 'Ropiatus Saadah', '89836818', '0089836818', NULL, '', '0089836818', '20217040', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (157, 'Samsul Vikry', '79371018', '0079371018', NULL, '', '0079371018', '20217041', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (158, 'Sarah Salbiyah', '73483563', '0073483563', NULL, '', '0073483563', '20217042', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (159, 'Silvi', '715533365', '00715533365', NULL, '', '00715533365', '20217043', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (160, 'Siti Salma Sumayyah', '0089366877', '0089366877', NULL, '', '0089366877', '20217046', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (161, 'Syahrul Azmi', '0079033338', '0079033338', NULL, '', '0079033338', '20217047', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (162, 'Wilda Ulvia Marwah', '20217048', '20217048', NULL, '', '20217048', '20217048', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (163, 'Ziddan Alfarizi', '0083921697', '0083921697', NULL, '', '0083921697', '20217049', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (164, 'Siti Dalpa Mayasripah', '0083880593', '0083880593', NULL, '', '0083880593', '20217070', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (165, 'Rizki Fadilah', '0081708719', '0081708719', NULL, '', '0081708719', '20217262', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (166, 'Zahra Nursyamsi', '0084654787', '0084654787', NULL, '', '0084654787', '20217296', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (167, 'Muhammad Khalifah', '81321745', '0081321745', NULL, '', '0081321745', '20217039', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (168, 'Siti Padilah Patmawati Ramdan', '73147444', '0073147444', NULL, '', '0073147444', '20217045', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (169, 'Adam Raihan Hevi', '86354181', '0086354181', NULL, '', '0086354181', '20217050', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (170, 'Al Farizi Muttaqin', '9989269688', '9989269688', NULL, '', '9989269688', '20217051', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (171, 'Ardian Syahputra', '8639884', '008639884', NULL, '', '008639884', '20217052', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (172, 'Detya Hilda', '20217053', '20217053', NULL, '', '20217053', '20217053', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (173, 'Fatih Raushan Fikra', '56168986', '0056168986', NULL, '', '0056168986', '20217054', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (174, 'Haekal Arif Hidayattulloh', '82471434', '0082471434', NULL, '', '0082471434', '20217055', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (175, 'Hilma Nuraulia', '48810158', '0048810158', NULL, '', '0048810158', '20217056', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (176, 'Iqlima Khoiruniszya', '85488492', '0085488492', NULL, '', '0085488492', '20217057', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (177, 'Muhamad Rhaka Pratama', '79124816', '0079124816', NULL, '', '0079124816', '20217058', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (178, 'Muhammad Kenzo Mahesa', '82982493', '0082982493', NULL, '', '0082982493', '20217059', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (179, 'Nida Hanipah Nur', '83025493', '0083025493', NULL, '', '0083025493', '20217061', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (180, 'Noviyanti', '88274816', '0088274816', NULL, '', '0088274816', '20217062', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (181, 'Priska Aulia', '88051698', '0088051698', NULL, '', '0088051698', '20217063', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (182, 'Raditia Zein Haikal Firdaus', '78182058', '0078182058', NULL, '', '0078182058', '20217064', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (183, 'Rafsanjani Ahmadinejad', '20217065', '20217065', NULL, '', '20217065', '20217065', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (184, 'Rahmayani', '20217066', '20217066', NULL, '', '20217066', '20217066', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (185, 'Rumaisha Zahra Asy Syifa', '74592678', '0074592678', NULL, '', '0074592678', '20217067', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (186, 'Safitri Ulandari', '20217068', '20217068', NULL, '', '20217068', '20217068', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (187, 'Salwa Mustika Sari', '79358730', '0079358730', NULL, '', '0079358730', '20217069', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (188, 'Sri Kiranti', '20217071', '20217071', NULL, '', '20217071', '20217071', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (189, 'Dani Bagas Setiono', '0065692192', '0065692192', NULL, '', '0065692192', '20218072', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (190, 'Denis Shaputra', '0061860645', '0061860645', NULL, '', '0061860645', '20218073', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (191, 'Devina Putri Wardani', '0072303677', '0072303677', NULL, '', '0072303677', '20218074', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (192, 'Diah Ayu Kinanti', '0073967876', '0073967876', NULL, '', '0073967876', '20218075', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (193, 'Didi Fauzi', '20218076', '20218076', NULL, '', '20218076', '20218076', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (194, 'Dina Muliawati', '20218077', '20218077', NULL, '', '20218077', '20218077', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (195, 'Eka Rahma Aulia', '20218078', '20218078', NULL, '', '20218078', '20218078', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (196, 'Endang Rusmana', '0057542980', '0057542980', NULL, '', '0057542980', '20218079', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (197, 'Fauzan Ahmad Maulana', '20218080', '20218080', NULL, '', '20218080', '20218080', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (198, 'Ida Pratiwi', '0062143829', '0062143829', NULL, '', '0062143829', '20218081', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (199, 'Ima Rohimah', '20218082', '20218082', NULL, '', '20218082', '20218082', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (200, 'Ira Mayasopa', '0074225875', '0074225875', NULL, '', '0074225875', '20218083', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (201, 'Kaela RioRamadani Putri Suhaeri', '20218084', '20218084', NULL, '', '20218084', '20218084', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (202, 'Latip Alamsah Putra', '20218085', '20218085', NULL, '', '20218085', '20218085', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (203, 'Mega Lestari', '20218086', '20218086', NULL, '', '20218086', '20218086', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (204, 'Muhamad  Syarif Hidayatullah', '0085365992', '0085365992', NULL, '', '0085365992', '20218087', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (205, 'Muhamad Fajri', '0078560660', '0078560660', NULL, '', '0078560660', '20218088', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (206, 'Muhammad Raihan', '0072197351', '0072197351', NULL, '', '0072197351', '20218089', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (207, 'Muhammad Rifki Halifatuloh', '20218090', '20218090', NULL, '', '20218090', '20218090', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (208, 'Nasrul', '0077100332', '0077100332', NULL, '', '0077100332', '20218091', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (209, 'Nazwa  Rohmatusaniyah', '0075283321', '0075283321', NULL, '', '0075283321', '20218092', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (210, 'Raditia Darmawan', '20218093', '20218093', NULL, '', '20218093', '20218093', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (211, 'Rahma Nurul Ulya', '0063970771', '0063970771', NULL, '', '0063970771', '20218094', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (212, 'Rahmat Hidayat', '20218095', '20218095', NULL, '', '20218095', '20218095', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (213, 'Rendi Maulana Muhamad', '0073605032', '0073605032', NULL, '', '0073605032', '20218096', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (214, 'Riyanti', '20218097', '20218097', NULL, '', '20218097', '20218097', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (215, 'Rizal Firdaus', '0065063173', '0065063173', NULL, '', '0065063173', '20218098', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (216, 'Rizki Dwi Saputra', '0073595231', '0073595231', NULL, '', '0073595231', '20218099', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (217, 'Shifa Aulia Putri', '0076607303', '0076607303', NULL, '', '0076607303', '20218100', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (218, 'Shinta Aulia', '0075061815', '0075061815', NULL, '', '0075061815', '20218101', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (219, 'Shoppy Rosiana', '0079178840', '0079178840', NULL, '', '0079178840', '20218102', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (220, 'Wahyu Triyono', '20218103', '20218103', NULL, '', '20218103', '20218103', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (221, 'Yafi Fawaz', '20218104', '20218104', NULL, '', '20218104', '20218104', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (222, 'Zamalullael', '0061124376', '0061124376', NULL, '', '0061124376', '20218105', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (223, 'Lidya Pratiwi', '0076473780', '0076473780', NULL, '', '0076473780', '20218106', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (224, 'Nayla Azahra', '0077575766', '0077575766', NULL, '', '0077575766', '20218107', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (225, 'Winda Lestari', '0065701919', '0065701919', NULL, '', '0065701919', '20218108', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (226, 'Aditya Bayu Ningrat', '0073310710', '0073310710', NULL, '', '0073310710', '20218109', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (227, 'Agung Laksono', '0076816431', '0076816431', NULL, '', '0076816431', '20218110', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (228, 'Ahmad Zulfi Safi\'i', '0059066969', '0059066969', NULL, '', '0059066969', '20218111', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (229, 'Akmal Karaji', '0057565104', '0057565104', NULL, '', '0057565104', '20218112', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (230, 'Alya Alysa Seputri', '0068670500', '0068670500', NULL, '', '0068670500', '20218113', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (231, 'Alya Safira', '0076452645', '0076452645', NULL, '', '0076452645', '20218114', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (232, 'Arga Maulana', '0077552092', '0077552092', NULL, '', '0077552092', '20218115', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (233, 'Argya Tahta Quthub Robani', '20218116', '20218116', NULL, '', '20218116', '20218116', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (234, 'Dery Hafizh Latif', '20218117', '20218117', NULL, '', '20218117', '20218117', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (235, 'Deva Samsul Awaludin', '20218118', '20218118', NULL, '', '20218118', '20218118', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (236, 'Faiq Nur Abdurrofi', '0076906343', '0076906343', NULL, '', '0076906343', '20218119', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (237, 'Faiz Ubaidillah', '0077437514', '0077437514', NULL, '', '0077437514', '20218120', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (238, 'Iis Sumiati', '20218121', '20218121', NULL, '', '20218121', '20218121', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (239, 'Indri Apriyani', '0075795036', '0075795036', NULL, '', '0075795036', '20218122', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (240, 'Joni Adi Purta', '20218123', '20218123', NULL, '', '20218123', '20218123', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (241, 'Leopard Ali Ahmad', '20218124', '20218124', NULL, '', '20218124', '20218124', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (242, 'Lintang Tiarasari', '20218125', '20218125', NULL, '', '20218125', '20218125', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (243, 'Listiyani', '0076018203', '0076018203', NULL, '', '0076018203', '20218126', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (244, 'Maryani', '0051943146', '0051943146', NULL, '', '0051943146', '20218127', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (245, 'Muhamad Fachri Mulyana', '0071347683', '0071347683', NULL, '', '0071347683', '20218128', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (246, 'Muhamad Ridwan', '0065265155', '0065265155', NULL, '', '0065265155', '20218129', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (247, 'Muhammad Lukmanul Hakim', '20218130', '20218130', NULL, '', '20218130', '20218130', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (248, 'Mutiara aini', '0076351106', '0076351106', NULL, '', '0076351106', '20218131', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (249, 'Niken Putri Ramadhani', '0064808958', '0064808958', NULL, '', '0064808958', '20218132', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (250, 'Noura Suci Aulia Firdaus', '20218133', '20218133', NULL, '', '20218133', '20218133', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (251, 'Nurdiansyah', '20218134', '20218134', NULL, '', '20218134', '20218134', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (252, 'Reihan andreansyah', '20218135', '20218135', NULL, '', '20218135', '20218135', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (253, 'Robi Abdilah', '0065142742', '0065142742', NULL, '', '0065142742', '20218136', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (254, 'Salwa Aulia', '0066541133', '0066541133', NULL, '', '0066541133', '20218137', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (255, 'Selpia Nopiani', '0069937140', '0069937140', NULL, '', '0069937140', '20218138', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (256, 'Sri Widiyanti', '0076505350', '0076505350', NULL, '', '0076505350', '20218139', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (257, 'Tiska Putri', '0063553737', '0063553737', NULL, '', '0063553737', '20218140', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (258, 'Wildan Aprian sahreza', '20218141', '20218141', NULL, '', '20218141', '20218141', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (259, 'Yuni Nurani', '0077109415', '0077109415', NULL, '', '0077109415', '20218142', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (260, 'Jindan Ahmad Tajalul Arifin', '0068220564', '0068220564', NULL, '', '0068220564', '20218143', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (261, 'Hastri Julianti', '0063817730', '0063817730', NULL, '', '0063817730', '20218260', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (262, 'Adi Riyanto', '20218144', '20218144', NULL, '', '20218144', '20218144', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (263, 'Adisty Nurhapsari', '0071781392', '0071781392', NULL, '', '0071781392', '20218145', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (264, 'Aditya Suryaman', '0063595984', '0063595984', NULL, '', '0063595984', '20218146', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (265, 'Akia Syifana Zahro', '0073022003', '0073022003', NULL, '', '0073022003', '20218147', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (266, 'Ali Saputra', '0074794564', '0074794564', NULL, '', '0074794564', '20218148', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (267, 'Benny Al Farras', '20218149', '20218149', NULL, '', '20218149', '20218149', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (268, 'Bintang Tata Afriani', '20218150', '20218150', NULL, '', '20218150', '20218150', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (269, 'Dania Arfatiana', '0077210905', '0077210905', NULL, '', '0077210905', '20218151', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (270, 'Dhini Setiya Utami', '0071178555', '0071178555', NULL, '', '0071178555', '20218152', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (271, 'Dian Kamaludin', '0061503092', '0061503092', NULL, '', '0061503092', '20218153', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (272, 'Halimatus sa\'diah', '0063165042', '0063165042', NULL, '', '0063165042', '20218154', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (273, 'Ihsan Mutakin', '20218155', '20218155', NULL, '', '20218155', '20218155', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (274, 'Indi Rahmawati', '0071904766', '0071904766', NULL, '', '0071904766', '20218156', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (275, 'Indra  Saputra', '0066335961', '0066335961', NULL, '', '0066335961', '20218157', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (276, 'Julia Wijayanti', '20218158', '20218158', NULL, '', '20218158', '20218158', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (277, 'Khaerul Pasha', '0065958015', '0065958015', NULL, '', '0065958015', '20218159', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (278, 'Kirania Siti Salma', '0075404094', '0075404094', NULL, '', '0075404094', '20218160', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (279, 'Lilis Krisnawati', '0068756109', '0068756109', NULL, '', '0068756109', '20218161', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (280, 'Lubna Siti Arifah', '20218162', '20218162', NULL, '', '20218162', '20218162', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (281, 'Mariyam Fatimah Azahra', '0073002930', '0073002930', NULL, '', '0073002930', '20218163', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (282, 'Muhamad Afrizal Syahdan', '0064391517', '0064391517', NULL, '', '0064391517', '20218164', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (283, 'Muhamad Akmal Fauzan', '0072018714', '0072018714', NULL, '', '0072018714', '20218165', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (284, 'Muhamad Fauzan', '20218166', '20218166', NULL, '', '20218166', '20218166', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (285, 'Muhamad Fazri', '20218167', '20218167', NULL, '', '20218167', '20218167', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (286, 'Muhamad Heriza Fadilah Susanto', '0078119485', '0078119485', NULL, '', '0078119485', '20218168', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (287, 'Muhamad Ilham', '0074908524', '0074908524', NULL, '', '0074908524', '20218169', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (288, 'Nuraeni', '20218170', '20218170', NULL, '', '20218170', '20218170', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (289, 'Radifan Rifai Bahtiar', '0077424949', '0077424949', NULL, '', '0077424949', '20218171', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (290, 'Rama Diansah', '20218172', '20218172', NULL, '', '20218172', '20218172', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (291, 'Rian Hidayat', '20218173', '20218173', NULL, '', '20218173', '20218173', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (292, 'Ridwan Subhana', '20218174', '20218174', NULL, '', '20218174', '20218174', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (293, 'Risma Listiawati', '0076387685', '0076387685', NULL, '', '0076387685', '20218175', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (294, 'Trisya Auduia Susanto', '0063409399', '0063409399', NULL, '', '0063409399', '20218176', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (295, 'Zahra Narfadillah', '20218177', '20218177', NULL, '', '20218177', '20218177', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (296, 'Nayla Milia Amara', '0071014150', '0071014150', NULL, '', '0071014150', '20218178', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (297, 'Riza Simarulloh', '0062865302', '0062865302', NULL, '', '0062865302', '20218179', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (298, 'Syahra Azzahra', '0075815412', '0075815412', NULL, '', '0075815412', '20218180', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);
INSERT INTO `master_siswa` (`id_siswa`, `nama`, `nis`, `nisn`, `email`, `jenis_kelamin`, `username`, `password`, `foto`, `tempat_lahir`, `tanggal_lahir`, `agama`, `status_keluarga`, `anak_ke`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `hp`, `skhun`, `nama_ayah`, `nohp_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `alamat_ayah`, `nama_ibu`, `nohp_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `alamat_ibu`, `nama_wali`, `pendidikan_wali`, `pekerjaan_wali`, `nohp_wali`, `alamat_wali`, `tahun_masuk`, `kelas_awal`) VALUES (299, 'Rizky Nursyahbani', '0079015790', '0079015790', NULL, '', '0079015790', '20218263', 'assets/img/siswa.png', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0);


#
# TABLE STRUCTURE FOR: master_smt
#

DROP TABLE IF EXISTS `master_smt`;

CREATE TABLE `master_smt` (
  `id_smt` int(11) NOT NULL AUTO_INCREMENT,
  `smt` varchar(10) NOT NULL,
  `nama_smt` varchar(10) NOT NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY (`id_smt`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `master_smt` (`id_smt`, `smt`, `nama_smt`, `active`) VALUES (1, 'Ganjil', 'I (satu)', 0);
INSERT INTO `master_smt` (`id_smt`, `smt`, `nama_smt`, `active`) VALUES (2, 'Genap', 'II (dua)', 1);


#
# TABLE STRUCTURE FOR: master_tp
#

DROP TABLE IF EXISTS `master_tp`;

CREATE TABLE `master_tp` (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(20) NOT NULL,
  `active` int(2) NOT NULL,
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (1, '2020/2021', 1);
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (11, '2021/2022', 0);
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (16, '2022/2023', 0);
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (18, '2023/2024', 0);


#
# TABLE STRUCTURE FOR: post
#

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `dari` int(11) NOT NULL COMMENT 'user',
  `dari_group` int(11) NOT NULL,
  `kepada` varchar(50) NOT NULL COMMENT 'group',
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: post_comments
#

DROP TABLE IF EXISTS `post_comments`;

CREATE TABLE `post_comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `dari_group` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: post_reply
#

DROP TABLE IF EXISTS `post_reply`;

CREATE TABLE `post_reply` (
  `id_reply` int(11) NOT NULL AUTO_INCREMENT,
  `id_comment` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `dari_group` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_reply`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: rapor_admin_setting
#

DROP TABLE IF EXISTS `rapor_admin_setting`;

CREATE TABLE `rapor_admin_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `kkm_tunggal` int(1) NOT NULL DEFAULT 0,
  `kkm` int(3) DEFAULT NULL,
  `bobot_ph` int(3) DEFAULT NULL,
  `bobot_pts` int(3) DEFAULT NULL,
  `bobot_pas` int(3) DEFAULT NULL,
  `bobot_absen` int(3) DEFAULT NULL,
  `tgl_rapor_akhir` text NOT NULL DEFAULT 'tanggal rapor',
  `tgl_rapor_pts` text NOT NULL DEFAULT 'tanggal rapor',
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `rapor_admin_setting` (`id_setting`, `kkm_tunggal`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `tgl_rapor_akhir`, `tgl_rapor_pts`) VALUES (1, 1, 70, 40, 30, 30, NULL, '19 Jan 2021', '22 Jan 2021');


#
# TABLE STRUCTURE FOR: rapor_catatan_wali
#

DROP TABLE IF EXISTS `rapor_catatan_wali`;

CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` longtext DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  PRIMARY KEY (`id_catatan_wali`)
) ENGINE=InnoDB AUTO_INCREMENT=5218112 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_data_catatan
#

DROP TABLE IF EXISTS `rapor_data_catatan`;

CREATE TABLE `rapor_data_catatan` (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int(2) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `rank` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_catatan`)
) ENGINE=InnoDB AUTO_INCREMENT=52327 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_data_fisik
#

DROP TABLE IF EXISTS `rapor_data_fisik`;

CREATE TABLE `rapor_data_fisik` (
  `id_fisik` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  PRIMARY KEY (`id_fisik`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_data_sikap
#

DROP TABLE IF EXISTS `rapor_data_sikap`;

CREATE TABLE `rapor_data_sikap` (
  `id_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int(2) NOT NULL,
  `sikap` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sikap`)
) ENGINE=InnoDB AUTO_INCREMENT=52211 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_fisik
#

DROP TABLE IF EXISTS `rapor_fisik`;

CREATE TABLE `rapor_fisik` (
  `id_fisik` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `kondisi` longtext NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  PRIMARY KEY (`id_fisik`)
) ENGINE=InnoDB AUTO_INCREMENT=5218112 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_kikd
#

DROP TABLE IF EXISTS `rapor_kikd`;

CREATE TABLE `rapor_kikd` (
  `id_kikd` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_kelas` int(11) NOT NULL,
  `aspek` int(1) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `materi_kikd` longtext NOT NULL,
  PRIMARY KEY (`id_kikd`)
) ENGINE=InnoDB AUTO_INCREMENT=105229 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_kkm
#

DROP TABLE IF EXISTS `rapor_kkm`;

CREATE TABLE `rapor_kkm` (
  `id_kkm` int(11) NOT NULL AUTO_INCREMENT,
  `kkm` int(3) DEFAULT 0,
  `bobot_ph` int(3) DEFAULT 0,
  `bobot_pts` int(3) DEFAULT 0,
  `bobot_pas` int(3) DEFAULT 0,
  `bobot_absen` int(3) DEFAULT 0,
  `beban_jam` int(2) DEFAULT 0,
  PRIMARY KEY (`id_kkm`)
) ENGINE=InnoDB AUTO_INCREMENT=6702 DEFAULT CHARSET=utf8mb4;

INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (1691, 70, 60, 20, 20, 0, 2);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (1701, 60, 60, 20, 20, 0, 0);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (5692, 70, NULL, NULL, NULL, 0, NULL);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (5702, 70, NULL, NULL, NULL, 0, NULL);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (6691, 70, 60, 20, 20, 0, 2);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (6692, 70, NULL, NULL, NULL, 0, NULL);
INSERT INTO `rapor_kkm` (`id_kkm`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `beban_jam`) VALUES (6701, 70, 60, 20, 20, 0, 0);


#
# TABLE STRUCTURE FOR: rapor_nilai_akhir
#

DROP TABLE IF EXISTS `rapor_nilai_akhir`;

CREATE TABLE `rapor_nilai_akhir` (
  `id_nilai_akhir` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `akhir` int(3) DEFAULT NULL,
  `predikat` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_akhir`)
) ENGINE=InnoDB AUTO_INCREMENT=105218112 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: rapor_nilai_ekstra
#

DROP TABLE IF EXISTS `rapor_nilai_ekstra`;

CREATE TABLE `rapor_nilai_ekstra` (
  `id_nilai_ekstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekstra` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `predikat` varchar(1) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_nilai_ekstra`)
) ENGINE=InnoDB AUTO_INCREMENT=57016613 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: rapor_nilai_harian
#

DROP TABLE IF EXISTS `rapor_nilai_harian`;

CREATE TABLE `rapor_nilai_harian` (
  `id_nilai_harian` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_nilai_harian`)
) ENGINE=InnoDB AUTO_INCREMENT=105218112 DEFAULT CHARSET=utf8mb4;



#
# TABLE STRUCTURE FOR: rapor_nilai_pts
#

DROP TABLE IF EXISTS `rapor_nilai_pts`;

CREATE TABLE `rapor_nilai_pts` (
  `id_nilai_pts` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `predikat` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_pts`)
) ENGINE=InnoDB AUTO_INCREMENT=105218112 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: rapor_nilai_sikap
#

DROP TABLE IF EXISTS `rapor_nilai_sikap`;

CREATE TABLE `rapor_nilai_sikap` (
  `id_nilai_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis` int(1) DEFAULT NULL,
  `nilai` longtext NOT NULL,
  `deskripsi` longtext DEFAULT NULL,
  PRIMARY KEY (`id_nilai_sikap`)
) ENGINE=InnoDB AUTO_INCREMENT=107225112 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: rapor_prestasi
#

DROP TABLE IF EXISTS `rapor_prestasi`;

CREATE TABLE `rapor_prestasi` (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
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
  `p3_desk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_ranking`)
) ENGINE=InnoDB AUTO_INCREMENT=5218112 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
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
  `db_versi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `setting` (`id_setting`, `kode_sekolah`, `sekolah`, `npsn`, `nss`, `jenjang`, `kepsek`, `nip`, `tanda_tangan`, `alamat`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `telp`, `fax`, `web`, `email`, `nama_aplikasi`, `logo_kanan`, `logo_kiri`, `versi`, `ip_server`, `waktu`, `server`, `id_server`, `sekolah_id`, `db_versi`) VALUES (1, NULL, 'MTS AL HASAN', NULL, '123456', 2, 'Hj. Nurhayati, S.Pd.I', '', 'uploads/settings/tandatangan.png', 'Jln. Jend. A. Yani Dawuan Barat', 'Dawuan Barat', 'Cikampek  ', 'Karawang', 'Jawa Barat', 0, '1234', NULL, NULL, NULL, 'ELEARNING MTS AL HASAN', 'uploads/settings/logo_kanan.png', 'uploads/settings/logo_kiri.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  UNIQUE KEY `uc_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1883 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (1, '127.0.0.1', 'administrator', '$2y$12$W3IhA5RTdMLyQNfsfbiRdOdDLlp3tzNyGqoYFjVjrXyfTrewWKQNa', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1614834896, 1, 'Admin', 'admin', 'ADMIN', '0');


#
# TABLE STRUCTURE FOR: users_groups
#

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1883 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (3, 1, 1);


#
# TABLE STRUCTURE FOR: users_profile
#

DROP TABLE IF EXISTS `users_profile`;

CREATE TABLE `users_profile` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` text NOT NULL,
  `jabatan` text DEFAULT NULL,
  `level_access` int(11) NOT NULL DEFAULT 0,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users_profile` (`id_user`, `nama_lengkap`, `jabatan`, `level_access`, `foto`) VALUES (1, 'Test Aja', 'Proktor', 0, 'uploads/profiles/foto_1.png');


