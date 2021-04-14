<?php
/**
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class UsersMySqlDAO implements UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsersDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM users';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM users ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param user primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersDTO user
 	 */
	public function insert($user){
		$sql = 'INSERT INTO users (ip_address, username, password, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->ipAddress);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->activationSelector);
		$sqlQuery->set($user->activationCode);
		$sqlQuery->set($user->forgottenPasswordSelector);
		$sqlQuery->set($user->forgottenPasswordCode);
		$sqlQuery->setNumber($user->forgottenPasswordTime);
		$sqlQuery->set($user->rememberSelector);
		$sqlQuery->set($user->rememberCode);
		$sqlQuery->setNumber($user->createdOn);
		$sqlQuery->setNumber($user->lastLogin);
		$sqlQuery->setNumber($user->active);
		$sqlQuery->set($user->firstName);
		$sqlQuery->set($user->lastName);
		$sqlQuery->set($user->company);
		$sqlQuery->set($user->phone);

		$id = $this->executeInsert($sqlQuery);	
		$user->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersDTO user
 	 */
	public function update($user){
		$sql = 'UPDATE users SET ip_address = ?, username = ?, password = ?, email = ?, activation_selector = ?, activation_code = ?, forgotten_password_selector = ?, forgotten_password_code = ?, forgotten_password_time = ?, remember_selector = ?, remember_code = ?, created_on = ?, last_login = ?, active = ?, first_name = ?, last_name = ?, company = ?, phone = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($user->ipAddress);
		$sqlQuery->set($user->username);
		$sqlQuery->set($user->password);
		$sqlQuery->set($user->email);
		$sqlQuery->set($user->activationSelector);
		$sqlQuery->set($user->activationCode);
		$sqlQuery->set($user->forgottenPasswordSelector);
		$sqlQuery->set($user->forgottenPasswordCode);
		$sqlQuery->setNumber($user->forgottenPasswordTime);
		$sqlQuery->set($user->rememberSelector);
		$sqlQuery->set($user->rememberCode);
		$sqlQuery->setNumber($user->createdOn);
		$sqlQuery->setNumber($user->lastLogin);
		$sqlQuery->setNumber($user->active);
		$sqlQuery->set($user->firstName);
		$sqlQuery->set($user->lastName);
		$sqlQuery->set($user->company);
		$sqlQuery->set($user->phone);

		$sqlQuery->setNumber($user->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM users';
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
		$sql = 'SELECT * FROM users WHERE ';
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

	public function queryById($value, $single = false){
		$sql = 'SELECT * FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIpAddress($value, $single = false){
		$sql = 'SELECT * FROM users WHERE ip_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUsername($value, $single = false){
		$sql = 'SELECT * FROM users WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPassword($value, $single = false){
		$sql = 'SELECT * FROM users WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value, $single = false){
		$sql = 'SELECT * FROM users WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByActivationSelector($value, $single = false){
		$sql = 'SELECT * FROM users WHERE activation_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByActivationCode($value, $single = false){
		$sql = 'SELECT * FROM users WHERE activation_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByForgottenPasswordSelector($value, $single = false){
		$sql = 'SELECT * FROM users WHERE forgotten_password_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByForgottenPasswordCode($value, $single = false){
		$sql = 'SELECT * FROM users WHERE forgotten_password_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByForgottenPasswordTime($value, $single = false){
		$sql = 'SELECT * FROM users WHERE forgotten_password_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRememberSelector($value, $single = false){
		$sql = 'SELECT * FROM users WHERE remember_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByRememberCode($value, $single = false){
		$sql = 'SELECT * FROM users WHERE remember_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM users WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLastLogin($value, $single = false){
		$sql = 'SELECT * FROM users WHERE last_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByActive($value, $single = false){
		$sql = 'SELECT * FROM users WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByFirstName($value, $single = false){
		$sql = 'SELECT * FROM users WHERE first_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByLastName($value, $single = false){
		$sql = 'SELECT * FROM users WHERE last_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCompany($value, $single = false){
		$sql = 'SELECT * FROM users WHERE company = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value, $single = false){
		$sql = 'SELECT * FROM users WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteById($value){
		$sql = 'DELETE FROM users WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIpAddress($value){
		$sql = 'DELETE FROM users WHERE ip_address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsername($value){
		$sql = 'DELETE FROM users WHERE username = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM users WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM users WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActivationSelector($value){
		$sql = 'DELETE FROM users WHERE activation_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActivationCode($value){
		$sql = 'DELETE FROM users WHERE activation_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByForgottenPasswordSelector($value){
		$sql = 'DELETE FROM users WHERE forgotten_password_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByForgottenPasswordCode($value){
		$sql = 'DELETE FROM users WHERE forgotten_password_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByForgottenPasswordTime($value){
		$sql = 'DELETE FROM users WHERE forgotten_password_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRememberSelector($value){
		$sql = 'DELETE FROM users WHERE remember_selector = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRememberCode($value){
		$sql = 'DELETE FROM users WHERE remember_code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM users WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastLogin($value){
		$sql = 'DELETE FROM users WHERE last_login = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByActive($value){
		$sql = 'DELETE FROM users WHERE active = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFirstName($value){
		$sql = 'DELETE FROM users WHERE first_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLastName($value){
		$sql = 'DELETE FROM users WHERE last_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCompany($value){
		$sql = 'DELETE FROM users WHERE company = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM users WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from users';
		
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
	 * @return UsersDTO
	 */
	protected function readRow($row){
		$user = new UsersDTO();
		
		$user->id = isset($row['id']) ? $row['id'] : null;
		$user->ipAddress = isset($row['ip_address']) ? $row['ip_address'] : null;
		$user->username = isset($row['username']) ? $row['username'] : null;
		$user->password = isset($row['password']) ? $row['password'] : null;
		$user->email = isset($row['email']) ? $row['email'] : null;
		$user->activationSelector = isset($row['activation_selector']) ? $row['activation_selector'] : null;
		$user->activationCode = isset($row['activation_code']) ? $row['activation_code'] : null;
		$user->forgottenPasswordSelector = isset($row['forgotten_password_selector']) ? $row['forgotten_password_selector'] : null;
		$user->forgottenPasswordCode = isset($row['forgotten_password_code']) ? $row['forgotten_password_code'] : null;
		$user->forgottenPasswordTime = isset($row['forgotten_password_time']) ? $row['forgotten_password_time'] : null;
		$user->rememberSelector = isset($row['remember_selector']) ? $row['remember_selector'] : null;
		$user->rememberCode = isset($row['remember_code']) ? $row['remember_code'] : null;
		$user->createdOn = isset($row['created_on']) ? $row['created_on'] : null;
		$user->lastLogin = isset($row['last_login']) ? $row['last_login'] : null;
		$user->active = isset($row['active']) ? $row['active'] : null;
		$user->firstName = isset($row['first_name']) ? $row['first_name'] : null;
		$user->lastName = isset($row['last_name']) ? $row['last_name'] : null;
		$user->company = isset($row['company']) ? $row['company'] : null;
		$user->phone = isset($row['phone']) ? $row['phone'] : null;

		return $user;
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
	 * @return UsersDTO
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