<?php
/**
 * Class that operate on table 'kelas_tugas'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class KelasTugasMySqlDAO implements KelasTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasTugasDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_tugas';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_tugas ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasTuga primary key
 	 */
	public function delete($id_tugas){
		$sql = 'DELETE FROM kelas_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_tugas);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasTugasDTO kelasTuga
 	 */
	public function insert($kelasTuga){
		$sql = 'INSERT INTO kelas_tugas (id_tp, id_smt, kode_tugas, id_guru, tugas_kelas, id_mapel, nama_mapel, judul_tugas, isi_tugas, file, link_file, tgl_mulai, created_on, updated_on, status, tgl_selesai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasTuga->idTp);
		$sqlQuery->setNumber($kelasTuga->idSmt);
		$sqlQuery->set($kelasTuga->kodeTugas);
		$sqlQuery->setNumber($kelasTuga->idGuru);
		$sqlQuery->set($kelasTuga->tugasKelas);
		$sqlQuery->setNumber($kelasTuga->idMapel);
		$sqlQuery->set($kelasTuga->namaMapel);
		$sqlQuery->set($kelasTuga->judulTugas);
		$sqlQuery->set($kelasTuga->isiTugas);
		$sqlQuery->set($kelasTuga->file);
		$sqlQuery->set($kelasTuga->linkFile);
		$sqlQuery->set($kelasTuga->tglMulai);
		$sqlQuery->set($kelasTuga->createdOn);
		$sqlQuery->set($kelasTuga->updatedOn);
		$sqlQuery->setNumber($kelasTuga->status);
		$sqlQuery->set($kelasTuga->tglSelesai);

		$id = $this->executeInsert($sqlQuery);	
		$kelasTuga->idTugas = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasTugasDTO kelasTuga
 	 */
	public function update($kelasTuga){
		$sql = 'UPDATE kelas_tugas SET id_tp = ?, id_smt = ?, kode_tugas = ?, id_guru = ?, tugas_kelas = ?, id_mapel = ?, nama_mapel = ?, judul_tugas = ?, isi_tugas = ?, file = ?, link_file = ?, tgl_mulai = ?, created_on = ?, updated_on = ?, status = ?, tgl_selesai = ? WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasTuga->idTp);
		$sqlQuery->setNumber($kelasTuga->idSmt);
		$sqlQuery->set($kelasTuga->kodeTugas);
		$sqlQuery->setNumber($kelasTuga->idGuru);
		$sqlQuery->set($kelasTuga->tugasKelas);
		$sqlQuery->setNumber($kelasTuga->idMapel);
		$sqlQuery->set($kelasTuga->namaMapel);
		$sqlQuery->set($kelasTuga->judulTugas);
		$sqlQuery->set($kelasTuga->isiTugas);
		$sqlQuery->set($kelasTuga->file);
		$sqlQuery->set($kelasTuga->linkFile);
		$sqlQuery->set($kelasTuga->tglMulai);
		$sqlQuery->set($kelasTuga->createdOn);
		$sqlQuery->set($kelasTuga->updatedOn);
		$sqlQuery->setNumber($kelasTuga->status);
		$sqlQuery->set($kelasTuga->tglSelesai);

		$sqlQuery->setNumber($kelasTuga->idTugas);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_tugas';
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
		$sql = 'SELECT * FROM kelas_tugas WHERE ';
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

	public function queryByIdTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE kode_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTugasKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE tugas_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByNamaMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJudulTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE judul_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIsiTugas($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE isi_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLinkFile($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE link_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglMulai($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedOn($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglSelesai($value, $single = false){
		$sql = 'SELECT * FROM kelas_tugas WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdTugas($value){
		$sql = 'DELETE FROM kelas_tugas WHERE id_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_tugas WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_tugas WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeTugas($value){
		$sql = 'DELETE FROM kelas_tugas WHERE kode_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM kelas_tugas WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTugasKelas($value){
		$sql = 'DELETE FROM kelas_tugas WHERE tugas_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_tugas WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaMapel($value){
		$sql = 'DELETE FROM kelas_tugas WHERE nama_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJudulTugas($value){
		$sql = 'DELETE FROM kelas_tugas WHERE judul_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsiTugas($value){
		$sql = 'DELETE FROM kelas_tugas WHERE isi_tugas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM kelas_tugas WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkFile($value){
		$sql = 'DELETE FROM kelas_tugas WHERE link_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglMulai($value){
		$sql = 'DELETE FROM kelas_tugas WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM kelas_tugas WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedOn($value){
		$sql = 'DELETE FROM kelas_tugas WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM kelas_tugas WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglSelesai($value){
		$sql = 'DELETE FROM kelas_tugas WHERE tgl_selesai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_tugas';
		
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
	 * @return KelasTugasDTO
	 */
	protected function readRow($row){
		$kelasTuga = new KelasTugasDTO();
		
		$kelasTuga->idTugas = isset($row['id_tugas']) ? $row['id_tugas'] : null;
		$kelasTuga->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasTuga->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasTuga->kodeTugas = isset($row['kode_tugas']) ? $row['kode_tugas'] : null;
		$kelasTuga->idGuru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$kelasTuga->tugasKelas = isset($row['tugas_kelas']) ? $row['tugas_kelas'] : null;
		$kelasTuga->idMapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$kelasTuga->namaMapel = isset($row['nama_mapel']) ? $row['nama_mapel'] : null;
		$kelasTuga->judulTugas = isset($row['judul_tugas']) ? $row['judul_tugas'] : null;
		$kelasTuga->isiTugas = isset($row['isi_tugas']) ? $row['isi_tugas'] : null;
		$kelasTuga->file = isset($row['file']) ? $row['file'] : null;
		$kelasTuga->linkFile = isset($row['link_file']) ? $row['link_file'] : null;
		$kelasTuga->tglMulai = isset($row['tgl_mulai']) ? $row['tgl_mulai'] : null;
		$kelasTuga->createdOn = isset($row['created_on']) ? $row['created_on'] : null;
		$kelasTuga->updatedOn = isset($row['updated_on']) ? $row['updated_on'] : null;
		$kelasTuga->status = isset($row['status']) ? $row['status'] : null;
		$kelasTuga->tglSelesai = isset($row['tgl_selesai']) ? $row['tgl_selesai'] : null;

		return $kelasTuga;
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
	 * @return KelasTugasDTO
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