<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporDataCatatanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporDataCatatan 
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
 	 * @param raporDataCatatan primary key
 	 */
	public function delete($id_catatan);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataCatatan raporDataCatatan
 	 */
	public function insert($raporDataCatatan);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataCatatan raporDataCatatan
 	 */
	public function update($raporDataCatatan);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdKelas($value, $single);

	public function queryByJenis($value, $single);

	public function queryByKode($value, $single);

	public function queryByDeskripsi($value, $single);

	public function queryByRank($value, $single);


	public function deleteByIdKelas($value);

	public function deleteByJenis($value);

	public function deleteByKode($value);

	public function deleteByDeskripsi($value);

	public function deleteByRank($value);


}
?>