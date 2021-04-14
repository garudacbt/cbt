<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LevelKelasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LevelKelas 
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
 	 * @param levelKela primary key
 	 */
	public function delete($id_level);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LevelKelas levelKela
 	 */
	public function insert($levelKela);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LevelKelas levelKela
 	 */
	public function update($levelKela);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLevel($value, $single);


	public function deleteByLevel($value);


}
?>