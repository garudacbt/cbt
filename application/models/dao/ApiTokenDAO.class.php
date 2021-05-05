<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface ApiTokenDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ApiToken 
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
 	 * @param apiToken primary key
 	 */
	public function delete($id_api);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ApiToken apiToken
 	 */
	public function insert($apiToken);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ApiToken apiToken
 	 */
	public function update($apiToken);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTimestamp($value, $single);

	public function queryByIdUser($value, $single);

	public function queryByAddress($value, $single);

	public function queryByAgent($value, $single);

	public function queryByDevice($value, $single);

	public function queryByToken($value, $single);


	public function deleteByTimestamp($value);

	public function deleteByIdUser($value);

	public function deleteByAddress($value);

	public function deleteByAgent($value);

	public function deleteByDevice($value);

	public function deleteByToken($value);


}
?>