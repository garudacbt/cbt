<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface PostReplyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PostReply 
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
 	 * @param postReply primary key
 	 */
	public function delete($id_reply);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostReply postReply
 	 */
	public function insert($postReply);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostReply postReply
 	 */
	public function update($postReply);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdComment($value, $single);

	public function queryByDari($value, $single);

	public function queryByDariGroup($value, $single);

	public function queryByText($value, $single);

	public function queryByTanggal($value, $single);

	public function queryByUpdated($value, $single);


	public function deleteByIdComment($value);

	public function deleteByDari($value);

	public function deleteByDariGroup($value);

	public function deleteByText($value);

	public function deleteByTanggal($value);

	public function deleteByUpdated($value);


}
?>