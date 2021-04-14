<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasMateriDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasMateri 
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
 	 * @param kelasMateri primary key
 	 */
	public function delete($id_materi);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasMateri kelasMateri
 	 */
	public function insert($kelasMateri);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasMateri kelasMateri
 	 */
	public function update($kelasMateri);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByKodeMateri($value, $single);

	public function queryByIdGuru($value, $single);

	public function queryByMateriKelas($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByKodeMapel($value, $single);

	public function queryByJudulMateri($value, $single);

	public function queryByIsiMateri($value, $single);

	public function queryByFile($value, $single);

	public function queryByLinkFile($value, $single);

	public function queryByTglMulai($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryByUpdatedOn($value, $single);

	public function queryByStatus($value, $single);

	public function queryByYoutube($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByKodeMateri($value);

	public function deleteByIdGuru($value);

	public function deleteByMateriKelas($value);

	public function deleteByIdMapel($value);

	public function deleteByKodeMapel($value);

	public function deleteByJudulMateri($value);

	public function deleteByIsiMateri($value);

	public function deleteByFile($value);

	public function deleteByLinkFile($value);

	public function deleteByTglMulai($value);

	public function deleteByCreatedOn($value);

	public function deleteByUpdatedOn($value);

	public function deleteByStatus($value);

	public function deleteByYoutube($value);


}
?>