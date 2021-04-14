<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterKelasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterKelas 
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
 	 * @param masterKela primary key
 	 */
	public function delete($id_kelas);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterKelas masterKela
 	 */
	public function insert($masterKela);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterKelas masterKela
 	 */
	public function update($masterKela);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByNamaKelas($value, $single);

	public function queryByKodeKelas($value, $single);

	public function queryByJurusanId($value, $single);

	public function queryByLevelId($value, $single);

	public function queryByGuruId($value, $single);

	public function queryBySiswaId($value, $single);

	public function queryByJumlahSiswa($value, $single);

	public function queryBySetSiswa($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByNamaKelas($value);

	public function deleteByKodeKelas($value);

	public function deleteByJurusanId($value);

	public function deleteByLevelId($value);

	public function deleteByGuruId($value);

	public function deleteBySiswaId($value);

	public function deleteByJumlahSiswa($value);

	public function deleteBySetSiswa($value);


}
?>