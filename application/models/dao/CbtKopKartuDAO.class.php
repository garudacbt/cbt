<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtKopKartuDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtKopKartu 
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
 	 * @param cbtKopKartu primary key
 	 */
	public function delete($id_set_kartu);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopKartu cbtKopKartu
 	 */
	public function insert($cbtKopKartu);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopKartu cbtKopKartu
 	 */
	public function update($cbtKopKartu);	

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