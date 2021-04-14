<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtKopAbsensiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtKopAbsensi 
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
 	 * @param cbtKopAbsensi primary key
 	 */
	public function delete($id_kop);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopAbsensi cbtKopAbsensi
 	 */
	public function insert($cbtKopAbsensi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopAbsensi cbtKopAbsensi
 	 */
	public function update($cbtKopAbsensi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByHeader1($value, $single);

	public function queryByHeader2($value, $single);

	public function queryByHeader3($value, $single);

	public function queryByHeader4($value, $single);

	public function queryByProktor($value, $single);

	public function queryByPengawas1($value, $single);

	public function queryByPengawas2($value, $single);


	public function deleteByHeader1($value);

	public function deleteByHeader2($value);

	public function deleteByHeader3($value);

	public function deleteByHeader4($value);

	public function deleteByProktor($value);

	public function deleteByPengawas1($value);

	public function deleteByPengawas2($value);


}
?>