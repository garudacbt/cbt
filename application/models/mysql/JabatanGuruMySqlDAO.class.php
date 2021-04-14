<?php
/**
 * Class that operate on table 'jabatan_guru'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class JabatanGuruMySqlDAO implements JabatanGuruDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return JabatanGuruDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_jabatan_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM jabatan_guru';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM jabatan_guru ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param jabatanGuru primary key
 	 */
	public function delete($id_jabatan_guru){
		$sql = 'DELETE FROM jabatan_guru WHERE id_jabatan_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_jabatan_guru);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param JabatanGuruDTO jabatanGuru
 	 */
	public function insert($jabatanGuru){
		$sql = 'INSERT INTO jabatan_guru (id_guru, id_jabatan, id_kelas, mapel_kelas, ekstra_kelas, id_tp, id_smt) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($jabatanGuru->idGuru);
		$sqlQuery->setNumber($jabatanGuru->idJabatan);
		$sqlQuery->setNumber($jabatanGuru->idKelas);
		$sqlQuery->set($jabatanGuru->mapelKelas);
		$sqlQuery->set($jabatanGuru->ekstraKelas);
		$sqlQuery->setNumber($jabatanGuru->idTp);
		$sqlQuery->setNumber($jabatanGuru->idSmt);

		$id = $this->executeInsert($sqlQuery);	
		$jabatanGuru->idJabatanGuru = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param JabatanGuruDTO jabatanGuru
 	 */
	public function update($jabatanGuru){
		$sql = 'UPDATE jabatan_guru SET id_guru = ?, id_jabatan = ?, id_kelas = ?, mapel_kelas = ?, ekstra_kelas = ?, id_tp = ?, id_smt = ? WHERE id_jabatan_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($jabatanGuru->idGuru);
		$sqlQuery->setNumber($jabatanGuru->idJabatan);
		$sqlQuery->setNumber($jabatanGuru->idKelas);
		$sqlQuery->set($jabatanGuru->mapelKelas);
		$sqlQuery->set($jabatanGuru->ekstraKelas);
		$sqlQuery->setNumber($jabatanGuru->idTp);
		$sqlQuery->setNumber($jabatanGuru->idSmt);

		$sqlQuery->set($jabatanGuru->idJabatanGuru);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM jabatan_guru';
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
		$sql = 'SELECT * FROM jabatan_guru WHERE ';
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

	public function queryByIdJabatanGuru($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_jabatan_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJabatan($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_jabatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMapelKelas($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE mapel_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEkstraKelas($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE ekstra_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM jabatan_guru WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdJabatanGuru($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_jabatan_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJabatan($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_jabatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMapelKelas($value){
		$sql = 'DELETE FROM jabatan_guru WHERE mapel_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEkstraKelas($value){
		$sql = 'DELETE FROM jabatan_guru WHERE ekstra_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM jabatan_guru WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from jabatan_guru';
		
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
	 * @return JabatanGuruDTO
	 */
	protected function readRow($row){
		$jabatanGuru = new JabatanGuruDTO();
		
		$jabatanGuru->idJabatanGuru = isset($row['id_jabatan_guru']) ? $row['id_jabatan_guru'] : null;
		$jabatanGuru->idGuru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$jabatanGuru->idJabatan = isset($row['id_jabatan']) ? $row['id_jabatan'] : null;
		$jabatanGuru->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$jabatanGuru->mapelKelas = isset($row['mapel_kelas']) ? $row['mapel_kelas'] : null;
		$jabatanGuru->ekstraKelas = isset($row['ekstra_kelas']) ? $row['ekstra_kelas'] : null;
		$jabatanGuru->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$jabatanGuru->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;

		return $jabatanGuru;
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
	 * @return JabatanGuruDTO
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