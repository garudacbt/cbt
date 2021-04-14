<?php
/**
 * Class that operate on table 'cbt_jenis'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtJenisMySqlDAO implements CbtJenisDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtJenisDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_jenis WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_jenis';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_jenis ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtJeni primary key
 	 */
	public function delete($id_jenis){
		$sql = 'DELETE FROM cbt_jenis WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_jenis);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJenisDTO cbtJeni
 	 */
	public function insert($cbtJeni){
		$sql = 'INSERT INTO cbt_jenis (nama_jenis, kode_jenis) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtJeni->namaJenis);
		$sqlQuery->set($cbtJeni->kodeJenis);

		$id = $this->executeInsert($sqlQuery);	
		$cbtJeni->idJenis = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJenisDTO cbtJeni
 	 */
	public function update($cbtJeni){
		$sql = 'UPDATE cbt_jenis SET nama_jenis = ?, kode_jenis = ? WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtJeni->namaJenis);
		$sqlQuery->set($cbtJeni->kodeJenis);

		$sqlQuery->setNumber($cbtJeni->idJenis);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_jenis';
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
		$sql = 'SELECT * FROM cbt_jenis WHERE ';
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

	public function queryByIdJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_jenis WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_jenis WHERE nama_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_jenis WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJenis($value){
		$sql = 'DELETE FROM cbt_jenis WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaJenis($value){
		$sql = 'DELETE FROM cbt_jenis WHERE nama_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeJenis($value){
		$sql = 'DELETE FROM cbt_jenis WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_jenis';
		
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
	 * @return CbtJenisDTO
	 */
	protected function readRow($row){
		$cbtJeni = new CbtJenisDTO();
		
		$cbtJeni->idJenis = isset($row['id_jenis']) ? $row['id_jenis'] : null;
		$cbtJeni->namaJenis = isset($row['nama_jenis']) ? $row['nama_jenis'] : null;
		$cbtJeni->kodeJenis = isset($row['kode_jenis']) ? $row['kode_jenis'] : null;

		return $cbtJeni;
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
	 * @return CbtJenisDTO
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