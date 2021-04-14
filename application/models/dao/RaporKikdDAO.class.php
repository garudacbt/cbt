<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporKikdDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporKikd 
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
 	 * @param raporKikd primary key
 	 */
	public function delete($id_kikd);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporKikd raporKikd
 	 */
	public function insert($raporKikd);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporKikd raporKikd
 	 */
	public function update($raporKikd);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdMapelKelas($value, $single);

	public function queryByAspek($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByMateriKikd($value, $single);


	public function deleteByIdMapelKelas($value);

	public function deleteByAspek($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByMateriKikd($value);


}
?>