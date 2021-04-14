<?php
/**
 * Class that operate on table 'cbt_nilai'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtNilaiMySqlDAO implements CbtNilaiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtNilaiDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_nilai WHERE id_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_nilai';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_nilai ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtNilai primary key
 	 */
	public function delete($id_nilai){
		$sql = 'DELETE FROM cbt_nilai WHERE id_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_nilai);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtNilaiDTO cbtNilai
 	 */
	public function insert($cbtNilai){
		$sql = 'INSERT INTO cbt_nilai (pg_benar, pg_nilai, essai_nilai) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtNilai->pgBenar);
		$sqlQuery->setNumber($cbtNilai->pgNilai);
		$sqlQuery->setNumber($cbtNilai->essaiNilai);

		$id = $this->executeInsert($sqlQuery);	
		$cbtNilai->idNilai = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtNilaiDTO cbtNilai
 	 */
	public function update($cbtNilai){
		$sql = 'UPDATE cbt_nilai SET pg_benar = ?, pg_nilai = ?, essai_nilai = ? WHERE id_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtNilai->pgBenar);
		$sqlQuery->setNumber($cbtNilai->pgNilai);
		$sqlQuery->setNumber($cbtNilai->essaiNilai);

		$sqlQuery->set($cbtNilai->idNilai);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_nilai';
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
		$sql = 'SELECT * FROM cbt_nilai WHERE ';
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

	public function queryByIdNilai($value, $single = false){
		$sql = 'SELECT * FROM cbt_nilai WHERE id_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByPgBenar($value, $single = false){
		$sql = 'SELECT * FROM cbt_nilai WHERE pg_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPgNilai($value, $single = false){
		$sql = 'SELECT * FROM cbt_nilai WHERE pg_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEssaiNilai($value, $single = false){
		$sql = 'SELECT * FROM cbt_nilai WHERE essai_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNilai($value){
		$sql = 'DELETE FROM cbt_nilai WHERE id_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPgBenar($value){
		$sql = 'DELETE FROM cbt_nilai WHERE pg_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPgNilai($value){
		$sql = 'DELETE FROM cbt_nilai WHERE pg_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEssaiNilai($value){
		$sql = 'DELETE FROM cbt_nilai WHERE essai_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_nilai';
		
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
	 * @return CbtNilaiDTO
	 */
	protected function readRow($row){
		$cbtNilai = new CbtNilaiDTO();
		
		$cbtNilai->idNilai = isset($row['id_nilai']) ? $row['id_nilai'] : null;
		$cbtNilai->pgBenar = isset($row['pg_benar']) ? $row['pg_benar'] : null;
		$cbtNilai->pgNilai = isset($row['pg_nilai']) ? $row['pg_nilai'] : null;
		$cbtNilai->essaiNilai = isset($row['essai_nilai']) ? $row['essai_nilai'] : null;

		return $cbtNilai;
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
	 * @return CbtNilaiDTO
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