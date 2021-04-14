<?php
/**
 * Class that operate on table 'cbt_soal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtSoalMySqlDAO implements CbtSoalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtSoalDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_soal WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_soal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_soal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtSoal primary key
 	 */
	public function delete($id_soal){
		$sql = 'DELETE FROM cbt_soal WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_soal);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSoalDTO cbtSoal
 	 */
	public function insert($cbtSoal){
		$sql = 'INSERT INTO cbt_soal (bank_id, mapel_id, jenis, nomor_soal, file, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, file_a, file_b, file_c, file_d, file_e, jawaban, created_on, updated_on, tampilkan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSoal->bankId);
		$sqlQuery->setNumber($cbtSoal->mapelId);
		$sqlQuery->setNumber($cbtSoal->jenis);
		$sqlQuery->setNumber($cbtSoal->nomorSoal);
		$sqlQuery->set($cbtSoal->file);
		$sqlQuery->set($cbtSoal->soal);
		$sqlQuery->set($cbtSoal->opsiA);
		$sqlQuery->set($cbtSoal->opsiB);
		$sqlQuery->set($cbtSoal->opsiC);
		$sqlQuery->set($cbtSoal->opsiD);
		$sqlQuery->set($cbtSoal->opsiE);
		$sqlQuery->set($cbtSoal->fileA);
		$sqlQuery->set($cbtSoal->fileB);
		$sqlQuery->set($cbtSoal->fileC);
		$sqlQuery->set($cbtSoal->fileD);
		$sqlQuery->set($cbtSoal->fileE);
		$sqlQuery->set($cbtSoal->jawaban);
		$sqlQuery->setNumber($cbtSoal->createdOn);
		$sqlQuery->setNumber($cbtSoal->updatedOn);
		$sqlQuery->setNumber($cbtSoal->tampilkan);

		$id = $this->executeInsert($sqlQuery);	
		$cbtSoal->idSoal = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSoalDTO cbtSoal
 	 */
	public function update($cbtSoal){
		$sql = 'UPDATE cbt_soal SET bank_id = ?, mapel_id = ?, jenis = ?, nomor_soal = ?, file = ?, soal = ?, opsi_a = ?, opsi_b = ?, opsi_c = ?, opsi_d = ?, opsi_e = ?, file_a = ?, file_b = ?, file_c = ?, file_d = ?, file_e = ?, jawaban = ?, created_on = ?, updated_on = ?, tampilkan = ? WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSoal->bankId);
		$sqlQuery->setNumber($cbtSoal->mapelId);
		$sqlQuery->setNumber($cbtSoal->jenis);
		$sqlQuery->setNumber($cbtSoal->nomorSoal);
		$sqlQuery->set($cbtSoal->file);
		$sqlQuery->set($cbtSoal->soal);
		$sqlQuery->set($cbtSoal->opsiA);
		$sqlQuery->set($cbtSoal->opsiB);
		$sqlQuery->set($cbtSoal->opsiC);
		$sqlQuery->set($cbtSoal->opsiD);
		$sqlQuery->set($cbtSoal->opsiE);
		$sqlQuery->set($cbtSoal->fileA);
		$sqlQuery->set($cbtSoal->fileB);
		$sqlQuery->set($cbtSoal->fileC);
		$sqlQuery->set($cbtSoal->fileD);
		$sqlQuery->set($cbtSoal->fileE);
		$sqlQuery->set($cbtSoal->jawaban);
		$sqlQuery->setNumber($cbtSoal->createdOn);
		$sqlQuery->setNumber($cbtSoal->updatedOn);
		$sqlQuery->setNumber($cbtSoal->tampilkan);

		$sqlQuery->setNumber($cbtSoal->idSoal);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_soal';
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
		$sql = 'SELECT * FROM cbt_soal WHERE ';
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

	public function queryByIdSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByBankId($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE bank_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMapelId($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE mapel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNomorSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE nomor_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiA($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE opsi_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiB($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE opsi_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiC($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE opsi_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiD($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE opsi_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiE($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE opsi_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFileA($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFileB($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFileC($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFileD($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFileE($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE file_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawaban($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedOn($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTampilkan($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal WHERE tampilkan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSoal($value){
		$sql = 'DELETE FROM cbt_soal WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankId($value){
		$sql = 'DELETE FROM cbt_soal WHERE bank_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMapelId($value){
		$sql = 'DELETE FROM cbt_soal WHERE mapel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenis($value){
		$sql = 'DELETE FROM cbt_soal WHERE jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomorSoal($value){
		$sql = 'DELETE FROM cbt_soal WHERE nomor_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM cbt_soal WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySoal($value){
		$sql = 'DELETE FROM cbt_soal WHERE soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiA($value){
		$sql = 'DELETE FROM cbt_soal WHERE opsi_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiB($value){
		$sql = 'DELETE FROM cbt_soal WHERE opsi_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiC($value){
		$sql = 'DELETE FROM cbt_soal WHERE opsi_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiD($value){
		$sql = 'DELETE FROM cbt_soal WHERE opsi_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiE($value){
		$sql = 'DELETE FROM cbt_soal WHERE opsi_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileA($value){
		$sql = 'DELETE FROM cbt_soal WHERE file_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileB($value){
		$sql = 'DELETE FROM cbt_soal WHERE file_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileC($value){
		$sql = 'DELETE FROM cbt_soal WHERE file_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileD($value){
		$sql = 'DELETE FROM cbt_soal WHERE file_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFileE($value){
		$sql = 'DELETE FROM cbt_soal WHERE file_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawaban($value){
		$sql = 'DELETE FROM cbt_soal WHERE jawaban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM cbt_soal WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedOn($value){
		$sql = 'DELETE FROM cbt_soal WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTampilkan($value){
		$sql = 'DELETE FROM cbt_soal WHERE tampilkan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_soal';
		
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
	 * @return CbtSoalDTO
	 */
	protected function readRow($row){
		$cbtSoal = new CbtSoalDTO();
		
		$cbtSoal->idSoal = isset($row['id_soal']) ? $row['id_soal'] : null;
		$cbtSoal->bankId = isset($row['bank_id']) ? $row['bank_id'] : null;
		$cbtSoal->mapelId = isset($row['mapel_id']) ? $row['mapel_id'] : null;
		$cbtSoal->jenis = isset($row['jenis']) ? $row['jenis'] : null;
		$cbtSoal->nomorSoal = isset($row['nomor_soal']) ? $row['nomor_soal'] : null;
		$cbtSoal->file = isset($row['file']) ? $row['file'] : null;
		$cbtSoal->soal = isset($row['soal']) ? $row['soal'] : null;
		$cbtSoal->opsiA = isset($row['opsi_a']) ? $row['opsi_a'] : null;
		$cbtSoal->opsiB = isset($row['opsi_b']) ? $row['opsi_b'] : null;
		$cbtSoal->opsiC = isset($row['opsi_c']) ? $row['opsi_c'] : null;
		$cbtSoal->opsiD = isset($row['opsi_d']) ? $row['opsi_d'] : null;
		$cbtSoal->opsiE = isset($row['opsi_e']) ? $row['opsi_e'] : null;
		$cbtSoal->fileA = isset($row['file_a']) ? $row['file_a'] : null;
		$cbtSoal->fileB = isset($row['file_b']) ? $row['file_b'] : null;
		$cbtSoal->fileC = isset($row['file_c']) ? $row['file_c'] : null;
		$cbtSoal->fileD = isset($row['file_d']) ? $row['file_d'] : null;
		$cbtSoal->fileE = isset($row['file_e']) ? $row['file_e'] : null;
		$cbtSoal->jawaban = isset($row['jawaban']) ? $row['jawaban'] : null;
		$cbtSoal->createdOn = isset($row['created_on']) ? $row['created_on'] : null;
		$cbtSoal->updatedOn = isset($row['updated_on']) ? $row['updated_on'] : null;
		$cbtSoal->tampilkan = isset($row['tampilkan']) ? $row['tampilkan'] : null;

		return $cbtSoal;
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
	 * @return CbtSoalDTO
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