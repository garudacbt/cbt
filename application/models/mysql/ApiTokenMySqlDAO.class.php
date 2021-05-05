<?php
/**
 * Class that operate on table 'api_token'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
class ApiTokenMySqlDAO implements ApiTokenDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ApiTokenDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM api_token WHERE id_api = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM api_token';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM api_token ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param apiToken primary key
 	 */
	public function delete($id_api){
		$sql = 'DELETE FROM api_token WHERE id_api = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_api);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApiTokenDTO apiToken
 	 */
	public function insert($apiToken){
		$sql = 'INSERT INTO api_token (timestamp, id_user, address, agent, device, token) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apiToken->timestamp);
		$sqlQuery->setNumber($apiToken->id_user);
		$sqlQuery->set($apiToken->address);
		$sqlQuery->set($apiToken->agent);
		$sqlQuery->set($apiToken->device);
		$sqlQuery->set($apiToken->token);

		$id = $this->executeInsert($sqlQuery);	
		$apiToken->id_api = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApiTokenDTO apiToken
 	 */
	public function update($apiToken){
		$sql = 'UPDATE api_token SET timestamp = ?, id_user = ?, address = ?, agent = ?, device = ?, token = ? WHERE id_api = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($apiToken->timestamp);
		$sqlQuery->setNumber($apiToken->id_user);
		$sqlQuery->set($apiToken->address);
		$sqlQuery->set($apiToken->agent);
		$sqlQuery->set($apiToken->device);
		$sqlQuery->set($apiToken->token);

		$sqlQuery->setNumber($apiToken->id_api);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM api_token';
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
		$sql = 'SELECT * FROM api_token WHERE ';
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

	public function queryByIdApi($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE id_api = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByTimestamp($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE timestamp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdUser($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByAgent($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDevice($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByToken($value, $single = false){
		$sql = 'SELECT * FROM api_token WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdApi($value){
		$sql = 'DELETE FROM api_token WHERE id_api = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTimestamp($value){
		$sql = 'DELETE FROM api_token WHERE timestamp = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUser($value){
		$sql = 'DELETE FROM api_token WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM api_token WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAgent($value){
		$sql = 'DELETE FROM api_token WHERE agent = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDevice($value){
		$sql = 'DELETE FROM api_token WHERE device = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByToken($value){
		$sql = 'DELETE FROM api_token WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from api_token';
		
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
	 * @return ApiTokenDTO
	 */
	protected function readRow($row){
		$apiToken = new ApiTokenDTO();
		
		$apiToken->id_api = isset($row['id_api']) ? $row['id_api'] : null;
		$apiToken->timestamp = isset($row['timestamp']) ? $row['timestamp'] : null;
		$apiToken->id_user = isset($row['id_user']) ? $row['id_user'] : null;
		$apiToken->address = isset($row['address']) ? $row['address'] : null;
		$apiToken->agent = isset($row['agent']) ? $row['agent'] : null;
		$apiToken->device = isset($row['device']) ? $row['device'] : null;
		$apiToken->token = isset($row['token']) ? $row['token'] : null;

		return $apiToken;
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
	 * @return ApiTokenDTO
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