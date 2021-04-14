<?php
/**
 * Class that operate on table 'rapor_nilai_pts'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporNilaiPtsMySqlDAO implements RaporNilaiPtsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporNilaiPtsDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_nilai_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_nilai_pts';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_nilai_pts ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporNilaiPt primary key
 	 */
	public function delete($id_nilai_pts){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_nilai_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_nilai_pts);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiPtsDTO raporNilaiPt
 	 */
	public function insert($raporNilaiPt){
		$sql = 'INSERT INTO rapor_nilai_pts (id_mapel, id_kelas, id_siswa, id_tp, id_smt, nilai, predikat) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiPt->idMapel);
		$sqlQuery->setNumber($raporNilaiPt->idKelas);
		$sqlQuery->setNumber($raporNilaiPt->idSiswa);
		$sqlQuery->setNumber($raporNilaiPt->idTp);
		$sqlQuery->setNumber($raporNilaiPt->idSmt);
		$sqlQuery->setNumber($raporNilaiPt->nilai);
		$sqlQuery->set($raporNilaiPt->predikat);

		$id = $this->executeInsert($sqlQuery);	
		$raporNilaiPt->idNilaiPts = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiPtsDTO raporNilaiPt
 	 */
	public function update($raporNilaiPt){
		$sql = 'UPDATE rapor_nilai_pts SET id_mapel = ?, id_kelas = ?, id_siswa = ?, id_tp = ?, id_smt = ?, nilai = ?, predikat = ? WHERE id_nilai_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiPt->idMapel);
		$sqlQuery->setNumber($raporNilaiPt->idKelas);
		$sqlQuery->setNumber($raporNilaiPt->idSiswa);
		$sqlQuery->setNumber($raporNilaiPt->idTp);
		$sqlQuery->setNumber($raporNilaiPt->idSmt);
		$sqlQuery->setNumber($raporNilaiPt->nilai);
		$sqlQuery->set($raporNilaiPt->predikat);

		$sqlQuery->setNumber($raporNilaiPt->idNilaiPts);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_nilai_pts';
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
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE ';
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

	public function queryByIdNilaiPts($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_nilai_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPredikat($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_pts WHERE predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNilaiPts($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_nilai_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPredikat($value){
		$sql = 'DELETE FROM rapor_nilai_pts WHERE predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_nilai_pts';
		
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
	 * @return RaporNilaiPtsDTO
	 */
	protected function readRow($row){
		$raporNilaiPt = new RaporNilaiPtsDTO();
		
		$raporNilaiPt->idNilaiPts = isset($row['id_nilai_pts']) ? $row['id_nilai_pts'] : null;
		$raporNilaiPt->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$raporNilaiPt->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporNilaiPt->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporNilaiPt->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporNilaiPt->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporNilaiPt->nilai = isset($row['nilai']) ? $row['nilai'] : null;
		$raporNilaiPt->predikat = isset($row['predikat']) ? $row['predikat'] : null;

		return $raporNilaiPt;
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
	 * @return RaporNilaiPtsDTO
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