<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporPrestasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporPrestasi 
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
 	 * @param raporPrestasi primary key
 	 */
	public function delete($id_ranking);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporPrestasi raporPrestasi
 	 */
	public function insert($raporPrestasi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporPrestasi raporPrestasi
 	 */
	public function update($raporPrestasi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByRanking($value, $single);

	public function queryByDeskripsi($value, $single);

	public function queryByP1($value, $single);

	public function queryByP1Desk($value, $single);

	public function queryByP2($value, $single);

	public function queryByP2Desk($value, $single);

	public function queryByP3($value, $single);

	public function queryByP3Desk($value, $single);


	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByRanking($value);

	public function deleteByDeskripsi($value);

	public function deleteByP1($value);

	public function deleteByP1Desk($value);

	public function deleteByP2($value);

	public function deleteByP2Desk($value);

	public function deleteByP3($value);

	public function deleteByP3Desk($value);


}
?>