<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtRuangDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtRuang 
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
 	 * @param cbtRuang primary key
 	 */
	public function delete($id_ruang);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRuang cbtRuang
 	 */
	public function insert($cbtRuang);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRuang cbtRuang
 	 */
	public function update($cbtRuang);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaRuang($value, $single);

	public function queryByKodeRuang($value, $single);


	public function deleteByNamaRuang($value);

	public function deleteByKodeRuang($value);


}
?>