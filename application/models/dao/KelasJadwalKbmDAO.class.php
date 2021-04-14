<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasJadwalKbmDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasJadwalKbm 
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
 	 * @param kelasJadwalKbm primary key
 	 */
	public function delete($id_kbm);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalKbm kelasJadwalKbm
 	 */
	public function insert($kelasJadwalKbm);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalKbm kelasJadwalKbm
 	 */
	public function update($kelasJadwalKbm);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByKbmJamPel($value, $single);

	public function queryByKbmJamMulai($value, $single);

	public function queryByKbmJmlMapelHari($value, $single);

	public function queryByIstirahat($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdKelas($value);

	public function deleteByKbmJamPel($value);

	public function deleteByKbmJamMulai($value);

	public function deleteByKbmJmlMapelHari($value);

	public function deleteByIstirahat($value);


}
?>