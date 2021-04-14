<?php
/**
 * Class that operate on table 'master_hari_efektif'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterHariEfektifMySqlDAO implements MasterHariEfektifDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterHariEfektifDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_hari_efektif WHERE id_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_hari_efektif';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_hari_efektif ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterHariEfektif primary key
 	 */
	public function delete($id_hari_efektif){
		$sql = 'DELETE FROM master_hari_efektif WHERE id_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_hari_efektif);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterHariEfektifDTO masterHariEfektif
 	 */
	public function insert($masterHariEfektif){
		$sql = 'INSERT INTO master_hari_efektif (jml_hari_efektif) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterHariEfektif->jmlHariEfektif);

		$id = $this->executeInsert($sqlQuery);	
		$masterHariEfektif->idHariEfektif = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterHariEfektifDTO masterHariEfektif
 	 */
	public function update($masterHariEfektif){
		$sql = 'UPDATE master_hari_efektif SET jml_hari_efektif = ? WHERE id_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterHariEfektif->jmlHariEfektif);

		$sqlQuery->setNumber($masterHariEfektif->idHariEfektif);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_hari_efektif';
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
		$sql = 'SELECT * FROM master_hari_efektif WHERE ';
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

	public function queryByIdHariEfektif($value, $single = false){
		$sql = 'SELECT * FROM master_hari_efektif WHERE id_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByJmlHariEfektif($value, $single = false){
		$sql = 'SELECT * FROM master_hari_efektif WHERE jml_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdHariEfektif($value){
		$sql = 'DELETE FROM master_hari_efektif WHERE id_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJmlHariEfektif($value){
		$sql = 'DELETE FROM master_hari_efektif WHERE jml_hari_efektif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_hari_efektif';
		
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
	 * @return MasterHariEfektifDTO
	 */
	protected function readRow($row){
		$masterHariEfektif = new MasterHariEfektifDTO();
		
		$masterHariEfektif->idHariEfektif = isset($row['id_hari_efektif']) ? $row['id_hari_efektif'] : null;
		$masterHariEfektif->jmlHariEfektif = isset($row['jml_hari_efektif']) ? $row['jml_hari_efektif'] : null;

		return $masterHariEfektif;
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
	 * @return MasterHariEfektifDTO
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