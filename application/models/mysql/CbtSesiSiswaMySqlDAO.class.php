<?php
/**
 * Class that operate on table 'cbt_sesi_siswa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtSesiSiswaMySqlDAO implements CbtSesiSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtSesiSiswaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_sesi_siswa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_sesi_siswa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtSesiSiswa primary key
 	 */
	public function delete($siswa_id){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($siswa_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSesiSiswaDTO cbtSesiSiswa
 	 */
	public function insert($cbtSesiSiswa){
		$sql = 'INSERT INTO cbt_sesi_siswa (kelas_id, ruang_id, sesi_id, tp_id, smt_id) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSesiSiswa->kelasId);
		$sqlQuery->setNumber($cbtSesiSiswa->ruangId);
		$sqlQuery->setNumber($cbtSesiSiswa->sesiId);
		$sqlQuery->setNumber($cbtSesiSiswa->tpId);
		$sqlQuery->setNumber($cbtSesiSiswa->smtId);

		$id = $this->executeInsert($sqlQuery);	
		$cbtSesiSiswa->siswaId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSesiSiswaDTO cbtSesiSiswa
 	 */
	public function update($cbtSesiSiswa){
		$sql = 'UPDATE cbt_sesi_siswa SET kelas_id = ?, ruang_id = ?, sesi_id = ?, tp_id = ?, smt_id = ? WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSesiSiswa->kelasId);
		$sqlQuery->setNumber($cbtSesiSiswa->ruangId);
		$sqlQuery->setNumber($cbtSesiSiswa->sesiId);
		$sqlQuery->setNumber($cbtSesiSiswa->tpId);
		$sqlQuery->setNumber($cbtSesiSiswa->smtId);

		$sqlQuery->setNumber($cbtSesiSiswa->siswaId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_sesi_siswa';
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
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE ';
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

	public function queryBySiswaId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByKelasId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE kelas_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRuangId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE ruang_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySesiId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE sesi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTpId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE tp_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySmtId($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi_siswa WHERE smt_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteBySiswaId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelasId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE kelas_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRuangId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE ruang_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySesiId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE sesi_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTpId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE tp_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySmtId($value){
		$sql = 'DELETE FROM cbt_sesi_siswa WHERE smt_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_sesi_siswa';
		
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
	 * @return CbtSesiSiswaDTO
	 */
	protected function readRow($row){
		$cbtSesiSiswa = new CbtSesiSiswaDTO();
		
		$cbtSesiSiswa->siswaId = isset($row['siswa_id']) ? $row['siswa_id'] : null;
		$cbtSesiSiswa->kelasId = isset($row['kelas_id']) ? $row['kelas_id'] : null;
		$cbtSesiSiswa->ruangId = isset($row['ruang_id']) ? $row['ruang_id'] : null;
		$cbtSesiSiswa->sesiId = isset($row['sesi_id']) ? $row['sesi_id'] : null;
		$cbtSesiSiswa->tpId = isset($row['tp_id']) ? $row['tp_id'] : null;
		$cbtSesiSiswa->smtId = isset($row['smt_id']) ? $row['smt_id'] : null;

		return $cbtSesiSiswa;
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
	 * @return CbtSesiSiswaDTO
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