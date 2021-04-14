<?php
/**
 * Class that operate on table 'rapor_prestasi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporPrestasiMySqlDAO implements RaporPrestasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporPrestasiDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_prestasi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_prestasi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporPrestasi primary key
 	 */
	public function delete($id_ranking){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_ranking);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporPrestasiDTO raporPrestasi
 	 */
	public function insert($raporPrestasi){
		$sql = 'INSERT INTO rapor_prestasi (id_kelas, id_siswa, id_tp, id_smt, ranking, deskripsi, p1, p1_desk, p2, p2_desk, p3, p3_desk) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporPrestasi->idKelas);
		$sqlQuery->setNumber($raporPrestasi->idSiswa);
		$sqlQuery->setNumber($raporPrestasi->idTp);
		$sqlQuery->setNumber($raporPrestasi->idSmt);
		$sqlQuery->setNumber($raporPrestasi->ranking);
		$sqlQuery->set($raporPrestasi->deskripsi);
		$sqlQuery->set($raporPrestasi->p1);
		$sqlQuery->set($raporPrestasi->p1Desk);
		$sqlQuery->set($raporPrestasi->p2);
		$sqlQuery->set($raporPrestasi->p2Desk);
		$sqlQuery->set($raporPrestasi->p3);
		$sqlQuery->set($raporPrestasi->p3Desk);

		$id = $this->executeInsert($sqlQuery);	
		$raporPrestasi->idRanking = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporPrestasiDTO raporPrestasi
 	 */
	public function update($raporPrestasi){
		$sql = 'UPDATE rapor_prestasi SET id_kelas = ?, id_siswa = ?, id_tp = ?, id_smt = ?, ranking = ?, deskripsi = ?, p1 = ?, p1_desk = ?, p2 = ?, p2_desk = ?, p3 = ?, p3_desk = ? WHERE id_ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporPrestasi->idKelas);
		$sqlQuery->setNumber($raporPrestasi->idSiswa);
		$sqlQuery->setNumber($raporPrestasi->idTp);
		$sqlQuery->setNumber($raporPrestasi->idSmt);
		$sqlQuery->setNumber($raporPrestasi->ranking);
		$sqlQuery->set($raporPrestasi->deskripsi);
		$sqlQuery->set($raporPrestasi->p1);
		$sqlQuery->set($raporPrestasi->p1Desk);
		$sqlQuery->set($raporPrestasi->p2);
		$sqlQuery->set($raporPrestasi->p2Desk);
		$sqlQuery->set($raporPrestasi->p3);
		$sqlQuery->set($raporPrestasi->p3Desk);

		$sqlQuery->setNumber($raporPrestasi->idRanking);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_prestasi';
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
		$sql = 'SELECT * FROM rapor_prestasi WHERE ';
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

	public function queryByIdRanking($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRanking($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP1($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP1Desk($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p1_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP2($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP2Desk($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p2_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP3($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP3Desk($value, $single = false){
		$sql = 'SELECT * FROM rapor_prestasi WHERE p3_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRanking($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRanking($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE ranking = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP1($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP1Desk($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p1_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP2($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP2Desk($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p2_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP3($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP3Desk($value){
		$sql = 'DELETE FROM rapor_prestasi WHERE p3_desk = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_prestasi';
		
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
	 * @return RaporPrestasiDTO
	 */
	protected function readRow($row){
		$raporPrestasi = new RaporPrestasiDTO();
		
		$raporPrestasi->idRanking = isset($row['id_ranking']) ? $row['id_ranking'] : null;
		$raporPrestasi->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporPrestasi->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporPrestasi->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporPrestasi->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporPrestasi->ranking = isset($row['ranking']) ? $row['ranking'] : null;
		$raporPrestasi->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;
		$raporPrestasi->p1 = isset($row['p1']) ? $row['p1'] : null;
		$raporPrestasi->p1Desk = isset($row['p1_desk']) ? $row['p1_desk'] : null;
		$raporPrestasi->p2 = isset($row['p2']) ? $row['p2'] : null;
		$raporPrestasi->p2Desk = isset($row['p2_desk']) ? $row['p2_desk'] : null;
		$raporPrestasi->p3 = isset($row['p3']) ? $row['p3'] : null;
		$raporPrestasi->p3Desk = isset($row['p3_desk']) ? $row['p3_desk'] : null;

		return $raporPrestasi;
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
	 * @return RaporPrestasiDTO
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