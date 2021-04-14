<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtJenisDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtJenis 
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
 	 * @param cbtJeni primary key
 	 */
	public function delete($id_jenis);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJenis cbtJeni
 	 */
	public function insert($cbtJeni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJenis cbtJeni
 	 */
	public function update($cbtJeni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaJenis($value, $single);

	public function queryByKodeJenis($value, $single);


	public function deleteByNamaJenis($value);

	public function deleteByKodeJenis($value);


}
?>