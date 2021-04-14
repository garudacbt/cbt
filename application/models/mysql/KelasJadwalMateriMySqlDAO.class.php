<?php
/**
 * Class that operate on table 'kelas_jadwal_materi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasJadwalMateriMySqlDAO implements KelasJadwalMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasJadwalMateriDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_kjm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_jadwal_materi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_jadwal_materi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasJadwalMateri primary key
 	 */
	public function delete($id_kjm){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_kjm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kjm);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalMateriDTO kelasJadwalMateri
 	 */
	public function insert($kelasJadwalMateri){
		$sql = 'INSERT INTO kelas_jadwal_materi (id_tp, id_smt, id_materi, id_mapel, id_kelas, jadwal_materi) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalMateri->idTp);
		$sqlQuery->setNumber($kelasJadwalMateri->idSmt);
		$sqlQuery->setNumber($kelasJadwalMateri->idMateri);
		$sqlQuery->setNumber($kelasJadwalMateri->idMapel);
		$sqlQuery->setNumber($kelasJadwalMateri->idKelas);
		$sqlQuery->set($kelasJadwalMateri->jadwalMateri);

		$id = $this->executeInsert($sqlQuery);	
		$kelasJadwalMateri->idKjm = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalMateriDTO kelasJadwalMateri
 	 */
	public function update($kelasJadwalMateri){
		$sql = 'UPDATE kelas_jadwal_materi SET id_tp = ?, id_smt = ?, id_materi = ?, id_mapel = ?, id_kelas = ?, jadwal_materi = ? WHERE id_kjm = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalMateri->idTp);
		$sqlQuery->setNumber($kelasJadwalMateri->idSmt);
		$sqlQuery->setNumber($kelasJadwalMateri->idMateri);
		$sqlQuery->setNumber($kelasJadwalMateri->idMapel);
		$sqlQuery->setNumber($kelasJadwalMateri->idKelas);
		$sqlQuery->set($kelasJadwalMateri->jadwalMateri);

		$sqlQuery->setNumber($kelasJadwalMateri->idKjm);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_jadwal_materi';
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
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE ';
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

	public function queryByIdKjm($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_kjm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJadwalMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_materi WHERE jadwal_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKjm($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_kjm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMateri($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJadwalMateri($value){
		$sql = 'DELETE FROM kelas_jadwal_materi WHERE jadwal_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_jadwal_materi';
		
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
	 * @return KelasJadwalMateriDTO
	 */
	protected function readRow($row){
		$kelasJadwalMateri = new KelasJadwalMateriDTO();
		
		$kelasJadwalMateri->idKjm = isset($row['id_kjm']) ? $row['id_kjm'] : null;
		$kelasJadwalMateri->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasJadwalMateri->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasJadwalMateri->idMateri = isset($row['id_materi']) ? $row['id_materi'] : null;
		$kelasJadwalMateri->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$kelasJadwalMateri->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasJadwalMateri->jadwalMateri = isset($row['jadwal_materi']) ? $row['jadwal_materi'] : null;

		return $kelasJadwalMateri;
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
	 * @return KelasJadwalMateriDTO
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