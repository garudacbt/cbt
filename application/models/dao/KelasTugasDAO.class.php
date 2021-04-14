<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasTugasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasTugas 
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
 	 * @param kelasTuga primary key
 	 */
	public function delete($id_tugas);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasTugas kelasTuga
 	 */
	public function insert($kelasTuga);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasTugas kelasTuga
 	 */
	public function update($kelasTuga);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByKodeTugas($value, $single);

	public function queryByIdGuru($value, $single);

	public function queryByTugasKelas($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByNamaMapel($value, $single);

	public function queryByJudulTugas($value, $single);

	public function queryByIsiTugas($value, $single);

	public function queryByFile($value, $single);

	public function queryByLinkFile($value, $single);

	public function queryByTglMulai($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryByUpdatedOn($value, $single);

	public function queryByStatus($value, $single);

	public function queryByTglSelesai($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByKodeTugas($value);

	public function deleteByIdGuru($value);

	public function deleteByTugasKelas($value);

	public function deleteByIdMapel($value);

	public function deleteByNamaMapel($value);

	public function deleteByJudulTugas($value);

	public function deleteByIsiTugas($value);

	public function deleteByFile($value);

	public function deleteByLinkFile($value);

	public function deleteByTglMulai($value);

	public function deleteByCreatedOn($value);

	public function deleteByUpdatedOn($value);

	public function deleteByStatus($value);

	public function deleteByTglSelesai($value);


}
?>