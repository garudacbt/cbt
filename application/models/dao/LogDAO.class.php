<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LogDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Log 
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
 	 * @param log primary key
 	 */
	public function delete($id_log);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Log log
 	 */
	public function insert($log);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Log log
 	 */
	public function update($log);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLogTime($value, $single);

	public function queryByIdUser($value, $single);

	public function queryByIdGroup($value, $single);

	public function queryByNameGroup($value, $single);

	public function queryByLogType($value, $single);

	public function queryByLogDesc($value, $single);

	public function queryByAddress($value, $single);

	public function queryByAgent($value, $single);

	public function queryByDevice($value, $single);


	public function deleteByLogTime($value);

	public function deleteByIdUser($value);

	public function deleteByIdGroup($value);

	public function deleteByNameGroup($value);

	public function deleteByLogType($value);

	public function deleteByLogDesc($value);

	public function deleteByAddress($value);

	public function deleteByAgent($value);

	public function deleteByDevice($value);


}
?>