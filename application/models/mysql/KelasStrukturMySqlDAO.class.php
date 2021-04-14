<?php
/**
 * Class that operate on table 'kelas_struktur'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
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
		$sqlQuery->setNumber($kelasStruktur->wakilKetua);
		$sqlQuery->setNumber($kelasStruktur->sekretaris1);
		$sqlQuery->setNumber($kelasStruktur->sekretaris2);
		$sqlQuery->setNumber($kelasStruktur->bendahara1);
		$sqlQuery->setNumber($kelasStruktur->bendahara2);
		$sqlQuery->setNumber($kelasStruktur->sieEkstrakurikuler);
		$sqlQuery->setNumber($kelasStruktur->sieUpacara);
		$sqlQuery->setNumber($kelasStruktur->sieOlahraga);
		$sqlQuery->setNumber($kelasStruktur->sieKeagamaan);
		$sqlQuery->setNumber($kelasStruktur->sieKeamanan);
		$sqlQuery->setNumber($kelasStruktur->sieKetertiban);
		$sqlQuery->setNumber($kelasStruktur->sieKebersihan);
		$sqlQuery->setNumber($kelasStruktur->sieKeindahan);
		$sqlQuery->setNumber($kelasStruktur->sieKesehatan);
		$sqlQuery->setNumber($kelasStruktur->sieKekeluargaan);
		$sqlQuery->setNumber($kelasStruktur->sieHumas);

		$id = $this->executeInsert($sqlQuery);	
		$kelasStruktur->idKelas = $id;
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
		$sqlQuery->setNumber($kelasStruktur->wakilKetua);
		$sqlQuery->setNumber($kelasStruktur->sekretaris1);
		$sqlQuery->setNumber($kelasStruktur->sekretaris2);
		$sqlQuery->setNumber($kelasStruktur->bendahara1);
		$sqlQuery->setNumber($kelasStruktur->bendahara2);
		$sqlQuery->setNumber($kelasStruktur->sieEkstrakurikuler);
		$sqlQuery->setNumber($kelasStruktur->sieUpacara);
		$sqlQuery->setNumber($kelasStruktur->sieOlahraga);
		$sqlQuery->setNumber($kelasStruktur->sieKeagamaan);
		$sqlQuery->setNumber($kelasStruktur->sieKeamanan);
		$sqlQuery->setNumber($kelasStruktur->sieKetertiban);
		$sqlQuery->setNumber($kelasStruktur->sieKebersihan);
		$sqlQuery->setNumber($kelasStruktur->sieKeindahan);
		$sqlQuery->setNumber($kelasStruktur->sieKesehatan);
		$sqlQuery->setNumber($kelasStruktur->sieKekeluargaan);
		$sqlQuery->setNumber($kelasStruktur->sieHumas);

		$sqlQuery->setNumber($kelasStruktur->idKelas);
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
		
		$kelasStruktur->idKelas = isset($row['id_kelas']) ? $row['id_kelas'] : null;
		$kelasStruktur->ketua = isset($row['ketua']) ? $row['ketua'] : null;
		$kelasStruktur->wakilKetua = isset($row['wakil_ketua']) ? $row['wakil_ketua'] : null;
		$kelasStruktur->sekretaris1 = isset($row['sekretaris_1']) ? $row['sekretaris_1'] : null;
		$kelasStruktur->sekretaris2 = isset($row['sekretaris_2']) ? $row['sekretaris_2'] : null;
		$kelasStruktur->bendahara1 = isset($row['bendahara_1']) ? $row['bendahara_1'] : null;
		$kelasStruktur->bendahara2 = isset($row['bendahara_2']) ? $row['bendahara_2'] : null;
		$kelasStruktur->sieEkstrakurikuler = isset($row['sie_ekstrakurikuler']) ? $row['sie_ekstrakurikuler'] : null;
		$kelasStruktur->sieUpacara = isset($row['sie_upacara']) ? $row['sie_upacara'] : null;
		$kelasStruktur->sieOlahraga = isset($row['sie_olahraga']) ? $row['sie_olahraga'] : null;
		$kelasStruktur->sieKeagamaan = isset($row['sie_keagamaan']) ? $row['sie_keagamaan'] : null;
		$kelasStruktur->sieKeamanan = isset($row['sie_keamanan']) ? $row['sie_keamanan'] : null;
		$kelasStruktur->sieKetertiban = isset($row['sie_ketertiban']) ? $row['sie_ketertiban'] : null;
		$kelasStruktur->sieKebersihan = isset($row['sie_kebersihan']) ? $row['sie_kebersihan'] : null;
		$kelasStruktur->sieKeindahan = isset($row['sie_keindahan']) ? $row['sie_keindahan'] : null;
		$kelasStruktur->sieKesehatan = isset($row['sie_kesehatan']) ? $row['sie_kesehatan'] : null;
		$kelasStruktur->sieKekeluargaan = isset($row['sie_kekeluargaan']) ? $row['sie_kekeluargaan'] : null;
		$kelasStruktur->sieHumas = isset($row['sie_humas']) ? $row['sie_humas'] : null;

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