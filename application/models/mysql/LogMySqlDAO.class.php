<?php
/**
 * Class that operate on table 'log'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class LogMySqlDAO implements LogDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LogDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM log WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM log';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM log ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param log primary key
 	 */
	public function delete($id_log){
		$sql = 'DELETE FROM log WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_log);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogDTO log
 	 */
	public function insert($log){
		$sql = 'INSERT INTO log (log_time, id_user, id_group, name_group, log_type, log_desc, address, agent, device) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($log->logTime);
		$sqlQuery->setNumber($log->idUser);
		$sqlQuery->setNumber($log->idGroup);
		$sqlQuery->set($log->nameGroup);
		$sqlQuery->setNumber($log->logType);
		$sqlQuery->set($log->logDesc);
		$sqlQuery->set($log->address);
		$sqlQuery->set($log->agent);
		$sqlQuery->set($log->device);

		$id = $this->executeInsert($sqlQuery);	
		$log->idLog = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogDTO log
 	 */
	public function update($log){
		$sql = 'UPDATE log SET log_time = ?, id_user = ?, id_group = ?, name_group = ?, log_type = ?, log_desc = ?, address = ?, agent = ?, device = ? WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($log->logTime);
		$sqlQuery->setNumber($log->idUser);
		$sqlQuery->setNumber($log->idGroup);
		$sqlQuery->set($log->nameGroup);
		$sqlQuery->setNumber($log->logType);
		$sqlQuery->set($log->logDesc);
		$sqlQuery->set($log->address);
		$sqlQuery->set($log->agent);
		$sqlQuery->set($log->device);

		$sqlQuery->setNumber($log->idLog);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM log';
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
		$sql = 'SELECT * FROM log WHERE ';
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
		$sql = 'SELECT * FROM log WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByLogTime($value, $single = false){
		$sql = 'SELECT * FROM log WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdUser($value, $single = false){
		$sql = 'SELECT * FROM log WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGroup($value, $single = false){
		$sql = 'SELECT * FROM log WHERE id_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNameGroup($value, $single = false){
		$sql = 'SELECT * FROM log WHERE name_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogType($value, $single = false){
		$sql = 'SELECT * FROM log WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogDesc($value, $single = false){
		$sql = 'SELECT * FROM log WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value, $single = false){
		$sql = 'SELECT * FROM log WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgent($value, $single = false){
		$sql = 'SELECT * FROM log WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDevice($value, $single = false){
		$sql = 'SELECT * FROM log WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdLog($value){
		$sql = 'DELETE FROM log WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogTime($value){
		$sql = 'DELETE FROM log WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUser($value){
		$sql = 'DELETE FROM log WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGroup($value){
		$sql = 'DELETE FROM log WHERE id_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNameGroup($value){
		$sql = 'DELETE FROM log WHERE name_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogType($value){
		$sql = 'DELETE FROM log WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogDesc($value){
		$sql = 'DELETE FROM log WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM log WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgent($value){
		$sql = 'DELETE FROM log WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDevice($value){
		$sql = 'DELETE FROM log WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from log';
		
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
	 * @return LogDTO
	 */
	protected function readRow($row){
		$log = new LogDTO();
		
		$log->idLog = isset($row['id_log']) ? $row['id_log'] : null;
		$log->logTime = isset($row['log_time']) ? $row['log_time'] : null;
		$log->idUser = isset($row['id_user']) ? $row['id_user'] : null;
		$log->idGroup = isset($row['id_group']) ? $row['id_group'] : null;
		$log->nameGroup = isset($row['name_group']) ? $row['name_group'] : null;
		$log->logType = isset($row['log_type']) ? $row['log_type'] : null;
		$log->logDesc = isset($row['log_desc']) ? $row['log_desc'] : null;
		$log->address = isset($row['address']) ? $row['address'] : null;
		$log->agent = isset($row['agent']) ? $row['agent'] : null;
		$log->device = isset($row['device']) ? $row['device'] : null;

		return $log;
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
	 * @return LogDTO
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