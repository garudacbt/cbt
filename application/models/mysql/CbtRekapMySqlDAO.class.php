<?php
/**
 * Class that operate on table 'cbt_rekap'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class CbtRekapMySqlDAO implements CbtRekapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtRekapDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_rekap';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_rekap ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtRekap primary key
 	 */
	public function delete($id_rekap){
		$sql = 'DELETE FROM cbt_rekap WHERE id_rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_rekap);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRekapDTO cbtRekap
 	 */
	public function insert($cbtRekap){
		$sql = 'INSERT INTO cbt_rekap (id_tp, tp, id_smt, smt, id_jadwal, id_jenis, kode_jenis, id_bank, bank_kelas, bank_kode, bank_level, id_mapel, nama_mapel, kode, tgl_mulai, tgl_selesai, tampil_pg, jawaban_pg, tampil_esai, jawaban_esai, bobot_pg, bobot_esai, id_guru, nama_guru) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtRekap->id_tp);
		$sqlQuery->set($cbtRekap->tp);
		$sqlQuery->setNumber($cbtRekap->id_smt);
		$sqlQuery->set($cbtRekap->smt);
		$sqlQuery->set($cbtRekap->id_jadwal);
		$sqlQuery->set($cbtRekap->id_jenis);
		$sqlQuery->set($cbtRekap->kode_jenis);
		$sqlQuery->set($cbtRekap->id_bank);
		$sqlQuery->set($cbtRekap->bank_kelas);
		$sqlQuery->set($cbtRekap->bank_kode);
		$sqlQuery->setNumber($cbtRekap->bank_level);
		$sqlQuery->set($cbtRekap->id_mapel);
		$sqlQuery->set($cbtRekap->nama_mapel);
		$sqlQuery->set($cbtRekap->kode);
		$sqlQuery->set($cbtRekap->tgl_mulai);
		$sqlQuery->set($cbtRekap->tgl_selesai);
		$sqlQuery->setNumber($cbtRekap->tampil_pg);
		$sqlQuery->set($cbtRekap->jawaban_pg);
		$sqlQuery->setNumber($cbtRekap->tampil_esai);
		$sqlQuery->set($cbtRekap->jawaban_esai);
		$sqlQuery->setNumber($cbtRekap->bobot_pg);
		$sqlQuery->setNumber($cbtRekap->bobot_esai);
		$sqlQuery->set($cbtRekap->id_guru);
		$sqlQuery->set($cbtRekap->nama_guru);

		$id = $this->executeInsert($sqlQuery);	
		$cbtRekap->id_rekap = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRekapDTO cbtRekap
 	 */
	public function update($cbtRekap){
		$sql = 'UPDATE cbt_rekap SET id_tp = ?, tp = ?, id_smt = ?, smt = ?, id_jadwal = ?, id_jenis = ?, kode_jenis = ?, id_bank = ?, bank_kelas = ?, bank_kode = ?, bank_level = ?, id_mapel = ?, nama_mapel = ?, kode = ?, tgl_mulai = ?, tgl_selesai = ?, tampil_pg = ?, jawaban_pg = ?, tampil_esai = ?, jawaban_esai = ?, bobot_pg = ?, bobot_esai = ?, id_guru = ?, nama_guru = ? WHERE id_rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtRekap->id_tp);
		$sqlQuery->set($cbtRekap->tp);
		$sqlQuery->setNumber($cbtRekap->id_smt);
		$sqlQuery->set($cbtRekap->smt);
		$sqlQuery->set($cbtRekap->id_jadwal);
		$sqlQuery->set($cbtRekap->id_jenis);
		$sqlQuery->set($cbtRekap->kode_jenis);
		$sqlQuery->set($cbtRekap->id_bank);
		$sqlQuery->set($cbtRekap->bank_kelas);
		$sqlQuery->set($cbtRekap->bank_kode);
		$sqlQuery->setNumber($cbtRekap->bank_level);
		$sqlQuery->set($cbtRekap->id_mapel);
		$sqlQuery->set($cbtRekap->nama_mapel);
		$sqlQuery->set($cbtRekap->kode);
		$sqlQuery->set($cbtRekap->tgl_mulai);
		$sqlQuery->set($cbtRekap->tgl_selesai);
		$sqlQuery->setNumber($cbtRekap->tampil_pg);
		$sqlQuery->set($cbtRekap->jawaban_pg);
		$sqlQuery->setNumber($cbtRekap->tampil_esai);
		$sqlQuery->set($cbtRekap->jawaban_esai);
		$sqlQuery->setNumber($cbtRekap->bobot_pg);
		$sqlQuery->setNumber($cbtRekap->bobot_esai);
		$sqlQuery->set($cbtRekap->id_guru);
		$sqlQuery->set($cbtRekap->nama_guru);

		$sqlQuery->setNumber($cbtRekap->id_rekap);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_rekap';
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
		$sql = 'SELECT * FROM cbt_rekap WHERE ';
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

	public function queryByIdRekap($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeJenis($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdBank($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankKelas($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE bank_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankKode($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE bank_kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBankLevel($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE bank_level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaMapel($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKode($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglSelesai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTampilPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE tampil_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE jawaban_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTampilEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE tampil_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJawabanEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE jawaban_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPg($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotEsai($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaGuru($value, $single = false){
		$sql = 'SELECT * FROM cbt_rekap WHERE nama_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdRekap($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_rekap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTp($value){
		$sql = 'DELETE FROM cbt_rekap WHERE tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySmt($value){
		$sql = 'DELETE FROM cbt_rekap WHERE smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJenis($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeJenis($value){
		$sql = 'DELETE FROM cbt_rekap WHERE kode_jenis = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdBank($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_bank = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankKelas($value){
		$sql = 'DELETE FROM cbt_rekap WHERE bank_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankKode($value){
		$sql = 'DELETE FROM cbt_rekap WHERE bank_kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBankLevel($value){
		$sql = 'DELETE FROM cbt_rekap WHERE bank_level = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaMapel($value){
		$sql = 'DELETE FROM cbt_rekap WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKode($value){
		$sql = 'DELETE FROM cbt_rekap WHERE kode = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglMulai($value){
		$sql = 'DELETE FROM cbt_rekap WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglSelesai($value){
		$sql = 'DELETE FROM cbt_rekap WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTampilPg($value){
		$sql = 'DELETE FROM cbt_rekap WHERE tampil_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanPg($value){
		$sql = 'DELETE FROM cbt_rekap WHERE jawaban_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTampilEsai($value){
		$sql = 'DELETE FROM cbt_rekap WHERE tampil_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJawabanEsai($value){
		$sql = 'DELETE FROM cbt_rekap WHERE jawaban_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPg($value){
		$sql = 'DELETE FROM cbt_rekap WHERE bobot_pg = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotEsai($value){
		$sql = 'DELETE FROM cbt_rekap WHERE bobot_esai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM cbt_rekap WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaGuru($value){
		$sql = 'DELETE FROM cbt_rekap WHERE nama_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_rekap';
		
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
	 * @return CbtRekapDTO
	 */
	protected function readRow($row){
		$cbtRekap = new CbtRekapDTO();
		
		$cbtRekap->id_rekap = isset($row['id_rekap']) ? $row['id_rekap'] : null;
		$cbtRekap->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtRekap->tp = isset($row['tp']) ? $row['tp'] : null;
		$cbtRekap->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtRekap->smt = isset($row['smt']) ? $row['smt'] : null;
		$cbtRekap->id_jadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtRekap->id_jenis = isset($row['id_jenis']) ? $row['id_jenis'] : null;
		$cbtRekap->kode_jenis = isset($row['kode_jenis']) ? $row['kode_jenis'] : null;
		$cbtRekap->id_bank = isset($row['id_bank']) ? $row['id_bank'] : null;
		$cbtRekap->bank_kelas = isset($row['bank_kelas']) ? $row['bank_kelas'] : null;
		$cbtRekap->bank_kode = isset($row['bank_kode']) ? $row['bank_kode'] : null;
		$cbtRekap->bank_level = isset($row['bank_level']) ? $row['bank_level'] : null;
		$cbtRekap->id_mapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$cbtRekap->nama_mapel = isset($row['nama_mapel']) ? $row['nama_mapel'] : null;
		$cbtRekap->kode = isset($row['kode']) ? $row['kode'] : null;
		$cbtRekap->tgl_mulai = isset($row['tgl_mulai']) ? $row['tgl_mulai'] : null;
		$cbtRekap->tgl_selesai = isset($row['tgl_selesai']) ? $row['tgl_selesai'] : null;
		$cbtRekap->tampil_pg = isset($row['tampil_pg']) ? $row['tampil_pg'] : null;
		$cbtRekap->jawaban_pg = isset($row['jawaban_pg']) ? $row['jawaban_pg'] : null;
		$cbtRekap->tampil_esai = isset($row['tampil_esai']) ? $row['tampil_esai'] : null;
		$cbtRekap->jawaban_esai = isset($row['jawaban_esai']) ? $row['jawaban_esai'] : null;
		$cbtRekap->bobot_pg = isset($row['bobot_pg']) ? $row['bobot_pg'] : null;
		$cbtRekap->bobot_esai = isset($row['bobot_esai']) ? $row['bobot_esai'] : null;
		$cbtRekap->id_guru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$cbtRekap->nama_guru = isset($row['nama_guru']) ? $row['nama_guru'] : null;

		return $cbtRekap;
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
	 * @return CbtRekapDTO
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