<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterHariEfektifDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterHariEfektif 
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
 	 * @param masterHariEfektif primary key
 	 */
	public function delete($id_hari_efektif);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterHariEfektif masterHariEfektif
 	 */
	public function insert($masterHariEfektif);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterHariEfektif masterHariEfektif
 	 */
	public function update($masterHariEfektif);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByJmlHariEfektif($value, $single);


	public function deleteByJmlHariEfektif($value);


}
?>