<?php
/**
 * Class that operate on table 'master_tp'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterTpMySqlDAO implements MasterTpDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterTpDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_tp WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_tp';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_tp ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterTp primary key
 	 */
	public function delete($id_tp){
		$sql = 'DELETE FROM master_tp WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_tp);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterTpDTO masterTp
 	 */
	public function insert($masterTp){
		$sql = 'INSERT INTO master_tp (tahun, active) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterTp->tahun);
		$sqlQuery->setNumber($masterTp->active);

		$id = $this->executeInsert($sqlQuery);	
		$masterTp->idTp = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterTpDTO masterTp
 	 */
	public function update($masterTp){
		$sql = 'UPDATE master_tp SET tahun = ?, active = ? WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterTp->tahun);
		$sqlQuery->setNumber($masterTp->active);

		$sqlQuery->setNumber($masterTp->idTp);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_tp';
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
		$sql = 'SELECT * FROM master_tp WHERE ';
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

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM master_tp WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByTahun($value, $single = false){
		$sql = 'SELECT * FROM master_tp WHERE tahun = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByActive($value, $single = false){
		$sql = 'SELECT * FROM master_tp WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdTp($value){
		$sql = 'DELETE FROM master_tp WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTahun($value){
		$sql = 'DELETE FROM master_tp WHERE tahun = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActive($value){
		$sql = 'DELETE FROM master_tp WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_tp';
		
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
	 * @return MasterTpDTO
	 */
	protected function readRow($row){
		$masterTp = new MasterTpDTO();
		
		$masterTp->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$masterTp->tahun = isset($row['tahun']) ? $row['tahun'] : null;
		$masterTp->active = isset($row['active']) ? $row['active'] : null;

		return $masterTp;
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
	 * @return MasterTpDTO
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