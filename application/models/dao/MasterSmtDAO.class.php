<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterSmtDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterSmt 
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
 	 * @param masterSmt primary key
 	 */
	public function delete($id_smt);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterSmt masterSmt
 	 */
	public function insert($masterSmt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterSmt masterSmt
 	 */
	public function update($masterSmt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryBySmt($value, $single);

	public function queryByNamaSmt($value, $single);

	public function queryByActive($value, $single);


	public function deleteBySmt($value);

	public function deleteByNamaSmt($value);

	public function deleteByActive($value);


}
?>