<?php
/**
 * Class that operate on table 'cbt_nomor_peserta'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtNomorPesertaMySqlDAO implements CbtNomorPesertaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtNomorPesertaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE id_nomor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_nomor_peserta';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_nomor_peserta ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtNomorPeserta primary key
 	 */
	public function delete($id_nomor){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE id_nomor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_nomor);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtNomorPesertaDTO cbtNomorPeserta
 	 */
	public function insert($cbtNomorPeserta){
		$sql = 'INSERT INTO cbt_nomor_peserta (id_siswa, id_tp, id_smt, nomor_peserta) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtNomorPeserta->idSiswa);
		$sqlQuery->setNumber($cbtNomorPeserta->idTp);
		$sqlQuery->setNumber($cbtNomorPeserta->idSmt);
		$sqlQuery->set($cbtNomorPeserta->nomorPeserta);

		$id = $this->executeInsert($sqlQuery);	
		$cbtNomorPeserta->idNomor = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtNomorPesertaDTO cbtNomorPeserta
 	 */
	public function update($cbtNomorPeserta){
		$sql = 'UPDATE cbt_nomor_peserta SET id_siswa = ?, id_tp = ?, id_smt = ?, nomor_peserta = ? WHERE id_nomor = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtNomorPeserta->idSiswa);
		$sqlQuery->setNumber($cbtNomorPeserta->idTp);
		$sqlQuery->setNumber($cbtNomorPeserta->idSmt);
		$sqlQuery->set($cbtNomorPeserta->nomorPeserta);

		$sqlQuery->set($cbtNomorPeserta->idNomor);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_nomor_peserta';
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
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE ';
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

	public function queryByIdNomor($value, $single = false){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE id_nomor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNomorPeserta($value, $single = false){
		$sql = 'SELECT * FROM cbt_nomor_peserta WHERE nomor_peserta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNomor($value){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE id_nomor = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomorPeserta($value){
		$sql = 'DELETE FROM cbt_nomor_peserta WHERE nomor_peserta = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_nomor_peserta';
		
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
	 * @return CbtNomorPesertaDTO
	 */
	protected function readRow($row){
		$cbtNomorPeserta = new CbtNomorPesertaDTO();
		
		$cbtNomorPeserta->idNomor = isset($row['id_nomor']) ? $row['id_nomor'] : null;
		$cbtNomorPeserta->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$cbtNomorPeserta->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtNomorPeserta->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtNomorPeserta->nomorPeserta = isset($row['nomor_peserta']) ? $row['nomor_peserta'] : null;

		return $cbtNomorPeserta;
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
	 * @return CbtNomorPesertaDTO
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