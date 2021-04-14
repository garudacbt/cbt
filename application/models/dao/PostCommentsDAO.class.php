<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface PostCommentsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PostComments 
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
 	 * @param postComment primary key
 	 */
	public function delete($id_comment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostComments postComment
 	 */
	public function insert($postComment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostComments postComment
 	 */
	public function update($postComment);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPost($value, $single);

	public function queryByDari($value, $single);

	public function queryByDariGroup($value, $single);

	public function queryByText($value, $single);

	public function queryByTanggal($value, $single);

	public function queryByUpdated($value, $single);


	public function deleteByIdPost($value);

	public function deleteByDari($value);

	public function deleteByDariGroup($value);

	public function deleteByText($value);

	public function deleteByTanggal($value);

	public function deleteByUpdated($value);


}
?>