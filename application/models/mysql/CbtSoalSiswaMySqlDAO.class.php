<?php
/**
 * Class that operate on table 'cbt_soal_siswa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtSoalSiswaMySqlDAO implements CbtSoalSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtSoalSiswaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_soal_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_soal_siswa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_soal_siswa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtSoalSiswa primary key
 	 */
	public function delete($id_soal_siswa){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_soal_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_soal_siswa);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSoalSiswaDTO cbtSoalSiswa
 	 */
	public function insert($cbtSoalSiswa){
		$sql = 'INSERT INTO cbt_soal_siswa (id_bank, id_jadwal, id_soal, id_siswa, jenis_soal, no_soal_alias, opsi_alias_a, opsi_alias_b, opsi_alias_c, opsi_alias_d, opsi_alias_e, jawaban_alias, jawaban_siswa, jawaban_benar, point_essai, soal_end) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSoalSiswa->idBank);
		$sqlQuery->setNumber($cbtSoalSiswa->idJadwal);
		$sqlQuery->setNumber($cbtSoalSiswa->idSoal);
		$sqlQuery->setNumber($cbtSoalSiswa->idSiswa);
		$sqlQuery->setNumber($cbtSoalSiswa->jenisSoal);
		$sqlQuery->setNumber($cbtSoalSiswa->noSoalAlias);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasA);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasB);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasC);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasD);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasE);
		$sqlQuery->set($cbtSoalSiswa->jawabanAlias);
		$sqlQuery->set($cbtSoalSiswa->jawabanSiswa);
		$sqlQuery->set($cbtSoalSiswa->jawabanBenar);
		$sqlQuery->setNumber($cbtSoalSiswa->pointEssai);
		$sqlQuery->setNumber($cbtSoalSiswa->soalEnd);

		$id = $this->executeInsert($sqlQuery);	
		$cbtSoalSiswa->idSoalSiswa = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSoalSiswaDTO cbtSoalSiswa
 	 */
	public function update($cbtSoalSiswa){
		$sql = 'UPDATE cbt_soal_siswa SET id_bank = ?, id_jadwal = ?, id_soal = ?, id_siswa = ?, jenis_soal = ?, no_soal_alias = ?, opsi_alias_a = ?, opsi_alias_b = ?, opsi_alias_c = ?, opsi_alias_d = ?, opsi_alias_e = ?, jawaban_alias = ?, jawaban_siswa = ?, jawaban_benar = ?, point_essai = ?, soal_end = ? WHERE id_soal_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtSoalSiswa->idBank);
		$sqlQuery->setNumber($cbtSoalSiswa->idJadwal);
		$sqlQuery->setNumber($cbtSoalSiswa->idSoal);
		$sqlQuery->setNumber($cbtSoalSiswa->idSiswa);
		$sqlQuery->setNumber($cbtSoalSiswa->jenisSoal);
		$sqlQuery->setNumber($cbtSoalSiswa->noSoalAlias);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasA);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasB);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasC);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasD);
		$sqlQuery->set($cbtSoalSiswa->opsiAliasE);
		$sqlQuery->set($cbtSoalSiswa->jawabanAlias);
		$sqlQuery->set($cbtSoalSiswa->jawabanSiswa);
		$sqlQuery->set($cbtSoalSiswa->jawabanBenar);
		$sqlQuery->setNumber($cbtSoalSiswa->pointEssai);
		$sqlQuery->setNumber($cbtSoalSiswa->soalEnd);

		$sqlQuery->set($cbtSoalSiswa->idSoalSiswa);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_soal_siswa';
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
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE ';
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

	public function queryByIdSoalSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_soal_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdBank($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJenisSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE jenis_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNoSoalAlias($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE no_soal_alias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiAliasA($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE opsi_alias_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiAliasB($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE opsi_alias_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiAliasC($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE opsi_alias_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiAliasD($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE opsi_alias_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsiAliasE($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE opsi_alias_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanAlias($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE jawaban_alias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE jawaban_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanBenar($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE jawaban_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPointEssai($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE point_essai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySoalEnd($value, $single = false){
		$sql = 'SELECT * FROM cbt_soal_siswa WHERE soal_end = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSoalSiswa($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_soal_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdBank($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSoal($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJenisSoal($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE jenis_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNoSoalAlias($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE no_soal_alias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiAliasA($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE opsi_alias_a = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiAliasB($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE opsi_alias_b = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiAliasC($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE opsi_alias_c = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiAliasD($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE opsi_alias_d = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsiAliasE($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE opsi_alias_e = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanAlias($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE jawaban_alias = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanSiswa($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE jawaban_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanBenar($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE jawaban_benar = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPointEssai($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE point_essai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySoalEnd($value){
		$sql = 'DELETE FROM cbt_soal_siswa WHERE soal_end = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_soal_siswa';
		
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
	 * @return CbtSoalSiswaDTO
	 */
	protected function readRow($row){
		$cbtSoalSiswa = new CbtSoalSiswaDTO();
		
		$cbtSoalSiswa->idSoalSiswa = isset($row['id_soal_siswa']) ? $row['id_soal_siswa'] : null;
		$cbtSoalSiswa->idBank = isset($row['id_bank']) ? $row['id_bank'] : null;
		$cbtSoalSiswa->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtSoalSiswa->idSoal = isset($row['id_soal']) ? $row['id_soal'] : null;
		$cbtSoalSiswa->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$cbtSoalSiswa->jenisSoal = isset($row['jenis_soal']) ? $row['jenis_soal'] : null;
		$cbtSoalSiswa->noSoalAlias = isset($row['no_soal_alias']) ? $row['no_soal_alias'] : null;
		$cbtSoalSiswa->opsiAliasA = isset($row['opsi_alias_a']) ? $row['opsi_alias_a'] : null;
		$cbtSoalSiswa->opsiAliasB = isset($row['opsi_alias_b']) ? $row['opsi_alias_b'] : null;
		$cbtSoalSiswa->opsiAliasC = isset($row['opsi_alias_c']) ? $row['opsi_alias_c'] : null;
		$cbtSoalSiswa->opsiAliasD = isset($row['opsi_alias_d']) ? $row['opsi_alias_d'] : null;
		$cbtSoalSiswa->opsiAliasE = isset($row['opsi_alias_e']) ? $row['opsi_alias_e'] : null;
		$cbtSoalSiswa->jawabanAlias = isset($row['jawaban_alias']) ? $row['jawaban_alias'] : null;
		$cbtSoalSiswa->jawabanSiswa = isset($row['jawaban_siswa']) ? $row['jawaban_siswa'] : null;
		$cbtSoalSiswa->jawabanBenar = isset($row['jawaban_benar']) ? $row['jawaban_benar'] : null;
		$cbtSoalSiswa->pointEssai = isset($row['point_essai']) ? $row['point_essai'] : null;
		$cbtSoalSiswa->soalEnd = isset($row['soal_end']) ? $row['soal_end'] : null;

		return $cbtSoalSiswa;
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
	 * @return CbtSoalSiswaDTO
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