<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface JabatanGuruDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return JabatanGuru 
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
 	 * @param jabatanGuru primary key
 	 */
	public function delete($id_jabatan_guru);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param JabatanGuru jabatanGuru
 	 */
	public function insert($jabatanGuru);
	
	/**
 	 * Update record in table
 	 *
 	 * @param JabatanGuru jabatanGuru
 	 */
	public function update($jabatanGuru);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdGuru($value, $single);

	public function queryByIdJabatan($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByMapelKelas($value, $single);

	public function queryByEkstraKelas($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);


	public function deleteByIdGuru($value);

	public function deleteByIdJabatan($value);

	public function deleteByIdKelas($value);

	public function deleteByMapelKelas($value);

	public function deleteByEkstraKelas($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);


}
?>