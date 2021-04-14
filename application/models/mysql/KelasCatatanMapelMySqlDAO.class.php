<?php
/**
 * Class that operate on table 'kelas_catatan_mapel'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasCatatanMapelMySqlDAO implements KelasCatatanMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasCatatanMapelDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_catatan_mapel';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_catatan_mapel ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasCatatanMapel primary key
 	 */
	public function delete($id_catatan){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_catatan);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasCatatanMapelDTO kelasCatatanMapel
 	 */
	public function insert($kelasCatatanMapel){
		$sql = 'INSERT INTO kelas_catatan_mapel (id_tp, id_smt, type, id_siswa, id_mapel, id_kelas, id_guru, level, tgl, text, readed, reading, jml) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasCatatanMapel->idTp);
		$sqlQuery->setNumber($kelasCatatanMapel->idSmt);
		$sqlQuery->setNumber($kelasCatatanMapel->type);
		$sqlQuery->setNumber($kelasCatatanMapel->idSiswa);
		$sqlQuery->setNumber($kelasCatatanMapel->idMapel);
		$sqlQuery->setNumber($kelasCatatanMapel->idKelas);
		$sqlQuery->setNumber($kelasCatatanMapel->idGuru);
		$sqlQuery->set($kelasCatatanMapel->level);
		$sqlQuery->set($kelasCatatanMapel->tgl);
		$sqlQuery->set($kelasCatatanMapel->text);
		$sqlQuery->set($kelasCatatanMapel->readed);
		$sqlQuery->set($kelasCatatanMapel->reading);
		$sqlQuery->setNumber($kelasCatatanMapel->jml);

		$id = $this->executeInsert($sqlQuery);	
		$kelasCatatanMapel->idCatatan = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasCatatanMapelDTO kelasCatatanMapel
 	 */
	public function update($kelasCatatanMapel){
		$sql = 'UPDATE kelas_catatan_mapel SET id_tp = ?, id_smt = ?, type = ?, id_siswa = ?, id_mapel = ?, id_kelas = ?, id_guru = ?, level = ?, tgl = ?, text = ?, readed = ?, reading = ?, jml = ? WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasCatatanMapel->idTp);
		$sqlQuery->setNumber($kelasCatatanMapel->idSmt);
		$sqlQuery->setNumber($kelasCatatanMapel->type);
		$sqlQuery->setNumber($kelasCatatanMapel->idSiswa);
		$sqlQuery->setNumber($kelasCatatanMapel->idMapel);
		$sqlQuery->setNumber($kelasCatatanMapel->idKelas);
		$sqlQuery->setNumber($kelasCatatanMapel->idGuru);
		$sqlQuery->set($kelasCatatanMapel->level);
		$sqlQuery->set($kelasCatatanMapel->tgl);
		$sqlQuery->set($kelasCatatanMapel->text);
		$sqlQuery->set($kelasCatatanMapel->readed);
		$sqlQuery->set($kelasCatatanMapel->reading);
		$sqlQuery->setNumber($kelasCatatanMapel->jml);

		$sqlQuery->setNumber($kelasCatatanMapel->idCatatan);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_catatan_mapel';
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
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE ';
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
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByType($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLevel($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTgl($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE tgl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByReaded($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE readed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByReading($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE reading = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJml($value, $single = false){
		$sql = 'SELECT * FROM kelas_catatan_mapel WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCatatan($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_catatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLevel($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTgl($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE tgl = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReaded($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE readed = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReading($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE reading = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJml($value){
		$sql = 'DELETE FROM kelas_catatan_mapel WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_catatan_mapel';
		
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
	 * @return KelasCatatanMapelDTO
	 */
	protected function readRow($row){
		$kelasCatatanMapel = new KelasCatatanMapelDTO();
		
		$kelasCatatanMapel->idCatatan = isset($row['id_catatan']) ? $row['id_catatan'] : null;
		$kelasCatatanMapel->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasCatatanMapel->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasCatatanMapel->type = isset($row['type']) ? $row['type'] : null;
		$kelasCatatanMapel->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$kelasCatatanMapel->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$kelasCatatanMapel->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasCatatanMapel->idGuru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$kelasCatatanMapel->level = isset($row['level']) ? $row['level'] : null;
		$kelasCatatanMapel->tgl = isset($row['tgl']) ? $row['tgl'] : null;
		$kelasCatatanMapel->text = isset($row['text']) ? $row['text'] : null;
		$kelasCatatanMapel->readed = isset($row['readed']) ? $row['readed'] : null;
		$kelasCatatanMapel->reading = isset($row['reading']) ? $row['reading'] : null;
		$kelasCatatanMapel->jml = isset($row['jml']) ? $row['jml'] : null;

		return $kelasCatatanMapel;
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
	 * @return KelasCatatanMapelDTO
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