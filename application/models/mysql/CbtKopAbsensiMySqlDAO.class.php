<?php
/**
 * Class that operate on table 'cbt_kop_absensi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtKopAbsensiMySqlDAO implements CbtKopAbsensiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtKopAbsensiDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_kop_absensi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_kop_absensi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtKopAbsensi primary key
 	 */
	public function delete($id_kop){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kop);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopAbsensiDTO cbtKopAbsensi
 	 */
	public function insert($cbtKopAbsensi){
		$sql = 'INSERT INTO cbt_kop_absensi (header_1, header_2, header_3, header_4, proktor, pengawas_1, pengawas_2) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopAbsensi->header1);
		$sqlQuery->set($cbtKopAbsensi->header2);
		$sqlQuery->set($cbtKopAbsensi->header3);
		$sqlQuery->set($cbtKopAbsensi->header4);
		$sqlQuery->set($cbtKopAbsensi->proktor);
		$sqlQuery->set($cbtKopAbsensi->pengawas1);
		$sqlQuery->set($cbtKopAbsensi->pengawas2);

		$id = $this->executeInsert($sqlQuery);	
		$cbtKopAbsensi->idKop = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopAbsensiDTO cbtKopAbsensi
 	 */
	public function update($cbtKopAbsensi){
		$sql = 'UPDATE cbt_kop_absensi SET header_1 = ?, header_2 = ?, header_3 = ?, header_4 = ?, proktor = ?, pengawas_1 = ?, pengawas_2 = ? WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtKopAbsensi->header1);
		$sqlQuery->set($cbtKopAbsensi->header2);
		$sqlQuery->set($cbtKopAbsensi->header3);
		$sqlQuery->set($cbtKopAbsensi->header4);
		$sqlQuery->set($cbtKopAbsensi->proktor);
		$sqlQuery->set($cbtKopAbsensi->pengawas1);
		$sqlQuery->set($cbtKopAbsensi->pengawas2);

		$sqlQuery->setNumber($cbtKopAbsensi->idKop);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_kop_absensi';
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
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE ';
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
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByHeader1($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader2($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader3($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByHeader4($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByProktor($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE proktor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPengawas1($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE pengawas_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPengawas2($value, $single = false){
		$sql = 'SELECT * FROM cbt_kop_absensi WHERE pengawas_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKop($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE id_kop = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader1($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE header_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader2($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE header_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader3($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE header_3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHeader4($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE header_4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProktor($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE proktor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPengawas1($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE pengawas_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPengawas2($value){
		$sql = 'DELETE FROM cbt_kop_absensi WHERE pengawas_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_kop_absensi';
		
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
	 * @return CbtKopAbsensiDTO
	 */
	protected function readRow($row){
		$cbtKopAbsensi = new CbtKopAbsensiDTO();
		
		$cbtKopAbsensi->idKop = isset($row['id_kop']) ? $row['id_kop'] : null;
		$cbtKopAbsensi->header1 = isset($row['header_1']) ? $row['header_1'] : null;
		$cbtKopAbsensi->header2 = isset($row['header_2']) ? $row['header_2'] : null;
		$cbtKopAbsensi->header3 = isset($row['header_3']) ? $row['header_3'] : null;
		$cbtKopAbsensi->header4 = isset($row['header_4']) ? $row['header_4'] : null;
		$cbtKopAbsensi->proktor = isset($row['proktor']) ? $row['proktor'] : null;
		$cbtKopAbsensi->pengawas1 = isset($row['pengawas_1']) ? $row['pengawas_1'] : null;
		$cbtKopAbsensi->pengawas2 = isset($row['pengawas_2']) ? $row['pengawas_2'] : null;

		return $cbtKopAbsensi;
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
	 * @return CbtKopAbsensiDTO
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