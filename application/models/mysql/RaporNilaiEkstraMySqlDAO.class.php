<?php
/**
 * Class that operate on table 'rapor_nilai_ekstra'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporNilaiEkstraMySqlDAO implements RaporNilaiEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporNilaiEkstraDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_nilai_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_nilai_ekstra';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_nilai_ekstra ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporNilaiEkstra primary key
 	 */
	public function delete($id_nilai_ekstra){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_nilai_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_nilai_ekstra);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiEkstraDTO raporNilaiEkstra
 	 */
	public function insert($raporNilaiEkstra){
		$sql = 'INSERT INTO rapor_nilai_ekstra (id_ekstra, id_kelas, id_siswa, id_tp, id_smt, nilai, predikat, deskripsi) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiEkstra->idEkstra);
		$sqlQuery->setNumber($raporNilaiEkstra->idKelas);
		$sqlQuery->setNumber($raporNilaiEkstra->idSiswa);
		$sqlQuery->setNumber($raporNilaiEkstra->idTp);
		$sqlQuery->setNumber($raporNilaiEkstra->idSmt);
		$sqlQuery->setNumber($raporNilaiEkstra->nilai);
		$sqlQuery->set($raporNilaiEkstra->predikat);
		$sqlQuery->set($raporNilaiEkstra->deskripsi);

		$id = $this->executeInsert($sqlQuery);	
		$raporNilaiEkstra->idNilaiEkstra = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiEkstraDTO raporNilaiEkstra
 	 */
	public function update($raporNilaiEkstra){
		$sql = 'UPDATE rapor_nilai_ekstra SET id_ekstra = ?, id_kelas = ?, id_siswa = ?, id_tp = ?, id_smt = ?, nilai = ?, predikat = ?, deskripsi = ? WHERE id_nilai_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiEkstra->idEkstra);
		$sqlQuery->setNumber($raporNilaiEkstra->idKelas);
		$sqlQuery->setNumber($raporNilaiEkstra->idSiswa);
		$sqlQuery->setNumber($raporNilaiEkstra->idTp);
		$sqlQuery->setNumber($raporNilaiEkstra->idSmt);
		$sqlQuery->setNumber($raporNilaiEkstra->nilai);
		$sqlQuery->set($raporNilaiEkstra->predikat);
		$sqlQuery->set($raporNilaiEkstra->deskripsi);

		$sqlQuery->setNumber($raporNilaiEkstra->idNilaiEkstra);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_nilai_ekstra';
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
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE ';
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

	public function queryByIdNilaiEkstra($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_nilai_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdEkstra($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilai($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPredikat($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_ekstra WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNilaiEkstra($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_nilai_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdEkstra($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_ekstra = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilai($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPredikat($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeskripsi($value){
		$sql = 'DELETE FROM rapor_nilai_ekstra WHERE deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_nilai_ekstra';
		
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
	 * @return RaporNilaiEkstraDTO
	 */
	protected function readRow($row){
		$raporNilaiEkstra = new RaporNilaiEkstraDTO();
		
		$raporNilaiEkstra->idNilaiEkstra = isset($row['id_nilai_ekstra']) ? $row['id_nilai_ekstra'] : null;
		$raporNilaiEkstra->idEkstra = isset($row['id_ekstra']) ? $row['id_ekstra'] : null;
		$raporNilaiEkstra->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporNilaiEkstra->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporNilaiEkstra->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporNilaiEkstra->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporNilaiEkstra->nilai = isset($row['nilai']) ? $row['nilai'] : null;
		$raporNilaiEkstra->predikat = isset($row['predikat']) ? $row['predikat'] : null;
		$raporNilaiEkstra->deskripsi = isset($row['deskripsi']) ? $row['deskripsi'] : null;

		return $raporNilaiEkstra;
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
	 * @return RaporNilaiEkstraDTO
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