<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
interface NotifikasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Notifikasi 
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
 	 * @param notifikasi primary key
 	 */
	public function delete($id_noty);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Notifikasi notifikasi
 	 */
	public function insert($notifikasi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Notifikasi notifikasi
 	 */
	public function update($notifikasi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdUser($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryBySubject($value, $single);

	public function queryByType($value, $single);

	public function queryByUserGroup($value, $single);


	public function deleteByIdUser($value);

	public function deleteByCreatedOn($value);

	public function deleteBySubject($value);

	public function deleteByType($value);

	public function deleteByUserGroup($value);


}
?>