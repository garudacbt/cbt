<?php
/**
 * Class that operate on table 'cbt_kop_kartu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtKopKartuMySqlDAO implements CbtKopKartuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtKopKartuDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_kop_kartu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_kop_kartu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtKopKartu primary key
 	 */
	public function delete($id_set_kartu){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_set_kartu);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopKartuDTO cbtKopKartu
 	 */
	public function insert($cbtKopKartu){
		$sql = 'INSERT INTO cbt_kop_kartu (header_1, header_2, header_3, header_4, tanggal) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopKartu->header1);
		$sqlQuery->set($cbtKopKartu->header2);
		$sqlQuery->set($cbtKopKartu->header3);
		$sqlQuery->set($cbtKopKartu->header4);
		$sqlQuery->set($cbtKopKartu->tanggal);

		$id = $this->executeInsert($sqlQuery);	
		$cbtKopKartu->idSetKartu = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopKartuDTO cbtKopKartu
 	 */
	public function update($cbtKopKartu){
		$sql = 'UPDATE cbt_kop_kartu SET header_1 = ?, header_2 = ?, header_3 = ?, header_4 = ?, tanggal = ? WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopKartu->header1);
		$sqlQuery->set($cbtKopKartu->header2);
		$sqlQuery->set($cbtKopKartu->header3);
		$sqlQuery->set($cbtKopKartu->header4);
		$sqlQuery->set($cbtKopKartu->tanggal);

		$sqlQuery->setNumber($cbtKopKartu->idSetKartu);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_kop_kartu';
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
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE ';
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

	public function queryByIdSetKartu($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByHeader1($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader2($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader3($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader4($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTanggal($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_kartu WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSetKartu($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader1($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader2($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader3($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader4($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTanggal($value){
		$sql = 'DELETE FROM cbt_kop_kartu WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_kop_kartu';
		
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
	 * @return CbtKopKartuDTO
	 */
	protected function readRow($row){
		$cbtKopKartu = new CbtKopKartuDTO();
		
		$cbtKopKartu->idSetKartu = isset($row['id_set_kartu']) ? $row['id_set_kartu'] : null;
		$cbtKopKartu->header1 = isset($row['header_1']) ? $row['header_1'] : null;
		$cbtKopKartu->header2 = isset($row['header_2']) ? $row['header_2'] : null;
		$cbtKopKartu->header3 = isset($row['header_3']) ? $row['header_3'] : null;
		$cbtKopKartu->header4 = isset($row['header_4']) ? $row['header_4'] : null;
		$cbtKopKartu->tanggal = isset($row['tanggal']) ? $row['tanggal'] : null;

		return $cbtKopKartu;
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
	 * @return CbtKopKartuDTO
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