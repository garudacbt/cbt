<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
interface CbtKartuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtKartu 
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
 	 * @param cbtKartu primary key
 	 */
	public function delete($id_set_kartu);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKartu cbtKartu
 	 */
	public function insert($cbtKartu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKartu cbtKartu
 	 */
	public function update($cbtKartu);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByHeader1($value, $single);

	public function queryByHeader2($value, $single);

	public function queryByHeader3($value, $single);

	public function queryByHeader4($value, $single);

	public function queryByTanggal($value, $single);


	public function deleteByHeader1($value);

	public function deleteByHeader2($value);

	public function deleteByHeader3($value);

	public function deleteByHeader4($value);

	public function deleteByTanggal($value);


}
?>