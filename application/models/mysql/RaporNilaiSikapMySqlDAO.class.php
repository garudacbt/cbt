<?php
/**
 * Class that operate on table 'rapor_nilai_sikap'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporNilaiSikapMySqlDAO implements RaporNilaiSikapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporNilaiSikapDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_nilai_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_nilai_sikap';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_nilai_sikap ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporNilaiSikap primary key
 	 */
	public function delete($id_nilai_sikap){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_nilai_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_nilai_sikap);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiSikapDTO raporNilaiSikap
 	 */
	public function insert($raporNilaiSikap){
		$sql = 'INSERT INTO rapor_nilai_sikap (id_siswa, id_kelas, jenis, nilai, deskripsi, id_tp, id_smt) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiSikap->idSiswa);
		$sqlQuery->setNumber($raporNilaiSikap->idKelas);
		$sqlQuery->setNumber($raporNilaiSikap->jenis);
		$sqlQuery->set($raporNilaiSikap->nilai);
		$sqlQuery->set($raporNilaiSikap->deskripsi);
		$sqlQuery->setNumber($raporNilaiSikap->idTp);
		$sqlQuery->setNumber($raporNilaiSikap->idSmt);

		$id = $this->executeInsert($sqlQuery);	
		$raporNilaiSikap->idNilaiSikap = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiSikapDTO raporNilaiSikap
 	 */
	public function update($raporNilaiSikap){
		$sql = 'UPDATE rapor_nilai_sikap SET id_siswa = ?, id_kelas = ?, jenis = ?, nilai = ?, deskripsi = ?, id_tp = ?, id_smt = ? WHERE id_nilai_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiSikap->idSiswa);
		$sqlQuery->setNumber($raporNilaiSikap->idKelas);
		$sqlQuery->setNumber($raporNilaiSikap->jenis);
		$sqlQuery->set($raporNilaiSikap->nilai);
		$sqlQuery->set($raporNilaiSikap->deskripsi);
		$sqlQuery->setNumber($raporNilaiSikap->idTp);
		$sqlQuery->setNumber($raporNilaiSikap->idSmt);

		$sqlQuery->setNumber($raporNilaiSikap->idNilaiSikap);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_nilai_sikap';
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
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE ';
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

	public function queryByIdNilaiSikap($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_nilai_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenis($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_sikap WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNilaiSikap($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_nilai_sikap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenis($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_nilai_sikap WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_nilai_sikap';
		
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
	 * @return RaporNilaiSikapDTO
	 */
	protected function readRow($row){
		$raporNilaiSikap = new RaporNilaiSikapDTO();
		
		$raporNilaiSikap->idNilaiSikap = isset($row['id_nilai_sikap']) ? $row['id_nilai_sikap'] : null;
		$raporNilaiSikap->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporNilaiSikap->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporNilaiSikap->jenis = isset($row['jenis']) ? $row['jenis'] : null;
		$raporNilaiSikap->nilai = isset($row['nilai']) ? $row['nilai'] : null;
		$raporNilaiSikap->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;
		$raporNilaiSikap->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporNilaiSikap->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;

		return $raporNilaiSikap;
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
	 * @return RaporNilaiSikapDTO
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