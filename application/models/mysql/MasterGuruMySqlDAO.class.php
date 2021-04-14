<?php
/**
 * Class that operate on table 'master_guru'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterGuruMySqlDAO implements MasterGuruDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterGuruDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_guru';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_guru ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterGuru primary key
 	 */
	public function delete($id_guru){
		$sql = 'DELETE FROM master_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_guru);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterGuruDTO masterGuru
 	 */
	public function insert($masterGuru){
		$sql = 'INSERT INTO master_guru (id_user, nip, nama_guru, email, kode_guru, username, password, no_ktp, tempat_lahir, tgl_lahir, jenis_kelamin, agama, no_hp, alamat_jalan, rt_rw, dusun, kelurahan, kecamatan, kabupaten, provinsi, kode_pos, kewarganegaraan, nuptk, jenis_ptk, tgs_tambahan, status_pegawai, status_aktif, status_nikah, tmt, keahlian_isyarat, npwp, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterGuru->idUser);
		$sqlQuery->set($masterGuru->nip);
		$sqlQuery->set($masterGuru->namaGuru);
		$sqlQuery->set($masterGuru->email);
		$sqlQuery->set($masterGuru->kodeGuru);
		$sqlQuery->set($masterGuru->username);
		$sqlQuery->set($masterGuru->password);
		$sqlQuery->set($masterGuru->noKtp);
		$sqlQuery->set($masterGuru->tempatLahir);
		$sqlQuery->set($masterGuru->tglLahir);
		$sqlQuery->set($masterGuru->jenisKelamin);
		$sqlQuery->set($masterGuru->agama);
		$sqlQuery->set($masterGuru->noHp);
		$sqlQuery->set($masterGuru->alamatJalan);
		$sqlQuery->set($masterGuru->rtRw);
		$sqlQuery->set($masterGuru->dusun);
		$sqlQuery->set($masterGuru->kelurahan);
		$sqlQuery->set($masterGuru->kecamatan);
		$sqlQuery->set($masterGuru->kabupaten);
		$sqlQuery->set($masterGuru->provinsi);
		$sqlQuery->setNumber($masterGuru->kodePos);
		$sqlQuery->set($masterGuru->kewarganegaraan);
		$sqlQuery->set($masterGuru->nuptk);
		$sqlQuery->set($masterGuru->jenisPtk);
		$sqlQuery->set($masterGuru->tgsTambahan);
		$sqlQuery->set($masterGuru->statusPegawai);
		$sqlQuery->set($masterGuru->statusAktif);
		$sqlQuery->set($masterGuru->statusNikah);
		$sqlQuery->set($masterGuru->tmt);
		$sqlQuery->set($masterGuru->keahlianIsyarat);
		$sqlQuery->set($masterGuru->npwp);
		$sqlQuery->set($masterGuru->foto);

		$id = $this->executeInsert($sqlQuery);	
		$masterGuru->idGuru = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterGuruDTO masterGuru
 	 */
	public function update($masterGuru){
		$sql = 'UPDATE master_guru SET id_user = ?, nip = ?, nama_guru = ?, email = ?, kode_guru = ?, username = ?, password = ?, no_ktp = ?, tempat_lahir = ?, tgl_lahir = ?, jenis_kelamin = ?, agama = ?, no_hp = ?, alamat_jalan = ?, rt_rw = ?, dusun = ?, kelurahan = ?, kecamatan = ?, kabupaten = ?, provinsi = ?, kode_pos = ?, kewarganegaraan = ?, nuptk = ?, jenis_ptk = ?, tgs_tambahan = ?, status_pegawai = ?, status_aktif = ?, status_nikah = ?, tmt = ?, keahlian_isyarat = ?, npwp = ?, foto = ? WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterGuru->idUser);
		$sqlQuery->set($masterGuru->nip);
		$sqlQuery->set($masterGuru->namaGuru);
		$sqlQuery->set($masterGuru->email);
		$sqlQuery->set($masterGuru->kodeGuru);
		$sqlQuery->set($masterGuru->username);
		$sqlQuery->set($masterGuru->password);
		$sqlQuery->set($masterGuru->noKtp);
		$sqlQuery->set($masterGuru->tempatLahir);
		$sqlQuery->set($masterGuru->tglLahir);
		$sqlQuery->set($masterGuru->jenisKelamin);
		$sqlQuery->set($masterGuru->agama);
		$sqlQuery->set($masterGuru->noHp);
		$sqlQuery->set($masterGuru->alamatJalan);
		$sqlQuery->set($masterGuru->rtRw);
		$sqlQuery->set($masterGuru->dusun);
		$sqlQuery->set($masterGuru->kelurahan);
		$sqlQuery->set($masterGuru->kecamatan);
		$sqlQuery->set($masterGuru->kabupaten);
		$sqlQuery->set($masterGuru->provinsi);
		$sqlQuery->setNumber($masterGuru->kodePos);
		$sqlQuery->set($masterGuru->kewarganegaraan);
		$sqlQuery->set($masterGuru->nuptk);
		$sqlQuery->set($masterGuru->jenisPtk);
		$sqlQuery->set($masterGuru->tgsTambahan);
		$sqlQuery->set($masterGuru->statusPegawai);
		$sqlQuery->set($masterGuru->statusAktif);
		$sqlQuery->set($masterGuru->statusNikah);
		$sqlQuery->set($masterGuru->tmt);
		$sqlQuery->set($masterGuru->keahlianIsyarat);
		$sqlQuery->set($masterGuru->npwp);
		$sqlQuery->set($masterGuru->foto);

		$sqlQuery->setNumber($masterGuru->idGuru);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_guru';
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
		$sql = 'SELECT * FROM master_guru WHERE ';
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

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdUser($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNip($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE nip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaGuru($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE nama_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeGuru($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kode_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNoKtp($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE no_ktp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTempatLahir($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE tempat_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglLahir($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE tgl_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenisKelamin($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE jenis_kelamin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgama($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNoHp($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE no_hp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamatJalan($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE alamat_jalan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRtRw($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE rt_rw = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDusun($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE dusun = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKelurahan($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kelurahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKecamatan($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKabupaten($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kabupaten = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByProvinsi($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodePos($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKewarganegaraan($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE kewarganegaraan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNuptk($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE nuptk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenisPtk($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE jenis_ptk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTgsTambahan($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE tgs_tambahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatusPegawai($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE status_pegawai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatusAktif($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE status_aktif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatusNikah($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE status_nikah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTmt($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE tmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKeahlianIsyarat($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE keahlian_isyarat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNpwp($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE npwp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value, $single = false){
		$sql = 'SELECT * FROM master_guru WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM master_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUser($value){
		$sql = 'DELETE FROM master_guru WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNip($value){
		$sql = 'DELETE FROM master_guru WHERE nip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaGuru($value){
		$sql = 'DELETE FROM master_guru WHERE nama_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM master_guru WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeGuru($value){
		$sql = 'DELETE FROM master_guru WHERE kode_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM master_guru WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM master_guru WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoKtp($value){
		$sql = 'DELETE FROM master_guru WHERE no_ktp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTempatLahir($value){
		$sql = 'DELETE FROM master_guru WHERE tempat_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglLahir($value){
		$sql = 'DELETE FROM master_guru WHERE tgl_lahir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenisKelamin($value){
		$sql = 'DELETE FROM master_guru WHERE jenis_kelamin = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgama($value){
		$sql = 'DELETE FROM master_guru WHERE agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoHp($value){
		$sql = 'DELETE FROM master_guru WHERE no_hp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamatJalan($value){
		$sql = 'DELETE FROM master_guru WHERE alamat_jalan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRtRw($value){
		$sql = 'DELETE FROM master_guru WHERE rt_rw = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDusun($value){
		$sql = 'DELETE FROM master_guru WHERE dusun = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelurahan($value){
		$sql = 'DELETE FROM master_guru WHERE kelurahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKecamatan($value){
		$sql = 'DELETE FROM master_guru WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKabupaten($value){
		$sql = 'DELETE FROM master_guru WHERE kabupaten = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvinsi($value){
		$sql = 'DELETE FROM master_guru WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodePos($value){
		$sql = 'DELETE FROM master_guru WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKewarganegaraan($value){
		$sql = 'DELETE FROM master_guru WHERE kewarganegaraan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNuptk($value){
		$sql = 'DELETE FROM master_guru WHERE nuptk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenisPtk($value){
		$sql = 'DELETE FROM master_guru WHERE jenis_ptk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTgsTambahan($value){
		$sql = 'DELETE FROM master_guru WHERE tgs_tambahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusPegawai($value){
		$sql = 'DELETE FROM master_guru WHERE status_pegawai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusAktif($value){
		$sql = 'DELETE FROM master_guru WHERE status_aktif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatusNikah($value){
		$sql = 'DELETE FROM master_guru WHERE status_nikah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTmt($value){
		$sql = 'DELETE FROM master_guru WHERE tmt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKeahlianIsyarat($value){
		$sql = 'DELETE FROM master_guru WHERE keahlian_isyarat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNpwp($value){
		$sql = 'DELETE FROM master_guru WHERE npwp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM master_guru WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_guru';
		
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
	 * @return MasterGuruDTO
	 */
	protected function readRow($row){
		$masterGuru = new MasterGuruDTO();
		
		$masterGuru->idGuru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$masterGuru->idUser = isset($row['id_user']) ? $row['id_user'] : null;
		$masterGuru->nip = isset($row['nip']) ? $row['nip'] : null;
		$masterGuru->namaGuru = isset($row['nama_guru']) ? $row['nama_guru'] : null;
		$masterGuru->email = isset($row['email']) ? $row['email'] : null;
		$masterGuru->kodeGuru = isset($row['kode_guru']) ? $row['kode_guru'] : null;
		$masterGuru->username = isset($row['username']) ? $row['username'] : null;
		$masterGuru->password = isset($row['password']) ? $row['password'] : null;
		$masterGuru->noKtp = isset($row['no_ktp']) ? $row['no_ktp'] : null;
		$masterGuru->tempatLahir = isset($row['tempat_lahir']) ? $row['tempat_lahir'] : null;
		$masterGuru->tglLahir = isset($row['tgl_lahir']) ? $row['tgl_lahir'] : null;
		$masterGuru->jenisKelamin = isset($row['jenis_kelamin']) ? $row['jenis_kelamin'] : null;
		$masterGuru->agama = isset($row['agama']) ? $row['agama'] : null;
		$masterGuru->noHp = isset($row['no_hp']) ? $row['no_hp'] : null;
		$masterGuru->alamatJalan = isset($row['alamat_jalan']) ? $row['alamat_jalan'] : null;
		$masterGuru->rtRw = isset($row['rt_rw']) ? $row['rt_rw'] : null;
		$masterGuru->dusun = isset($row['dusun']) ? $row['dusun'] : null;
		$masterGuru->kelurahan = isset($row['kelurahan']) ? $row['kelurahan'] : null;
		$masterGuru->kecamatan = isset($row['kecamatan']) ? $row['kecamatan'] : null;
		$masterGuru->kabupaten = isset($row['kabupaten']) ? $row['kabupaten'] : null;
		$masterGuru->provinsi = isset($row['provinsi']) ? $row['provinsi'] : null;
		$masterGuru->kodePos = isset($row['kode_pos']) ? $row['kode_pos'] : null;
		$masterGuru->kewarganegaraan = isset($row['kewarganegaraan']) ? $row['kewarganegaraan'] : null;
		$masterGuru->nuptk = isset($row['nuptk']) ? $row['nuptk'] : null;
		$masterGuru->jenisPtk = isset($row['jenis_ptk']) ? $row['jenis_ptk'] : null;
		$masterGuru->tgsTambahan = isset($row['tgs_tambahan']) ? $row['tgs_tambahan'] : null;
		$masterGuru->statusPegawai = isset($row['status_pegawai']) ? $row['status_pegawai'] : null;
		$masterGuru->statusAktif = isset($row['status_aktif']) ? $row['status_aktif'] : null;
		$masterGuru->statusNikah = isset($row['status_nikah']) ? $row['status_nikah'] : null;
		$masterGuru->tmt = isset($row['tmt']) ? $row['tmt'] : null;
		$masterGuru->keahlianIsyarat = isset($row['keahlian_isyarat']) ? $row['keahlian_isyarat'] : null;
		$masterGuru->npwp = isset($row['npwp']) ? $row['npwp'] : null;
		$masterGuru->foto = isset($row['foto']) ? $row['foto'] : null;

		return $masterGuru;
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
	 * @return MasterGuruDTO
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