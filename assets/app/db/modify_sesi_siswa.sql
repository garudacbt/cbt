ALTER TABLE `cbt_sesi_siswa` CHANGE `siswa_id` `id_sesi_siswa`;
ALTER TABLE `cbt_sesi_siswa` ADD 'siswa_id' bigint(50) DEFAULT 0 AFTER `id_sesi_siswa`;
