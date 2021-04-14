<?php
/**
 * Class that operate on table 'rapor_fisik'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporFisikMySqlDAO implements RaporFisikDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporFisikDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_fisik';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_fisik ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporFisik primary key
 	 */
	public function delete($id_fisik){
		$sql = 'DELETE FROM rapor_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_fisik);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporFisikDTO raporFisik
 	 */
	public function insert($raporFisik){
		$sql = 'INSERT INTO rapor_fisik (id_kelas, id_siswa, id_tp, id_smt, kondisi, tinggi, berat) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporFisik->idKelas);
		$sqlQuery->setNumber($raporFisik->idSiswa);
		$sqlQuery->setNumber($raporFisik->idTp);
		$sqlQuery->setNumber($raporFisik->idSmt);
		$sqlQuery->set($raporFisik->kondisi);
		$sqlQuery->setNumber($raporFisik->tinggi);
		$sqlQuery->setNumber($raporFisik->berat);

		$id = $this->executeInsert($sqlQuery);	
		$raporFisik->idFisik = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporFisikDTO raporFisik
 	 */
	public function update($raporFisik){
		$sql = 'UPDATE rapor_fisik SET id_kelas = ?, id_siswa = ?, id_tp = ?, id_smt = ?, kondisi = ?, tinggi = ?, berat = ? WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporFisik->idKelas);
		$sqlQuery->setNumber($raporFisik->idSiswa);
		$sqlQuery->setNumber($raporFisik->idTp);
		$sqlQuery->setNumber($raporFisik->idSmt);
		$sqlQuery->set($raporFisik->kondisi);
		$sqlQuery->setNumber($raporFisik->tinggi);
		$sqlQuery->setNumber($raporFisik->berat);

		$sqlQuery->setNumber($raporFisik->idFisik);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_fisik';
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
		$sql = 'SELECT * FROM rapor_fisik WHERE ';
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

	public function queryByIdFisik($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdKelas($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSiswa($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTp($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdSmt($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKondisi($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE kondisi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTinggi($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE tinggi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBerat($value, $single = false){
		$sql = 'SELECT * FROM rapor_fisik WHERE berat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdFisik($value){
		$sql = 'DELETE FROM rapor_fisik WHERE id_fisik = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM rapor_fisik WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSiswa($value){
		$sql = 'DELETE FROM rapor_fisik WHERE id_siswa = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTp($value){
		$sql = 'DELETE FROM rapor_fisik WHERE id_tp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdSmt($value){
		$sql = 'DELETE FROM rapor_fisik WHERE id_smt = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKondisi($value){
		$sql = 'DELETE FROM rapor_fisik WHERE kondisi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTinggi($value){
		$sql = 'DELETE FROM rapor_fisik WHERE tinggi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBerat($value){
		$sql = 'DELETE FROM rapor_fisik WHERE berat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_fisik';
		
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
	 * @return RaporFisikDTO
	 */
	protected function readRow($row){
		$raporFisik = new RaporFisikDTO();
		
		$raporFisik->idFisik = isset($row['id_fisik']) ? $row['id_fisik'] : null;
		$raporFisik->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$raporFisik->idSiswa = isset($row['id_siswa']) ? $row['id_siswa'] : null;
		$raporFisik->idTp = isset($row['id_tp']) ? $row['id_tp'] : null;
		$raporFisik->idSmt = isset($row['id_smt']) ? $row['id_smt'] : null;
		$raporFisik->kondisi = isset($row['kondisi']) ? $row['kondisi'] : null;
		$raporFisik->tinggi = isset($row['tinggi']) ? $row['tinggi'] : null;
		$raporFisik->berat = isset($row['berat']) ? $row['berat'] : null;

		return $raporFisik;
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
	 * @return RaporFisikDTO
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