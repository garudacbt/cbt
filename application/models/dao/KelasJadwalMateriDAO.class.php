<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasJadwalMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasJadwalMateri 
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
 	 * @param kelasJadwalMateri primary key
 	 */
	public function delete($id_kjm);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasJadwalMateri kelasJadwalMateri
 	 */
	public function insert($kelasJadwalMateri);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasJadwalMateri kelasJadwalMateri
 	 */
	public function update($kelasJadwalMateri);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdMateri($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByJadwalMateri($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdMateri($value);

	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByJadwalMateri($value);


}
?>