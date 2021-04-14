<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtJawabanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtJawaban 
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
 	 * @param cbtJawaban primary key
 	 */
	public function delete($id_jawaban);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJawaban cbtJawaban
 	 */
	public function insert($cbtJawaban);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJawaban cbtJawaban
 	 */
	public function update($cbtJawaban);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByJawaban($value, $single);

	public function queryByJawabanBenar($value, $single);

	public function queryByKoreksi($value, $single);


	public function deleteByJawaban($value);

	public function deleteByJawabanBenar($value);

	public function deleteByKoreksi($value);


}
?>