<?php
/**
 * Class that operate on table 'rapor_admin_setting'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class RaporAdminSettingMySqlDAO implements RaporAdminSettingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return RaporAdminSettingDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM rapor_admin_setting';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM rapor_admin_setting ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param raporAdminSetting primary key
 	 */
	public function delete($id_setting){
		$sql = 'DELETE FROM rapor_admin_setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_setting);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporAdminSettingDTO raporAdminSetting
 	 */
	public function insert($raporAdminSetting){
		$sql = 'INSERT INTO rapor_admin_setting (kkm_tunggal, kkm, bobot_ph, bobot_pts, bobot_pas, bobot_absen, tgl_rapor_akhir, tgl_rapor_pts) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporAdminSetting->kkmTunggal);
		$sqlQuery->setNumber($raporAdminSetting->kkm);
		$sqlQuery->setNumber($raporAdminSetting->bobotPh);
		$sqlQuery->setNumber($raporAdminSetting->bobotPts);
		$sqlQuery->setNumber($raporAdminSetting->bobotPas);
		$sqlQuery->setNumber($raporAdminSetting->bobotAbsen);
		$sqlQuery->set($raporAdminSetting->tglRaporAkhir);
		$sqlQuery->set($raporAdminSetting->tglRaporPts);

		$id = $this->executeInsert($sqlQuery);	
		$raporAdminSetting->idSetting = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporAdminSettingDTO raporAdminSetting
 	 */
	public function update($raporAdminSetting){
		$sql = 'UPDATE rapor_admin_setting SET kkm_tunggal = ?, kkm = ?, bobot_ph = ?, bobot_pts = ?, bobot_pas = ?, bobot_absen = ?, tgl_rapor_akhir = ?, tgl_rapor_pts = ? WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($raporAdminSetting->kkmTunggal);
		$sqlQuery->setNumber($raporAdminSetting->kkm);
		$sqlQuery->setNumber($raporAdminSetting->bobotPh);
		$sqlQuery->setNumber($raporAdminSetting->bobotPts);
		$sqlQuery->setNumber($raporAdminSetting->bobotPas);
		$sqlQuery->setNumber($raporAdminSetting->bobotAbsen);
		$sqlQuery->set($raporAdminSetting->tglRaporAkhir);
		$sqlQuery->set($raporAdminSetting->tglRaporPts);

		$sqlQuery->setNumber($raporAdminSetting->idSetting);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM rapor_admin_setting';
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
		$sql = 'SELECT * FROM rapor_admin_setting WHERE ';
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

	public function queryByIdSetting($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByKkmTunggal($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE kkm_tunggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKkm($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPh($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE bobot_ph = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPts($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE bobot_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotPas($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE bobot_pas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByBobotAbsen($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE bobot_absen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglRaporAkhir($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE tgl_rapor_akhir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTglRaporPts($value, $single = false){
		$sql = 'SELECT * FROM rapor_admin_setting WHERE tgl_rapor_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdSetting($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE id_setting = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKkmTunggal($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE kkm_tunggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKkm($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE kkm = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPh($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE bobot_ph = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPts($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE bobot_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotPas($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE bobot_pas = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBobotAbsen($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE bobot_absen = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglRaporAkhir($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE tgl_rapor_akhir = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTglRaporPts($value){
		$sql = 'DELETE FROM rapor_admin_setting WHERE tgl_rapor_pts = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from rapor_admin_setting';
		
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
	 * @return RaporAdminSettingDTO
	 */
	protected function readRow($row){
		$raporAdminSetting = new RaporAdminSettingDTO();
		
		$raporAdminSetting->idSetting = isset($row['id_setting']) ? $row['id_setting'] : null;
		$raporAdminSetting->kkmTunggal = isset($row['kkm_tunggal']) ? $row['kkm_tunggal'] : null;
		$raporAdminSetting->kkm = isset($row['kkm']) ? $row['kkm'] : null;
		$raporAdminSetting->bobotPh = isset($row['bobot_ph']) ? $row['bobot_ph'] : null;
		$raporAdminSetting->bobotPts = isset($row['bobot_pts']) ? $row['bobot_pts'] : null;
		$raporAdminSetting->bobotPas = isset($row['bobot_pas']) ? $row['bobot_pas'] : null;
		$raporAdminSetting->bobotAbsen = isset($row['bobot_absen']) ? $row['bobot_absen'] : null;
		$raporAdminSetting->tglRaporAkhir = isset($row['tgl_rapor_akhir']) ? $row['tgl_rapor_akhir'] : null;
		$raporAdminSetting->tglRaporPts = isset($row['tgl_rapor_pts']) ? $row['tgl_rapor_pts'] : null;

		return $raporAdminSetting;
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
	 * @return RaporAdminSettingDTO
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