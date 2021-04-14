<?php
/**
 * Class that operate on table 'rapor_data_sikap'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporDataSikapMySqlDAO implements RaporDataSikapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporDataSikapDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE id_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_data_sikap';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_data_sikap ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporDataSikap primary key
 	 */
	public function delete($id_sikap){
		$sql = 'DELETE FROM rapor_data_sikap WHERE id_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_sikap);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataSikapDTO raporDataSikap
 	 */
	public function insert($raporDataSikap){
		$sql = 'INSERT INTO rapor_data_sikap (id_kelas, jenis, kode, sikap) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataSikap->idKelas);
		$sqlQuery->setNumber($raporDataSikap->jenis);
		$sqlQuery->setNumber($raporDataSikap->kode);
		$sqlQuery->set($raporDataSikap->sikap);

		$id = $this->executeInsert($sqlQuery);	
		$raporDataSikap->idSikap = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataSikapDTO raporDataSikap
 	 */
	public function update($raporDataSikap){
		$sql = 'UPDATE rapor_data_sikap SET id_kelas = ?, jenis = ?, kode = ?, sikap = ? WHERE id_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataSikap->idKelas);
		$sqlQuery->setNumber($raporDataSikap->jenis);
		$sqlQuery->setNumber($raporDataSikap->kode);
		$sqlQuery->set($raporDataSikap->sikap);

		$sqlQuery->setNumber($raporDataSikap->idSikap);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_data_sikap';
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
		$sql = 'SELECT * FROM rapor_data_sikap WHERE ';
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

	public function queryByIdSikap($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE id_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenis($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKode($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySikap($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_sikap WHERE sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSikap($value){
		$sql = 'DELETE FROM rapor_data_sikap WHERE id_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_data_sikap WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenis($value){
		$sql = 'DELETE FROM rapor_data_sikap WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKode($value){
		$sql = 'DELETE FROM rapor_data_sikap WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySikap($value){
		$sql = 'DELETE FROM rapor_data_sikap WHERE sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_data_sikap';
		
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
	 * @return RaporDataSikapDTO
	 */
	protected function readRow($row){
		$raporDataSikap = new RaporDataSikapDTO();
		
		$raporDataSikap->idSikap = isset($row['id_sikap']) ? $row['id_sikap'] : null;
		$raporDataSikap->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporDataSikap->jenis = isset($row['jenis']) ? $row['jenis'] : null;
		$raporDataSikap->kode = isset($row['kode']) ? $row['kode'] : null;
		$raporDataSikap->sikap = isset($row['sikap']) ? $row['sikap'] : null;

		return $raporDataSikap;
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
	 * @return RaporDataSikapDTO
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