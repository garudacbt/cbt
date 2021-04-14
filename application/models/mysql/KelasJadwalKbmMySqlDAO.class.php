<?php
/**
 * Class that operate on table 'kelas_jadwal_kbm'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasJadwalKbmMySqlDAO implements KelasJadwalKbmDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasJadwalKbmDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE id_kbm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_jadwal_kbm';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_jadwal_kbm ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasJadwalKbm primary key
 	 */
	public function delete($id_kbm){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE id_kbm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kbm);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalKbmDTO kelasJadwalKbm
 	 */
	public function insert($kelasJadwalKbm){
		$sql = 'INSERT INTO kelas_jadwal_kbm (id_tp, id_smt, id_kelas, kbm_jam_pel, kbm_jam_mulai, kbm_jml_mapel_hari, istirahat) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalKbm->idTp);
		$sqlQuery->setNumber($kelasJadwalKbm->idSmt);
		$sqlQuery->setNumber($kelasJadwalKbm->idKelas);
		$sqlQuery->setNumber($kelasJadwalKbm->kbmJamPel);
		$sqlQuery->set($kelasJadwalKbm->kbmJamMulai);
		$sqlQuery->setNumber($kelasJadwalKbm->kbmJmlMapelHari);
		$sqlQuery->set($kelasJadwalKbm->istirahat);

		$id = $this->executeInsert($sqlQuery);	
		$kelasJadwalKbm->idKbm = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalKbmDTO kelasJadwalKbm
 	 */
	public function update($kelasJadwalKbm){
		$sql = 'UPDATE kelas_jadwal_kbm SET id_tp = ?, id_smt = ?, id_kelas = ?, kbm_jam_pel = ?, kbm_jam_mulai = ?, kbm_jml_mapel_hari = ?, istirahat = ? WHERE id_kbm = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalKbm->idTp);
		$sqlQuery->setNumber($kelasJadwalKbm->idSmt);
		$sqlQuery->setNumber($kelasJadwalKbm->idKelas);
		$sqlQuery->setNumber($kelasJadwalKbm->kbmJamPel);
		$sqlQuery->set($kelasJadwalKbm->kbmJamMulai);
		$sqlQuery->setNumber($kelasJadwalKbm->kbmJmlMapelHari);
		$sqlQuery->set($kelasJadwalKbm->istirahat);

		$sqlQuery->setNumber($kelasJadwalKbm->idKbm);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_jadwal_kbm';
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
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE ';
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

	public function queryByIdKbm($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE id_kbm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKbmJamPel($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE kbm_jam_pel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKbmJamMulai($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE kbm_jam_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKbmJmlMapelHari($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE kbm_jml_mapel_hari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIstirahat($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_kbm WHERE istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKbm($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE id_kbm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKbmJamPel($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE kbm_jam_pel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKbmJamMulai($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE kbm_jam_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKbmJmlMapelHari($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE kbm_jml_mapel_hari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIstirahat($value){
		$sql = 'DELETE FROM kelas_jadwal_kbm WHERE istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_jadwal_kbm';
		
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
	 * @return KelasJadwalKbmDTO
	 */
	protected function readRow($row){
		$kelasJadwalKbm = new KelasJadwalKbmDTO();
		
		$kelasJadwalKbm->idKbm = isset($row['id_kbm']) ? $row['id_kbm'] : null;
		$kelasJadwalKbm->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasJadwalKbm->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasJadwalKbm->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasJadwalKbm->kbmJamPel = isset($row['kbm_jam_pel']) ? $row['kbm_jam_pel'] : null;
		$kelasJadwalKbm->kbmJamMulai = isset($row['kbm_jam_mulai']) ? $row['kbm_jam_mulai'] : null;
		$kelasJadwalKbm->kbmJmlMapelHari = isset($row['kbm_jml_mapel_hari']) ? $row['kbm_jml_mapel_hari'] : null;
		$kelasJadwalKbm->istirahat = isset($row['istirahat']) ? $row['istirahat'] : null;

		return $kelasJadwalKbm;
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
	 * @return KelasJadwalKbmDTO
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