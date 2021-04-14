<?php
/**
 * Class that operate on table 'rapor_data_catatan'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporDataCatatanMySqlDAO implements RaporDataCatatanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporDataCatatanDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_data_catatan';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_data_catatan ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporDataCatatan primary key
 	 */
	public function delete($id_catatan){
		$sql = 'DELETE FROM rapor_data_catatan WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_catatan);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataCatatanDTO raporDataCatatan
 	 */
	public function insert($raporDataCatatan){
		$sql = 'INSERT INTO rapor_data_catatan (id_kelas, jenis, kode, deskripsi, rank) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataCatatan->idKelas);
		$sqlQuery->setNumber($raporDataCatatan->jenis);
		$sqlQuery->setNumber($raporDataCatatan->kode);
		$sqlQuery->set($raporDataCatatan->deskripsi);
		$sqlQuery->set($raporDataCatatan->rank);

		$id = $this->executeInsert($sqlQuery);	
		$raporDataCatatan->idCatatan = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataCatatanDTO raporDataCatatan
 	 */
	public function update($raporDataCatatan){
		$sql = 'UPDATE rapor_data_catatan SET id_kelas = ?, jenis = ?, kode = ?, deskripsi = ?, rank = ? WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporDataCatatan->idKelas);
		$sqlQuery->setNumber($raporDataCatatan->jenis);
		$sqlQuery->setNumber($raporDataCatatan->kode);
		$sqlQuery->set($raporDataCatatan->deskripsi);
		$sqlQuery->set($raporDataCatatan->rank);

		$sqlQuery->setNumber($raporDataCatatan->idCatatan);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_data_catatan';
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
		$sql = 'SELECT * FROM rapor_data_catatan WHERE ';
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

	public function queryByIdCatatan($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenis($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKode($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRank($value, $single = false){
		$sql = 'SELECT * FROM rapor_data_catatan WHERE rank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCatatan($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenis($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKode($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRank($value){
		$sql = 'DELETE FROM rapor_data_catatan WHERE rank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_data_catatan';
		
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
	 * @return RaporDataCatatanDTO
	 */
	protected function readRow($row){
		$raporDataCatatan = new RaporDataCatatanDTO();
		
		$raporDataCatatan->idCatatan = isset($row['id_catatan']) ? $row['id_catatan'] : null;
		$raporDataCatatan->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporDataCatatan->jenis = isset($row['jenis']) ? $row['jenis'] : null;
		$raporDataCatatan->kode = isset($row['kode']) ? $row['kode'] : null;
		$raporDataCatatan->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;
		$raporDataCatatan->rank = isset($row['rank']) ? $row['rank'] : null;

		return $raporDataCatatan;
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
	 * @return RaporDataCatatanDTO
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