<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporNilaiAkhirDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNilaiAkhir 
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
 	 * @param raporNilaiAkhir primary key
 	 */
	public function delete($id_nilai_akhir);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiAkhir raporNilaiAkhir
 	 */
	public function insert($raporNilaiAkhir);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiAkhir raporNilaiAkhir
 	 */
	public function update($raporNilaiAkhir);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByNilai($value, $single);

	public function queryByAkhir($value, $single);

	public function queryByPredikat($value, $single);


	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByNilai($value);

	public function deleteByAkhir($value);

	public function deleteByPredikat($value);


}
?>