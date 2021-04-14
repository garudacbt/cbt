<?php
/**
 * Class that operate on table 'master_kelas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class MasterKelasMySqlDAO implements MasterKelasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return MasterKelasDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM master_kelas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM master_kelas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM master_kelas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param masterKela primary key
 	 */
	public function delete($id_kelas){
		$sql = 'DELETE FROM master_kelas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kelas);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterKelasDTO masterKela
 	 */
	public function insert($masterKela){
		$sql = 'INSERT INTO master_kelas (id_tp, id_smt, nama_kelas, kode_kelas, jurusan_id, level_id, guru_id, siswa_id, jumlah_siswa, set_siswa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterKela->idTp);
		$sqlQuery->setNumber($masterKela->idSmt);
		$sqlQuery->set($masterKela->namaKelas);
		$sqlQuery->set($masterKela->kodeKelas);
		$sqlQuery->setNumber($masterKela->jurusanId);
		$sqlQuery->setNumber($masterKela->levelId);
		$sqlQuery->setNumber($masterKela->guruId);
		$sqlQuery->setNumber($masterKela->siswaId);
		$sqlQuery->set($masterKela->jumlahSiswa);
		$sqlQuery->set($masterKela->setSiswa);

		$id = $this->executeInsert($sqlQuery);	
		$masterKela->idKelas = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterKelasDTO masterKela
 	 */
	public function update($masterKela){
		$sql = 'UPDATE master_kelas SET id_tp = ?, id_smt = ?, nama_kelas = ?, kode_kelas = ?, jurusan_id = ?, level_id = ?, guru_id = ?, siswa_id = ?, jumlah_siswa = ?, set_siswa = ? WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($masterKela->idTp);
		$sqlQuery->setNumber($masterKela->idSmt);
		$sqlQuery->set($masterKela->namaKelas);
		$sqlQuery->set($masterKela->kodeKelas);
		$sqlQuery->setNumber($masterKela->jurusanId);
		$sqlQuery->setNumber($masterKela->levelId);
		$sqlQuery->setNumber($masterKela->guruId);
		$sqlQuery->setNumber($masterKela->siswaId);
		$sqlQuery->set($masterKela->jumlahSiswa);
		$sqlQuery->set($masterKela->setSiswa);

		$sqlQuery->setNumber($masterKela->idKelas);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM master_kelas';
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
		$sql = 'SELECT * FROM master_kelas WHERE ';
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

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaKelas($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE nama_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeKelas($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE kode_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJurusanId($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE jurusan_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLevelId($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE level_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByGuruId($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE guru_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySiswaId($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJumlahSiswa($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE jumlah_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySetSiswa($value, $single = false){
		$sql = 'SELECT * FROM master_kelas WHERE set_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM master_kelas WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM master_kelas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM master_kelas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaKelas($value){
		$sql = 'DELETE FROM master_kelas WHERE nama_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeKelas($value){
		$sql = 'DELETE FROM master_kelas WHERE kode_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJurusanId($value){
		$sql = 'DELETE FROM master_kelas WHERE jurusan_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLevelId($value){
		$sql = 'DELETE FROM master_kelas WHERE level_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGuruId($value){
		$sql = 'DELETE FROM master_kelas WHERE guru_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySiswaId($value){
		$sql = 'DELETE FROM master_kelas WHERE siswa_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJumlahSiswa($value){
		$sql = 'DELETE FROM master_kelas WHERE jumlah_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySetSiswa($value){
		$sql = 'DELETE FROM master_kelas WHERE set_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from master_kelas';
		
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
	 * @return MasterKelasDTO
	 */
	protected function readRow($row){
		$masterKela = new MasterKelasDTO();
		
		$masterKela->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$masterKela->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$masterKela->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$masterKela->namaKelas = isset($row['nama_kelas']) ? $row['nama_kelas'] : null;
		$masterKela->kodeKelas = isset($row['kode_kelas']) ? $row['kode_kelas'] : null;
		$masterKela->jurusanId = isset($row['jurusan_id']) ? $row['jurusan_id'] : null;
		$masterKela->levelId = isset($row['level_id']) ? $row['level_id'] : null;
		$masterKela->guruId = isset($row['guru_id']) ? $row['guru_id'] : null;
		$masterKela->siswaId = isset($row['siswa_id']) ? $row['siswa_id'] : null;
		$masterKela->jumlahSiswa = isset($row['jumlah_siswa']) ? $row['jumlah_siswa'] : null;
		$masterKela->setSiswa = isset($row['set_siswa']) ? $row['set_siswa'] : null;

		return $masterKela;
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
	 * @return MasterKelasDTO
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