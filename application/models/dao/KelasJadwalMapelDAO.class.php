<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasJadwalMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasJadwalMapel 
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
 	 * @param kelasJadwalMapel primary key
 	 */
	public function delete($id_jadwal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalMapel kelasJadwalMapel
 	 */
	public function insert($kelasJadwalMapel);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalMapel kelasJadwalMapel
 	 */
	public function update($kelasJadwalMapel);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdHari($value, $single);

	public function queryByJamKe($value, $single);

	public function queryByIdMapel($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdKelas($value);

	public function deleteByIdHari($value);

	public function deleteByJamKe($value);

	public function deleteByIdMapel($value);


}
?>