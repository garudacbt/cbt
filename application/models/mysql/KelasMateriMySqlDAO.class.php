<?php
/**
 * Class that operate on table 'kelas_materi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class KelasMateriMySqlDAO implements KelasMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasMateriDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_materi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_materi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasMateri primary key
 	 */
	public function delete($id_materi){
		$sql = 'DELETE FROM kelas_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_materi);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasMateriDTO kelasMateri
 	 */
	public function insert($kelasMateri){
		$sql = 'INSERT INTO kelas_materi (id_tp, id_smt, kode_materi, id_guru, materi_kelas, id_mapel, kode_mapel, judul_materi, isi_materi, file, link_file, tgl_mulai, created_on, updated_on, status, youtube) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasMateri->id_tp);
		$sqlQuery->setNumber($kelasMateri->id_smt);
		$sqlQuery->set($kelasMateri->kode_materi);
		$sqlQuery->setNumber($kelasMateri->id_guru);
		$sqlQuery->set($kelasMateri->materi_kelas);
		$sqlQuery->setNumber($kelasMateri->id_mapel);
		$sqlQuery->set($kelasMateri->kode_mapel);
		$sqlQuery->set($kelasMateri->judul_materi);
		$sqlQuery->set($kelasMateri->isi_materi);
		$sqlQuery->set($kelasMateri->file);
		$sqlQuery->set($kelasMateri->link_file);
		$sqlQuery->set($kelasMateri->tgl_mulai);
		$sqlQuery->set($kelasMateri->created_on);
		$sqlQuery->set($kelasMateri->updated_on);
		$sqlQuery->setNumber($kelasMateri->status);
		$sqlQuery->set($kelasMateri->youtube);

		$id = $this->executeInsert($sqlQuery);	
		$kelasMateri->id_materi = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasMateriDTO kelasMateri
 	 */
	public function update($kelasMateri){
		$sql = 'UPDATE kelas_materi SET id_tp = ?, id_smt = ?, kode_materi = ?, id_guru = ?, materi_kelas = ?, id_mapel = ?, kode_mapel = ?, judul_materi = ?, isi_materi = ?, file = ?, link_file = ?, tgl_mulai = ?, created_on = ?, updated_on = ?, status = ?, youtube = ? WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasMateri->id_tp);
		$sqlQuery->setNumber($kelasMateri->id_smt);
		$sqlQuery->set($kelasMateri->kode_materi);
		$sqlQuery->setNumber($kelasMateri->id_guru);
		$sqlQuery->set($kelasMateri->materi_kelas);
		$sqlQuery->setNumber($kelasMateri->id_mapel);
		$sqlQuery->set($kelasMateri->kode_mapel);
		$sqlQuery->set($kelasMateri->judul_materi);
		$sqlQuery->set($kelasMateri->isi_materi);
		$sqlQuery->set($kelasMateri->file);
		$sqlQuery->set($kelasMateri->link_file);
		$sqlQuery->set($kelasMateri->tgl_mulai);
		$sqlQuery->set($kelasMateri->created_on);
		$sqlQuery->set($kelasMateri->updated_on);
		$sqlQuery->setNumber($kelasMateri->status);
		$sqlQuery->set($kelasMateri->youtube);

		$sqlQuery->setNumber($kelasMateri->id_materi);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_materi';
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
		$sql = 'SELECT * FROM kelas_materi WHERE ';
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

	public function queryByIdMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE kode_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdGuru($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByMateriKelas($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE materi_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeMapel($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE kode_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJudulMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE judul_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIsiMateri($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE isi_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFile($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLinkFile($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE link_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglMulai($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedOn($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByYoutube($value, $single = false){
		$sql = 'SELECT * FROM kelas_materi WHERE youtube = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdMateri($value){
		$sql = 'DELETE FROM kelas_materi WHERE id_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM kelas_materi WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM kelas_materi WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeMateri($value){
		$sql = 'DELETE FROM kelas_materi WHERE kode_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdGuru($value){
		$sql = 'DELETE FROM kelas_materi WHERE id_guru = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByMateriKelas($value){
		$sql = 'DELETE FROM kelas_materi WHERE materi_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdMapel($value){
		$sql = 'DELETE FROM kelas_materi WHERE id_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeMapel($value){
		$sql = 'DELETE FROM kelas_materi WHERE kode_mapel = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJudulMateri($value){
		$sql = 'DELETE FROM kelas_materi WHERE judul_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIsiMateri($value){
		$sql = 'DELETE FROM kelas_materi WHERE isi_materi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFile($value){
		$sql = 'DELETE FROM kelas_materi WHERE file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinkFile($value){
		$sql = 'DELETE FROM kelas_materi WHERE link_file = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglMulai($value){
		$sql = 'DELETE FROM kelas_materi WHERE tgl_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM kelas_materi WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedOn($value){
		$sql = 'DELETE FROM kelas_materi WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM kelas_materi WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByYoutube($value){
		$sql = 'DELETE FROM kelas_materi WHERE youtube = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_materi';
		
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
	 * @return KelasMateriDTO
	 */
	protected function readRow($row){
		$kelasMateri = new KelasMateriDTO();
		
		$kelasMateri->id_materi = isset($row['id_materi']) ? $row['id_materi'] : null;
		$kelasMateri->id_tp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$kelasMateri->id_smt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$kelasMateri->kode_materi = isset($row['kode_materi']) ? $row['kode_materi'] : null;
		$kelasMateri->id_guru = isset($row['id_guru']) ? $row['id_guru'] : null;
		$kelasMateri->materi_kelas = isset($row['materi_kelas']) ? $row['materi_kelas'] : null;
		$kelasMateri->id_mapel = isset($row['id_mapel']) ? $row['id_mapel'] : null;
		$kelasMateri->kode_mapel = isset($row['kode_mapel']) ? $row['kode_mapel'] : null;
		$kelasMateri->judul_materi = isset($row['judul_materi']) ? $row['judul_materi'] : null;
		$kelasMateri->isi_materi = isset($row['isi_materi']) ? $row['isi_materi'] : null;
		$kelasMateri->file = isset($row['file']) ? $row['file'] : null;
		$kelasMateri->link_file = isset($row['link_file']) ? $row['link_file'] : null;
		$kelasMateri->tgl_mulai = isset($row['tgl_mulai']) ? $row['tgl_mulai'] : null;
		$kelasMateri->created_on = isset($row['created_on']) ? $row['created_on'] : null;
		$kelasMateri->updated_on = isset($row['updated_on']) ? $row['updated_on'] : null;
		$kelasMateri->status = isset($row['status']) ? $row['status'] : null;
		$kelasMateri->youtube = isset($row['youtube']) ? $row['youtube'] : null;

		return $kelasMateri;
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
	 * @return KelasMateriDTO
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