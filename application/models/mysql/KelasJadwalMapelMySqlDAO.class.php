<?php
/**
 * Class that operate on table 'kelas_jadwal_mapel'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasJadwalMapelMySqlDAO implements KelasJadwalMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasJadwalMapelDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_jadwal_mapel';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_jadwal_mapel ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasJadwalMapel primary key
 	 */
	public function delete($id_jadwal){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_jadwal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalMapelDTO kelasJadwalMapel
 	 */
	public function insert($kelasJadwalMapel){
		$sql = 'INSERT INTO kelas_jadwal_mapel (id_tp, id_smt, id_kelas, id_hari, jam_ke, id_mapel) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalMapel->idTp);
		$sqlQuery->setNumber($kelasJadwalMapel->idSmt);
		$sqlQuery->setNumber($kelasJadwalMapel->idKelas);
		$sqlQuery->setNumber($kelasJadwalMapel->idHari);
		$sqlQuery->setNumber($kelasJadwalMapel->jamKe);
		$sqlQuery->setNumber($kelasJadwalMapel->idMapel);

		$id = $this->executeInsert($sqlQuery);	
		$kelasJadwalMapel->idJadwal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalMapelDTO kelasJadwalMapel
 	 */
	public function update($kelasJadwalMapel){
		$sql = 'UPDATE kelas_jadwal_mapel SET id_tp = ?, id_smt = ?, id_kelas = ?, id_hari = ?, jam_ke = ?, id_mapel = ? WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasJadwalMapel->idTp);
		$sqlQuery->setNumber($kelasJadwalMapel->idSmt);
		$sqlQuery->setNumber($kelasJadwalMapel->idKelas);
		$sqlQuery->setNumber($kelasJadwalMapel->idHari);
		$sqlQuery->setNumber($kelasJadwalMapel->jamKe);
		$sqlQuery->setNumber($kelasJadwalMapel->idMapel);

		$sqlQuery->setNumber($kelasJadwalMapel->idJadwal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_jadwal_mapel';
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
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE ';
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

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdHari($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_hari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJamKe($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_jadwal_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdHari($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_hari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJamKe($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE jam_ke = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_jadwal_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_jadwal_mapel';
		
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
	 * @return KelasJadwalMapelDTO
	 */
	protected function readRow($row){
		$kelasJadwalMapel = new KelasJadwalMapelDTO();
		
		$kelasJadwalMapel->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$kelasJadwalMapel->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasJadwalMapel->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasJadwalMapel->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasJadwalMapel->idHari = isset($row['id_hari']) ? $row['id_hari'] : null;
		$kelasJadwalMapel->jamKe = isset($row['jam_ke']) ? $row['jam_ke'] : null;
		$kelasJadwalMapel->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;

		return $kelasJadwalMapel;
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
	 * @return KelasJadwalMapelDTO
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