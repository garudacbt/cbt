<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RunningTextDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RunningText 
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
 	 * @param runningText primary key
 	 */
	public function delete($id_text);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RunningText runningText
 	 */
	public function insert($runningText);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RunningText runningText
 	 */
	public function update($runningText);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByText($value, $single);


	public function deleteByText($value);


}
?>