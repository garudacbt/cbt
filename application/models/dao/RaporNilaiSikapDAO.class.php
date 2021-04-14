<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporNilaiSikapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNilaiSikap 
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
 	 * @param raporNilaiSikap primary key
 	 */
	public function delete($id_nilai_sikap);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiSikap raporNilaiSikap
 	 */
	public function insert($raporNilaiSikap);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiSikap raporNilaiSikap
 	 */
	public function update($raporNilaiSikap);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSiswa($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByJenis($value, $single);

	public function queryByNilai($value, $single);

	public function queryByDeskripsi($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);


	public function deleteByIdSiswa($value);

	public function deleteByIdKelas($value);

	public function deleteByJenis($value);

	public function deleteByNilai($value);

	public function deleteByDeskripsi($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);


}
?>