<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterMapel 
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
 	 * @param masterMapel primary key
 	 */
	public function delete($id_mapel);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterMapel masterMapel
 	 */
	public function insert($masterMapel);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterMapel masterMapel
 	 */
	public function update($masterMapel);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaMapel($value, $single);

	public function queryByKode($value, $single);

	public function queryByKelompok($value, $single);

	public function queryByBobotP($value, $single);

	public function queryByBobotK($value, $single);

	public function queryByJenjang($value, $single);

	public function queryByUrutan($value, $single);

	public function queryByStatus($value, $single);

	public function queryByDeletable($value, $single);


	public function deleteByNamaMapel($value);

	public function deleteByKode($value);

	public function deleteByKelompok($value);

	public function deleteByBobotP($value);

	public function deleteByBobotK($value);

	public function deleteByJenjang($value);

	public function deleteByUrutan($value);

	public function deleteByStatus($value);

	public function deleteByDeletable($value);


}
?>