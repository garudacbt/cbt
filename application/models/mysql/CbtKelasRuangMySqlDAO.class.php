<?php
/**
 * Class that operate on table 'cbt_kelas_ruang'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtKelasRuangMySqlDAO implements CbtKelasRuangDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtKelasRuangDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_kelas_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_kelas_ruang';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_kelas_ruang ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtKelasRuang primary key
 	 */
	public function delete($id_kelas_ruang){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_kelas_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($id_kelas_ruang);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKelasRuangDTO cbtKelasRuang
 	 */
	public function insert($cbtKelasRuang){
		$sql = 'INSERT INTO cbt_kelas_ruang (id_kelas, id_ruang, id_sesi, id_tp, id_smt, set_siswa) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtKelasRuang->idKelas);
		$sqlQuery->setNumber($cbtKelasRuang->idRuang);
		$sqlQuery->setNumber($cbtKelasRuang->idSesi);
		$sqlQuery->setNumber($cbtKelasRuang->idTp);
		$sqlQuery->setNumber($cbtKelasRuang->idSmt);
		$sqlQuery->setNumber($cbtKelasRuang->setSiswa);

		$id = $this->executeInsert($sqlQuery);	
		$cbtKelasRuang->idKelasRuang = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKelasRuangDTO cbtKelasRuang
 	 */
	public function update($cbtKelasRuang){
		$sql = 'UPDATE cbt_kelas_ruang SET id_kelas = ?, id_ruang = ?, id_sesi = ?, id_tp = ?, id_smt = ?, set_siswa = ? WHERE id_kelas_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cbtKelasRuang->idKelas);
		$sqlQuery->setNumber($cbtKelasRuang->idRuang);
		$sqlQuery->setNumber($cbtKelasRuang->idSesi);
		$sqlQuery->setNumber($cbtKelasRuang->idTp);
		$sqlQuery->setNumber($cbtKelasRuang->idSmt);
		$sqlQuery->setNumber($cbtKelasRuang->setSiswa);

		$sqlQuery->set($cbtKelasRuang->idKelasRuang);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_kelas_ruang';
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
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE ';
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

	public function queryByIdKelasRuang($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_kelas_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdRuang($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSesi($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySetSiswa($value, $single = false){
		$sql = 'SELECT * FROM cbt_kelas_ruang WHERE set_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKelasRuang($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_kelas_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdRuang($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_ruang = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSesi($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySetSiswa($value){
		$sql = 'DELETE FROM cbt_kelas_ruang WHERE set_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_kelas_ruang';
		
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
	 * @return CbtKelasRuangDTO
	 */
	protected function readRow($row){
		$cbtKelasRuang = new CbtKelasRuangDTO();
		
		$cbtKelasRuang->idKelasRuang = isset($row['id_kelas_ruang']) ? $row['id_kelas_ruang'] : null;
		$cbtKelasRuang->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$cbtKelasRuang->idRuang = isset($row['id_ruang']) ? $row['id_ruang'] : null;
		$cbtKelasRuang->idSesi = isset($row['id_sesi']) ? $row['id_sesi'] : null;
		$cbtKelasRuang->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$cbtKelasRuang->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$cbtKelasRuang->setSiswa = isset($row['set_siswa']) ? $row['set_siswa'] : null;

		return $cbtKelasRuang;
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
	 * @return CbtKelasRuangDTO
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