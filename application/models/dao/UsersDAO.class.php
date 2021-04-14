<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Users 
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
 	 * @param user primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Users user
 	 */
	public function insert($user);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Users user
 	 */
	public function update($user);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIpAddress($value, $single);

	public function queryByUsername($value, $single);

	public function queryByPassword($value, $single);

	public function queryByEmail($value, $single);

	public function queryByActivationSelector($value, $single);

	public function queryByActivationCode($value, $single);

	public function queryByForgottenPasswordSelector($value, $single);

	public function queryByForgottenPasswordCode($value, $single);

	public function queryByForgottenPasswordTime($value, $single);

	public function queryByRememberSelector($value, $single);

	public function queryByRememberCode($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryByLastLogin($value, $single);

	public function queryByActive($value, $single);

	public function queryByFirstName($value, $single);

	public function queryByLastName($value, $single);

	public function queryByCompany($value, $single);

	public function queryByPhone($value, $single);


	public function deleteByIpAddress($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByEmail($value);

	public function deleteByActivationSelector($value);

	public function deleteByActivationCode($value);

	public function deleteByForgottenPasswordSelector($value);

	public function deleteByForgottenPasswordCode($value);

	public function deleteByForgottenPasswordTime($value);

	public function deleteByRememberSelector($value);

	public function deleteByRememberCode($value);

	public function deleteByCreatedOn($value);

	public function deleteByLastLogin($value);

	public function deleteByActive($value);

	public function deleteByFirstName($value);

	public function deleteByLastName($value);

	public function deleteByCompany($value);

	public function deleteByPhone($value);


}
?>