<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface PostDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Post 
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
 	 * @param post primary key
 	 */
	public function delete($id_post);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Post post
 	 */
	public function insert($post);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Post post
 	 */
	public function update($post);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDari($value, $single);

	public function queryByDariGroup($value, $single);

	public function queryByKepada($value, $single);

	public function queryByText($value, $single);

	public function queryByTanggal($value, $single);

	public function queryByUpdated($value, $single);


	public function deleteByDari($value);

	public function deleteByDariGroup($value);

	public function deleteByKepada($value);

	public function deleteByText($value);

	public function deleteByTanggal($value);

	public function deleteByUpdated($value);


}
?>