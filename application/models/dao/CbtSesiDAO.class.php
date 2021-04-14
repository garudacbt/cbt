<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtSesiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtSesi 
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
 	 * @param cbtSesi primary key
 	 */
	public function delete($id_sesi);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSesi cbtSesi
 	 */
	public function insert($cbtSesi);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSesi cbtSesi
 	 */
	public function update($cbtSesi);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaSesi($value, $single);

	public function queryByKodeSesi($value, $single);

	public function queryByWaktuMulai($value, $single);

	public function queryByWaktuAkhir($value, $single);

	public function queryByAktif($value, $single);


	public function deleteByNamaSesi($value);

	public function deleteByKodeSesi($value);

	public function deleteByWaktuMulai($value);

	public function deleteByWaktuAkhir($value);

	public function deleteByAktif($value);


}
?>