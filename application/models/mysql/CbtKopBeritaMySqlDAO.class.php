<?php
/**
 * Class that operate on table 'cbt_kop_berita'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtKopBeritaMySqlDAO implements CbtKopBeritaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtKopBeritaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_kop_berita';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_kop_berita ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtKopBerita primary key
 	 */
	public function delete($id_kop){
		$sql = 'DELETE FROM cbt_kop_berita WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kop);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopBeritaDTO cbtKopBerita
 	 */
	public function insert($cbtKopBerita){
		$sql = 'INSERT INTO cbt_kop_berita (header_1, header_2, header_3, header_4) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopBerita->header1);
		$sqlQuery->set($cbtKopBerita->header2);
		$sqlQuery->set($cbtKopBerita->header3);
		$sqlQuery->set($cbtKopBerita->header4);

		$id = $this->executeInsert($sqlQuery);	
		$cbtKopBerita->idKop = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopBeritaDTO cbtKopBerita
 	 */
	public function update($cbtKopBerita){
		$sql = 'UPDATE cbt_kop_berita SET header_1 = ?, header_2 = ?, header_3 = ?, header_4 = ? WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopBerita->header1);
		$sqlQuery->set($cbtKopBerita->header2);
		$sqlQuery->set($cbtKopBerita->header3);
		$sqlQuery->set($cbtKopBerita->header4);

		$sqlQuery->setNumber($cbtKopBerita->idKop);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_kop_berita';
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
		$sql = 'SELECT * FROM cbt_kop_berita WHERE ';
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

	public function queryByIdKop($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByHeader1($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader2($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader3($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader4($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_berita WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKop($value){
		$sql = 'DELETE FROM cbt_kop_berita WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader1($value){
		$sql = 'DELETE FROM cbt_kop_berita WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader2($value){
		$sql = 'DELETE FROM cbt_kop_berita WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader3($value){
		$sql = 'DELETE FROM cbt_kop_berita WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader4($value){
		$sql = 'DELETE FROM cbt_kop_berita WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_kop_berita';
		
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
	 * @return CbtKopBeritaDTO
	 */
	protected function readRow($row){
		$cbtKopBerita = new CbtKopBeritaDTO();
		
		$cbtKopBerita->idKop = isset($row['id_kop']) ? $row['id_kop'] : null;
		$cbtKopBerita->header1 = isset($row['header_1']) ? $row['header_1'] : null;
		$cbtKopBerita->header2 = isset($row['header_2']) ? $row['header_2'] : null;
		$cbtKopBerita->header3 = isset($row['header_3']) ? $row['header_3'] : null;
		$cbtKopBerita->header4 = isset($row['header_4']) ? $row['header_4'] : null;

		return $cbtKopBerita;
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
	 * @return CbtKopBeritaDTO
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