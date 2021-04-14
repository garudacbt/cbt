<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LogUjianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LogUjian 
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
 	 * @param logUjian primary key
 	 */
	public function delete($id_log);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogUjian logUjian
 	 */
	public function insert($logUjian);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogUjian logUjian
 	 */
	public function update($logUjian);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLogTime($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdJadwal($value, $single);

	public function queryByLogType($value, $single);

	public function queryByLogDesc($value, $single);

	public function queryByAddress($value, $single);

	public function queryByAgent($value, $single);

	public function queryByDevice($value, $single);


	public function deleteByLogTime($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdJadwal($value);

	public function deleteByLogType($value);

	public function deleteByLogDesc($value);

	public function deleteByAddress($value);

	public function deleteByAgent($value);

	public function deleteByDevice($value);


}
?>