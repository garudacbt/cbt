<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtSesiSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtSesiSiswa 
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
 	 * @param cbtSesiSiswa primary key
 	 */
	public function delete($siswa_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSesiSiswa cbtSesiSiswa
 	 */
	public function insert($cbtSesiSiswa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSesiSiswa cbtSesiSiswa
 	 */
	public function update($cbtSesiSiswa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByKelasId($value, $single);

	public function queryByRuangId($value, $single);

	public function queryBySesiId($value, $single);

	public function queryByTpId($value, $single);

	public function queryBySmtId($value, $single);


	public function deleteByKelasId($value);

	public function deleteByRuangId($value);

	public function deleteBySesiId($value);

	public function deleteByTpId($value);

	public function deleteBySmtId($value);


}
?>