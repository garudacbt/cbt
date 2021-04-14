<?php
/**
 * Class that operate on table 'rapor_data_fisik'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporDataFisikMySqlDAO implements RaporDataFisikDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporDataFisikDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_data_fisik';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_data_fisik ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporDataFisik primary key
 	 */
	public function delete($id_fisik){
		$sql = 'DELETE FROM rapor_data_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_fisik);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataFisikDTO raporDataFisik
 	 */
	public function insert($raporDataFisik){
		$sql = 'INSERT INTO rapor_data_fisik (id_kelas, jenis, kode, deskripsi) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataFisik->idKelas);
		$sqlQuery->setNumber($raporDataFisik->jenis);
		$sqlQuery->setNumber($raporDataFisik->kode);
		$sqlQuery->set($raporDataFisik->deskripsi);

		$id = $this->executeInsert($sqlQuery);	
		$raporDataFisik->idFisik = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataFisikDTO raporDataFisik
 	 */
	public function update($raporDataFisik){
		$sql = 'UPDATE rapor_data_fisik SET id_kelas = ?, jenis = ?, kode = ?, deskripsi = ? WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataFisik->idKelas);
		$sqlQuery->setNumber($raporDataFisik->jenis);
		$sqlQuery->setNumber($raporDataFisik->kode);
		$sqlQuery->set($raporDataFisik->deskripsi);

		$sqlQuery->setNumber($raporDataFisik->idFisik);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_data_fisik';
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
		$sql = 'SELECT * FROM rapor_data_fisik WHERE ';
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

	public function queryByIdFisik($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenis($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKode($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_fisik WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdFisik($value){
		$sql = 'DELETE FROM rapor_data_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_data_fisik WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenis($value){
		$sql = 'DELETE FROM rapor_data_fisik WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKode($value){
		$sql = 'DELETE FROM rapor_data_fisik WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_data_fisik WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_data_fisik';
		
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
	 * @return RaporDataFisikDTO
	 */
	protected function readRow($row){
		$raporDataFisik = new RaporDataFisikDTO();
		
		$raporDataFisik->idFisik = isset($row['id_fisik']) ? $row['id_fisik'] : null;
		$raporDataFisik->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporDataFisik->jenis = isset($row['jenis']) ? $row['jenis'] : null;
		$raporDataFisik->kode = isset($row['kode']) ? $row['kode'] : null;
		$raporDataFisik->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;

		return $raporDataFisik;
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
	 * @return RaporDataFisikDTO
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