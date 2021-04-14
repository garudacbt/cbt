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
# TABLE STRUCTURE FOR: cbt_alokasi
#

DROP TABLE IF EXISTS `cbt_alokasi`;

CREATE TABLE `cbt_alokasi` (
  `id_alokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `jarak` int(3) NOT NULL,
  `jam_ke` int(2) NOT NULL,
  PRIMARY KEY (`id_alokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;


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
  `rekap` int(1) NOT NULL DEFAULT 0,
  `jam_ke` int(2) NOT NULL DEFAULT 0,
  `jarak` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;


#
# TABLE STRUCTURE FOR: cbt_jenis
#

DROP TABLE IF EXISTS `cbt_jenis`;

CREATE TABLE `cbt_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (1, 'Penilaian Harian', 'PH');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (2, 'Penilaian Tengah Semester', 'PTS');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (3, 'Penilaian Akhir Semester', 'PAS');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (4, 'Penilaian Akhir Tahun', 'PAT');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (5, 'Ujian Madrasah Berbasis Komputer', 'UMBK');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (9, 'Try Out', 'TO');
INSERT INTO `cbt_jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`) VALUES (10, 'Simulasi', 'SIML');


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

INSERT INTO `cbt_kop_absensi` (`id_kop`, `header_1`, `header_2`, `header_3`, `header_4`, `proktor`, `pengawas_1`, `pengawas_2`) VALUES (123456, 'MADRASAH TSANAWIYAH AL HASAN', 'DAFTAR KEHADIRAN', 'UJIAN AKHIR MADRASAH (UAMBK)', 'TP: 2020/2021', 'Abdullah Al Hasan', 'Abdullah Al Hasan', 'p');


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

INSERT INTO `cbt_kop_berita` (`id_kop`, `header_1`, `header_2`, `header_3`, `header_4`) VALUES (123456, 'MADRASAH TSANAWIYAH AL HASAN', 'BERITA ACARA PELAKSANAAN', 'TRY OUT U M B K', 'Tahun Pelajaran: 2020/2021 Semester: I');


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

INSERT INTO `cbt_kop_kartu` (`id_set_kartu`, `header_1`, `header_2`, `header_3`, `header_4`, `tanggal`) VALUES (123456, 'MADRASAH TSANAWIYAH', 'KARTU PESERTA', 'UJIAN AKHIR MADRASAH (UMBK)', 'TAHUN PELAJARAN: 2020/2021', '29 Maret 2021');


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
# TABLE STRUCTURE FOR: cbt_rekap
#

DROP TABLE IF EXISTS `cbt_rekap`;

CREATE TABLE `cbt_rekap` (
  `id_rekap` int(11) NOT NULL AUTO_INCREMENT,
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
  `nama_guru` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekap`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_rekap_nilai
#

DROP TABLE IF EXISTS `cbt_rekap_nilai`;

CREATE TABLE `cbt_rekap_nilai` (
  `id_rekap_nilai` int(100) NOT NULL AUTO_INCREMENT,
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
  `id_guru` int(11) NOT NULL,
  PRIMARY KEY (`id_rekap_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=5167 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: cbt_ruang
#

DROP TABLE IF EXISTS `cbt_ruang`;

CREATE TABLE `cbt_ruang` (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) NOT NULL,
  `kode_ruang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ruang`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (1, 'Ruang 1', 'LAB-KOM');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (2, 'Ruang 2', 'R2');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (3, 'Ruang 3', 'R3');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (7, 'Ruang 4', 'R4');
INSERT INTO `cbt_ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`) VALUES (8, 'Ruang 5', 'R5');


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

INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES (1, 'Sesi 1', 'S1', '08:00:00', '10:30:00', 1);
INSERT INTO `cbt_sesi` (`id_sesi`, `nama_sesi`, `kode_sesi`, `waktu_mulai`, `waktu_akhir`, `aktif`) VALUES (2, 'Sesi 2', 'S2', '10:00:00', '12:00:00', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2919 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=568 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=2107 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=300293 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: master_hari_efektif
#

DROP TABLE IF EXISTS `master_hari_efektif`;

CREATE TABLE `master_hari_efektif` (
  `id_hari_efektif` int(11) NOT NULL AUTO_INCREMENT,
  `jml_hari_efektif` int(3) NOT NULL,
  PRIMARY KEY (`id_hari_efektif`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_hari_efektif` (`id_hari_efektif`, `jml_hari_efektif`) VALUES (11, 97);
INSERT INTO `master_hari_efektif` (`id_hari_efektif`, `jml_hari_efektif`) VALUES (12, 200);


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
  `nisn` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nis` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kelas_awal` int(5) NOT NULL,
  `tahun_masuk` varchar(30) DEFAULT NULL,
  `sekolah_asal` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'siswa.png',
  `anak_ke` int(2) DEFAULT NULL,
  `status_keluarga` enum('1','2','3') NOT NULL DEFAULT '1',
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
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
  `nohp_ayah` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_ayah` longtext DEFAULT NULL,
  `nama_ibu` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir_ibu` varchar(50) DEFAULT NULL,
  `pendidikan_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_ibu` int(15) DEFAULT NULL,
  `alamat_ibu` longtext DEFAULT NULL,
  `nama_wali` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_lahir_wali` varchar(50) DEFAULT NULL,
  `pendidikan_wali` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nohp_wali` int(15) DEFAULT NULL,
  `alamat_wali` longtext DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=latin1;


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
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (2, '2021/2022', 0);
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (3, '2022/2023', 0);
INSERT INTO `master_tp` (`id_tp`, `tahun`, `active`) VALUES (4, '2023/2024', 0);


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;


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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: rapor_admin_setting
#

DROP TABLE IF EXISTS `rapor_admin_setting`;

CREATE TABLE `rapor_admin_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `kkm_tunggal` int(1) NOT NULL DEFAULT 0,
  `kkm` int(3) DEFAULT NULL,
  `bobot_ph` int(3) DEFAULT NULL,
  `bobot_pts` int(3) DEFAULT NULL,
  `bobot_pas` int(3) DEFAULT NULL,
  `bobot_absen` int(3) DEFAULT NULL,
  `tgl_rapor_akhir` text NOT NULL DEFAULT 'tanggal rapor',
  `tgl_rapor_pts` text NOT NULL DEFAULT 'tanggal rapor',
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO `rapor_admin_setting` (`id_setting`, `id_tp`, `id_smt`, `kkm_tunggal`, `kkm`, `bobot_ph`, `bobot_pts`, `bobot_pas`, `bobot_absen`, `tgl_rapor_akhir`, `tgl_rapor_pts`) VALUES (12, 1, 2, 1, 70, 40, 20, 40, NULL, '19 Jan 2021', '08 Apr 2021');


#
# TABLE STRUCTURE FOR: rapor_catatan_wali
#

DROP TABLE IF EXISTS `rapor_catatan_wali`;

CREATE TABLE `rapor_catatan_wali` (
  `id_catatan_wali` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
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
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
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
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
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
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
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
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kkm`)
) ENGINE=InnoDB AUTO_INCREMENT=6702 DEFAULT CHARSET=utf8mb4;


#
# TABLE STRUCTURE FOR: rapor_naik
#

DROP TABLE IF EXISTS `rapor_naik`;

CREATE TABLE `rapor_naik` (
  `id_naik` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `naik` int(11) NOT NULL,
  PRIMARY KEY (`id_naik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
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
# TABLE STRUCTURE FOR: running_text
#

DROP TABLE IF EXISTS `running_text`;

CREATE TABLE `running_text` (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id_text`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO `running_text` (`id_text`, `text`) VALUES (1, 'Selamat melaksanakan Try Out UMBK tingkat MTs');
INSERT INTO `running_text` (`id_text`, `text`) VALUES (2, 'test 2');
INSERT INTO `running_text` (`id_text`, `text`) VALUES (3, 'test3');
INSERT INTO `running_text` (`id_text`, `text`) VALUES (4, 'test 56');
INSERT INTO `running_text` (`id_text`, `text`) VALUES (5, '');


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
) ENGINE=InnoDB AUTO_INCREMENT=2471 DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB AUTO_INCREMENT=2471 DEFAULT CHARSET=utf8;


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


