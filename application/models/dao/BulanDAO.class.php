<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface BulanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Bulan 
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
 	 * @param bulan primary key
 	 */
	public function delete($id_bln);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Bulan bulan
 	 */
	public function insert($bulan);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Bulan bulan
 	 */
	public function update($bulan);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaBln($value, $single);


	public function deleteByNamaBln($value);


}
?>