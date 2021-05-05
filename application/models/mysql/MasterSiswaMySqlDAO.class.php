<?php
/**
 * Class that operate on table 'master_siswa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class MasterSiswaMySqlDAO implements MasterSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterSiswaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_siswa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_siswa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterSiswa primary key
 	 */
	public function delete($id_siswa){
		$sql = 'DELETE FROM master_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_siswa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterSiswaDTO masterSiswa
 	 */
	public function insert($masterSiswa){
		$sql = 'INSERT INTO master_siswa (nisn, nis, nama, jenis_kelamin, username, password, kelas_awal, tahun_masuk, sekolah_asal, tempat_lahir, tanggal_lahir, agama, hp, email, foto, anak_ke, status_keluarga, alamat, rt, rw, kelurahan, kecamatan, kabupaten, provinsi, kode_pos, nama_ayah, tgl_lahir_ayah, pendidikan_ayah, pekerjaan_ayah, nohp_ayah, alamat_ayah, nama_ibu, tgl_lahir_ibu, pendidikan_ibu, pekerjaan_ibu, nohp_ibu, alamat_ibu, nama_wali, tgl_lahir_wali, pendidikan_wali, pekerjaan_wali, nohp_wali, alamat_wali) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterSiswa->nisn);
		$sqlQuery->set($masterSiswa->nis);
		$sqlQuery->set($masterSiswa->nama);
		$sqlQuery->set($masterSiswa->jenis_kelamin);
		$sqlQuery->set($masterSiswa->username);
		$sqlQuery->set($masterSiswa->password);
		$sqlQuery->setNumber($masterSiswa->kelas_awal);
		$sqlQuery->set($masterSiswa->tahun_masuk);
		$sqlQuery->set($masterSiswa->sekolah_asal);
		$sqlQuery->set($masterSiswa->tempat_lahir);
		$sqlQuery->set($masterSiswa->tanggal_lahir);
		$sqlQuery->set($masterSiswa->agama);
		$sqlQuery->set($masterSiswa->hp);
		$sqlQuery->set($masterSiswa->email);
		$sqlQuery->set($masterSiswa->foto);
		$sqlQuery->setNumber($masterSiswa->anak_ke);
		$sqlQuery->set($masterSiswa->status_keluarga);
		$sqlQuery->set($masterSiswa->alamat);
		$sqlQuery->set($masterSiswa->rt);
		$sqlQuery->set($masterSiswa->rw);
		$sqlQuery->set($masterSiswa->kelurahan);
		$sqlQuery->set($masterSiswa->kecamatan);
		$sqlQuery->set($masterSiswa->kabupaten);
		$sqlQuery->set($masterSiswa->provinsi);
		$sqlQuery->setNumber($masterSiswa->kode_pos);
		$sqlQuery->set($masterSiswa->nama_ayah);
		$sqlQuery->set($masterSiswa->tgl_lahir_ayah);
		$sqlQuery->set($masterSiswa->pendidikan_ayah);
		$sqlQuery->set($masterSiswa->pekerjaan_ayah);
		$sqlQuery->set($masterSiswa->nohp_ayah);
		$sqlQuery->set($masterSiswa->alamat_ayah);
		$sqlQuery->set($masterSiswa->nama_ibu);
		$sqlQuery->set($masterSiswa->tgl_lahir_ibu);
		$sqlQuery->set($masterSiswa->pendidikan_ibu);
		$sqlQuery->set($masterSiswa->pekerjaan_ibu);
		$sqlQuery->setNumber($masterSiswa->nohp_ibu);
		$sqlQuery->set($masterSiswa->alamat_ibu);
		$sqlQuery->set($masterSiswa->nama_wali);
		$sqlQuery->set($masterSiswa->tgl_lahir_wali);
		$sqlQuery->set($masterSiswa->pendidikan_wali);
		$sqlQuery->set($masterSiswa->pekerjaan_wali);
		$sqlQuery->setNumber($masterSiswa->nohp_wali);
		$sqlQuery->set($masterSiswa->alamat_wali);

		$id = $this->executeInsert($sqlQuery);	
		$masterSiswa->id_siswa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterSiswaDTO masterSiswa
 	 */
	public function update($masterSiswa){
		$sql = 'UPDATE master_siswa SET nisn = ?, nis = ?, nama = ?, jenis_kelamin = ?, username = ?, password = ?, kelas_awal = ?, tahun_masuk = ?, sekolah_asal = ?, tempat_lahir = ?, tanggal_lahir = ?, agama = ?, hp = ?, email = ?, foto = ?, anak_ke = ?, status_keluarga = ?, alamat = ?, rt = ?, rw = ?, kelurahan = ?, kecamatan = ?, kabupaten = ?, provinsi = ?, kode_pos = ?, nama_ayah = ?, tgl_lahir_ayah = ?, pendidikan_ayah = ?, pekerjaan_ayah = ?, nohp_ayah = ?, alamat_ayah = ?, nama_ibu = ?, tgl_lahir_ibu = ?, pendidikan_ibu = ?, pekerjaan_ibu = ?, nohp_ibu = ?, alamat_ibu = ?, nama_wali = ?, tgl_lahir_wali = ?, pendidikan_wali = ?, pekerjaan_wali = ?, nohp_wali = ?, alamat_wali = ? WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterSiswa->nisn);
		$sqlQuery->set($masterSiswa->nis);
		$sqlQuery->set($masterSiswa->nama);
		$sqlQuery->set($masterSiswa->jenis_kelamin);
		$sqlQuery->set($masterSiswa->username);
		$sqlQuery->set($masterSiswa->password);
		$sqlQuery->setNumber($masterSiswa->kelas_awal);
		$sqlQuery->set($masterSiswa->tahun_masuk);
		$sqlQuery->set($masterSiswa->sekolah_asal);
		$sqlQuery->set($masterSiswa->tempat_lahir);
		$sqlQuery->set($masterSiswa->tanggal_lahir);
		$sqlQuery->set($masterSiswa->agama);
		$sqlQuery->set($masterSiswa->hp);
		$sqlQuery->set($masterSiswa->email);
		$sqlQuery->set($masterSiswa->foto);
		$sqlQuery->setNumber($masterSiswa->anak_ke);
		$sqlQuery->set($masterSiswa->status_keluarga);
		$sqlQuery->set($masterSiswa->alamat);
		$sqlQuery->set($masterSiswa->rt);
		$sqlQuery->set($masterSiswa->rw);
		$sqlQuery->set($masterSiswa->kelurahan);
		$sqlQuery->set($masterSiswa->kecamatan);
		$sqlQuery->set($masterSiswa->kabupaten);
		$sqlQuery->set($masterSiswa->provinsi);
		$sqlQuery->setNumber($masterSiswa->kode_pos);
		$sqlQuery->set($masterSiswa->nama_ayah);
		$sqlQuery->set($masterSiswa->tgl_lahir_ayah);
		$sqlQuery->set($masterSiswa->pendidikan_ayah);
		$sqlQuery->set($masterSiswa->pekerjaan_ayah);
		$sqlQuery->set($masterSiswa->nohp_ayah);
		$sqlQuery->set($masterSiswa->alamat_ayah);
		$sqlQuery->set($masterSiswa->nama_ibu);
		$sqlQuery->set($masterSiswa->tgl_lahir_ibu);
		$sqlQuery->set($masterSiswa->pendidikan_ibu);
		$sqlQuery->set($masterSiswa->pekerjaan_ibu);
		$sqlQuery->setNumber($masterSiswa->nohp_ibu);
		$sqlQuery->set($masterSiswa->alamat_ibu);
		$sqlQuery->set($masterSiswa->nama_wali);
		$sqlQuery->set($masterSiswa->tgl_lahir_wali);
		$sqlQuery->set($masterSiswa->pendidikan_wali);
		$sqlQuery->set($masterSiswa->pekerjaan_wali);
		$sqlQuery->setNumber($masterSiswa->nohp_wali);
		$sqlQuery->set($masterSiswa->alamat_wali);

		$sqlQuery->setNumber($masterSiswa->id_siswa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_siswa';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	* @param $sql
	* @param bool $single
	*/
	public function execQuery($sql, $single = false) {
	$sqlQuery = new SqlQuery($sql);
	if ($single === true)
		return $this->getRow($sqlQuery);
	else
		return $this->getList($sqlQuery);
	}

	/**
	* @param $arr_values
	* @param bool $single
	*/
	public function queryByKeys($arr_values, $single = false){
		$no = 0;
		$count = count($arr_values);
		$values = [];
		$sql = 'SELECT * FROM master_siswa WHERE ';
		foreach ($arr_values as $key=>$value) {
			$sql .= $key.' = ?';
			if(++$no !== $count) {
				$sql .= ' AND ';
			}
			array_push($values, $value);
		}

		$sqlQuery = new SqlQuery($sql);
		foreach ($values as $value) {
			$sqlQuery->set($value);
		}
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNisn($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nisn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNis($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNama($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenisKelamin($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE jenis_kelamin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKelasAwal($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE kelas_awal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTahunMasuk($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tahun_masuk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySekolahAsal($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE sekolah_asal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTempatLahir($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tempat_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTanggalLahir($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tanggal_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgama($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHp($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE hp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAnakKe($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE anak_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatusKeluarga($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE status_keluarga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamat($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE alamat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRt($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE rt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRw($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE rw = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKelurahan($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE kelurahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKecamatan($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKabupaten($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE kabupaten = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByProvinsi($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodePos($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nama_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglLahirAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tgl_lahir_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPendidikanAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pendidikan_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPekerjaanAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pekerjaan_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNohpAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nohp_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamatAyah($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE alamat_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nama_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglLahirIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tgl_lahir_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPendidikanIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pendidikan_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPekerjaanIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pekerjaan_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNohpIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nohp_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamatIbu($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE alamat_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nama_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglLahirWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE tgl_lahir_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPendidikanWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pendidikan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPekerjaanWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE pekerjaan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNohpWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE nohp_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamatWali($value, $single = false){
		$sql = 'SELECT * FROM master_siswa WHERE alamat_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM master_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNisn($value){
		$sql = 'DELETE FROM master_siswa WHERE nisn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNis($value){
		$sql = 'DELETE FROM master_siswa WHERE nis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNama($value){
		$sql = 'DELETE FROM master_siswa WHERE nama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenisKelamin($value){
		$sql = 'DELETE FROM master_siswa WHERE jenis_kelamin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM master_siswa WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM master_siswa WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelasAwal($value){
		$sql = 'DELETE FROM master_siswa WHERE kelas_awal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTahunMasuk($value){
		$sql = 'DELETE FROM master_siswa WHERE tahun_masuk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySekolahAsal($value){
		$sql = 'DELETE FROM master_siswa WHERE sekolah_asal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempatLahir($value){
		$sql = 'DELETE FROM master_siswa WHERE tempat_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTanggalLahir($value){
		$sql = 'DELETE FROM master_siswa WHERE tanggal_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgama($value){
		$sql = 'DELETE FROM master_siswa WHERE agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHp($value){
		$sql = 'DELETE FROM master_siswa WHERE hp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM master_siswa WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM master_siswa WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnakKe($value){
		$sql = 'DELETE FROM master_siswa WHERE anak_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusKeluarga($value){
		$sql = 'DELETE FROM master_siswa WHERE status_keluarga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamat($value){
		$sql = 'DELETE FROM master_siswa WHERE alamat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRt($value){
		$sql = 'DELETE FROM master_siswa WHERE rt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRw($value){
		$sql = 'DELETE FROM master_siswa WHERE rw = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelurahan($value){
		$sql = 'DELETE FROM master_siswa WHERE kelurahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKecamatan($value){
		$sql = 'DELETE FROM master_siswa WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKabupaten($value){
		$sql = 'DELETE FROM master_siswa WHERE kabupaten = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvinsi($value){
		$sql = 'DELETE FROM master_siswa WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodePos($value){
		$sql = 'DELETE FROM master_siswa WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE nama_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglLahirAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE tgl_lahir_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPendidikanAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE pendidikan_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPekerjaanAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE pekerjaan_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNohpAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE nohp_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamatAyah($value){
		$sql = 'DELETE FROM master_siswa WHERE alamat_ayah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE nama_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglLahirIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE tgl_lahir_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPendidikanIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE pendidikan_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPekerjaanIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE pekerjaan_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNohpIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE nohp_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamatIbu($value){
		$sql = 'DELETE FROM master_siswa WHERE alamat_ibu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaWali($value){
		$sql = 'DELETE FROM master_siswa WHERE nama_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglLahirWali($value){
		$sql = 'DELETE FROM master_siswa WHERE tgl_lahir_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPendidikanWali($value){
		$sql = 'DELETE FROM master_siswa WHERE pendidikan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPekerjaanWali($value){
		$sql = 'DELETE FROM master_siswa WHERE pekerjaan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNohpWali($value){
		$sql = 'DELETE FROM master_siswa WHERE nohp_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamatWali($value){
		$sql = 'DELETE FROM master_siswa WHERE alamat_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_siswa';
		
		if ($where !== false){
			$sql.=' where ';
			$whereArr = array();
			foreach($where as $clause => $val) {
				$whereArr[] = $clause.'=\''.$val.'\'';
			}
			$sql.=' where '.implode(',',$whereArr);
		}
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	 }
	
	/**
	 * Read row
	 *
	 * @return MasterSiswaDTO
	 */
	protected function readRow($row){
		$masterSiswa = new MasterSiswaDTO();
		
		$masterSiswa->id_siswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$masterSiswa->nisn = isset($row['nisn']) ? $row['nisn'] : null;
		$masterSiswa->nis = isset($row['nis']) ? $row['nis'] : null;
		$masterSiswa->nama = isset($row['nama']) ? $row['nama'] : null;
		$masterSiswa->jenis_kelamin = isset($row['jenis_kelamin']) ? $row['jenis_kelamin'] : null;
		$masterSiswa->username = isset($row['username']) ? $row['username'] : null;
		$masterSiswa->password = isset($row['password']) ? $row['password'] : null;
		$masterSiswa->kelas_awal = isset($row['kelas_awal']) ? $row['kelas_awal'] : null;
		$masterSiswa->tahun_masuk = isset($row['tahun_masuk']) ? $row['tahun_masuk'] : null;
		$masterSiswa->sekolah_asal = isset($row['sekolah_asal']) ? $row['sekolah_asal'] : null;
		$masterSiswa->tempat_lahir = isset($row['tempat_lahir']) ? $row['tempat_lahir'] : null;
		$masterSiswa->tanggal_lahir = isset($row['tanggal_lahir']) ? $row['tanggal_lahir'] : null;
		$masterSiswa->agama = isset($row['agama']) ? $row['agama'] : null;
		$masterSiswa->hp = isset($row['hp']) ? $row['hp'] : null;
		$masterSiswa->email = isset($row['email']) ? $row['email'] : null;
		$masterSiswa->foto = isset($row['foto']) ? $row['foto'] : null;
		$masterSiswa->anak_ke = isset($row['anak_ke']) ? $row['anak_ke'] : null;
		$masterSiswa->status_keluarga = isset($row['status_keluarga']) ? $row['status_keluarga'] : null;
		$masterSiswa->alamat = isset($row['alamat']) ? $row['alamat'] : null;
		$masterSiswa->rt = isset($row['rt']) ? $row['rt'] : null;
		$masterSiswa->rw = isset($row['rw']) ? $row['rw'] : null;
		$masterSiswa->kelurahan = isset($row['kelurahan']) ? $row['kelurahan'] : null;
		$masterSiswa->kecamatan = isset($row['kecamatan']) ? $row['kecamatan'] : null;
		$masterSiswa->kabupaten = isset($row['kabupaten']) ? $row['kabupaten'] : null;
		$masterSiswa->provinsi = isset($row['provinsi']) ? $row['provinsi'] : null;
		$masterSiswa->kode_pos = isset($row['kode_pos']) ? $row['kode_pos'] : null;
		$masterSiswa->nama_ayah = isset($row['nama_ayah']) ? $row['nama_ayah'] : null;
		$masterSiswa->tgl_lahir_ayah = isset($row['tgl_lahir_ayah']) ? $row['tgl_lahir_ayah'] : null;
		$masterSiswa->pendidikan_ayah = isset($row['pendidikan_ayah']) ? $row['pendidikan_ayah'] : null;
		$masterSiswa->pekerjaan_ayah = isset($row['pekerjaan_ayah']) ? $row['pekerjaan_ayah'] : null;
		$masterSiswa->nohp_ayah = isset($row['nohp_ayah']) ? $row['nohp_ayah'] : null;
		$masterSiswa->alamat_ayah = isset($row['alamat_ayah']) ? $row['alamat_ayah'] : null;
		$masterSiswa->nama_ibu = isset($row['nama_ibu']) ? $row['nama_ibu'] : null;
		$masterSiswa->tgl_lahir_ibu = isset($row['tgl_lahir_ibu']) ? $row['tgl_lahir_ibu'] : null;
		$masterSiswa->pendidikan_ibu = isset($row['pendidikan_ibu']) ? $row['pendidikan_ibu'] : null;
		$masterSiswa->pekerjaan_ibu = isset($row['pekerjaan_ibu']) ? $row['pekerjaan_ibu'] : null;
		$masterSiswa->nohp_ibu = isset($row['nohp_ibu']) ? $row['nohp_ibu'] : null;
		$masterSiswa->alamat_ibu = isset($row['alamat_ibu']) ? $row['alamat_ibu'] : null;
		$masterSiswa->nama_wali = isset($row['nama_wali']) ? $row['nama_wali'] : null;
		$masterSiswa->tgl_lahir_wali = isset($row['tgl_lahir_wali']) ? $row['tgl_lahir_wali'] : null;
		$masterSiswa->pendidikan_wali = isset($row['pendidikan_wali']) ? $row['pendidikan_wali'] : null;
		$masterSiswa->pekerjaan_wali = isset($row['pekerjaan_wali']) ? $row['pekerjaan_wali'] : null;
		$masterSiswa->nohp_wali = isset($row['nohp_wali']) ? $row['nohp_wali'] : null;
		$masterSiswa->alamat_wali = isset($row['alamat_wali']) ? $row['alamat_wali'] : null;

		return $masterSiswa;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return MasterSiswaDTO
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);

		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>