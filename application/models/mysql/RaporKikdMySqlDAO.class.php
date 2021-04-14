<?php
/**
 * Class that operate on table 'rapor_kikd'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporKikdMySqlDAO implements RaporKikdDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporKikdDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_kikd WHERE id_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_kikd';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_kikd ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporKikd primary key
 	 */
	public function delete($id_kikd){
		$sql = 'DELETE FROM rapor_kikd WHERE id_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kikd);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporKikdDTO raporKikd
 	 */
	public function insert($raporKikd){
		$sql = 'INSERT INTO rapor_kikd (id_mapel_kelas, aspek, id_tp, id_smt, materi_kikd) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporKikd->idMapelKelas);
		$sqlQuery->setNumber($raporKikd->aspek);
		$sqlQuery->setNumber($raporKikd->idTp);
		$sqlQuery->setNumber($raporKikd->idSmt);
		$sqlQuery->set($raporKikd->materiKikd);

		$id = $this->executeInsert($sqlQuery);	
		$raporKikd->idKikd = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporKikdDTO raporKikd
 	 */
	public function update($raporKikd){
		$sql = 'UPDATE rapor_kikd SET id_mapel_kelas = ?, aspek = ?, id_tp = ?, id_smt = ?, materi_kikd = ? WHERE id_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporKikd->idMapelKelas);
		$sqlQuery->setNumber($raporKikd->aspek);
		$sqlQuery->setNumber($raporKikd->idTp);
		$sqlQuery->setNumber($raporKikd->idSmt);
		$sqlQuery->set($raporKikd->materiKikd);

		$sqlQuery->setNumber($raporKikd->idKikd);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_kikd';
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
		$sql = 'SELECT * FROM rapor_kikd WHERE ';
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

	public function queryByIdKikd($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE id_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdMapelKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE id_mapel_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAspek($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE aspek = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMateriKikd($value, $single = false){
		$sql = 'SELECT * FROM rapor_kikd WHERE materi_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKikd($value){
		$sql = 'DELETE FROM rapor_kikd WHERE id_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapelKelas($value){
		$sql = 'DELETE FROM rapor_kikd WHERE id_mapel_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAspek($value){
		$sql = 'DELETE FROM rapor_kikd WHERE aspek = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_kikd WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_kikd WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMateriKikd($value){
		$sql = 'DELETE FROM rapor_kikd WHERE materi_kikd = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_kikd';
		
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
	 * @return RaporKikdDTO
	 */
	protected function readRow($row){
		$raporKikd = new RaporKikdDTO();
		
		$raporKikd->idKikd = isset($row['id_kikd']) ? $row['id_kikd'] : null;
		$raporKikd->idMapelKelas = isset($row['id_mapel_kelas']) ? $row['id_mapel_kelas'] : null;
		$raporKikd->aspek = isset($row['aspek']) ? $row['aspek'] : null;
		$raporKikd->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporKikd->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporKikd->materiKikd = isset($row['materi_kikd']) ? $row['materi_kikd'] : null;

		return $raporKikd;
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
	 * @return RaporKikdDTO
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