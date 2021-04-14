<?php
/**
 * Class that operate on table 'master_jurusan'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterJurusanMySqlDAO implements MasterJurusanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterJurusanDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_jurusan WHERE id_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_jurusan';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_jurusan ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterJurusan primary key
 	 */
	public function delete($id_jurusan){
		$sql = 'DELETE FROM master_jurusan WHERE id_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_jurusan);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterJurusanDTO masterJurusan
 	 */
	public function insert($masterJurusan){
		$sql = 'INSERT INTO master_jurusan (nama_jurusan, kode_jurusan, status, deletable) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterJurusan->namaJurusan);
		$sqlQuery->set($masterJurusan->kodeJurusan);
		$sqlQuery->setNumber($masterJurusan->status);
		$sqlQuery->setNumber($masterJurusan->deletable);

		$id = $this->executeInsert($sqlQuery);	
		$masterJurusan->idJurusan = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterJurusanDTO masterJurusan
 	 */
	public function update($masterJurusan){
		$sql = 'UPDATE master_jurusan SET nama_jurusan = ?, kode_jurusan = ?, status = ?, deletable = ? WHERE id_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterJurusan->namaJurusan);
		$sqlQuery->set($masterJurusan->kodeJurusan);
		$sqlQuery->setNumber($masterJurusan->status);
		$sqlQuery->setNumber($masterJurusan->deletable);

		$sqlQuery->setNumber($masterJurusan->idJurusan);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_jurusan';
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
		$sql = 'SELECT * FROM master_jurusan WHERE ';
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

	public function queryByIdJurusan($value, $single = false){
		$sql = 'SELECT * FROM master_jurusan WHERE id_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaJurusan($value, $single = false){
		$sql = 'SELECT * FROM master_jurusan WHERE nama_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeJurusan($value, $single = false){
		$sql = 'SELECT * FROM master_jurusan WHERE kode_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM master_jurusan WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeletable($value, $single = false){
		$sql = 'SELECT * FROM master_jurusan WHERE deletable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJurusan($value){
		$sql = 'DELETE FROM master_jurusan WHERE id_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaJurusan($value){
		$sql = 'DELETE FROM master_jurusan WHERE nama_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeJurusan($value){
		$sql = 'DELETE FROM master_jurusan WHERE kode_jurusan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM master_jurusan WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletable($value){
		$sql = 'DELETE FROM master_jurusan WHERE deletable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_jurusan';
		
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
	 * @return MasterJurusanDTO
	 */
	protected function readRow($row){
		$masterJurusan = new MasterJurusanDTO();
		
		$masterJurusan->idJurusan = isset($row['id_jurusan']) ? $row['id_jurusan'] : null;
		$masterJurusan->namaJurusan = isset($row['nama_jurusan']) ? $row['nama_jurusan'] : null;
		$masterJurusan->kodeJurusan = isset($row['kode_jurusan']) ? $row['kode_jurusan'] : null;
		$masterJurusan->status = isset($row['status']) ? $row['status'] : null;
		$masterJurusan->deletable = isset($row['deletable']) ? $row['deletable'] : null;

		return $masterJurusan;
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
	 * @return MasterJurusanDTO
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