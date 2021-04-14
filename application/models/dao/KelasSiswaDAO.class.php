<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasSiswa 
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
 	 * @param kelasSiswa primary key
 	 */
	public function delete($id_kelas_siswa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasSiswa kelasSiswa
 	 */
	public function insert($kelasSiswa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasSiswa kelasSiswa
 	 */
	public function update($kelasSiswa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdKelas($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdKelas($value);


}
?>