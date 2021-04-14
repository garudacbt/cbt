<?php
/**
 * Class that operate on table 'users_profile'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class UsersProfileMySqlDAO implements UsersProfileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsersProfileDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM users_profile WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM users_profile';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM users_profile ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usersProfile primary key
 	 */
	public function delete($id_user){
		$sql = 'DELETE FROM users_profile WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_user);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersProfileDTO usersProfile
 	 */
	public function insert($usersProfile){
		$sql = 'INSERT INTO users_profile (nama_lengkap, jabatan, level_access, foto) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usersProfile->namaLengkap);
		$sqlQuery->set($usersProfile->jabatan);
		$sqlQuery->setNumber($usersProfile->levelAccess);
		$sqlQuery->set($usersProfile->foto);

		$id = $this->executeInsert($sqlQuery);	
		$usersProfile->idUser = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersProfileDTO usersProfile
 	 */
	public function update($usersProfile){
		$sql = 'UPDATE users_profile SET nama_lengkap = ?, jabatan = ?, level_access = ?, foto = ? WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usersProfile->namaLengkap);
		$sqlQuery->set($usersProfile->jabatan);
		$sqlQuery->setNumber($usersProfile->levelAccess);
		$sqlQuery->set($usersProfile->foto);

		$sqlQuery->setNumber($usersProfile->idUser);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM users_profile';
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
		$sql = 'SELECT * FROM users_profile WHERE ';
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

	public function queryByIdUser($value, $single = false){
		$sql = 'SELECT * FROM users_profile WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByNamaLengkap($value, $single = false){
		$sql = 'SELECT * FROM users_profile WHERE nama_lengkap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJabatan($value, $single = false){
		$sql = 'SELECT * FROM users_profile WHERE jabatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLevelAccess($value, $single = false){
		$sql = 'SELECT * FROM users_profile WHERE level_access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFoto($value, $single = false){
		$sql = 'SELECT * FROM users_profile WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdUser($value){
		$sql = 'DELETE FROM users_profile WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNamaLengkap($value){
		$sql = 'DELETE FROM users_profile WHERE nama_lengkap = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJabatan($value){
		$sql = 'DELETE FROM users_profile WHERE jabatan = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLevelAccess($value){
		$sql = 'DELETE FROM users_profile WHERE level_access = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFoto($value){
		$sql = 'DELETE FROM users_profile WHERE foto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from users_profile';
		
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
	 * @return UsersProfileDTO
	 */
	protected function readRow($row){
		$usersProfile = new UsersProfileDTO();
		
		$usersProfile->idUser = isset($row['id_user']) ? $row['id_user'] : null;
		$usersProfile->namaLengkap = isset($row['nama_lengkap']) ? $row['nama_lengkap'] : null;
		$usersProfile->jabatan = isset($row['jabatan']) ? $row['jabatan'] : null;
		$usersProfile->levelAccess = isset($row['level_access']) ? $row['level_access'] : null;
		$usersProfile->foto = isset($row['foto']) ? $row['foto'] : null;

		return $usersProfile;
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
	 * @return UsersProfileDTO
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