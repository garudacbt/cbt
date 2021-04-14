<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasStrukturDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasStruktur 
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
 	 * @param kelasStruktur primary key
 	 */
	public function delete($id_kelas);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasStruktur kelasStruktur
 	 */
	public function insert($kelasStruktur);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasStruktur kelasStruktur
 	 */
	public function update($kelasStruktur);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByKetua($value, $single);

	public function queryByWakilKetua($value, $single);

	public function queryBySekretaris1($value, $single);

	public function queryBySekretaris2($value, $single);

	public function queryByBendahara1($value, $single);

	public function queryByBendahara2($value, $single);

	public function queryBySieEkstrakurikuler($value, $single);

	public function queryBySieUpacara($value, $single);

	public function queryBySieOlahraga($value, $single);

	public function queryBySieKeagamaan($value, $single);

	public function queryBySieKeamanan($value, $single);

	public function queryBySieKetertiban($value, $single);

	public function queryBySieKebersihan($value, $single);

	public function queryBySieKeindahan($value, $single);

	public function queryBySieKesehatan($value, $single);

	public function queryBySieKekeluargaan($value, $single);

	public function queryBySieHumas($value, $single);


	public function deleteByKetua($value);

	public function deleteByWakilKetua($value);

	public function deleteBySekretaris1($value);

	public function deleteBySekretaris2($value);

	public function deleteByBendahara1($value);

	public function deleteByBendahara2($value);

	public function deleteBySieEkstrakurikuler($value);

	public function deleteBySieUpacara($value);

	public function deleteBySieOlahraga($value);

	public function deleteBySieKeagamaan($value);

	public function deleteBySieKeamanan($value);

	public function deleteBySieKetertiban($value);

	public function deleteBySieKebersihan($value);

	public function deleteBySieKeindahan($value);

	public function deleteBySieKesehatan($value);

	public function deleteBySieKekeluargaan($value);

	public function deleteBySieHumas($value);


}
?>