<?php
/**
 * Class that operate on table 'rapor_catatan_wali'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class RaporCatatanWaliMySqlDAO implements RaporCatatanWaliDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporCatatanWaliDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_catatan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_catatan_wali';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_catatan_wali ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporCatatanWali primary key
 	 */
	public function delete($id_catatan_wali){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_catatan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_catatan_wali);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporCatatanWaliDTO raporCatatanWali
 	 */
	public function insert($raporCatatanWali){
		$sql = 'INSERT INTO rapor_catatan_wali (id_tp, id_smt, id_kelas, id_siswa, nilai, deskripsi) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporCatatanWali->id_tp);
		$sqlQuery->setNumber($raporCatatanWali->id_smt);
		$sqlQuery->setNumber($raporCatatanWali->id_kelas);
		$sqlQuery->setNumber($raporCatatanWali->id_siswa);
		$sqlQuery->set($raporCatatanWali->nilai);
		$sqlQuery->set($raporCatatanWali->deskripsi);

		$id = $this->executeInsert($sqlQuery);	
		$raporCatatanWali->id_catatan_wali = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporCatatanWaliDTO raporCatatanWali
 	 */
	public function update($raporCatatanWali){
		$sql = 'UPDATE rapor_catatan_wali SET id_tp = ?, id_smt = ?, id_kelas = ?, id_siswa = ?, nilai = ?, deskripsi = ? WHERE id_catatan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporCatatanWali->id_tp);
		$sqlQuery->setNumber($raporCatatanWali->id_smt);
		$sqlQuery->setNumber($raporCatatanWali->id_kelas);
		$sqlQuery->setNumber($raporCatatanWali->id_siswa);
		$sqlQuery->set($raporCatatanWali->nilai);
		$sqlQuery->set($raporCatatanWali->deskripsi);

		$sqlQuery->setNumber($raporCatatanWali->id_catatan_wali);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_catatan_wali';
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
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE ';
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

	public function queryByIdCatatanWali($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_catatan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_catatan_wali WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCatatanWali($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_catatan_wali = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_catatan_wali WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_catatan_wali';
		
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
	 * @return RaporCatatanWaliDTO
	 */
	protected function readRow($row){
		$raporCatatanWali = new RaporCatatanWaliDTO();
		
		$raporCatatanWali->id_catatan_wali = isset($row['id_catatan_wali']) ? $row['id_catatan_wali'] : null;
		$raporCatatanWali->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporCatatanWali->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporCatatanWali->id_kelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporCatatanWali->id_siswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporCatatanWali->nilai = isset($row['nilai']) ? $row['nilai'] : null;
		$raporCatatanWali->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;

		return $raporCatatanWali;
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
	 * @return RaporCatatanWaliDTO
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