<?php
/**
 * Class that operate on table 'rapor_nilai_harian'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporNilaiHarianMySqlDAO implements RaporNilaiHarianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporNilaiHarianDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_nilai_harian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_nilai_harian';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_nilai_harian ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporNilaiHarian primary key
 	 */
	public function delete($id_nilai_harian){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_nilai_harian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_nilai_harian);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiHarianDTO raporNilaiHarian
 	 */
	public function insert($raporNilaiHarian){
		$sql = 'INSERT INTO rapor_nilai_harian (id_siswa, id_mapel, id_kelas, id_tp, id_smt, p1, p2, p3, p4, p5, p6, p7, p8, p_rata_rata, p_predikat, p_deskripsi, k1, k2, k3, k4, k5, k6, k7, k8, k_rata_rata, k_predikat, k_deskripsi, jml) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiHarian->idSiswa);
		$sqlQuery->setNumber($raporNilaiHarian->idMapel);
		$sqlQuery->setNumber($raporNilaiHarian->idKelas);
		$sqlQuery->setNumber($raporNilaiHarian->idTp);
		$sqlQuery->setNumber($raporNilaiHarian->idSmt);
		$sqlQuery->set($raporNilaiHarian->p1);
		$sqlQuery->set($raporNilaiHarian->p2);
		$sqlQuery->set($raporNilaiHarian->p3);
		$sqlQuery->set($raporNilaiHarian->p4);
		$sqlQuery->set($raporNilaiHarian->p5);
		$sqlQuery->set($raporNilaiHarian->p6);
		$sqlQuery->set($raporNilaiHarian->p7);
		$sqlQuery->set($raporNilaiHarian->p8);
		$sqlQuery->set($raporNilaiHarian->pRataRata);
		$sqlQuery->set($raporNilaiHarian->pPredikat);
		$sqlQuery->set($raporNilaiHarian->pDeskripsi);
		$sqlQuery->set($raporNilaiHarian->k1);
		$sqlQuery->set($raporNilaiHarian->k2);
		$sqlQuery->set($raporNilaiHarian->k3);
		$sqlQuery->set($raporNilaiHarian->k4);
		$sqlQuery->set($raporNilaiHarian->k5);
		$sqlQuery->set($raporNilaiHarian->k6);
		$sqlQuery->set($raporNilaiHarian->k7);
		$sqlQuery->set($raporNilaiHarian->k8);
		$sqlQuery->set($raporNilaiHarian->kRataRata);
		$sqlQuery->set($raporNilaiHarian->kPredikat);
		$sqlQuery->set($raporNilaiHarian->kDeskripsi);
		$sqlQuery->setNumber($raporNilaiHarian->jml);

		$id = $this->executeInsert($sqlQuery);	
		$raporNilaiHarian->idNilaiHarian = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiHarianDTO raporNilaiHarian
 	 */
	public function update($raporNilaiHarian){
		$sql = 'UPDATE rapor_nilai_harian SET id_siswa = ?, id_mapel = ?, id_kelas = ?, id_tp = ?, id_smt = ?, p1 = ?, p2 = ?, p3 = ?, p4 = ?, p5 = ?, p6 = ?, p7 = ?, p8 = ?, p_rata_rata = ?, p_predikat = ?, p_deskripsi = ?, k1 = ?, k2 = ?, k3 = ?, k4 = ?, k5 = ?, k6 = ?, k7 = ?, k8 = ?, k_rata_rata = ?, k_predikat = ?, k_deskripsi = ?, jml = ? WHERE id_nilai_harian = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporNilaiHarian->idSiswa);
		$sqlQuery->setNumber($raporNilaiHarian->idMapel);
		$sqlQuery->setNumber($raporNilaiHarian->idKelas);
		$sqlQuery->setNumber($raporNilaiHarian->idTp);
		$sqlQuery->setNumber($raporNilaiHarian->idSmt);
		$sqlQuery->set($raporNilaiHarian->p1);
		$sqlQuery->set($raporNilaiHarian->p2);
		$sqlQuery->set($raporNilaiHarian->p3);
		$sqlQuery->set($raporNilaiHarian->p4);
		$sqlQuery->set($raporNilaiHarian->p5);
		$sqlQuery->set($raporNilaiHarian->p6);
		$sqlQuery->set($raporNilaiHarian->p7);
		$sqlQuery->set($raporNilaiHarian->p8);
		$sqlQuery->set($raporNilaiHarian->pRataRata);
		$sqlQuery->set($raporNilaiHarian->pPredikat);
		$sqlQuery->set($raporNilaiHarian->pDeskripsi);
		$sqlQuery->set($raporNilaiHarian->k1);
		$sqlQuery->set($raporNilaiHarian->k2);
		$sqlQuery->set($raporNilaiHarian->k3);
		$sqlQuery->set($raporNilaiHarian->k4);
		$sqlQuery->set($raporNilaiHarian->k5);
		$sqlQuery->set($raporNilaiHarian->k6);
		$sqlQuery->set($raporNilaiHarian->k7);
		$sqlQuery->set($raporNilaiHarian->k8);
		$sqlQuery->set($raporNilaiHarian->kRataRata);
		$sqlQuery->set($raporNilaiHarian->kPredikat);
		$sqlQuery->set($raporNilaiHarian->kDeskripsi);
		$sqlQuery->setNumber($raporNilaiHarian->jml);

		$sqlQuery->set($raporNilaiHarian->idNilaiHarian);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_nilai_harian';
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
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE ';
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

	public function queryByIdNilaiHarian($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_nilai_harian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP1($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP2($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP3($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP4($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP5($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP6($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP7($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByP8($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPRataRata($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p_rata_rata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPPredikat($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p_predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE p_deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK1($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK2($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK3($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK4($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK5($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK6($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK7($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByK8($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKRataRata($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k_rata_rata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKPredikat($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k_predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKDeskripsi($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE k_deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJml($value, $single = false){
		$sql = 'SELECT * FROM rapor_nilai_harian WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNilaiHarian($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_nilai_harian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP1($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP2($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP3($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP4($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP5($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP6($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP7($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByP8($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPRataRata($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p_rata_rata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPPredikat($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p_predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPDeskripsi($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE p_deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK1($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK2($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK3($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k3 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK4($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k4 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK5($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k5 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK6($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k6 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK7($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k7 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByK8($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k8 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKRataRata($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k_rata_rata = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKPredikat($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k_predikat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKDeskripsi($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE k_deskripsi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJml($value){
		$sql = 'DELETE FROM rapor_nilai_harian WHERE jml = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_nilai_harian';
		
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
	 * @return RaporNilaiHarianDTO
	 */
	protected function readRow($row){
		$raporNilaiHarian = new RaporNilaiHarianDTO();
		
		$raporNilaiHarian->idNilaiHarian = isset($row['id_nilai_harian']) ? $row['id_nilai_harian'] : null;
		$raporNilaiHarian->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporNilaiHarian->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$raporNilaiHarian->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporNilaiHarian->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporNilaiHarian->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporNilaiHarian->p1 = isset($row['p1']) ? $row['p1'] : null;
		$raporNilaiHarian->p2 = isset($row['p2']) ? $row['p2'] : null;
		$raporNilaiHarian->p3 = isset($row['p3']) ? $row['p3'] : null;
		$raporNilaiHarian->p4 = isset($row['p4']) ? $row['p4'] : null;
		$raporNilaiHarian->p5 = isset($row['p5']) ? $row['p5'] : null;
		$raporNilaiHarian->p6 = isset($row['p6']) ? $row['p6'] : null;
		$raporNilaiHarian->p7 = isset($row['p7']) ? $row['p7'] : null;
		$raporNilaiHarian->p8 = isset($row['p8']) ? $row['p8'] : null;
		$raporNilaiHarian->pRataRata = isset($row['p_rata_rata']) ? $row['p_rata_rata'] : null;
		$raporNilaiHarian->pPredikat = isset($row['p_predikat']) ? $row['p_predikat'] : null;
		$raporNilaiHarian->pDeskripsi = isset($row['p_deskripsi']) ? $row['p_deskripsi'] : null;
		$raporNilaiHarian->k1 = isset($row['k1']) ? $row['k1'] : null;
		$raporNilaiHarian->k2 = isset($row['k2']) ? $row['k2'] : null;
		$raporNilaiHarian->k3 = isset($row['k3']) ? $row['k3'] : null;
		$raporNilaiHarian->k4 = isset($row['k4']) ? $row['k4'] : null;
		$raporNilaiHarian->k5 = isset($row['k5']) ? $row['k5'] : null;
		$raporNilaiHarian->k6 = isset($row['k6']) ? $row['k6'] : null;
		$raporNilaiHarian->k7 = isset($row['k7']) ? $row['k7'] : null;
		$raporNilaiHarian->k8 = isset($row['k8']) ? $row['k8'] : null;
		$raporNilaiHarian->kRataRata = isset($row['k_rata_rata']) ? $row['k_rata_rata'] : null;
		$raporNilaiHarian->kPredikat = isset($row['k_predikat']) ? $row['k_predikat'] : null;
		$raporNilaiHarian->kDeskripsi = isset($row['k_deskripsi']) ? $row['k_deskripsi'] : null;
		$raporNilaiHarian->jml = isset($row['jml']) ? $row['jml'] : null;

		return $raporNilaiHarian;
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
	 * @return RaporNilaiHarianDTO
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