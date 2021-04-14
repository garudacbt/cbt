<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporCatatanWaliDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporCatatanWali 
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
 	 * @param raporCatatanWali primary key
 	 */
	public function delete($id_catatan_wali);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporCatatanWali raporCatatanWali
 	 */
	public function insert($raporCatatanWali);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporCatatanWali raporCatatanWali
 	 */
	public function update($raporCatatanWali);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByNilai($value, $single);

	public function queryByDeskripsi($value, $single);


	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByNilai($value);

	public function deleteByDeskripsi($value);


}
?>