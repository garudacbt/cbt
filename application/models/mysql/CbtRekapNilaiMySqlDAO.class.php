<?php
/**
 * Class that operate on table 'cbt_rekap_nilai'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtRekapNilaiMySqlDAO implements CbtRekapNilaiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtRekapNilaiDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_rekap_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_rekap_nilai';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_rekap_nilai ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtRekapNilai primary key
 	 */
	public function delete($id_rekap_nilai){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_rekap_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_rekap_nilai);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRekapNilaiDTO cbtRekapNilai
 	 */
	public function insert($cbtRekapNilai){
		$sql = 'INSERT INTO cbt_rekap_nilai (id_jadwal, id_tp, tp, id_smt, smt, id_jenis, kode_jenis, id_bank, id_mapel, id_siswa, kelas, mulai, selesai, durasi, bobot_pg, jawaban_pg, nilai_pg, bobot_esai, jawaban_esai, nilai_esai, id_guru) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtRekapNilai->idJadwal);
		$sqlQuery->setNumber($cbtRekapNilai->idTp);
		$sqlQuery->set($cbtRekapNilai->tp);
		$sqlQuery->setNumber($cbtRekapNilai->idSmt);
		$sqlQuery->set($cbtRekapNilai->smt);
		$sqlQuery->setNumber($cbtRekapNilai->idJenis);
		$sqlQuery->set($cbtRekapNilai->kodeJenis);
		$sqlQuery->setNumber($cbtRekapNilai->idBank);
		$sqlQuery->setNumber($cbtRekapNilai->idMapel);
		$sqlQuery->setNumber($cbtRekapNilai->idSiswa);
		$sqlQuery->set($cbtRekapNilai->kelas);
		$sqlQuery->set($cbtRekapNilai->mulai);
		$sqlQuery->set($cbtRekapNilai->selesai);
		$sqlQuery->set($cbtRekapNilai->durasi);
		$sqlQuery->setNumber($cbtRekapNilai->bobotPg);
		$sqlQuery->set($cbtRekapNilai->jawabanPg);
		$sqlQuery->set($cbtRekapNilai->nilaiPg);
		$sqlQuery->setNumber($cbtRekapNilai->bobotEsai);
		$sqlQuery->set($cbtRekapNilai->jawabanEsai);
		$sqlQuery->set($cbtRekapNilai->nilaiEsai);
		$sqlQuery->setNumber($cbtRekapNilai->idGuru);

		$id = $this->executeInsert($sqlQuery);	
		$cbtRekapNilai->idRekapNilai = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRekapNilaiDTO cbtRekapNilai
 	 */
	public function update($cbtRekapNilai){
		$sql = 'UPDATE cbt_rekap_nilai SET id_jadwal = ?, id_tp = ?, tp = ?, id_smt = ?, smt = ?, id_jenis = ?, kode_jenis = ?, id_bank = ?, id_mapel = ?, id_siswa = ?, kelas = ?, mulai = ?, selesai = ?, durasi = ?, bobot_pg = ?, jawaban_pg = ?, nilai_pg = ?, bobot_esai = ?, jawaban_esai = ?, nilai_esai = ?, id_guru = ? WHERE id_rekap_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtRekapNilai->idJadwal);
		$sqlQuery->setNumber($cbtRekapNilai->idTp);
		$sqlQuery->set($cbtRekapNilai->tp);
		$sqlQuery->setNumber($cbtRekapNilai->idSmt);
		$sqlQuery->set($cbtRekapNilai->smt);
		$sqlQuery->setNumber($cbtRekapNilai->idJenis);
		$sqlQuery->set($cbtRekapNilai->kodeJenis);
		$sqlQuery->setNumber($cbtRekapNilai->idBank);
		$sqlQuery->setNumber($cbtRekapNilai->idMapel);
		$sqlQuery->setNumber($cbtRekapNilai->idSiswa);
		$sqlQuery->set($cbtRekapNilai->kelas);
		$sqlQuery->set($cbtRekapNilai->mulai);
		$sqlQuery->set($cbtRekapNilai->selesai);
		$sqlQuery->set($cbtRekapNilai->durasi);
		$sqlQuery->setNumber($cbtRekapNilai->bobotPg);
		$sqlQuery->set($cbtRekapNilai->jawabanPg);
		$sqlQuery->set($cbtRekapNilai->nilaiPg);
		$sqlQuery->setNumber($cbtRekapNilai->bobotEsai);
		$sqlQuery->set($cbtRekapNilai->jawabanEsai);
		$sqlQuery->set($cbtRekapNilai->nilaiEsai);
		$sqlQuery->setNumber($cbtRekapNilai->idGuru);

		$sqlQuery->setNumber($cbtRekapNilai->idRekapNilai);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_rekap_nilai';
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
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE ';
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

	public function queryByIdRekapNilai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_rekap_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdBank($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKelas($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySelesai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDurasi($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE jawaban_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilaiPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE nilai_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE jawaban_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNilaiEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE nilai_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap_nilai WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRekapNilai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_rekap_nilai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTp($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySmt($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJenis($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeJenis($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdBank($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKelas($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMulai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySelesai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDurasi($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPg($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanPg($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE jawaban_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilaiPg($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE nilai_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotEsai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanEsai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE jawaban_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNilaiEsai($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE nilai_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM cbt_rekap_nilai WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_rekap_nilai';
		
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
	 * @return CbtRekapNilaiDTO
	 */
	protected function readRow($row){
		$cbtRekapNilai = new CbtRekapNilaiDTO();
		
		$cbtRekapNilai->idRekapNilai = isset($row['id_rekap_nilai']) ? $row['id_rekap_nilai'] : null;
		$cbtRekapNilai->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtRekapNilai->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtRekapNilai->tp = isset($row['tp']) ? $row['tp'] : null;
		$cbtRekapNilai->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtRekapNilai->smt = isset($row['smt']) ? $row['smt'] : null;
		$cbtRekapNilai->idJenis = isset($row['id_jenis']) ? $row['id_jenis'] : null;
		$cbtRekapNilai->kodeJenis = isset($row['kode_jenis']) ? $row['kode_jenis'] : null;
		$cbtRekapNilai->idBank = isset($row['id_bank']) ? $row['id_bank'] : null;
		$cbtRekapNilai->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$cbtRekapNilai->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$cbtRekapNilai->kelas = isset($row['kelas']) ? $row['kelas'] : null;
		$cbtRekapNilai->mulai = isset($row['mulai']) ? $row['mulai'] : null;
		$cbtRekapNilai->selesai = isset($row['selesai']) ? $row['selesai'] : null;
		$cbtRekapNilai->durasi = isset($row['durasi']) ? $row['durasi'] : null;
		$cbtRekapNilai->bobotPg = isset($row['bobot_pg']) ? $row['bobot_pg'] : null;
		$cbtRekapNilai->jawabanPg = isset($row['jawaban_pg']) ? $row['jawaban_pg'] : null;
		$cbtRekapNilai->nilaiPg = isset($row['nilai_pg']) ? $row['nilai_pg'] : null;
		$cbtRekapNilai->bobotEsai = isset($row['bobot_esai']) ? $row['bobot_esai'] : null;
		$cbtRekapNilai->jawabanEsai = isset($row['jawaban_esai']) ? $row['jawaban_esai'] : null;
		$cbtRekapNilai->nilaiEsai = isset($row['nilai_esai']) ? $row['nilai_esai'] : null;
		$cbtRekapNilai->idGuru = isset($row['id_guru']) ? $row['id_guru'] : null;

		return $cbtRekapNilai;
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
	 * @return CbtRekapNilaiDTO
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