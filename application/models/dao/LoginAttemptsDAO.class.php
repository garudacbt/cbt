<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LoginAttemptsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LoginAttempts 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param loginAttempt primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LoginAttempts loginAttempt
 	 */
	public function insert($loginAttempt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LoginAttempts loginAttempt
 	 */
	public function update($loginAttempt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIpAddress($value, $single);

	public function queryByLogin($value, $single);

	public function queryByTime($value, $single);


	public function deleteByIpAddress($value);

	public function deleteByLogin($value);

	public function deleteByTime($value);


}
?>