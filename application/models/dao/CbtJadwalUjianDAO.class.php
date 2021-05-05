<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface CbtJadwalUjianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtJadwalUjian 
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
 	 * @param cbtJadwalUjian primary key
 	 */
	public function delete($id_jadwal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJadwalUjian cbtJadwalUjian
 	 */
	public function insert($cbtJadwalUjian);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJadwalUjian cbtJadwalUjian
 	 */
	public function update($cbtJadwalUjian);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByLevel($value, $single);

	public function queryByIdJenis($value, $single);

	public function queryByDari($value, $single);

	public function queryBySampai($value, $single);

	public function queryByJamMulai($value, $single);

	public function queryByJmlMapel($value, $single);

	public function queryByJmlIstirahat($value, $single);

	public function queryByDurasiMapel($value, $single);

	public function queryByDurasiIstirahat($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByLevel($value);

	public function deleteByIdJenis($value);

	public function deleteByDari($value);

	public function deleteBySampai($value);

	public function deleteByJamMulai($value);

	public function deleteByJmlMapel($value);

	public function deleteByJmlIstirahat($value);

	public function deleteByDurasiMapel($value);

	public function deleteByDurasiIstirahat($value);


}
?>