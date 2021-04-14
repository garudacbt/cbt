<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtPengawasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtPengawas 
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
 	 * @param cbtPengawa primary key
 	 */
	public function delete($id_pengawas);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtPengawas cbtPengawa
 	 */
	public function insert($cbtPengawa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtPengawas cbtPengawa
 	 */
	public function update($cbtPengawa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdJadwal($value, $single);


	public function deleteByIdJadwal($value);


}
?>