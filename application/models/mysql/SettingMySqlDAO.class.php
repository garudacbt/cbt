<?php
/**
 * Class that operate on table 'setting'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class SettingMySqlDAO implements SettingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return SettingDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM setting';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM setting ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param setting primary key
 	 */
	public function delete($id_setting){
		$sql = 'DELETE FROM setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_setting);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SettingDTO setting
 	 */
	public function insert($setting){
		$sql = 'INSERT INTO setting (kode_sekolah, sekolah, npsn, nss, jenjang, kepsek, nip, tanda_tangan, alamat, desa, kecamatan, kota, provinsi, kode_pos, telp, fax, web, email, nama_aplikasi, logo_kanan, logo_kiri, versi, ip_server, waktu, server, id_server, sekolah_id, db_versi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($setting->kodeSekolah);
		$sqlQuery->set($setting->sekolah);
		$sqlQuery->set($setting->npsn);
		$sqlQuery->set($setting->nss);
		$sqlQuery->setNumber($setting->jenjang);
		$sqlQuery->set($setting->kepsek);
		$sqlQuery->set($setting->nip);
		$sqlQuery->set($setting->tandaTangan);
		$sqlQuery->set($setting->alamat);
		$sqlQuery->set($setting->desa);
		$sqlQuery->set($setting->kecamatan);
		$sqlQuery->set($setting->kota);
		$sqlQuery->set($setting->provinsi);
		$sqlQuery->setNumber($setting->kodePos);
		$sqlQuery->set($setting->telp);
		$sqlQuery->set($setting->fax);
		$sqlQuery->set($setting->web);
		$sqlQuery->set($setting->email);
		$sqlQuery->set($setting->namaAplikasi);
		$sqlQuery->set($setting->logoKanan);
		$sqlQuery->set($setting->logoKiri);
		$sqlQuery->set($setting->versi);
		$sqlQuery->set($setting->ipServer);
		$sqlQuery->set($setting->waktu);
		$sqlQuery->set($setting->server);
		$sqlQuery->set($setting->idServer);
		$sqlQuery->set($setting->sekolahId);
		$sqlQuery->set($setting->dbVersi);

		$id = $this->executeInsert($sqlQuery);	
		$setting->idSetting = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param SettingDTO setting
 	 */
	public function update($setting){
		$sql = 'UPDATE setting SET kode_sekolah = ?, sekolah = ?, npsn = ?, nss = ?, jenjang = ?, kepsek = ?, nip = ?, tanda_tangan = ?, alamat = ?, desa = ?, kecamatan = ?, kota = ?, provinsi = ?, kode_pos = ?, telp = ?, fax = ?, web = ?, email = ?, nama_aplikasi = ?, logo_kanan = ?, logo_kiri = ?, versi = ?, ip_server = ?, waktu = ?, server = ?, id_server = ?, sekolah_id = ?, db_versi = ? WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($setting->kodeSekolah);
		$sqlQuery->set($setting->sekolah);
		$sqlQuery->set($setting->npsn);
		$sqlQuery->set($setting->nss);
		$sqlQuery->setNumber($setting->jenjang);
		$sqlQuery->set($setting->kepsek);
		$sqlQuery->set($setting->nip);
		$sqlQuery->set($setting->tandaTangan);
		$sqlQuery->set($setting->alamat);
		$sqlQuery->set($setting->desa);
		$sqlQuery->set($setting->kecamatan);
		$sqlQuery->set($setting->kota);
		$sqlQuery->set($setting->provinsi);
		$sqlQuery->setNumber($setting->kodePos);
		$sqlQuery->set($setting->telp);
		$sqlQuery->set($setting->fax);
		$sqlQuery->set($setting->web);
		$sqlQuery->set($setting->email);
		$sqlQuery->set($setting->namaAplikasi);
		$sqlQuery->set($setting->logoKanan);
		$sqlQuery->set($setting->logoKiri);
		$sqlQuery->set($setting->versi);
		$sqlQuery->set($setting->ipServer);
		$sqlQuery->set($setting->waktu);
		$sqlQuery->set($setting->server);
		$sqlQuery->set($setting->idServer);
		$sqlQuery->set($setting->sekolahId);
		$sqlQuery->set($setting->dbVersi);

		$sqlQuery->setNumber($setting->idSetting);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM setting';
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
		$sql = 'SELECT * FROM setting WHERE ';
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

	public function queryByIdSetting($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByKodeSekolah($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE kode_sekolah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySekolah($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE sekolah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNpsn($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE npsn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNss($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE nss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenjang($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE jenjang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKepsek($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE kepsek = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNip($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE nip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTandaTangan($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE tanda_tangan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAlamat($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE alamat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDesa($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE desa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKecamatan($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKota($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE kota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByProvinsi($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodePos($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTelp($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE telp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFax($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByWeb($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE web = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaAplikasi($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE nama_aplikasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogoKanan($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE logo_kanan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogoKiri($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE logo_kiri = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByVersi($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE versi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIpServer($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE ip_server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByWaktu($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE waktu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByServer($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdServer($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE id_server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySekolahId($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE sekolah_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDbVersi($value, $single = false){
		$sql = 'SELECT * FROM setting WHERE db_versi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSetting($value){
		$sql = 'DELETE FROM setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeSekolah($value){
		$sql = 'DELETE FROM setting WHERE kode_sekolah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySekolah($value){
		$sql = 'DELETE FROM setting WHERE sekolah = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNpsn($value){
		$sql = 'DELETE FROM setting WHERE npsn = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNss($value){
		$sql = 'DELETE FROM setting WHERE nss = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenjang($value){
		$sql = 'DELETE FROM setting WHERE jenjang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKepsek($value){
		$sql = 'DELETE FROM setting WHERE kepsek = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNip($value){
		$sql = 'DELETE FROM setting WHERE nip = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTandaTangan($value){
		$sql = 'DELETE FROM setting WHERE tanda_tangan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlamat($value){
		$sql = 'DELETE FROM setting WHERE alamat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesa($value){
		$sql = 'DELETE FROM setting WHERE desa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKecamatan($value){
		$sql = 'DELETE FROM setting WHERE kecamatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKota($value){
		$sql = 'DELETE FROM setting WHERE kota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProvinsi($value){
		$sql = 'DELETE FROM setting WHERE provinsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodePos($value){
		$sql = 'DELETE FROM setting WHERE kode_pos = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTelp($value){
		$sql = 'DELETE FROM setting WHERE telp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFax($value){
		$sql = 'DELETE FROM setting WHERE fax = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWeb($value){
		$sql = 'DELETE FROM setting WHERE web = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM setting WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaAplikasi($value){
		$sql = 'DELETE FROM setting WHERE nama_aplikasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogoKanan($value){
		$sql = 'DELETE FROM setting WHERE logo_kanan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogoKiri($value){
		$sql = 'DELETE FROM setting WHERE logo_kiri = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVersi($value){
		$sql = 'DELETE FROM setting WHERE versi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIpServer($value){
		$sql = 'DELETE FROM setting WHERE ip_server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWaktu($value){
		$sql = 'DELETE FROM setting WHERE waktu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByServer($value){
		$sql = 'DELETE FROM setting WHERE server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdServer($value){
		$sql = 'DELETE FROM setting WHERE id_server = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySekolahId($value){
		$sql = 'DELETE FROM setting WHERE sekolah_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDbVersi($value){
		$sql = 'DELETE FROM setting WHERE db_versi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from setting';
		
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
	 * @return SettingDTO
	 */
	protected function readRow($row){
		$setting = new SettingDTO();
		
		$setting->idSetting = isset($row['id_setting']) ? $row['id_setting'] : null;
		$setting->kodeSekolah = isset($row['kode_sekolah']) ? $row['kode_sekolah'] : null;
		$setting->sekolah = isset($row['sekolah']) ? $row['sekolah'] : null;
		$setting->npsn = isset($row['npsn']) ? $row['npsn'] : null;
		$setting->nss = isset($row['nss']) ? $row['nss'] : null;
		$setting->jenjang = isset($row['jenjang']) ? $row['jenjang'] : null;
		$setting->kepsek = isset($row['kepsek']) ? $row['kepsek'] : null;
		$setting->nip = isset($row['nip']) ? $row['nip'] : null;
		$setting->tandaTangan = isset($row['tanda_tangan']) ? $row['tanda_tangan'] : null;
		$setting->alamat = isset($row['alamat']) ? $row['alamat'] : null;
		$setting->desa = isset($row['desa']) ? $row['desa'] : null;
		$setting->kecamatan = isset($row['kecamatan']) ? $row['kecamatan'] : null;
		$setting->kota = isset($row['kota']) ? $row['kota'] : null;
		$setting->provinsi = isset($row['provinsi']) ? $row['provinsi'] : null;
		$setting->kodePos = isset($row['kode_pos']) ? $row['kode_pos'] : null;
		$setting->telp = isset($row['telp']) ? $row['telp'] : null;
		$setting->fax = isset($row['fax']) ? $row['fax'] : null;
		$setting->web = isset($row['web']) ? $row['web'] : null;
		$setting->email = isset($row['email']) ? $row['email'] : null;
		$setting->namaAplikasi = isset($row['nama_aplikasi']) ? $row['nama_aplikasi'] : null;
		$setting->logoKanan = isset($row['logo_kanan']) ? $row['logo_kanan'] : null;
		$setting->logoKiri = isset($row['logo_kiri']) ? $row['logo_kiri'] : null;
		$setting->versi = isset($row['versi']) ? $row['versi'] : null;
		$setting->ipServer = isset($row['ip_server']) ? $row['ip_server'] : null;
		$setting->waktu = isset($row['waktu']) ? $row['waktu'] : null;
		$setting->server = isset($row['server']) ? $row['server'] : null;
		$setting->idServer = isset($row['id_server']) ? $row['id_server'] : null;
		$setting->sekolahId = isset($row['sekolah_id']) ? $row['sekolah_id'] : null;
		$setting->dbVersi = isset($row['db_versi']) ? $row['db_versi'] : null;

		return $setting;
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
	 * @return SettingDTO
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