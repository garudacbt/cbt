<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtKopBeritaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtKopBerita 
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
 	 * @param cbtKopBerita primary key
 	 */
	public function delete($id_kop);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKopBerita cbtKopBerita
 	 */
	public function insert($cbtKopBerita);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKopBerita cbtKopBerita
 	 */
	public function update($cbtKopBerita);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByHeader1($value, $single);

	public function queryByHeader2($value, $single);

	public function queryByHeader3($value, $single);

	public function queryByHeader4($value, $single);


	public function deleteByHeader1($value);

	public function deleteByHeader2($value);

	public function deleteByHeader3($value);

	public function deleteByHeader4($value);


}
?>