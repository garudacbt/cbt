<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporNilaiHarianDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNilaiHarian 
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
 	 * @param raporNilaiHarian primary key
 	 */
	public function delete($id_nilai_harian);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiHarian raporNilaiHarian
 	 */
	public function insert($raporNilaiHarian);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiHarian raporNilaiHarian
 	 */
	public function update($raporNilaiHarian);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSiswa($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByP1($value, $single);

	public function queryByP2($value, $single);

	public function queryByP3($value, $single);

	public function queryByP4($value, $single);

	public function queryByP5($value, $single);

	public function queryByP6($value, $single);

	public function queryByP7($value, $single);

	public function queryByP8($value, $single);

	public function queryByPRataRata($value, $single);

	public function queryByPPredikat($value, $single);

	public function queryByPDeskripsi($value, $single);

	public function queryByK1($value, $single);

	public function queryByK2($value, $single);

	public function queryByK3($value, $single);

	public function queryByK4($value, $single);

	public function queryByK5($value, $single);

	public function queryByK6($value, $single);

	public function queryByK7($value, $single);

	public function queryByK8($value, $single);

	public function queryByKRataRata($value, $single);

	public function queryByKPredikat($value, $single);

	public function queryByKDeskripsi($value, $single);

	public function queryByJml($value, $single);


	public function deleteByIdSiswa($value);

	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByP1($value);

	public function deleteByP2($value);

	public function deleteByP3($value);

	public function deleteByP4($value);

	public function deleteByP5($value);

	public function deleteByP6($value);

	public function deleteByP7($value);

	public function deleteByP8($value);

	public function deleteByPRataRata($value);

	public function deleteByPPredikat($value);

	public function deleteByPDeskripsi($value);

	public function deleteByK1($value);

	public function deleteByK2($value);

	public function deleteByK3($value);

	public function deleteByK4($value);

	public function deleteByK5($value);

	public function deleteByK6($value);

	public function deleteByK7($value);

	public function deleteByK8($value);

	public function deleteByKRataRata($value);

	public function deleteByKPredikat($value);

	public function deleteByKDeskripsi($value);

	public function deleteByJml($value);


}
?>