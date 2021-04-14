<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasJadwalTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasJadwalTugas 
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
 	 * @param kelasJadwalTuga primary key
 	 */
	public function delete($id_kjt);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalTugas kelasJadwalTuga
 	 */
	public function insert($kelasJadwalTuga);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalTugas kelasJadwalTuga
 	 */
	public function update($kelasJadwalTuga);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdTugas($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByJadwalTugas($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdTugas($value);

	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByJadwalTugas($value);


}
?>