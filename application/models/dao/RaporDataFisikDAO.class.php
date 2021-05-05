<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface RaporDataFisikDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporDataFisik 
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
 	 * @param raporDataFisik primary key
 	 */
	public function delete($id_fisik);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataFisik raporDataFisik
 	 */
	public function insert($raporDataFisik);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataFisik raporDataFisik
 	 */
	public function update($raporDataFisik);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByJenis($value, $single);

	public function queryByKode($value, $single);

	public function queryByDeskripsi($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdKelas($value);

	public function deleteByJenis($value);

	public function deleteByKode($value);

	public function deleteByDeskripsi($value);


}
?>