<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtTokenDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtToken 
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
 	 * @param cbtToken primary key
 	 */
	public function delete($id_token);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtToken cbtToken
 	 */
	public function insert($cbtToken);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtToken cbtToken
 	 */
	public function update($cbtToken);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByToken($value, $single);

	public function queryByAuto($value, $single);


	public function deleteByToken($value);

	public function deleteByAuto($value);


}
?>