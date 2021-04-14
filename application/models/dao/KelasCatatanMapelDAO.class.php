<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface KelasCatatanMapelDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return KelasCatatanMapel 
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
 	 * @param kelasCatatanMapel primary key
 	 */
	public function delete($id_catatan);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param KelasCatatanMapel kelasCatatanMapel
 	 */
	public function insert($kelasCatatanMapel);
	
	/**
 	 * Update record in table
 	 *
 	 * @param KelasCatatanMapel kelasCatatanMapel
 	 */
	public function update($kelasCatatanMapel);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByType($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdGuru($value, $single);

	public function queryByLevel($value, $single);

	public function queryByTgl($value, $single);

	public function queryByText($value, $single);

	public function queryByReaded($value, $single);

	public function queryByReading($value, $single);

	public function queryByJml($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByType($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByIdGuru($value);

	public function deleteByLevel($value);

	public function deleteByTgl($value);

	public function deleteByText($value);

	public function deleteByReaded($value);

	public function deleteByReading($value);

	public function deleteByJml($value);


}
?>