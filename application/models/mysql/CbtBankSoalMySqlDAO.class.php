<?php
/**
 * Class that operate on table 'cbt_bank_soal'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtBankSoalMySqlDAO implements CbtBankSoalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtBankSoalDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_bank_soal';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_bank_soal ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtBankSoal primary key
 	 */
	public function delete($id_bank){
		$sql = 'DELETE FROM cbt_bank_soal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_bank);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtBankSoalDTO cbtBankSoal
 	 */
	public function insert($cbtBankSoal){
		$sql = 'INSERT INTO cbt_bank_soal (bank_jenis_id, bank_kode, bank_level, bank_kelas, bank_mapel_id, bank_jurusan_id, bank_guru_id, bank_nama, kkm, jml_soal, jml_esai, tampil_pg, tampil_esai, bobot_pg, bobot_esai, opsi, date, status, soal_agama) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtBankSoal->bankJenisId);
		$sqlQuery->set($cbtBankSoal->bankKode);
		$sqlQuery->set($cbtBankSoal->bankLevel);
		$sqlQuery->set($cbtBankSoal->bankKelas);
		$sqlQuery->setNumber($cbtBankSoal->bankMapelId);
		$sqlQuery->setNumber($cbtBankSoal->bankJurusanId);
		$sqlQuery->setNumber($cbtBankSoal->bankGuruId);
		$sqlQuery->set($cbtBankSoal->bankNama);
		$sqlQuery->setNumber($cbtBankSoal->kkm);
		$sqlQuery->setNumber($cbtBankSoal->jmlSoal);
		$sqlQuery->setNumber($cbtBankSoal->jmlEsai);
		$sqlQuery->setNumber($cbtBankSoal->tampilPg);
		$sqlQuery->setNumber($cbtBankSoal->tampilEsai);
		$sqlQuery->setNumber($cbtBankSoal->bobotPg);
		$sqlQuery->setNumber($cbtBankSoal->bobotEsai);
		$sqlQuery->setNumber($cbtBankSoal->opsi);
		$sqlQuery->set($cbtBankSoal->date);
		$sqlQuery->setNumber($cbtBankSoal->status);
		$sqlQuery->setNumber($cbtBankSoal->soalAgama);

		$id = $this->executeInsert($sqlQuery);	
		$cbtBankSoal->idBank = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtBankSoalDTO cbtBankSoal
 	 */
	public function update($cbtBankSoal){
		$sql = 'UPDATE cbt_bank_soal SET bank_jenis_id = ?, bank_kode = ?, bank_level = ?, bank_kelas = ?, bank_mapel_id = ?, bank_jurusan_id = ?, bank_guru_id = ?, bank_nama = ?, kkm = ?, jml_soal = ?, jml_esai = ?, tampil_pg = ?, tampil_esai = ?, bobot_pg = ?, bobot_esai = ?, opsi = ?, date = ?, status = ?, soal_agama = ? WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtBankSoal->bankJenisId);
		$sqlQuery->set($cbtBankSoal->bankKode);
		$sqlQuery->set($cbtBankSoal->bankLevel);
		$sqlQuery->set($cbtBankSoal->bankKelas);
		$sqlQuery->setNumber($cbtBankSoal->bankMapelId);
		$sqlQuery->setNumber($cbtBankSoal->bankJurusanId);
		$sqlQuery->setNumber($cbtBankSoal->bankGuruId);
		$sqlQuery->set($cbtBankSoal->bankNama);
		$sqlQuery->setNumber($cbtBankSoal->kkm);
		$sqlQuery->setNumber($cbtBankSoal->jmlSoal);
		$sqlQuery->setNumber($cbtBankSoal->jmlEsai);
		$sqlQuery->setNumber($cbtBankSoal->tampilPg);
		$sqlQuery->setNumber($cbtBankSoal->tampilEsai);
		$sqlQuery->setNumber($cbtBankSoal->bobotPg);
		$sqlQuery->setNumber($cbtBankSoal->bobotEsai);
		$sqlQuery->setNumber($cbtBankSoal->opsi);
		$sqlQuery->set($cbtBankSoal->date);
		$sqlQuery->setNumber($cbtBankSoal->status);
		$sqlQuery->setNumber($cbtBankSoal->soalAgama);

		$sqlQuery->setNumber($cbtBankSoal->idBank);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_bank_soal';
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
		$sql = 'SELECT * FROM cbt_bank_soal WHERE ';
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

	public function queryByIdBank($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByBankJenisId($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_jenis_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankKode($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankLevel($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankKelas($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankMapelId($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_mapel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankJurusanId($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_jurusan_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankGuruId($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_guru_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankNama($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bank_nama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKkm($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJmlSoal($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE jml_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJmlEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE jml_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTampilPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE tampil_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTampilEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE tampil_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByOpsi($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE opsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDate($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySoalAgama($value, $single = false){
		$sql = 'SELECT * FROM cbt_bank_soal WHERE soal_agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdBank($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankJenisId($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_jenis_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankKode($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankLevel($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankKelas($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankMapelId($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_mapel_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankJurusanId($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_jurusan_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankGuruId($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_guru_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankNama($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bank_nama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKkm($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJmlSoal($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE jml_soal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJmlEsai($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE jml_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTampilPg($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE tampil_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTampilEsai($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE tampil_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPg($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotEsai($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOpsi($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE opsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySoalAgama($value){
		$sql = 'DELETE FROM cbt_bank_soal WHERE soal_agama = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_bank_soal';
		
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
	 * @return CbtBankSoalDTO
	 */
	protected function readRow($row){
		$cbtBankSoal = new CbtBankSoalDTO();
		
		$cbtBankSoal->idBank = isset($row['id_bank']) ? $row['id_bank'] : null;
		$cbtBankSoal->bankJenisId = isset($row['bank_jenis_id']) ? $row['bank_jenis_id'] : null;
		$cbtBankSoal->bankKode = isset($row['bank_kode']) ? $row['bank_kode'] : null;
		$cbtBankSoal->bankLevel = isset($row['bank_level']) ? $row['bank_level'] : null;
		$cbtBankSoal->bankKelas = isset($row['bank_kelas']) ? $row['bank_kelas'] : null;
		$cbtBankSoal->bankMapelId = isset($row['bank_mapel_id']) ? $row['bank_mapel_id'] : null;
		$cbtBankSoal->bankJurusanId = isset($row['bank_jurusan_id']) ? $row['bank_jurusan_id'] : null;
		$cbtBankSoal->bankGuruId = isset($row['bank_guru_id']) ? $row['bank_guru_id'] : null;
		$cbtBankSoal->bankNama = isset($row['bank_nama']) ? $row['bank_nama'] : null;
		$cbtBankSoal->kkm = isset($row['kkm']) ? $row['kkm'] : null;
		$cbtBankSoal->jmlSoal = isset($row['jml_soal']) ? $row['jml_soal'] : null;
		$cbtBankSoal->jmlEsai = isset($row['jml_esai']) ? $row['jml_esai'] : null;
		$cbtBankSoal->tampilPg = isset($row['tampil_pg']) ? $row['tampil_pg'] : null;
		$cbtBankSoal->tampilEsai = isset($row['tampil_esai']) ? $row['tampil_esai'] : null;
		$cbtBankSoal->bobotPg = isset($row['bobot_pg']) ? $row['bobot_pg'] : null;
		$cbtBankSoal->bobotEsai = isset($row['bobot_esai']) ? $row['bobot_esai'] : null;
		$cbtBankSoal->opsi = isset($row['opsi']) ? $row['opsi'] : null;
		$cbtBankSoal->date = isset($row['date']) ? $row['date'] : null;
		$cbtBankSoal->status = isset($row['status']) ? $row['status'] : null;
		$cbtBankSoal->soalAgama = isset($row['soal_agama']) ? $row['soal_agama'] : null;

		return $cbtBankSoal;
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
	 * @return CbtBankSoalDTO
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