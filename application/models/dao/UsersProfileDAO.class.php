<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface UsersProfileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsersProfile 
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
 	 * @param usersProfile primary key
 	 */
	public function delete($id_user);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersProfile usersProfile
 	 */
	public function insert($usersProfile);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersProfile usersProfile
 	 */
	public function update($usersProfile);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaLengkap($value, $single);

	public function queryByJabatan($value, $single);

	public function queryByLevelAccess($value, $single);

	public function queryByFoto($value, $single);


	public function deleteByNamaLengkap($value);

	public function deleteByJabatan($value);

	public function deleteByLevelAccess($value);

	public function deleteByFoto($value);


}
?>