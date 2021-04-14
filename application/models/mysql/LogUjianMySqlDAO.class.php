<?php
/**
 * Class that operate on table 'log_ujian'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class LogUjianMySqlDAO implements LogUjianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LogUjianDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM log_ujian WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM log_ujian';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM log_ujian ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param logUjian primary key
 	 */
	public function delete($id_log){
		$sql = 'DELETE FROM log_ujian WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_log);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogUjianDTO logUjian
 	 */
	public function insert($logUjian){
		$sql = 'INSERT INTO log_ujian (log_time, id_siswa, id_jadwal, log_type, log_desc, address, agent, device) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logUjian->logTime);
		$sqlQuery->setNumber($logUjian->idSiswa);
		$sqlQuery->setNumber($logUjian->idJadwal);
		$sqlQuery->setNumber($logUjian->logType);
		$sqlQuery->set($logUjian->logDesc);
		$sqlQuery->set($logUjian->address);
		$sqlQuery->set($logUjian->agent);
		$sqlQuery->set($logUjian->device);

		$id = $this->executeInsert($sqlQuery);	
		$logUjian->idLog = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogUjianDTO logUjian
 	 */
	public function update($logUjian){
		$sql = 'UPDATE log_ujian SET log_time = ?, id_siswa = ?, id_jadwal = ?, log_type = ?, log_desc = ?, address = ?, agent = ?, device = ? WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logUjian->logTime);
		$sqlQuery->setNumber($logUjian->idSiswa);
		$sqlQuery->setNumber($logUjian->idJadwal);
		$sqlQuery->setNumber($logUjian->logType);
		$sqlQuery->set($logUjian->logDesc);
		$sqlQuery->set($logUjian->address);
		$sqlQuery->set($logUjian->agent);
		$sqlQuery->set($logUjian->device);

		$sqlQuery->setNumber($logUjian->idLog);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM log_ujian';
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
		$sql = 'SELECT * FROM log_ujian WHERE ';
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

	public function queryByIdLog($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByLogTime($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogType($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogDesc($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgent($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDevice($value, $single = false){
		$sql = 'SELECT * FROM log_ujian WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdLog($value){
		$sql = 'DELETE FROM log_ujian WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogTime($value){
		$sql = 'DELETE FROM log_ujian WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM log_ujian WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM log_ujian WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogType($value){
		$sql = 'DELETE FROM log_ujian WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogDesc($value){
		$sql = 'DELETE FROM log_ujian WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM log_ujian WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgent($value){
		$sql = 'DELETE FROM log_ujian WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDevice($value){
		$sql = 'DELETE FROM log_ujian WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from log_ujian';
		
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
	 * @return LogUjianDTO
	 */
	protected function readRow($row){
		$logUjian = new LogUjianDTO();
		
		$logUjian->idLog = isset($row['id_log']) ? $row['id_log'] : null;
		$logUjian->logTime = isset($row['log_time']) ? $row['log_time'] : null;
		$logUjian->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$logUjian->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$logUjian->logType = isset($row['log_type']) ? $row['log_type'] : null;
		$logUjian->logDesc = isset($row['log_desc']) ? $row['log_desc'] : null;
		$logUjian->address = isset($row['address']) ? $row['address'] : null;
		$logUjian->agent = isset($row['agent']) ? $row['agent'] : null;
		$logUjian->device = isset($row['device']) ? $row['device'] : null;

		return $logUjian;
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
	 * @return LogUjianDTO
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