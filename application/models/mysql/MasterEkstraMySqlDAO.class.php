<?php
/**
 * Class that operate on table 'master_ekstra'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterEkstraMySqlDAO implements MasterEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterEkstraDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_ekstra';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_ekstra ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterEkstra primary key
 	 */
	public function delete($id_ekstra){
		$sql = 'DELETE FROM master_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_ekstra);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterEkstraDTO masterEkstra
 	 */
	public function insert($masterEkstra){
		$sql = 'INSERT INTO master_ekstra (nama_ekstra, kode_ekstra) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterEkstra->namaEkstra);
		$sqlQuery->set($masterEkstra->kodeEkstra);

		$id = $this->executeInsert($sqlQuery);	
		$masterEkstra->idEkstra = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterEkstraDTO masterEkstra
 	 */
	public function update($masterEkstra){
		$sql = 'UPDATE master_ekstra SET nama_ekstra = ?, kode_ekstra = ? WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterEkstra->namaEkstra);
		$sqlQuery->set($masterEkstra->kodeEkstra);

		$sqlQuery->setNumber($masterEkstra->idEkstra);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_ekstra';
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
		$sql = 'SELECT * FROM master_ekstra WHERE ';
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

	public function queryByIdEkstra($value, $single = false){
		$sql = 'SELECT * FROM master_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaEkstra($value, $single = false){
		$sql = 'SELECT * FROM master_ekstra WHERE nama_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeEkstra($value, $single = false){
		$sql = 'SELECT * FROM master_ekstra WHERE kode_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdEkstra($value){
		$sql = 'DELETE FROM master_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaEkstra($value){
		$sql = 'DELETE FROM master_ekstra WHERE nama_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeEkstra($value){
		$sql = 'DELETE FROM master_ekstra WHERE kode_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_ekstra';
		
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
	 * @return MasterEkstraDTO
	 */
	protected function readRow($row){
		$masterEkstra = new MasterEkstraDTO();
		
		$masterEkstra->idEkstra = isset($row['id_ekstra']) ? $row['id_ekstra'] : null;
		$masterEkstra->namaEkstra = isset($row['nama_ekstra']) ? $row['nama_ekstra'] : null;
		$masterEkstra->kodeEkstra = isset($row['kode_ekstra']) ? $row['kode_ekstra'] : null;

		return $masterEkstra;
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
	 * @return MasterEkstraDTO
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