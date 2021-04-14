<?php
/**
 * Class that operate on table 'cbt_durasi_siswa'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtDurasiSiswaMySqlDAO implements CbtDurasiSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtDurasiSiswaDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE id_durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_durasi_siswa';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_durasi_siswa ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtDurasiSiswa primary key
 	 */
	public function delete($id_durasi){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE id_durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_durasi);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtDurasiSiswaDTO cbtDurasiSiswa
 	 */
	public function insert($cbtDurasiSiswa){
		$sql = 'INSERT INTO cbt_durasi_siswa (id_siswa, id_jadwal, status, lama_ujian, mulai, selesai, reset) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtDurasiSiswa->idSiswa);
		$sqlQuery->setNumber($cbtDurasiSiswa->idJadwal);
		$sqlQuery->setNumber($cbtDurasiSiswa->status);
		$sqlQuery->setNumber($cbtDurasiSiswa->lamaUjian);
		$sqlQuery->set($cbtDurasiSiswa->mulai);
		$sqlQuery->set($cbtDurasiSiswa->selesai);
		$sqlQuery->setNumber($cbtDurasiSiswa->reset);

		$id = $this->executeInsert($sqlQuery);	
		$cbtDurasiSiswa->idDurasi = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtDurasiSiswaDTO cbtDurasiSiswa
 	 */
	public function update($cbtDurasiSiswa){
		$sql = 'UPDATE cbt_durasi_siswa SET id_siswa = ?, id_jadwal = ?, status = ?, lama_ujian = ?, mulai = ?, selesai = ?, reset = ? WHERE id_durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtDurasiSiswa->idSiswa);
		$sqlQuery->setNumber($cbtDurasiSiswa->idJadwal);
		$sqlQuery->setNumber($cbtDurasiSiswa->status);
		$sqlQuery->setNumber($cbtDurasiSiswa->lamaUjian);
		$sqlQuery->set($cbtDurasiSiswa->mulai);
		$sqlQuery->set($cbtDurasiSiswa->selesai);
		$sqlQuery->setNumber($cbtDurasiSiswa->reset);

		$sqlQuery->set($cbtDurasiSiswa->idDurasi);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_durasi_siswa';
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
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE ';
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

	public function queryByIdDurasi($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE id_durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdJadwal($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLamaUjian($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE lama_ujian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySelesai($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByReset($value, $single = false){
		$sql = 'SELECT * FROM cbt_durasi_siswa WHERE reset = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdDurasi($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE id_durasi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdJadwal($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE id_jadwal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLamaUjian($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE lama_ujian = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMulai($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySelesai($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByReset($value){
		$sql = 'DELETE FROM cbt_durasi_siswa WHERE reset = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_durasi_siswa';
		
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
	 * @return CbtDurasiSiswaDTO
	 */
	protected function readRow($row){
		$cbtDurasiSiswa = new CbtDurasiSiswaDTO();
		
		$cbtDurasiSiswa->idDurasi = isset($row['id_durasi']) ? $row['id_durasi'] : null;
		$cbtDurasiSiswa->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$cbtDurasiSiswa->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
		$cbtDurasiSiswa->status = isset($row['status']) ? $row['status'] : null;
		$cbtDurasiSiswa->lamaUjian = isset($row['lama_ujian']) ? $row['lama_ujian'] : null;
		$cbtDurasiSiswa->mulai = isset($row['mulai']) ? $row['mulai'] : null;
		$cbtDurasiSiswa->selesai = isset($row['selesai']) ? $row['selesai'] : null;
		$cbtDurasiSiswa->reset = isset($row['reset']) ? $row['reset'] : null;

		return $cbtDurasiSiswa;
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
	 * @return CbtDurasiSiswaDTO
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