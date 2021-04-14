<?php
/**
 * Class that operate on table 'kelas_catatan_wali'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasCatatanWaliMySqlDAO implements KelasCatatanWaliDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasCatatanWaliDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_catatan_wali';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_catatan_wali ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasCatatanWali primary key
 	 */
	public function delete($id_catatan){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_catatan);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasCatatanWaliDTO kelasCatatanWali
 	 */
	public function insert($kelasCatatanWali){
		$sql = 'INSERT INTO kelas_catatan_wali (id_tp, id_smt, type, level, tgl, id_siswa, id_kelas, text, readed, reading, jml) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasCatatanWali->idTp);
		$sqlQuery->setNumber($kelasCatatanWali->idSmt);
		$sqlQuery->setNumber($kelasCatatanWali->type);
		$sqlQuery->set($kelasCatatanWali->level);
		$sqlQuery->set($kelasCatatanWali->tgl);
		$sqlQuery->setNumber($kelasCatatanWali->idSiswa);
		$sqlQuery->setNumber($kelasCatatanWali->idKelas);
		$sqlQuery->set($kelasCatatanWali->text);
		$sqlQuery->set($kelasCatatanWali->readed);
		$sqlQuery->set($kelasCatatanWali->reading);
		$sqlQuery->setNumber($kelasCatatanWali->jml);

		$id = $this->executeInsert($sqlQuery);	
		$kelasCatatanWali->idCatatan = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasCatatanWaliDTO kelasCatatanWali
 	 */
	public function update($kelasCatatanWali){
		$sql = 'UPDATE kelas_catatan_wali SET id_tp = ?, id_smt = ?, type = ?, level = ?, tgl = ?, id_siswa = ?, id_kelas = ?, text = ?, readed = ?, reading = ?, jml = ? WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasCatatanWali->idTp);
		$sqlQuery->setNumber($kelasCatatanWali->idSmt);
		$sqlQuery->setNumber($kelasCatatanWali->type);
		$sqlQuery->set($kelasCatatanWali->level);
		$sqlQuery->set($kelasCatatanWali->tgl);
		$sqlQuery->setNumber($kelasCatatanWali->idSiswa);
		$sqlQuery->setNumber($kelasCatatanWali->idKelas);
		$sqlQuery->set($kelasCatatanWali->text);
		$sqlQuery->set($kelasCatatanWali->readed);
		$sqlQuery->set($kelasCatatanWali->reading);
		$sqlQuery->setNumber($kelasCatatanWali->jml);

		$sqlQuery->setNumber($kelasCatatanWali->idCatatan);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_catatan_wali';
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
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE ';
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
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByType($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLevel($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTgl($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE tgl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByReaded($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE readed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByReading($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE reading = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJml($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_wali WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCatatan($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLevel($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTgl($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE tgl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReaded($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE readed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReading($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE reading = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJml($value){
		$sql = 'DELETE FROM kelas_catatan_wali WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_catatan_wali';
		
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
	 * @return KelasCatatanWaliDTO
	 */
	protected function readRow($row){
		$kelasCatatanWali = new KelasCatatanWaliDTO();
		
		$kelasCatatanWali->idCatatan = isset($row['id_catatan']) ? $row['id_catatan'] : null;
		$kelasCatatanWali->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasCatatanWali->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasCatatanWali->type = isset($row['type']) ? $row['type'] : null;
		$kelasCatatanWali->level = isset($row['level']) ? $row['level'] : null;
		$kelasCatatanWali->tgl = isset($row['tgl']) ? $row['tgl'] : null;
		$kelasCatatanWali->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$kelasCatatanWali->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasCatatanWali->text = isset($row['text']) ? $row['text'] : null;
		$kelasCatatanWali->readed = isset($row['readed']) ? $row['readed'] : null;
		$kelasCatatanWali->reading = isset($row['reading']) ? $row['reading'] : null;
		$kelasCatatanWali->jml = isset($row['jml']) ? $row['jml'] : null;

		return $kelasCatatanWali;
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
	 * @return KelasCatatanWaliDTO
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