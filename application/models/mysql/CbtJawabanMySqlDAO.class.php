<?php
/**
 * Class that operate on table 'cbt_jawaban'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtJawabanMySqlDAO implements CbtJawabanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtJawabanDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_jawaban WHERE id_jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_jawaban';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_jawaban ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtJawaban primary key
 	 */
	public function delete($id_jawaban){
		$sql = 'DELETE FROM cbt_jawaban WHERE id_jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_jawaban);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJawabanDTO cbtJawaban
 	 */
	public function insert($cbtJawaban){
		$sql = 'INSERT INTO cbt_jawaban (jawaban, jawaban_benar, koreksi) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtJawaban->jawaban);
		$sqlQuery->set($cbtJawaban->jawabanBenar);
		$sqlQuery->setNumber($cbtJawaban->koreksi);

		$id = $this->executeInsert($sqlQuery);	
		$cbtJawaban->idJawaban = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJawabanDTO cbtJawaban
 	 */
	public function update($cbtJawaban){
		$sql = 'UPDATE cbt_jawaban SET jawaban = ?, jawaban_benar = ?, koreksi = ? WHERE id_jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtJawaban->jawaban);
		$sqlQuery->set($cbtJawaban->jawabanBenar);
		$sqlQuery->setNumber($cbtJawaban->koreksi);

		$sqlQuery->set($cbtJawaban->idJawaban);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_jawaban';
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
		$sql = 'SELECT * FROM cbt_jawaban WHERE ';
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

	public function queryByIdJawaban($value, $single = false){
		$sql = 'SELECT * FROM cbt_jawaban WHERE id_jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByJawaban($value, $single = false){
		$sql = 'SELECT * FROM cbt_jawaban WHERE jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanBenar($value, $single = false){
		$sql = 'SELECT * FROM cbt_jawaban WHERE jawaban_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKoreksi($value, $single = false){
		$sql = 'SELECT * FROM cbt_jawaban WHERE koreksi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJawaban($value){
		$sql = 'DELETE FROM cbt_jawaban WHERE id_jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawaban($value){
		$sql = 'DELETE FROM cbt_jawaban WHERE jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanBenar($value){
		$sql = 'DELETE FROM cbt_jawaban WHERE jawaban_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKoreksi($value){
		$sql = 'DELETE FROM cbt_jawaban WHERE koreksi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_jawaban';
		
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
	 * @return CbtJawabanDTO
	 */
	protected function readRow($row){
		$cbtJawaban = new CbtJawabanDTO();
		
		$cbtJawaban->idJawaban = isset($row['id_jawaban']) ? $row['id_jawaban'] : null;
		$cbtJawaban->jawaban = isset($row['jawaban']) ? $row['jawaban'] : null;
		$cbtJawaban->jawabanBenar = isset($row['jawaban_benar']) ? $row['jawaban_benar'] : null;
		$cbtJawaban->koreksi = isset($row['koreksi']) ? $row['koreksi'] : null;

		return $cbtJawaban;
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
	 * @return CbtJawabanDTO
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