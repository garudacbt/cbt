<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface RaporNaikDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNaik 
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
 	 * @param raporNaik primary key
 	 */
	public function delete($id_naik);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNaik raporNaik
 	 */
	public function insert($raporNaik);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNaik raporNaik
 	 */
	public function update($raporNaik);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByNaik($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdSiswa($value);

	public function deleteByNaik($value);


}
?>