<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface HariDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Hari 
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
 	 * @param hari primary key
 	 */
	public function delete($id_hri);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Hari hari
 	 */
	public function insert($hari);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Hari hari
 	 */
	public function update($hari);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaHri($value, $single);


	public function deleteByNamaHri($value);


}
?>