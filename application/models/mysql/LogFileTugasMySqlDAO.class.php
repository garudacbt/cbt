<?php
/**
 * Class that operate on table 'log_file_tugas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
class LogFileTugasMySqlDAO implements LogFileTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LogFileTuga
	 */
	public function load($id){
		$sql = 'SELECT * FROM log_file_tugas WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM log_file_tugas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM log_file_tugas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param logFileTuga primary key
 	 */
	public function delete($id_log){
		$sql = 'DELETE FROM log_file_tugas WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_log);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogFileTuga logFileTuga
 	 */
	public function insert($logFileTuga){
		$sql = 'INSERT INTO log_file_tugas (time, text, file, nilai, catatan) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logFileTuga->time);
		$sqlQuery->set($logFileTuga->text);
		$sqlQuery->set($logFileTuga->file);
		$sqlQuery->set($logFileTuga->nilai);
		$sqlQuery->set($logFileTuga->catatan);

		$id = $this->executeInsert($sqlQuery);	
		$logFileTuga->idLog = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogFileTuga logFileTuga
 	 */
	public function update($logFileTuga){
		$sql = 'UPDATE log_file_tugas SET time = ?, text = ?, file = ?, nilai = ?, catatan = ? WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logFileTuga->time);
		$sqlQuery->set($logFileTuga->text);
		$sqlQuery->set($logFileTuga->file);
		$sqlQuery->set($logFileTuga->nilai);
		$sqlQuery->set($logFileTuga->catatan);

		$sqlQuery->set($logFileTuga->idLog);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM log_file_tugas';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdLog($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByTime($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCatatan($value, $single = false){
		$sql = 'SELECT * FROM log_file_tugas WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdLog($value){
		$sql = 'DELETE FROM log_file_tugas WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTime($value){
		$sql = 'DELETE FROM log_file_tugas WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM log_file_tugas WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM log_file_tugas WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM log_file_tugas WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCatatan($value){
		$sql = 'DELETE FROM log_file_tugas WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from log_file_tugas';
		
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
	 * @return LogFileTuga
	 */
	protected function readRow($row){
		$logFileTuga = new LogFileTuga();
		
		$logFileTuga->idLog = $row['id_log'];
		$logFileTuga->time = $row['time'];
		$logFileTuga->text = $row['text'];
		$logFileTuga->file = $row['file'];
		$logFileTuga->nilai = $row['nilai'];
		$logFileTuga->catatan = $row['catatan'];

		return $logFileTuga;
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
	 * @return LogFileTuga
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