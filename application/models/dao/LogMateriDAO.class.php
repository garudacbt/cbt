<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LogMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LogMateri 
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
 	 * @param logMateri primary key
 	 */
	public function delete($id_log);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogMateri logMateri
 	 */
	public function insert($logMateri);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogMateri logMateri
 	 */
	public function update($logMateri);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLogTime($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByJamKe($value, $single);

	public function queryByIdMateri($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByLogType($value, $single);

	public function queryByLogDesc($value, $single);

	public function queryByText($value, $single);

	public function queryByFile($value, $single);

	public function queryByNilai($value, $single);

	public function queryByCatatan($value, $single);

	public function queryByAddress($value, $single);

	public function queryByAgent($value, $single);

	public function queryByDevice($value, $single);


	public function deleteByLogTime($value);

	public function deleteByIdSiswa($value);

	public function deleteByJamKe($value);

	public function deleteByIdMateri($value);

	public function deleteByIdMapel($value);

	public function deleteByLogType($value);

	public function deleteByLogDesc($value);

	public function deleteByText($value);

	public function deleteByFile($value);

	public function deleteByNilai($value);

	public function deleteByCatatan($value);

	public function deleteByAddress($value);

	public function deleteByAgent($value);

	public function deleteByDevice($value);


}
?>