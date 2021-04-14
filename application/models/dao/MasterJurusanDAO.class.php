<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterJurusanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterJurusan 
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
 	 * @param masterJurusan primary key
 	 */
	public function delete($id_jurusan);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterJurusan masterJurusan
 	 */
	public function insert($masterJurusan);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterJurusan masterJurusan
 	 */
	public function update($masterJurusan);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaJurusan($value, $single);

	public function queryByKodeJurusan($value, $single);

	public function queryByStatus($value, $single);

	public function queryByDeletable($value, $single);


	public function deleteByNamaJurusan($value);

	public function deleteByKodeJurusan($value);

	public function deleteByStatus($value);

	public function deleteByDeletable($value);


}
?>