<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-04 15:32
 */
interface RaporDataSikapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporDataSikap 
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
 	 * @param raporDataSikap primary key
 	 */
	public function delete($id_sikap);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporDataSikap raporDataSikap
 	 */
	public function insert($raporDataSikap);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporDataSikap raporDataSikap
 	 */
	public function update($raporDataSikap);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByJenis($value, $single);

	public function queryByKode($value, $single);

	public function queryBySikap($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdKelas($value);

	public function deleteByJenis($value);

	public function deleteByKode($value);

	public function deleteBySikap($value);


}
?>