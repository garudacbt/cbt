<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
interface PengumumanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pengumuman 
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
 	 * @param pengumuman primary key
 	 */
	public function delete($id_pengumuman);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pengumuman pengumuman
 	 */
	public function insert($pengumuman);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pengumuman pengumuman
 	 */
	public function update($pengumuman);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDate($value, $single);

	public function queryByDari($value, $single);

	public function queryByKepada($value, $single);

	public function queryByJudul($value, $single);

	public function queryByText($value, $single);


	public function deleteByDate($value);

	public function deleteByDari($value);

	public function deleteByKepada($value);

	public function deleteByJudul($value);

	public function deleteByText($value);


}
?>