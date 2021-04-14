<?php
/**
 * Class that operate on table 'log_file_materi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
class LogFileMateriMySqlDAO implements LogFileMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LogFileMateri
	 */
	public function load($id){
		$sql = 'SELECT * FROM log_file_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM log_file_materi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM log_file_materi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param logFileMateri primary key
 	 */
	public function delete($id_log){
		$sql = 'DELETE FROM log_file_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_log);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogFileMateri logFileMateri
 	 */
	public function insert($logFileMateri){
		$sql = 'INSERT INTO log_file_materi (time, text, file, nilai, catatan) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logFileMateri->time);
		$sqlQuery->set($logFileMateri->text);
		$sqlQuery->set($logFileMateri->file);
		$sqlQuery->set($logFileMateri->nilai);
		$sqlQuery->set($logFileMateri->catatan);

		$id = $this->executeInsert($sqlQuery);	
		$logFileMateri->idLog = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogFileMateri logFileMateri
 	 */
	public function update($logFileMateri){
		$sql = 'UPDATE log_file_materi SET time = ?, text = ?, file = ?, nilai = ?, catatan = ? WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logFileMateri->time);
		$sqlQuery->set($logFileMateri->text);
		$sqlQuery->set($logFileMateri->file);
		$sqlQuery->set($logFileMateri->nilai);
		$sqlQuery->set($logFileMateri->catatan);

		$sqlQuery->set($logFileMateri->idLog);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM log_file_materi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdLog($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByTime($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCatatan($value, $single = false){
		$sql = 'SELECT * FROM log_file_materi WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdLog($value){
		$sql = 'DELETE FROM log_file_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTime($value){
		$sql = 'DELETE FROM log_file_materi WHERE time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM log_file_materi WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM log_file_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM log_file_materi WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCatatan($value){
		$sql = 'DELETE FROM log_file_materi WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from log_file_materi';
		
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
	 * @return LogFileMateri
	 */
	protected function readRow($row){
		$logFileMateri = new LogFileMateri();
		
		$logFileMateri->idLog = $row['id_log'];
		$logFileMateri->time = $row['time'];
		$logFileMateri->text = $row['text'];
		$logFileMateri->file = $row['file'];
		$logFileMateri->nilai = $row['nilai'];
		$logFileMateri->catatan = $row['catatan'];

		return $logFileMateri;
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
	 * @return LogFileMateri
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