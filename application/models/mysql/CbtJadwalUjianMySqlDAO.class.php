<?php
/**
 * Class that operate on table 'cbt_jadwal_ujian'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class CbtJadwalUjianMySqlDAO implements CbtJadwalUjianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtJadwalUjianDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_jadwal_ujian';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_jadwal_ujian ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtJadwalUjian primary key
 	 */
	public function delete($id_jadwal){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_jadwal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJadwalUjianDTO cbtJadwalUjian
 	 */
	public function insert($cbtJadwalUjian){
		$sql = 'INSERT INTO cbt_jadwal_ujian (id_tp, id_smt, level, id_jenis, dari, sampai, jam_mulai, jml_mapel, jml_istirahat, durasi_mapel, durasi_istirahat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtJadwalUjian->id_tp);
		$sqlQuery->setNumber($cbtJadwalUjian->id_smt);
		$sqlQuery->set($cbtJadwalUjian->level);
		$sqlQuery->setNumber($cbtJadwalUjian->id_jenis);
		$sqlQuery->set($cbtJadwalUjian->dari);
		$sqlQuery->set($cbtJadwalUjian->sampai);
		$sqlQuery->set($cbtJadwalUjian->jam_mulai);
		$sqlQuery->setNumber($cbtJadwalUjian->jml_mapel);
		$sqlQuery->setNumber($cbtJadwalUjian->jml_istirahat);
		$sqlQuery->setNumber($cbtJadwalUjian->durasi_mapel);
		$sqlQuery->setNumber($cbtJadwalUjian->durasi_istirahat);

		$id = $this->executeInsert($sqlQuery);	
		$cbtJadwalUjian->id_jadwal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJadwalUjianDTO cbtJadwalUjian
 	 */
	public function update($cbtJadwalUjian){
		$sql = 'UPDATE cbt_jadwal_ujian SET id_tp = ?, id_smt = ?, level = ?, id_jenis = ?, dari = ?, sampai = ?, jam_mulai = ?, jml_mapel = ?, jml_istirahat = ?, durasi_mapel = ?, durasi_istirahat = ? WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtJadwalUjian->id_tp);
		$sqlQuery->setNumber($cbtJadwalUjian->id_smt);
		$sqlQuery->set($cbtJadwalUjian->level);
		$sqlQuery->setNumber($cbtJadwalUjian->id_jenis);
		$sqlQuery->set($cbtJadwalUjian->dari);
		$sqlQuery->set($cbtJadwalUjian->sampai);
		$sqlQuery->set($cbtJadwalUjian->jam_mulai);
		$sqlQuery->setNumber($cbtJadwalUjian->jml_mapel);
		$sqlQuery->setNumber($cbtJadwalUjian->jml_istirahat);
		$sqlQuery->setNumber($cbtJadwalUjian->durasi_mapel);
		$sqlQuery->setNumber($cbtJadwalUjian->durasi_istirahat);

		$sqlQuery->setNumber($cbtJadwalUjian->id_jadwal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_jadwal_ujian';
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
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE ';
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

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLevel($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDari($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySampai($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE sampai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJamMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE jam_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJmlMapel($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE jml_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJmlIstirahat($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE jml_istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDurasiMapel($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE durasi_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDurasiIstirahat($value, $single = false){
		$sql = 'SELECT * FROM cbt_jadwal_ujian WHERE durasi_istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLevel($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJenis($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDari($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySampai($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE sampai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJamMulai($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE jam_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJmlMapel($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE jml_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJmlIstirahat($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE jml_istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurasiMapel($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE durasi_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurasiIstirahat($value){
		$sql = 'DELETE FROM cbt_jadwal_ujian WHERE durasi_istirahat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_jadwal_ujian';
		
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
	 * @return CbtJadwalUjianDTO
	 */
	protected function readRow($row){
		$cbtJadwalUjian = new CbtJadwalUjianDTO();
		
		$cbtJadwalUjian->id_jadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtJadwalUjian->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtJadwalUjian->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtJadwalUjian->level = isset($row['level']) ? $row['level'] : null;
		$cbtJadwalUjian->id_jenis = isset($row['id_jenis']) ? $row['id_jenis'] : null;
		$cbtJadwalUjian->dari = isset($row['dari']) ? $row['dari'] : null;
		$cbtJadwalUjian->sampai = isset($row['sampai']) ? $row['sampai'] : null;
		$cbtJadwalUjian->jam_mulai = isset($row['jam_mulai']) ? $row['jam_mulai'] : null;
		$cbtJadwalUjian->jml_mapel = isset($row['jml_mapel']) ? $row['jml_mapel'] : null;
		$cbtJadwalUjian->jml_istirahat = isset($row['jml_istirahat']) ? $row['jml_istirahat'] : null;
		$cbtJadwalUjian->durasi_mapel = isset($row['durasi_mapel']) ? $row['durasi_mapel'] : null;
		$cbtJadwalUjian->durasi_istirahat = isset($row['durasi_istirahat']) ? $row['durasi_istirahat'] : null;

		return $cbtJadwalUjian;
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
	 * @return CbtJadwalUjianDTO
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