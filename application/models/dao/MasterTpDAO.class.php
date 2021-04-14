<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterTpDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterTp 
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
 	 * @param masterTp primary key
 	 */
	public function delete($id_tp);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterTp masterTp
 	 */
	public function insert($masterTp);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterTp masterTp
 	 */
	public function update($masterTp);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTahun($value, $single);

	public function queryByActive($value, $single);


	public function deleteByTahun($value);

	public function deleteByActive($value);


}
?>