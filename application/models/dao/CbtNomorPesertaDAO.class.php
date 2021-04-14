<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtNomorPesertaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtNomorPeserta 
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
 	 * @param cbtNomorPeserta primary key
 	 */
	public function delete($id_nomor);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtNomorPeserta cbtNomorPeserta
 	 */
	public function insert($cbtNomorPeserta);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtNomorPeserta cbtNomorPeserta
 	 */
	public function update($cbtNomorPeserta);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByNomorPeserta($value, $single);


	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByNomorPeserta($value);


}
?>