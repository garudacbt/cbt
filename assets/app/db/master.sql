/*
 Modifikasi Struktur DB
 Source Server         : origrata
 Source Server Type    : MySQL
 Source Server Version : 50739
 Source Host           : origrata:3306
 Source Schema         : master_cbt

 Target Server Type    : MySQL
 Target Server Version : 50739
 File Encoding         : 65001

 Date: 06/06/2023 22:01:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for api_setting
-- ----------------------------
-- DROP TABLE IF EXISTS `api_setting`;
CREATE TABLE `api_setting`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auto_sync` int(11) NOT NULL DEFAULT 0,
  `edit_profile_siswa` int(11) NOT NULL DEFAULT 0,
  `edit_profile_guru` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of api_setting
-- ----------------------------

-- ----------------------------
-- Table structure for api_token
-- ----------------------------
-- DROP TABLE IF EXISTS `api_token`;
CREATE TABLE `api_token`  (
  `id_api` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `agent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `device` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_api`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of api_token
-- ----------------------------

-- ----------------------------
-- Table structure for buku_induk
-- ----------------------------
-- DROP TABLE IF EXISTS `buku_induk`;
CREATE TABLE `buku_induk`  (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rombel_awal` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_panggilan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bahasa` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jml_saudara_kandung` int(11) NOT NULL DEFAULT 0,
  `jml_saudara_tiri` int(11) NOT NULL DEFAULT 0,
  `jml_saudara_angkat` int(11) NOT NULL DEFAULT 0,
  `yatim` int(11) NOT NULL DEFAULT 0 COMMENT '0=ada orang-tua, 1=yatim, 2=yatim piatu',
  `tinggal_bersama` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '1=orang-tua, 2=saudara, 3=wali, 4=asrama/pesantren, 5=kost, 6=lainnya',
  `jarak` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gol_darah` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penyakit` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `kelainan_fisik` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kegemaran` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `beasiswa` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `no_ijazah_sebelumnya` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tahun_lulus_sebelumnya` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pindahan_dari` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alasan_kepindahan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agama_ayah` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `wn_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penghasilan_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hidup_meninggal_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agama_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `wn_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penghasilan_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hidup_meninggal_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir_wali` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agama_wali` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `wn_wali` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penghasilan_wali` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT 1 COMMENT '1= aktif, 2=lulus, 3=pindah, 4=keluar',
  `tahun_lulus` int(11) NULL DEFAULT NULL,
  `no_ijazah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelas_akhir` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lanjut_ke` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pindah_ke` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alasan_pindah` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_pindah` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bekerja_di` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `catatan_penting` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_siswa`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buku_induk
-- ----------------------------

-- ----------------------------
-- Table structure for bulan
-- ----------------------------
-- DROP TABLE IF EXISTS `bulan`;
CREATE TABLE `bulan`  (
  `id_bln` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bln` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_bln`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bulan
-- ----------------------------
INSERT INTO `bulan` VALUES (1, 'Januari');
INSERT INTO `bulan` VALUES (2, 'Februari');
INSERT INTO `bulan` VALUES (3, 'Maret');
INSERT INTO `bulan` VALUES (4, 'April');
INSERT INTO `bulan` VALUES (5, 'Mei');
INSERT INTO `bulan` VALUES (6, 'Juni');
INSERT INTO `bulan` VALUES (7, 'Juli');
INSERT INTO `bulan` VALUES (8, 'Agustus');
INSERT INTO `bulan` VALUES (9, 'September');
INSERT INTO `bulan` VALUES (10, 'Oktober');
INSERT INTO `bulan` VALUES (11, 'November');
INSERT INTO `bulan` VALUES (12, 'Desember');

-- ----------------------------
-- Table structure for cbt_bank_soal
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_bank_soal`;
CREATE TABLE `cbt_bank_soal`  (
  `id_bank` int(7) NOT NULL AUTO_INCREMENT,
  `bank_jenis_id` int(7) NOT NULL DEFAULT 0,
  `bank_kode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `bank_level` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank_kelas` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank_mapel_id` int(11) NULL DEFAULT NULL,
  `bank_jurusan_id` int(11) NOT NULL DEFAULT 0,
  `bank_guru_id` int(11) NULL DEFAULT NULL,
  `bank_nama` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kkm` int(11) NULL DEFAULT 0,
  `jml_soal` int(11) NOT NULL DEFAULT 0,
  `jml_esai` int(11) NOT NULL DEFAULT 0,
  `tampil_pg` int(11) NOT NULL DEFAULT 0,
  `tampil_esai` int(11) NOT NULL DEFAULT 0,
  `bobot_pg` int(11) NOT NULL DEFAULT 0,
  `bobot_esai` int(11) NOT NULL DEFAULT 0,
  `opsi` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT 0,
  `soal_agama` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jml_kompleks` int(11) NOT NULL DEFAULT 0,
  `tampil_kompleks` int(11) NOT NULL DEFAULT 0,
  `bobot_kompleks` int(11) NOT NULL DEFAULT 0,
  `jml_jodohkan` int(11) NOT NULL DEFAULT 0,
  `tampil_jodohkan` int(11) NOT NULL DEFAULT 0,
  `bobot_jodohkan` int(11) NOT NULL DEFAULT 0,
  `jml_isian` int(11) NOT NULL DEFAULT 0,
  `tampil_isian` int(11) NOT NULL DEFAULT 0,
  `bobot_isian` int(11) NOT NULL DEFAULT 0,
  `status_soal` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum selesai, 1=sudah selesai',
  PRIMARY KEY (`id_bank`) USING BTREE,
  UNIQUE INDEX `id_bank_soal`(`id_bank`) USING BTREE,
  UNIQUE INDEX `kode_bank_soal`(`bank_kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of cbt_bank_soal
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_durasi_siswa
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_durasi_siswa`;
CREATE TABLE `cbt_durasi_siswa`  (
  `id_durasi` int(7) NOT NULL,
  `id_siswa` int(7) NULL DEFAULT NULL,
  `id_jadwal` int(7) NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=belum ujian, 1=sedang ujian, 2=sudah ujian',
  `lama_ujian` time NULL DEFAULT NULL,
  `mulai` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `selesai` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reset` int(11) NOT NULL DEFAULT 0 COMMENT '0=tidak, 1=reset dari 0, 2=reset dari sisa waktu, 3=ulangi semua',
  `time_create` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_durasi`) USING BTREE,
  INDEX `Cbt_index_id_durasi`(`id_durasi`) USING BTREE COMMENT 'id durasi',
  INDEX `id_siswa`(`id_siswa`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_durasi_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_jadwal
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_jadwal`;
CREATE TABLE `cbt_jadwal`  (
  `id_jadwal` int(6) NOT NULL AUTO_INCREMENT,
  `id_tp` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_smt` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_bank` int(7) NULL DEFAULT NULL,
  `id_jenis` int(11) NULL DEFAULT NULL,
  `tgl_mulai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_selesai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `durasi_ujian` int(11) NOT NULL,
  `pengawas` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `acak_soal` int(11) NOT NULL,
  `acak_opsi` int(11) NOT NULL,
  `hasil_tampil` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ulang` int(11) NOT NULL,
  `reset_login` int(11) NOT NULL,
  `rekap` int(11) NOT NULL DEFAULT 0,
  `jam_ke` int(11) NOT NULL DEFAULT 0,
  `jarak` int(11) NOT NULL DEFAULT 0,
  `time_create` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jadwal`) USING BTREE,
  UNIQUE INDEX `idjawal_relation`(`id_jadwal`) USING BTREE,
  UNIQUE INDEX `id_bank_soal`(`id_bank`) USING BTREE,
  INDEX `idx_jns_fc`(`id_jenis`) USING BTREE,
  CONSTRAINT `id_bank_soal` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_jns_idx_ifc` FOREIGN KEY (`id_jenis`) REFERENCES `cbt_jenis` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of cbt_jadwal
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_jenis
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_jenis`;
CREATE TABLE `cbt_jenis`  (
  `id_jenis` int(2) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_jenis` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE,
  UNIQUE INDEX `idx_jns`(`id_jenis`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_jenis
-- ----------------------------
INSERT INTO `cbt_jenis` VALUES (1, 'Penilaian Harian', 'PH');
INSERT INTO `cbt_jenis` VALUES (2, 'Penilaian Tengah Semester', 'PTS');
INSERT INTO `cbt_jenis` VALUES (3, 'Penilaian Akhir Semester', 'PAS');
INSERT INTO `cbt_jenis` VALUES (4, 'Penilaian Akhir Tahun', 'PAT');
INSERT INTO `cbt_jenis` VALUES (5, 'Ujian Madrasah Berbasis Komputer', 'UMBK');
INSERT INTO `cbt_jenis` VALUES (6, 'Try Out', 'TO');
INSERT INTO `cbt_jenis` VALUES (7, 'Simulasi', 'SIML');

-- ----------------------------
-- Table structure for cbt_kelas_ruang
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_kelas_ruang`;
CREATE TABLE `cbt_kelas_ruang`  (
  `id_kelas_ruang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL DEFAULT 0,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `set_siswa` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_kelas_ruang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_kelas_ruang
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_kop_absensi
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_kop_absensi`;
CREATE TABLE `cbt_kop_absensi`  (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `proktor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pengawas_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pengawas_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kop`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_kop_absensi
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_kop_berita
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_kop_berita`;
CREATE TABLE `cbt_kop_berita`  (
  `id_kop` int(11) NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kop`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_kop_berita
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_kop_kartu
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_kop_kartu`;
CREATE TABLE `cbt_kop_kartu`  (
  `id_set_kartu` int(11) NOT NULL,
  `header_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `header_4` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_set_kartu`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_kop_kartu
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_nilai
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_nilai`;
CREATE TABLE `cbt_nilai`  (
  `id_nilai` int(11) NOT NULL,
  `pg_benar` int(11) NULL DEFAULT 0,
  `pg_nilai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `essai_nilai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `id_siswa` int(7) NULL DEFAULT NULL,
  `id_jadwal` int(7) NULL DEFAULT NULL,
  `kompleks_nilai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `jodohkan_nilai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `isian_nilai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `dikoreksi` int(11) NOT NULL DEFAULT 0,
  `time_create` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nilai`) USING BTREE,
  UNIQUE INDEX `id_nilai_idx`(`id_nilai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_nilai
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_nomor_peserta
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_nomor_peserta`;
CREATE TABLE `cbt_nomor_peserta`  (
  `id_nomor` int(11) NOT NULL,
  `id_siswa` int(7) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `nomor_peserta` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_nomor`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cbt_nomor_peserta
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_pengawas
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_pengawas`;
CREATE TABLE `cbt_pengawas`  (
  `id_pengawas` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_jadwal` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_ruang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_sesi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_guru` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_pengawas`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_pengawas
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_rekap
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_rekap`;
CREATE TABLE `cbt_rekap`  (
  `id_rekap` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `tp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_smt` int(11) NOT NULL,
  `smt` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_jadwal` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_jenis` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_jenis` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_bank` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank_kelas` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank_kode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bank_level` int(11) NOT NULL,
  `id_mapel` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_mapel` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_mulai` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_selesai` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tampil_pg` int(11) NOT NULL,
  `jawaban_pg` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tampil_esai` int(11) NOT NULL,
  `jawaban_esai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bobot_pg` int(11) NOT NULL,
  `bobot_esai` int(11) NOT NULL,
  `id_guru` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_guru` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_kelas` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_kompleks` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_jodohkan` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_isian` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_essai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_rekap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_rekap
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_rekap_nilai
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_rekap_nilai`;
CREATE TABLE `cbt_rekap_nilai`  (
  `id_rekap_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `tp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_smt` int(11) NOT NULL,
  `smt` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_bank` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT 0,
  `kelas` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mulai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `selesai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `durasi` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bobot_pg` int(11) NOT NULL,
  `jawaban_pg` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nilai_pg` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bobot_esai` int(11) NOT NULL,
  `jawaban_esai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nilai_esai` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `nama_siswa` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_peserta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `soal_kompleks` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_jodohkan` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_isian` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `soal_essai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `time_create` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekap_nilai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_rekap_nilai
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_ruang
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_ruang`;
CREATE TABLE `cbt_ruang`  (
  `id_ruang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_ruang` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_ruang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_ruang
-- ----------------------------
INSERT INTO `cbt_ruang` VALUES (1, 'Ruang 1', 'LAB-KOM');
INSERT INTO `cbt_ruang` VALUES (2, 'Ruang 2', 'R2');
INSERT INTO `cbt_ruang` VALUES (3, 'Ruang 3', 'R3');
INSERT INTO `cbt_ruang` VALUES (4, 'Ruang 4', 'R4');
INSERT INTO `cbt_ruang` VALUES (5, 'Ruang 5', 'R5');

-- ----------------------------
-- Table structure for cbt_sesi
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_sesi`;
CREATE TABLE `cbt_sesi`  (
  `id_sesi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_sesi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_sesi` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `aktif` int(11) NOT NULL,
  PRIMARY KEY (`id_sesi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_sesi
-- ----------------------------
INSERT INTO `cbt_sesi` VALUES (1, 'Sesi 1', 'S1', '07:30:00', '09:30:00', 1);
INSERT INTO `cbt_sesi` VALUES (2, 'Sesi 2', 'S2', '09:00:00', '12:30:00', 1);
INSERT INTO `cbt_sesi` VALUES (3, 'Sesi 3', 'S3', '10:30:00', '14:00:00', 1);

-- ----------------------------
-- Table structure for cbt_sesi_siswa
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_sesi_siswa`;
CREATE TABLE `cbt_sesi_siswa`  (
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NULL DEFAULT NULL,
  `ruang_id` int(11) NOT NULL,
  `sesi_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `smt_id` int(11) NOT NULL,
  PRIMARY KEY (`siswa_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_sesi_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_soal
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_soal`;
CREATE TABLE `cbt_soal`  (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(7) NULL DEFAULT NULL,
  `mapel_id` int(7) NULL DEFAULT 0,
  `jenis` int(1) NOT NULL COMMENT '1=ganda, 2=ganda kompleks, 3=menjodohkan, 4=isian singkat, 5=uraian',
  `nomor_soal` int(3) NULL DEFAULT 0,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file1` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tipe_file` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `soal` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `opsi_a` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `opsi_b` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `opsi_c` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `opsi_d` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `opsi_e` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `file_a` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_b` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_c` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_d` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jawaban` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_on` int(11) NULL DEFAULT NULL,
  `updated_on` int(11) NULL DEFAULT NULL,
  `tampilkan` int(11) NOT NULL DEFAULT 0,
  `deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kesulitan` int(11) NOT NULL DEFAULT 1 COMMENT 'tingkat kesulitan 1-10',
  `timer` int(11) NOT NULL DEFAULT 0 COMMENT '0=tidak, 1=ya',
  `timer_menit` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_soal`) USING BTREE,
  UNIQUE INDEX `id_soal_idx`(`id_soal`) USING BTREE,
  INDEX `id_bank_idx`(`bank_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_soal
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_soal_siswa
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_soal_siswa`;
CREATE TABLE `cbt_soal_siswa`  (
  `id_soal_siswa` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_bank` int(7) NULL DEFAULT NULL,
  `id_jadwal` int(6) NULL DEFAULT NULL,
  `id_soal` int(7) NULL DEFAULT NULL,
  `id_siswa` int(7) NULL DEFAULT NULL,
  `jenis_soal` int(11) NOT NULL,
  `no_soal_alias` int(11) NOT NULL,
  `opsi_alias_a` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opsi_alias_b` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opsi_alias_c` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opsi_alias_d` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `opsi_alias_e` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jawaban_alias` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jawaban_siswa` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jawaban_benar` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `point_essai` int(11) NULL DEFAULT 0,
  `soal_end` int(11) NOT NULL DEFAULT 0,
  `point_soal` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nilai_koreksi` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `nilai_otomatis` int(11) NOT NULL DEFAULT 0 COMMENT '0=otomatis, 1=dari guru',
  `time_create` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_soal_siswa`) USING BTREE,
  UNIQUE INDEX `is_soal_siswa`(`id_soal_siswa`) USING BTREE,
  INDEX `id_siswa`(`id_siswa`) USING BTREE,
  INDEX `id_jadwal`(`id_jadwal`) USING BTREE,
  INDEX `id_soal_fc`(`id_soal`) USING BTREE,
  INDEX `id_bank_fc`(`id_bank`) USING BTREE,
  CONSTRAINT `Id_siswa_fc` FOREIGN KEY (`id_siswa`) REFERENCES `master_siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_bank_fc` FOREIGN KEY (`id_bank`) REFERENCES `cbt_bank_soal` (`id_bank`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_jadwal_fc` FOREIGN KEY (`id_jadwal`) REFERENCES `cbt_jadwal` (`id_jadwal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_soal_fc` FOREIGN KEY (`id_soal`) REFERENCES `cbt_soal` (`id_soal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of cbt_soal_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for cbt_token
-- ----------------------------
-- DROP TABLE IF EXISTS `cbt_token`;
CREATE TABLE `cbt_token`  (
  `token` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `auto` int(11) NOT NULL,
  `id_token` int(11) NOT NULL AUTO_INCREMENT,
  `jarak` int(11) NOT NULL DEFAULT 0,
  `updated` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  PRIMARY KEY (`id_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cbt_token
-- ----------------------------
INSERT INTO `cbt_token` VALUES ('HILZCX', 0, 1, 0, '2022-03-25 08:05:15');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
-- DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (2, 'guru', 'Pembuat Soal dan ujian');
INSERT INTO `groups` VALUES (3, 'siswa', 'Peserta Ujian');

-- ----------------------------
-- Table structure for hari
-- ----------------------------
-- DROP TABLE IF EXISTS `hari`;
CREATE TABLE `hari`  (
  `id_hri` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hri` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_hri`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hari
-- ----------------------------
INSERT INTO `hari` VALUES (1, 'Senin');
INSERT INTO `hari` VALUES (2, 'Selasa');
INSERT INTO `hari` VALUES (3, 'Rabu');
INSERT INTO `hari` VALUES (4, 'Kamis');
INSERT INTO `hari` VALUES (5, 'Jum\'at');
INSERT INTO `hari` VALUES (6, 'Sabtu');
INSERT INTO `hari` VALUES (7, 'Minggu');

-- ----------------------------
-- Table structure for jabatan_guru
-- ----------------------------
-- DROP TABLE IF EXISTS `jabatan_guru`;
CREATE TABLE `jabatan_guru`  (
  `id_jabatan_guru` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_kelas` int(11) NULL DEFAULT 0,
  `mapel_kelas` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ekstra_kelas` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  PRIMARY KEY (`id_jabatan_guru`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan_guru
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_catatan_mapel
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_catatan_mapel`;
CREATE TABLE `kelas_catatan_mapel`  (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `level` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `readed` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `reading` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'array id_siswa yang membaca',
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_catatan_mapel
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_catatan_wali
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_catatan_wali`;
CREATE TABLE `kelas_catatan_wali`  (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=semua siswa, 2=per siswa',
  `level` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '1=saran, 2=teguran, 3=peringatan, 4=sangsi',
  `tgl` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `readed` varchar(22) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `reading` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_catatan_wali
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_ekstra
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_ekstra`;
CREATE TABLE `kelas_ekstra`  (
  `id_kelas_ekstra` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `ekstra` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kelas_ekstra`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_ekstra
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_jadwal_kbm
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_jadwal_kbm`;
CREATE TABLE `kelas_jadwal_kbm`  (
  `id_kbm` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `kbm_jam_pel` int(11) NOT NULL,
  `kbm_jam_mulai` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kbm_jml_mapel_hari` int(11) NOT NULL,
  `istirahat` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kbm`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_jadwal_kbm
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_jadwal_mapel
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_jadwal_mapel`;
CREATE TABLE `kelas_jadwal_mapel`  (
  `id_jadwal` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_jadwal_mapel
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_jadwal_materi
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_jadwal_materi`;
CREATE TABLE `kelas_jadwal_materi`  (
  `id_kjm` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_materi` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `jadwal_materi` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis` int(11) NULL DEFAULT NULL COMMENT '1=materi, 2=tugas',
  PRIMARY KEY (`id_kjm`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_jadwal_materi
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_materi
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_materi`;
CREATE TABLE `kelas_materi`  (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 1,
  `id_smt` int(11) NOT NULL DEFAULT 1,
  `kode_materi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_guru` int(11) NULL DEFAULT NULL,
  `materi_kelas` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_mapel` int(11) NULL DEFAULT 0,
  `kode_mapel` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `judul_materi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isi_materi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `file` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `link_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_mulai` datetime NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT 1 COMMENT '1=materi, 2=tugas',
  PRIMARY KEY (`id_materi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_materi
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_siswa
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE `kelas_siswa`  (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` int(7) NULL DEFAULT NULL,
  `id_kelas` int(7) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_siswa`) USING BTREE,
  UNIQUE INDEX `id_kelas_siswa_idx`(`id_kelas_siswa`) USING BTREE,
  INDEX `id_siswa_idx`(`id_siswa`) USING BTREE,
  INDEX `Id_kelas`(`id_kelas`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for kelas_struktur
-- ----------------------------
-- DROP TABLE IF EXISTS `kelas_struktur`;
CREATE TABLE `kelas_struktur`  (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `ketua` int(11) NULL DEFAULT NULL,
  `wakil_ketua` int(11) NULL DEFAULT NULL,
  `sekretaris_1` int(11) NULL DEFAULT NULL,
  `sekretaris_2` int(11) NULL DEFAULT NULL,
  `bendahara_1` int(11) NULL DEFAULT NULL,
  `bendahara_2` int(11) NULL DEFAULT NULL,
  `sie_ekstrakurikuler` int(11) NULL DEFAULT NULL,
  `sie_upacara` int(11) NULL DEFAULT NULL,
  `sie_olahraga` int(11) NULL DEFAULT NULL,
  `sie_keagamaan` int(11) NULL DEFAULT NULL,
  `sie_keamanan` int(11) NULL DEFAULT NULL,
  `sie_ketertiban` int(11) NULL DEFAULT NULL,
  `sie_kebersihan` int(11) NULL DEFAULT NULL,
  `sie_keindahan` int(11) NULL DEFAULT NULL,
  `sie_kesehatan` int(11) NULL DEFAULT NULL,
  `sie_kekeluargaan` int(11) NULL DEFAULT NULL,
  `sie_humas` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas_struktur
-- ----------------------------

-- ----------------------------
-- Table structure for level_guru
-- ----------------------------
-- DROP TABLE IF EXISTS `level_guru`;
CREATE TABLE `level_guru`  (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of level_guru
-- ----------------------------
INSERT INTO `level_guru` VALUES (1, 'Kepala Sekolah');
INSERT INTO `level_guru` VALUES (2, 'Wakil Kepala Sekolah');
INSERT INTO `level_guru` VALUES (3, 'Bimbingan Konseling');
INSERT INTO `level_guru` VALUES (4, 'Walikelas');
INSERT INTO `level_guru` VALUES (5, 'Guru');

-- ----------------------------
-- Table structure for level_kelas
-- ----------------------------
-- DROP TABLE IF EXISTS `level_kelas`;
CREATE TABLE `level_kelas`  (
  `id_level` int(11) NOT NULL,
  `level` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE,
  INDEX `index_id_level`(`id_level`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of level_kelas
-- ----------------------------
INSERT INTO `level_kelas` VALUES (1, '1');
INSERT INTO `level_kelas` VALUES (2, '2');
INSERT INTO `level_kelas` VALUES (3, '3');
INSERT INTO `level_kelas` VALUES (4, '4');
INSERT INTO `level_kelas` VALUES (5, '5');
INSERT INTO `level_kelas` VALUES (6, '6');
INSERT INTO `level_kelas` VALUES (7, '7');
INSERT INTO `level_kelas` VALUES (8, '8');
INSERT INTO `level_kelas` VALUES (9, '9');
INSERT INTO `level_kelas` VALUES (10, '10');
INSERT INTO `level_kelas` VALUES (11, '11');
INSERT INTO `level_kelas` VALUES (12, '12');

-- ----------------------------
-- Table structure for log
-- ----------------------------
-- DROP TABLE IF EXISTS `log`;
CREATE TABLE `log`  (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_group` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `agent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `device` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for log_materi
-- ----------------------------
-- DROP TABLE IF EXISTS `log_materi`;
CREATE TABLE `log_materi`  (
  `id_log` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `jam_ke` int(11) NOT NULL,
  `id_materi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `file` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `nilai` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `catatan` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `agent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `device` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `finish_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_materi
-- ----------------------------

-- ----------------------------
-- Table structure for log_ujian
-- ----------------------------
-- DROP TABLE IF EXISTS `log_ujian`;
CREATE TABLE `log_ujian`  (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `log_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_jadwal` int(11) NULL DEFAULT NULL,
  `log_type` int(11) NOT NULL,
  `log_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `agent` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `device` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reset` int(11) NOT NULL COMMENT '0=tidak reset, 1=reset',
  `finish_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_ujian
-- ----------------------------

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
-- DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for master_ekstra
-- ----------------------------
-- DROP TABLE IF EXISTS `master_ekstra`;
CREATE TABLE `master_ekstra`  (
  `id_ekstra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ekstra` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_ekstra` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_ekstra`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_ekstra
-- ----------------------------
INSERT INTO `master_ekstra` VALUES (1, 'Pramuka', 'PRAM');
INSERT INTO `master_ekstra` VALUES (2, 'Baca Tulis Al Quran', 'BTQ');
INSERT INTO `master_ekstra` VALUES (3, 'Tahfidz', 'TFZ');

-- ----------------------------
-- Table structure for master_guru
-- ----------------------------
-- DROP TABLE IF EXISTS `master_guru`;
CREATE TABLE `master_guru`  (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NULL DEFAULT NULL,
  `nip` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_guru` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode_guru` varchar(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `no_ktp` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat_jalan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rt_rw` varchar(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dusun` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelurahan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kabupaten` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `provinsi` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode_pos` int(11) NULL DEFAULT NULL,
  `kewarganegaraan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nuptk` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_ptk` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgs_tambahan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_pegawai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_aktif` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_nikah` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tmt` date NULL DEFAULT NULL,
  `keahlian_isyarat` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `npwp` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_guru`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_guru
-- ----------------------------

-- ----------------------------
-- Table structure for master_hari_efektif
-- ----------------------------
-- DROP TABLE IF EXISTS `master_hari_efektif`;
CREATE TABLE `master_hari_efektif`  (
  `id_hari_efektif` int(11) NOT NULL AUTO_INCREMENT,
  `jml_hari_efektif` int(11) NOT NULL,
  PRIMARY KEY (`id_hari_efektif`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_hari_efektif
-- ----------------------------

-- ----------------------------
-- Table structure for master_jurusan
-- ----------------------------
-- DROP TABLE IF EXISTS `master_jurusan`;
CREATE TABLE `master_jurusan`  (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_jurusan` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mapel_peminatan` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deletable` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_jurusan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_jurusan
-- ----------------------------
INSERT INTO `master_jurusan` VALUES (0, 'NON JURUSAN', 'NON', NULL, 1, 0);
INSERT INTO `master_jurusan` VALUES (1, 'IPA', 'IPA', NULL, 1, 0);
INSERT INTO `master_jurusan` VALUES (2, 'IPS', 'IPS', NULL, 1, 0);
INSERT INTO `master_jurusan` VALUES (3, 'BAHASA', 'BAHASA', NULL, 1, 0);
INSERT INTO `master_jurusan` VALUES (4, 'KEAGAMAAN', 'AGAMA', NULL, 0, 1);

-- ----------------------------
-- Table structure for master_kelas
-- ----------------------------
-- DROP TABLE IF EXISTS `master_kelas`;
CREATE TABLE `master_kelas`  (
  `id_kelas` int(5) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nama_kelas` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode_kelas` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jurusan_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `guru_id` int(11) NULL DEFAULT NULL,
  `siswa_id` int(11) NULL DEFAULT NULL,
  `jumlah_siswa` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `set_siswa` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  PRIMARY KEY (`id_kelas`) USING BTREE,
  INDEX `index_level_Id`(`level_id`) USING BTREE,
  UNIQUE INDEX `id_kelas_idx`(`id_kelas`) USING BTREE,
  CONSTRAINT `key_id_cek` FOREIGN KEY (`level_id`) REFERENCES `level_kelas` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_kelas
-- ----------------------------

-- ----------------------------
-- Table structure for master_kelompok_mapel
-- ----------------------------
-- DROP TABLE IF EXISTS `master_kelompok_mapel`;
CREATE TABLE `master_kelompok_mapel`  (
  `id_kel_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kel_mapel` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_kel_mapel` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kategori` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_parent` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kel_mapel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_kelompok_mapel
-- ----------------------------
INSERT INTO `master_kelompok_mapel` VALUES (1, 'A', 'Kelompok A (Wajib)', 'WAJIB', 0);
INSERT INTO `master_kelompok_mapel` VALUES (2, 'B', 'Kelompok B', 'WAJIB', 0);
INSERT INTO `master_kelompok_mapel` VALUES (3, 'C', 'Kelompok C', 'PEMINATAN', 0);
INSERT INTO `master_kelompok_mapel` VALUES (4, 'MULOK', 'Muatan Lokal', 'MULOK', 0);
INSERT INTO `master_kelompok_mapel` VALUES (5, 'C1', 'Kelompok C1', 'PEMINATAN', 3);
INSERT INTO `master_kelompok_mapel` VALUES (6, 'PAI', 'PAI', 'PAI (Kemenag)', 0);

-- ----------------------------
-- Table structure for master_mapel
-- ----------------------------
-- DROP TABLE IF EXISTS `master_mapel`;
CREATE TABLE `master_mapel`  (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kode` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelompok` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '-',
  `bobot_p` int(11) NOT NULL DEFAULT 0,
  `bobot_k` int(11) NOT NULL DEFAULT 0,
  `jenjang` int(11) NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deletable` int(11) NOT NULL DEFAULT 1,
  `urutan_tampil` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mapel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_mapel
-- ----------------------------
INSERT INTO `master_mapel` VALUES (1, 'Al Quran-Hadis', 'QH', 'PAI', 0, 0, 1, 1, 1, 0, 1);
INSERT INTO `master_mapel` VALUES (2, 'Fiqih', 'FQH', 'PAI', 0, 0, 1, 1, 1, 0, 3);
INSERT INTO `master_mapel` VALUES (3, 'Akidah Akhlak', 'AA', 'PAI', 0, 0, 1, 1, 1, 0, 2);
INSERT INTO `master_mapel` VALUES (4, 'Sejarah Kebudayaan Islam', 'SKI', 'PAI', 0, 0, 1, 1, 1, 0, 4);
INSERT INTO `master_mapel` VALUES (5, 'Bahasa Arab', 'BAR', 'A', 0, 0, 1, 2, 1, 0, 3);
INSERT INTO `master_mapel` VALUES (6, 'Bahasa Indonesia', 'BIND', 'A', 0, 0, 1, 2, 1, 0, 2);
INSERT INTO `master_mapel` VALUES (7, 'Bahasa Inggris', 'BING', 'A', 0, 0, 1, 2, 1, 0, 7);
INSERT INTO `master_mapel` VALUES (8, 'Matematika', 'MTK', 'A', 0, 0, 1, 2, 1, 0, 4);
INSERT INTO `master_mapel` VALUES (9, 'Ilmu Pengetahuan Alam', 'IPA', 'A', 0, 0, 1, 2, 1, 0, 5);
INSERT INTO `master_mapel` VALUES (10, 'Ilmu Pengetahuan Sosial', 'IPS', 'A', 0, 0, 1, 2, 1, 0, 6);
INSERT INTO `master_mapel` VALUES (11, 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKn', 'A', 0, 0, 1, 2, 1, 0, 1);
INSERT INTO `master_mapel` VALUES (12, 'Pendidikan Jasmani Olah Raga dan Kesehatan', 'PJOK', 'B', 0, 0, 1, 3, 1, 0, 2);
INSERT INTO `master_mapel` VALUES (13, 'Seni Budaya', 'SB', 'B', 0, 0, 2, 3, 1, 0, 1);
INSERT INTO `master_mapel` VALUES (14, 'Prakarya', 'PRA', 'B', 0, 0, 2, 3, 1, 0, 3);
INSERT INTO `master_mapel` VALUES (15, 'SBdP', 'SBDP', 'B', 0, 0, 0, 3, 0, 0, 1);
INSERT INTO `master_mapel` VALUES (16, 'Akhlak', 'AK', 'C', 0, 0, 3, 0, 0, 0, 19);
INSERT INTO `master_mapel` VALUES (17, 'Antropologi', 'ANT', 'C1', 0, 0, 3, 0, 1, 0, 4);
INSERT INTO `master_mapel` VALUES (18, 'Bahasa Arab (Peminatan)', 'BAR-P', 'C', 0, 0, 3, 0, 1, 0, 3);
INSERT INTO `master_mapel` VALUES (19, 'Bahasa dan Sastra Asing Lainnya', 'BSAL', 'C', 0, 0, 3, 0, 1, 0, 16);
INSERT INTO `master_mapel` VALUES (20, 'Bahasa dan Sastra Indonesia', 'BSIN', 'C', 0, 0, 3, 0, 1, 0, 15);
INSERT INTO `master_mapel` VALUES (21, 'Bahasa dan Sastra Inggris', 'BSING', 'C', 0, 0, 3, 0, 1, 0, 14);
INSERT INTO `master_mapel` VALUES (22, 'Bahasa Jepang', 'JPN', 'C', 0, 0, 3, 0, 1, 0, 18);
INSERT INTO `master_mapel` VALUES (23, 'Bahasa Jerman', 'JRM', 'C', 0, 0, 3, 0, 1, 0, 12);
INSERT INTO `master_mapel` VALUES (24, 'Biologi', 'BIO', 'C', 0, 0, 3, 0, 1, 0, 2);
INSERT INTO `master_mapel` VALUES (25, 'Ekonomi', 'EKN', 'C', 0, 0, 3, 0, 1, 0, 11);
INSERT INTO `master_mapel` VALUES (26, 'Fikih (Peminatan)', 'FQH-P', 'C', 0, 0, 3, 0, 1, 0, 4);
INSERT INTO `master_mapel` VALUES (27, 'Fikih - Ushul Fikih', 'UFQH', 'C', 0, 0, 3, 0, 1, 0, 5);
INSERT INTO `master_mapel` VALUES (28, 'Fisika', 'FIS', 'C1', 0, 0, 3, 0, 1, 0, 3);
INSERT INTO `master_mapel` VALUES (29, 'Geografi', 'GEO', 'C', 0, 0, 3, 0, 1, 0, 10);
INSERT INTO `master_mapel` VALUES (30, 'Hadis - Ilmu Hadis', 'HA', 'C', 0, 0, 3, 0, 1, 0, 6);
INSERT INTO `master_mapel` VALUES (31, 'Ilmu Kalam', 'IK', 'C', 0, 0, 3, 0, 1, 0, 7);
INSERT INTO `master_mapel` VALUES (32, 'Informatika', 'INF', 'C', 0, 0, 3, 0, 0, 0, 13);
INSERT INTO `master_mapel` VALUES (33, 'Keterampilan', 'KTR', 'C', 0, 0, 3, 0, 0, 0, 17);
INSERT INTO `master_mapel` VALUES (34, 'Kimia', 'KIM', 'C1', 0, 0, 3, 0, 1, 0, 2);
INSERT INTO `master_mapel` VALUES (35, 'Prakarya dan Kewirausahaan', 'PK', 'B', 0, 0, 3, 0, 0, 0, 3);
INSERT INTO `master_mapel` VALUES (36, 'Sejarah', 'SEJ', 'C', 0, 0, 3, 0, 1, 0, 8);
INSERT INTO `master_mapel` VALUES (37, 'Sejarah Indonesia', 'SJI', 'A', 0, 0, 3, 0, 1, 0, 5);
INSERT INTO `master_mapel` VALUES (38, 'Sosiologi', 'SOS', 'C', 0, 0, 3, 0, 1, 0, 9);
INSERT INTO `master_mapel` VALUES (39, 'Tafsir - Ilmu Tafsir', 'TT', 'C1', 0, 0, 3, 0, 1, 0, 1);
INSERT INTO `master_mapel` VALUES (40, 'Bahasa Sunda', 'BSUND', 'MULOK', 0, 0, 1, 0, 1, 1, 1);
INSERT INTO `master_mapel` VALUES (41, 'Pendidikan Agama dan Budi Pekerti', 'PABP', 'A', 0, 0, 1, 1, 1, 0, 1);
INSERT INTO `master_mapel` VALUES (42, 'Matematika (Peminatan)', 'MTK-P', 'C', 0, 0, 3, 0, 1, 1, 1);

-- ----------------------------
-- Table structure for master_siswa
-- ----------------------------
-- DROP TABLE IF EXISTS `master_siswa`;
CREATE TABLE `master_siswa`  (
  `id_siswa` int(7) NOT NULL AUTO_INCREMENT,
  `nisn` int(10) UNSIGNED ZEROFILL NOT NULL,
  `nis` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kelas_awal` int(11) NOT NULL,
  `tahun_masuk` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sekolah_asal` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `agama` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'siswa.png',
  `anak_ke` int(11) NULL DEFAULT NULL,
  `status_keluarga` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `rt` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `rw` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelurahan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kabupaten` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `provinsi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode_pos` int(11) NULL DEFAULT NULL,
  `nama_ayah` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pendidikan_ayah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nohp_ayah` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat_ayah` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `nama_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pendidikan_ibu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nohp_ibu` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat_ibu` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `nama_wali` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir_wali` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pendidikan_wali` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pekerjaan_wali` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nohp_wali` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat_wali` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `nik` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `warga_negara` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_siswa`, `uid`, `nisn`, `nis`) USING BTREE,
  UNIQUE INDEX `Id_siswa_idx`(`id_siswa`) USING BTREE,
  UNIQUE INDEX `uid_idx`(`uid`) USING BTREE,
  UNIQUE INDEX `nisn`(`nisn`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for master_smt
-- ----------------------------
-- DROP TABLE IF EXISTS `master_smt`;
CREATE TABLE `master_smt`  (
  `id_smt` int(11) NOT NULL AUTO_INCREMENT,
  `smt` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_smt` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id_smt`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_smt
-- ----------------------------
INSERT INTO `master_smt` VALUES (1, 'Ganjil', 'I (satu)', 1);
INSERT INTO `master_smt` VALUES (2, 'Genap', 'II (dua)', 0);

-- ----------------------------
-- Table structure for master_tp
-- ----------------------------
-- DROP TABLE IF EXISTS `master_tp`;
CREATE TABLE `master_tp`  (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id_tp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_tp
-- ----------------------------
INSERT INTO `master_tp` VALUES (1, '2020/2021', 0);
INSERT INTO `master_tp` VALUES (2, '2021/2022', 0);
INSERT INTO `master_tp` VALUES (3, '2022/2023', 1);
INSERT INTO `master_tp` VALUES (4, '2023/2024', 0);

-- ----------------------------
-- Table structure for post
-- ----------------------------
-- DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `dari` int(11) NULL DEFAULT NULL,
  `dari_group` int(11) NULL DEFAULT NULL,
  `kepada` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'group',
  `text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------

-- ----------------------------
-- Table structure for post_comments
-- ----------------------------
-- DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE `post_comments`  (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NULL DEFAULT NULL,
  `dari` int(11) NULL DEFAULT NULL,
  `dari_group` int(11) NULL DEFAULT NULL,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '1:pengumuman, 2:materi, 3:tugas',
  PRIMARY KEY (`id_comment`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_comments
-- ----------------------------

-- ----------------------------
-- Table structure for post_reply
-- ----------------------------
-- DROP TABLE IF EXISTS `post_reply`;
CREATE TABLE `post_reply`  (
  `id_reply` int(11) NOT NULL AUTO_INCREMENT,
  `id_comment` int(11) NULL DEFAULT NULL,
  `dari` int(11) NULL DEFAULT NULL,
  `dari_group` int(11) NULL DEFAULT NULL,
  `text` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_reply`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_reply
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_admin_setting
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_admin_setting`;
CREATE TABLE `rapor_admin_setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `kkm_tunggal` int(11) NOT NULL DEFAULT 0,
  `kkm` int(11) NULL DEFAULT NULL,
  `bobot_ph` int(11) NULL DEFAULT NULL,
  `bobot_pts` int(11) NULL DEFAULT NULL,
  `bobot_pas` int(11) NULL DEFAULT NULL,
  `bobot_absen` int(11) NULL DEFAULT NULL,
  `tgl_rapor_akhir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_rapor_kelas_akhir` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_rapor_pts` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nip_kepsek` int(11) NULL DEFAULT 0,
  `nip_walikelas` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_admin_setting
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_catatan_wali
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_catatan_wali`;
CREATE TABLE `rapor_catatan_wali`  (
  `id_catatan_wali` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_catatan_wali`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_catatan_wali
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_data_catatan
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_data_catatan`;
CREATE TABLE `rapor_data_catatan`  (
  `id_catatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=desk absensi, 2=desk catatan, 3=desk ranking',
  `kode` int(11) NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rank` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_catatan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_data_catatan
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_data_fisik
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_data_fisik`;
CREATE TABLE `rapor_data_fisik`  (
  `id_fisik` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=pendengaran, 2=penglihatan, 3=gigi, 4=lain-lain',
  `kode` int(11) NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_fisik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_data_fisik
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_data_sikap
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_data_sikap`;
CREATE TABLE `rapor_data_sikap`  (
  `id_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=spiritual, 2=sosial',
  `kode` int(11) NOT NULL,
  `sikap` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_sikap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_data_sikap
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_fisik
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_fisik`;
CREATE TABLE `rapor_fisik`  (
  `id_fisik` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `kondisi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  PRIMARY KEY (`id_fisik`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_fisik
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_kikd
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_kikd`;
CREATE TABLE `rapor_kikd`  (
  `id_kikd` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel_kelas` int(11) NULL DEFAULT NULL,
  `aspek` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `materi_kikd` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_kikd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_kikd
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_kkm
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_kkm`;
CREATE TABLE `rapor_kkm`  (
  `id_kkm` int(11) NOT NULL AUTO_INCREMENT,
  `kkm` int(11) NULL DEFAULT 0,
  `bobot_ph` int(11) NULL DEFAULT 0,
  `bobot_pts` int(11) NULL DEFAULT 0,
  `bobot_pas` int(11) NULL DEFAULT 0,
  `bobot_absen` int(11) NULL DEFAULT 0,
  `beban_jam` int(11) NULL DEFAULT 0,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `jenis` int(11) NOT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kkm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_kkm
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_naik
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_naik`;
CREATE TABLE `rapor_naik`  (
  `id_naik` int(11) NOT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `naik` int(11) NOT NULL,
  PRIMARY KEY (`id_naik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_naik
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_nilai_akhir
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_nilai_akhir`;
CREATE TABLE `rapor_nilai_akhir`  (
  `id_nilai_akhir` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(11) NULL DEFAULT 0,
  `akhir` int(11) NULL DEFAULT NULL,
  `predikat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_akhir`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_nilai_akhir
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_nilai_ekstra
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_nilai_ekstra`;
CREATE TABLE `rapor_nilai_ekstra`  (
  `id_nilai_ekstra` int(11) NOT NULL AUTO_INCREMENT,
  `id_ekstra` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `predikat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_nilai_ekstra`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_nilai_ekstra
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_nilai_harian
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_nilai_harian`;
CREATE TABLE `rapor_nilai_harian`  (
  `id_nilai_harian` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `p1` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p2` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p3` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p4` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p5` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p6` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p7` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p8` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p_rata_rata` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p_predikat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `p_deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `k1` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k2` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k3` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k4` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k5` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k6` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k7` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k8` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k_rata_rata` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k_predikat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `k_deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `jml` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_nilai_harian`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_nilai_harian
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_nilai_pts
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_nilai_pts`;
CREATE TABLE `rapor_nilai_pts`  (
  `id_nilai_pts` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `nilai` int(11) NULL DEFAULT 0,
  `predikat` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_pts`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_nilai_pts
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_nilai_sikap
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_nilai_sikap`;
CREATE TABLE `rapor_nilai_sikap`  (
  `id_nilai_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL DEFAULT 0,
  `id_smt` int(11) NOT NULL DEFAULT 0,
  `jenis` int(11) NULL DEFAULT NULL,
  `nilai` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_nilai_sikap`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_nilai_sikap
-- ----------------------------

-- ----------------------------
-- Table structure for rapor_prestasi
-- ----------------------------
-- DROP TABLE IF EXISTS `rapor_prestasi`;
CREATE TABLE `rapor_prestasi`  (
  `id_ranking` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NULL DEFAULT NULL,
  `id_siswa` int(11) NULL DEFAULT NULL,
  `id_tp` int(11) NOT NULL,
  `id_smt` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `deskripsi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p1_desk` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p2_desk` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p3_desk` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_ranking`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rapor_prestasi
-- ----------------------------

-- ----------------------------
-- Table structure for running_text
-- ----------------------------
-- DROP TABLE IF EXISTS `running_text`;
CREATE TABLE `running_text`  (
  `id_text` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_text`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of running_text
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
-- DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sekolah` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sekolah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `npsn` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nss` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenjang` int(11) NULL DEFAULT NULL,
  `kepsek` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nip` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanda_tangan` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `alamat` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `desa` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kota` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `provinsi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kode_pos` int(11) NULL DEFAULT NULL,
  `telp` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fax` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `web` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nama_aplikasi` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logo_kanan` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `logo_kiri` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `versi` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip_server` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `waktu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `server` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_server` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sekolah_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_versi` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `satuan_pendidikan` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of setting
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
-- DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED NULL DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED NULL DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id_user`(`id`) USING BTREE,
  UNIQUE INDEX `username_idx`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
-- DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_groups
-- ----------------------------

-- ----------------------------
-- Table structure for users_profile
-- ----------------------------
-- DROP TABLE IF EXISTS `users_profile`;
CREATE TABLE `users_profile`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jabatan` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `level_access` int(11) NOT NULL DEFAULT 0,
  `foto` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_profile
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
