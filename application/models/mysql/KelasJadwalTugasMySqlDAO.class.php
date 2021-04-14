<?php
/**
 * Class that operate on table 'kelas_jadwal_tugas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasJadwalTugasMySqlDAO implements KelasJadwalTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasJadwalTugasDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_kjt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_jadwal_tugas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_jadwal_tugas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasJadwalTuga primary key
 	 */
	public function delete($id_kjt){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_kjt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kjt);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalTugasDTO kelasJadwalTuga
 	 */
	public function insert($kelasJadwalTuga){
		$sql = 'INSERT INTO kelas_jadwal_tugas (id_tp, id_smt, id_tugas, id_mapel, id_kelas, jadwal_tugas) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalTuga->idTp);
		$sqlQuery->setNumber($kelasJadwalTuga->idSmt);
		$sqlQuery->setNumber($kelasJadwalTuga->idTugas);
		$sqlQuery->setNumber($kelasJadwalTuga->idMapel);
		$sqlQuery->setNumber($kelasJadwalTuga->idKelas);
		$sqlQuery->set($kelasJadwalTuga->jadwalTugas);

		$id = $this->executeInsert($sqlQuery);	
		$kelasJadwalTuga->idKjt = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalTugasDTO kelasJadwalTuga
 	 */
	public function update($kelasJadwalTuga){
		$sql = 'UPDATE kelas_jadwal_tugas SET id_tp = ?, id_smt = ?, id_tugas = ?, id_mapel = ?, id_kelas = ?, jadwal_tugas = ? WHERE id_kjt = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalTuga->idTp);
		$sqlQuery->setNumber($kelasJadwalTuga->idSmt);
		$sqlQuery->setNumber($kelasJadwalTuga->idTugas);
		$sqlQuery->setNumber($kelasJadwalTuga->idMapel);
		$sqlQuery->setNumber($kelasJadwalTuga->idKelas);
		$sqlQuery->set($kelasJadwalTuga->jadwalTugas);

		$sqlQuery->setNumber($kelasJadwalTuga->idKjt);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_jadwal_tugas';
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
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE ';
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

	public function queryByIdKjt($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_kjt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJadwalTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_tugas WHERE jadwal_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKjt($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_kjt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTugas($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJadwalTugas($value){
		$sql = 'DELETE FROM kelas_jadwal_tugas WHERE jadwal_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_jadwal_tugas';
		
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
	 * @return KelasJadwalTugasDTO
	 */
	protected function readRow($row){
		$kelasJadwalTuga = new KelasJadwalTugasDTO();
		
		$kelasJadwalTuga->idKjt = isset($row['id_kjt']) ? $row['id_kjt'] : null;
		$kelasJadwalTuga->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasJadwalTuga->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasJadwalTuga->idTugas = isset($row['id_tugas']) ? $row['id_tugas'] : null;
		$kelasJadwalTuga->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$kelasJadwalTuga->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasJadwalTuga->jadwalTugas = isset($row['jadwal_tugas']) ? $row['jadwal_tugas'] : null;

		return $kelasJadwalTuga;
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
	 * @return KelasJadwalTugasDTO
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