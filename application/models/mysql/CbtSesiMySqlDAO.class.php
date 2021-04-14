<?php
/**
 * Class that operate on table 'cbt_sesi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class CbtSesiMySqlDAO implements CbtSesiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CbtSesiDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM cbt_sesi WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cbt_sesi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cbt_sesi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cbtSesi primary key
 	 */
	public function delete($id_sesi){
		$sql = 'DELETE FROM cbt_sesi WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_sesi);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSesiDTO cbtSesi
 	 */
	public function insert($cbtSesi){
		$sql = 'INSERT INTO cbt_sesi (nama_sesi, kode_sesi, waktu_mulai, waktu_akhir, aktif) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtSesi->namaSesi);
		$sqlQuery->set($cbtSesi->kodeSesi);
		$sqlQuery->set($cbtSesi->waktuMulai);
		$sqlQuery->set($cbtSesi->waktuAkhir);
		$sqlQuery->setNumber($cbtSesi->aktif);

		$id = $this->executeInsert($sqlQuery);	
		$cbtSesi->idSesi = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSesiDTO cbtSesi
 	 */
	public function update($cbtSesi){
		$sql = 'UPDATE cbt_sesi SET nama_sesi = ?, kode_sesi = ?, waktu_mulai = ?, waktu_akhir = ?, aktif = ? WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cbtSesi->namaSesi);
		$sqlQuery->set($cbtSesi->kodeSesi);
		$sqlQuery->set($cbtSesi->waktuMulai);
		$sqlQuery->set($cbtSesi->waktuAkhir);
		$sqlQuery->setNumber($cbtSesi->aktif);

		$sqlQuery->setNumber($cbtSesi->idSesi);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cbt_sesi';
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
		$sql = 'SELECT * FROM cbt_sesi WHERE ';
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

	public function queryByIdSesi($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaSesi($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE nama_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKodeSesi($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE kode_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByWaktuMulai($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE waktu_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByWaktuAkhir($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE waktu_akhir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAktif($value, $single = false){
		$sql = 'SELECT * FROM cbt_sesi WHERE aktif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSesi($value){
		$sql = 'DELETE FROM cbt_sesi WHERE id_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaSesi($value){
		$sql = 'DELETE FROM cbt_sesi WHERE nama_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKodeSesi($value){
		$sql = 'DELETE FROM cbt_sesi WHERE kode_sesi = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWaktuMulai($value){
		$sql = 'DELETE FROM cbt_sesi WHERE waktu_mulai = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWaktuAkhir($value){
		$sql = 'DELETE FROM cbt_sesi WHERE waktu_akhir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAktif($value){
		$sql = 'DELETE FROM cbt_sesi WHERE aktif = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from cbt_sesi';
		
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
	 * @return CbtSesiDTO
	 */
	protected function readRow($row){
		$cbtSesi = new CbtSesiDTO();
		
		$cbtSesi->idSesi = isset($row['id_sesi']) ? $row['id_sesi'] : null;
		$cbtSesi->namaSesi = isset($row['nama_sesi']) ? $row['nama_sesi'] : null;
		$cbtSesi->kodeSesi = isset($row['kode_sesi']) ? $row['kode_sesi'] : null;
		$cbtSesi->waktuMulai = isset($row['waktu_mulai']) ? $row['waktu_mulai'] : null;
		$cbtSesi->waktuAkhir = isset($row['waktu_akhir']) ? $row['waktu_akhir'] : null;
		$cbtSesi->aktif = isset($row['aktif']) ? $row['aktif'] : null;

		return $cbtSesi;
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
	 * @return CbtSesiDTO
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