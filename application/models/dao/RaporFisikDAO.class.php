<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporFisikDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporFisik 
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
 	 * @param raporFisik primary key
 	 */
	public function delete($id_fisik);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporFisik raporFisik
 	 */
	public function insert($raporFisik);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporFisik raporFisik
 	 */
	public function update($raporFisik);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByKondisi($value, $single);

	public function queryByTinggi($value, $single);

	public function queryByBerat($value, $single);


	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByKondisi($value);

	public function deleteByTinggi($value);

	public function deleteByBerat($value);


}
?>