<?php
/**
 * Class that operate on table 'kelas_ekstra'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasEkstraMySqlDAO implements KelasEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasEkstraDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_ekstra WHERE id_kelas_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_ekstra';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_ekstra ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasEkstra primary key
 	 */
	public function delete($id_kelas_ekstra){
		$sql = 'DELETE FROM kelas_ekstra WHERE id_kelas_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_kelas_ekstra);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasEkstraDTO kelasEkstra
 	 */
	public function insert($kelasEkstra){
		$sql = 'INSERT INTO kelas_ekstra (id_tp, id_smt, id_kelas, ekstra) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasEkstra->idTp);
		$sqlQuery->setNumber($kelasEkstra->idSmt);
		$sqlQuery->setNumber($kelasEkstra->idKelas);
		$sqlQuery->set($kelasEkstra->ekstra);

		$id = $this->executeInsert($sqlQuery);	
		$kelasEkstra->idKelasEkstra = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasEkstraDTO kelasEkstra
 	 */
	public function update($kelasEkstra){
		$sql = 'UPDATE kelas_ekstra SET id_tp = ?, id_smt = ?, id_kelas = ?, ekstra = ? WHERE id_kelas_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasEkstra->idTp);
		$sqlQuery->setNumber($kelasEkstra->idSmt);
		$sqlQuery->setNumber($kelasEkstra->idKelas);
		$sqlQuery->set($kelasEkstra->ekstra);

		$sqlQuery->set($kelasEkstra->idKelasEkstra);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_ekstra';
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
		$sql = 'SELECT * FROM kelas_ekstra WHERE ';
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

	public function queryByIdKelasEkstra($value, $single = false){
		$sql = 'SELECT * FROM kelas_ekstra WHERE id_kelas_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_ekstra WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_ekstra WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_ekstra WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEkstra($value, $single = false){
		$sql = 'SELECT * FROM kelas_ekstra WHERE ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKelasEkstra($value){
		$sql = 'DELETE FROM kelas_ekstra WHERE id_kelas_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_ekstra WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_ekstra WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_ekstra WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEkstra($value){
		$sql = 'DELETE FROM kelas_ekstra WHERE ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_ekstra';
		
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
	 * @return KelasEkstraDTO
	 */
	protected function readRow($row){
		$kelasEkstra = new KelasEkstraDTO();
		
		$kelasEkstra->idKelasEkstra = isset($row['id_kelas_ekstra']) ? $row['id_kelas_ekstra'] : null;
		$kelasEkstra->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasEkstra->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasEkstra->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasEkstra->ekstra = isset($row['ekstra']) ? $row['ekstra'] : null;

		return $kelasEkstra;
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
	 * @return KelasEkstraDTO
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