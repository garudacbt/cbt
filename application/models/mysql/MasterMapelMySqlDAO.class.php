<?php
/**
 * Class that operate on table 'master_mapel'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterMapelMySqlDAO implements MasterMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterMapelDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_mapel';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_mapel ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterMapel primary key
 	 */
	public function delete($id_mapel){
		$sql = 'DELETE FROM master_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_mapel);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterMapelDTO masterMapel
 	 */
	public function insert($masterMapel){
		$sql = 'INSERT INTO master_mapel (nama_mapel, kode, kelompok, bobot_p, bobot_k, jenjang, urutan, status, deletable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterMapel->namaMapel);
		$sqlQuery->set($masterMapel->kode);
		$sqlQuery->set($masterMapel->kelompok);
		$sqlQuery->setNumber($masterMapel->bobotP);
		$sqlQuery->setNumber($masterMapel->bobotK);
		$sqlQuery->setNumber($masterMapel->jenjang);
		$sqlQuery->setNumber($masterMapel->urutan);
		$sqlQuery->setNumber($masterMapel->status);
		$sqlQuery->setNumber($masterMapel->deletable);

		$id = $this->executeInsert($sqlQuery);	
		$masterMapel->idMapel = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterMapelDTO masterMapel
 	 */
	public function update($masterMapel){
		$sql = 'UPDATE master_mapel SET nama_mapel = ?, kode = ?, kelompok = ?, bobot_p = ?, bobot_k = ?, jenjang = ?, urutan = ?, status = ?, deletable = ? WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($masterMapel->namaMapel);
		$sqlQuery->set($masterMapel->kode);
		$sqlQuery->set($masterMapel->kelompok);
		$sqlQuery->setNumber($masterMapel->bobotP);
		$sqlQuery->setNumber($masterMapel->bobotK);
		$sqlQuery->setNumber($masterMapel->jenjang);
		$sqlQuery->setNumber($masterMapel->urutan);
		$sqlQuery->setNumber($masterMapel->status);
		$sqlQuery->setNumber($masterMapel->deletable);

		$sqlQuery->setNumber($masterMapel->idMapel);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_mapel';
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
		$sql = 'SELECT * FROM master_mapel WHERE ';
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

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaMapel($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKode($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKelompok($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE kelompok = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotP($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE bobot_p = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotK($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE bobot_k = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenjang($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE jenjang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUrutan($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE urutan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDeletable($value, $single = false){
		$sql = 'SELECT * FROM master_mapel WHERE deletable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM master_mapel WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaMapel($value){
		$sql = 'DELETE FROM master_mapel WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKode($value){
		$sql = 'DELETE FROM master_mapel WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelompok($value){
		$sql = 'DELETE FROM master_mapel WHERE kelompok = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotP($value){
		$sql = 'DELETE FROM master_mapel WHERE bobot_p = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotK($value){
		$sql = 'DELETE FROM master_mapel WHERE bobot_k = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenjang($value){
		$sql = 'DELETE FROM master_mapel WHERE jenjang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrutan($value){
		$sql = 'DELETE FROM master_mapel WHERE urutan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM master_mapel WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDeletable($value){
		$sql = 'DELETE FROM master_mapel WHERE deletable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_mapel';
		
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
	 * @return MasterMapelDTO
	 */
	protected function readRow($row){
		$masterMapel = new MasterMapelDTO();
		
		$masterMapel->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$masterMapel->namaMapel = isset($row['nama_mapel']) ? $row['nama_mapel'] : null;
		$masterMapel->kode = isset($row['kode']) ? $row['kode'] : null;
		$masterMapel->kelompok = isset($row['kelompok']) ? $row['kelompok'] : null;
		$masterMapel->bobotP = isset($row['bobot_p']) ? $row['bobot_p'] : null;
		$masterMapel->bobotK = isset($row['bobot_k']) ? $row['bobot_k'] : null;
		$masterMapel->jenjang = isset($row['jenjang']) ? $row['jenjang'] : null;
		$masterMapel->urutan = isset($row['urutan']) ? $row['urutan'] : null;
		$masterMapel->status = isset($row['status']) ? $row['status'] : null;
		$masterMapel->deletable = isset($row['deletable']) ? $row['deletable'] : null;

		return $masterMapel;
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
	 * @return MasterMapelDTO
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