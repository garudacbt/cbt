<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtKelasRuangDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtKelasRuang 
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
 	 * @param cbtKelasRuang primary key
 	 */
	public function delete($id_kelas_ruang);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtKelasRuang cbtKelasRuang
 	 */
	public function insert($cbtKelasRuang);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtKelasRuang cbtKelasRuang
 	 */
	public function update($cbtKelasRuang);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdKelas($value, $single);

	public function queryByIdRuang($value, $single);

	public function queryByIdSesi($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryBySetSiswa($value, $single);


	public function deleteByIdKelas($value);

	public function deleteByIdRuang($value);

	public function deleteByIdSesi($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteBySetSiswa($value);


}
?>