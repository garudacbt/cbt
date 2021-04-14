<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface LogTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LogTugas 
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
 	 * @param logTuga primary key
 	 */
	public function delete($id_log);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LogTugas logTuga
 	 */
	public function insert($logTuga);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LogTugas logTuga
 	 */
	public function update($logTuga);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByLogTime($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByJamKe($value, $single);

	public function queryByIdTugas($value, $single);

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

	public function deleteByIdTugas($value);

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