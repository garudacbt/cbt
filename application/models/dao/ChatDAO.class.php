<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
interface ChatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Chat 
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
 	 * @param chat primary key
 	 */
	public function delete($id_chat);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Chat chat
 	 */
	public function insert($chat);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Chat chat
 	 */
	public function update($chat);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdFrom($value, $single);

	public function queryByIdTo($value, $single);

	public function queryByIdReplyTo($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryByUpdatedOn($value, $single);

	public function queryBySubject($value, $single);


	public function deleteByIdFrom($value);

	public function deleteByIdTo($value);

	public function deleteByIdReplyTo($value);

	public function deleteByCreatedOn($value);

	public function deleteByUpdatedOn($value);

	public function deleteBySubject($value);


}
?>