<?php
/**
 * Class that operate on table 'kelas_struktur'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class KelasStrukturMySqlDAO implements KelasStrukturDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return KelasStrukturDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM kelas_struktur WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM kelas_struktur';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM kelas_struktur ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param kelasStruktur primary key
 	 */
	public function delete($id_kelas){
		$sql = 'DELETE FROM kelas_struktur WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_kelas);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasStrukturDTO kelasStruktur
 	 */
	public function insert($kelasStruktur){
		$sql = 'INSERT INTO kelas_struktur (ketua, wakil_ketua, sekretaris_1, sekretaris_2, bendahara_1, bendahara_2, sie_ekstrakurikuler, sie_upacara, sie_olahraga, sie_keagamaan, sie_keamanan, sie_ketertiban, sie_kebersihan, sie_keindahan, sie_kesehatan, sie_kekeluargaan, sie_humas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasStruktur->ketua);
		$sqlQuery->setNumber($kelasStruktur->wakil_ketua);
		$sqlQuery->setNumber($kelasStruktur->sekretaris_1);
		$sqlQuery->setNumber($kelasStruktur->sekretaris_2);
		$sqlQuery->setNumber($kelasStruktur->bendahara_1);
		$sqlQuery->setNumber($kelasStruktur->bendahara_2);
		$sqlQuery->setNumber($kelasStruktur->sie_ekstrakurikuler);
		$sqlQuery->setNumber($kelasStruktur->sie_upacara);
		$sqlQuery->setNumber($kelasStruktur->sie_olahraga);
		$sqlQuery->setNumber($kelasStruktur->sie_keagamaan);
		$sqlQuery->setNumber($kelasStruktur->sie_keamanan);
		$sqlQuery->setNumber($kelasStruktur->sie_ketertiban);
		$sqlQuery->setNumber($kelasStruktur->sie_kebersihan);
		$sqlQuery->setNumber($kelasStruktur->sie_keindahan);
		$sqlQuery->setNumber($kelasStruktur->sie_kesehatan);
		$sqlQuery->setNumber($kelasStruktur->sie_kekeluargaan);
		$sqlQuery->setNumber($kelasStruktur->sie_humas);

		$id = $this->executeInsert($sqlQuery);	
		$kelasStruktur->id_kelas = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasStrukturDTO kelasStruktur
 	 */
	public function update($kelasStruktur){
		$sql = 'UPDATE kelas_struktur SET ketua = ?, wakil_ketua = ?, sekretaris_1 = ?, sekretaris_2 = ?, bendahara_1 = ?, bendahara_2 = ?, sie_ekstrakurikuler = ?, sie_upacara = ?, sie_olahraga = ?, sie_keagamaan = ?, sie_keamanan = ?, sie_ketertiban = ?, sie_kebersihan = ?, sie_keindahan = ?, sie_kesehatan = ?, sie_kekeluargaan = ?, sie_humas = ? WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($kelasStruktur->ketua);
		$sqlQuery->setNumber($kelasStruktur->wakil_ketua);
		$sqlQuery->setNumber($kelasStruktur->sekretaris_1);
		$sqlQuery->setNumber($kelasStruktur->sekretaris_2);
		$sqlQuery->setNumber($kelasStruktur->bendahara_1);
		$sqlQuery->setNumber($kelasStruktur->bendahara_2);
		$sqlQuery->setNumber($kelasStruktur->sie_ekstrakurikuler);
		$sqlQuery->setNumber($kelasStruktur->sie_upacara);
		$sqlQuery->setNumber($kelasStruktur->sie_olahraga);
		$sqlQuery->setNumber($kelasStruktur->sie_keagamaan);
		$sqlQuery->setNumber($kelasStruktur->sie_keamanan);
		$sqlQuery->setNumber($kelasStruktur->sie_ketertiban);
		$sqlQuery->setNumber($kelasStruktur->sie_kebersihan);
		$sqlQuery->setNumber($kelasStruktur->sie_keindahan);
		$sqlQuery->setNumber($kelasStruktur->sie_kesehatan);
		$sqlQuery->setNumber($kelasStruktur->sie_kekeluargaan);
		$sqlQuery->setNumber($kelasStruktur->sie_humas);

		$sqlQuery->setNumber($kelasStruktur->id_kelas);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM kelas_struktur';
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
		$sql = 'SELECT * FROM kelas_struktur WHERE ';
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
		$sql = 'SELECT * FROM kelas_struktur WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByKetua($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE ketua = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByWakilKetua($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE wakil_ketua = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySekretaris1($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sekretaris_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySekretaris2($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sekretaris_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBendahara1($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE bendahara_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBendahara2($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE bendahara_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieEkstrakurikuler($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_ekstrakurikuler = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieUpacara($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_upacara = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieOlahraga($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_olahraga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKeagamaan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_keagamaan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKeamanan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_keamanan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKetertiban($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_ketertiban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKebersihan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_kebersihan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKeindahan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_keindahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKesehatan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_kesehatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieKekeluargaan($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_kekeluargaan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySieHumas($value, $single = false){
		$sql = 'SELECT * FROM kelas_struktur WHERE sie_humas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdKelas($value){
		$sql = 'DELETE FROM kelas_struktur WHERE id_kelas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKetua($value){
		$sql = 'DELETE FROM kelas_struktur WHERE ketua = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWakilKetua($value){
		$sql = 'DELETE FROM kelas_struktur WHERE wakil_ketua = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySekretaris1($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sekretaris_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySekretaris2($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sekretaris_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBendahara1($value){
		$sql = 'DELETE FROM kelas_struktur WHERE bendahara_1 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBendahara2($value){
		$sql = 'DELETE FROM kelas_struktur WHERE bendahara_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieEkstrakurikuler($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_ekstrakurikuler = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieUpacara($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_upacara = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieOlahraga($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_olahraga = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKeagamaan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_keagamaan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKeamanan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_keamanan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKetertiban($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_ketertiban = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKebersihan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_kebersihan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKeindahan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_keindahan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKesehatan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_kesehatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieKekeluargaan($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_kekeluargaan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySieHumas($value){
		$sql = 'DELETE FROM kelas_struktur WHERE sie_humas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from kelas_struktur';
		
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
	 * @return KelasStrukturDTO
	 */
	protected function readRow($row){
		$kelasStruktur = new KelasStrukturDTO();
		
		$kelasStruktur->id_kelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasStruktur->ketua = isset($row['ketua']) ? $row['ketua'] : null;
		$kelasStruktur->wakil_ketua = isset($row['wakil_ketua']) ? $row['wakil_ketua'] : null;
		$kelasStruktur->sekretaris_1 = isset($row['sekretaris_1']) ? $row['sekretaris_1'] : null;
		$kelasStruktur->sekretaris_2 = isset($row['sekretaris_2']) ? $row['sekretaris_2'] : null;
		$kelasStruktur->bendahara_1 = isset($row['bendahara_1']) ? $row['bendahara_1'] : null;
		$kelasStruktur->bendahara_2 = isset($row['bendahara_2']) ? $row['bendahara_2'] : null;
		$kelasStruktur->sie_ekstrakurikuler = isset($row['sie_ekstrakurikuler']) ? $row['sie_ekstrakurikuler'] : null;
		$kelasStruktur->sie_upacara = isset($row['sie_upacara']) ? $row['sie_upacara'] : null;
		$kelasStruktur->sie_olahraga = isset($row['sie_olahraga']) ? $row['sie_olahraga'] : null;
		$kelasStruktur->sie_keagamaan = isset($row['sie_keagamaan']) ? $row['sie_keagamaan'] : null;
		$kelasStruktur->sie_keamanan = isset($row['sie_keamanan']) ? $row['sie_keamanan'] : null;
		$kelasStruktur->sie_ketertiban = isset($row['sie_ketertiban']) ? $row['sie_ketertiban'] : null;
		$kelasStruktur->sie_kebersihan = isset($row['sie_kebersihan']) ? $row['sie_kebersihan'] : null;
		$kelasStruktur->sie_keindahan = isset($row['sie_keindahan']) ? $row['sie_keindahan'] : null;
		$kelasStruktur->sie_kesehatan = isset($row['sie_kesehatan']) ? $row['sie_kesehatan'] : null;
		$kelasStruktur->sie_kekeluargaan = isset($row['sie_kekeluargaan']) ? $row['sie_kekeluargaan'] : null;
		$kelasStruktur->sie_humas = isset($row['sie_humas']) ? $row['sie_humas'] : null;

		return $kelasStruktur;
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
	 * @return KelasStrukturDTO
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