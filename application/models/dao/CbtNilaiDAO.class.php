<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtNilaiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtNilai 
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
 	 * @param cbtNilai primary key
 	 */
	public function delete($id_nilai);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtNilai cbtNilai
 	 */
	public function insert($cbtNilai);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtNilai cbtNilai
 	 */
	public function update($cbtNilai);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPgBenar($value, $single);

	public function queryByPgNilai($value, $single);

	public function queryByEssaiNilai($value, $single);


	public function deleteByPgBenar($value);

	public function deleteByPgNilai($value);

	public function deleteByEssaiNilai($value);


}
?>