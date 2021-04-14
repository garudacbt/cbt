<?php
/**
 * Class that operate on table 'log_materi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class LogMateriMySqlDAO implements LogMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LogMateriDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM log_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM log_materi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM log_materi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param logMateri primary key
 	 */
	public function delete($id_log){
		$sql = 'DELETE FROM log_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_log);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogMateriDTO logMateri
 	 */
	public function insert($logMateri){
		$sql = 'INSERT INTO log_materi (log_time, id_siswa, jam_ke, id_materi, id_mapel, log_type, log_desc, text, file, nilai, catatan, address, agent, device) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logMateri->logTime);
		$sqlQuery->setNumber($logMateri->idSiswa);
		$sqlQuery->setNumber($logMateri->jamKe);
		$sqlQuery->setNumber($logMateri->idMateri);
		$sqlQuery->setNumber($logMateri->idMapel);
		$sqlQuery->setNumber($logMateri->logType);
		$sqlQuery->set($logMateri->logDesc);
		$sqlQuery->set($logMateri->text);
		$sqlQuery->set($logMateri->file);
		$sqlQuery->set($logMateri->nilai);
		$sqlQuery->set($logMateri->catatan);
		$sqlQuery->set($logMateri->address);
		$sqlQuery->set($logMateri->agent);
		$sqlQuery->set($logMateri->device);

		$id = $this->executeInsert($sqlQuery);	
		$logMateri->idLog = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogMateriDTO logMateri
 	 */
	public function update($logMateri){
		$sql = 'UPDATE log_materi SET log_time = ?, id_siswa = ?, jam_ke = ?, id_materi = ?, id_mapel = ?, log_type = ?, log_desc = ?, text = ?, file = ?, nilai = ?, catatan = ?, address = ?, agent = ?, device = ? WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($logMateri->logTime);
		$sqlQuery->setNumber($logMateri->idSiswa);
		$sqlQuery->setNumber($logMateri->jamKe);
		$sqlQuery->setNumber($logMateri->idMateri);
		$sqlQuery->setNumber($logMateri->idMapel);
		$sqlQuery->setNumber($logMateri->logType);
		$sqlQuery->set($logMateri->logDesc);
		$sqlQuery->set($logMateri->text);
		$sqlQuery->set($logMateri->file);
		$sqlQuery->set($logMateri->nilai);
		$sqlQuery->set($logMateri->catatan);
		$sqlQuery->set($logMateri->address);
		$sqlQuery->set($logMateri->agent);
		$sqlQuery->set($logMateri->device);

		$sqlQuery->set($logMateri->idLog);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM log_materi';
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
		$sql = 'SELECT * FROM log_materi WHERE ';
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
		$sql = 'SELECT * FROM log_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByLogTime($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJamKe($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMateri($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogType($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLogDesc($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCatatan($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgent($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDevice($value, $single = false){
		$sql = 'SELECT * FROM log_materi WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdLog($value){
		$sql = 'DELETE FROM log_materi WHERE id_log = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogTime($value){
		$sql = 'DELETE FROM log_materi WHERE log_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM log_materi WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJamKe($value){
		$sql = 'DELETE FROM log_materi WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMateri($value){
		$sql = 'DELETE FROM log_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM log_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogType($value){
		$sql = 'DELETE FROM log_materi WHERE log_type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLogDesc($value){
		$sql = 'DELETE FROM log_materi WHERE log_desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM log_materi WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM log_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM log_materi WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCatatan($value){
		$sql = 'DELETE FROM log_materi WHERE catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM log_materi WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgent($value){
		$sql = 'DELETE FROM log_materi WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDevice($value){
		$sql = 'DELETE FROM log_materi WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from log_materi';
		
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
	 * @return LogMateriDTO
	 */
	protected function readRow($row){
		$logMateri = new LogMateriDTO();
		
		$logMateri->idLog = isset($row['id_log']) ? $row['id_log'] : null;
		$logMateri->logTime = isset($row['log_time']) ? $row['log_time'] : null;
		$logMateri->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$logMateri->jamKe = isset($row['jam_ke']) ? $row['jam_ke'] : null;
		$logMateri->idMateri = isset($row['id_materi']) ? $row['id_materi'] : null;
		$logMateri->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$logMateri->logType = isset($row['log_type']) ? $row['log_type'] : null;
		$logMateri->logDesc = isset($row['log_desc']) ? $row['log_desc'] : null;
		$logMateri->text = isset($row['text']) ? $row['text'] : null;
		$logMateri->file = isset($row['file']) ? $row['file'] : null;
		$logMateri->nilai = isset($row['nilai']) ? $row['nilai'] : null;
		$logMateri->catatan = isset($row['catatan']) ? $row['catatan'] : null;
		$logMateri->address = isset($row['address']) ? $row['address'] : null;
		$logMateri->agent = isset($row['agent']) ? $row['agent'] : null;
		$logMateri->device = isset($row['device']) ? $row['device'] : null;

		return $logMateri;
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
	 * @return LogMateriDTO
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