<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface UsersGroupsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsersGroups 
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
 	 * @param usersGroup primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersGroups usersGroup
 	 */
	public function insert($usersGroup);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersGroups usersGroup
 	 */
	public function update($usersGroup);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value, $single);

	public function queryByGroupId($value, $single);


	public function deleteByUserId($value);

	public function deleteByGroupId($value);


}
?>