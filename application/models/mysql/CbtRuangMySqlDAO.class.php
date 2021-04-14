<?php
/**
 * Class that operate on table 'cbt_ruang'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtRuangMySqlDAO implements CbtRuangDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtRuangDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_ruang';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_ruang ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtRuang primary key
 	 */
	public function delete($id_ruang){
		$sql = 'DELETE FROM cbt_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_ruang);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRuangDTO cbtRuang
 	 */
	public function insert($cbtRuang){
		$sql = 'INSERT INTO cbt_ruang (nama_ruang, kode_ruang) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtRuang->namaRuang);
		$sqlQuery->set($cbtRuang->kodeRuang);

		$id = $this->executeInsert($sqlQuery);	
		$cbtRuang->idRuang = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRuangDTO cbtRuang
 	 */
	public function update($cbtRuang){
		$sql = 'UPDATE cbt_ruang SET nama_ruang = ?, kode_ruang = ? WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtRuang->namaRuang);
		$sqlQuery->set($cbtRuang->kodeRuang);

		$sqlQuery->setNumber($cbtRuang->idRuang);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_ruang';
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
		$sql = 'SELECT * FROM cbt_ruang WHERE ';
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

	public function queryByIdRuang($value, $single = false){
		$sql = 'SELECT * FROM cbt_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaRuang($value, $single = false){
		$sql = 'SELECT * FROM cbt_ruang WHERE nama_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeRuang($value, $single = false){
		$sql = 'SELECT * FROM cbt_ruang WHERE kode_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRuang($value){
		$sql = 'DELETE FROM cbt_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaRuang($value){
		$sql = 'DELETE FROM cbt_ruang WHERE nama_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeRuang($value){
		$sql = 'DELETE FROM cbt_ruang WHERE kode_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_ruang';
		
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
	 * @return CbtRuangDTO
	 */
	protected function readRow($row){
		$cbtRuang = new CbtRuangDTO();
		
		$cbtRuang->idRuang = isset($row['id_ruang']) ? $row['id_ruang'] : null;
		$cbtRuang->namaRuang = isset($row['nama_ruang']) ? $row['nama_ruang'] : null;
		$cbtRuang->kodeRuang = isset($row['kode_ruang']) ? $row['kode_ruang'] : null;

		return $cbtRuang;
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
	 * @return CbtRuangDTO
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