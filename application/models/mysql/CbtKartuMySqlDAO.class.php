<?php
/**
 * Class that operate on table 'cbt_kartu'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:49
 */
class CbtKartuMySqlDAO implements CbtKartuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtKartu
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_kartu';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_kartu ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtKartu primary key
 	 */
	public function delete($id_set_kartu){
		$sql = 'DELETE FROM cbt_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_set_kartu);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKartu cbtKartu
 	 */
	public function insert($cbtKartu){
		$sql = 'INSERT INTO cbt_kartu (header_1, header_2, header_3, header_4, tanggal) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKartu->header1);
		$sqlQuery->set($cbtKartu->header2);
		$sqlQuery->set($cbtKartu->header3);
		$sqlQuery->set($cbtKartu->header4);
		$sqlQuery->set($cbtKartu->tanggal);

		$id = $this->executeInsert($sqlQuery);	
		$cbtKartu->idSetKartu = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKartu cbtKartu
 	 */
	public function update($cbtKartu){
		$sql = 'UPDATE cbt_kartu SET header_1 = ?, header_2 = ?, header_3 = ?, header_4 = ?, tanggal = ? WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKartu->header1);
		$sqlQuery->set($cbtKartu->header2);
		$sqlQuery->set($cbtKartu->header3);
		$sqlQuery->set($cbtKartu->header4);
		$sqlQuery->set($cbtKartu->tanggal);

		$sqlQuery->setNumber($cbtKartu->idSetKartu);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_kartu';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdSetKartu($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByHeader1($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader2($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader3($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader4($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTanggal($value, $single = false){
		$sql = 'SELECT * FROM cbt_kartu WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSetKartu($value){
		$sql = 'DELETE FROM cbt_kartu WHERE id_set_kartu = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader1($value){
		$sql = 'DELETE FROM cbt_kartu WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader2($value){
		$sql = 'DELETE FROM cbt_kartu WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader3($value){
		$sql = 'DELETE FROM cbt_kartu WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader4($value){
		$sql = 'DELETE FROM cbt_kartu WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTanggal($value){
		$sql = 'DELETE FROM cbt_kartu WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_kartu';
		
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
	 * @return CbtKartu
	 */
	protected function readRow($row){
		$cbtKartu = new CbtKartu();
		
		$cbtKartu->idSetKartu = $row['id_set_kartu'];
		$cbtKartu->header1 = $row['header_1'];
		$cbtKartu->header2 = $row['header_2'];
		$cbtKartu->header3 = $row['header_3'];
		$cbtKartu->header4 = $row['header_4'];
		$cbtKartu->tanggal = $row['tanggal'];

		return $cbtKartu;
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
	 * @return CbtKartu
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