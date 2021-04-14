<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtSoalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtSoal 
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
 	 * @param cbtSoal primary key
 	 */
	public function delete($id_soal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSoal cbtSoal
 	 */
	public function insert($cbtSoal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSoal cbtSoal
 	 */
	public function update($cbtSoal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBankId($value, $single);

	public function queryByMapelId($value, $single);

	public function queryByJenis($value, $single);

	public function queryByNomorSoal($value, $single);

	public function queryByFile($value, $single);

	public function queryBySoal($value, $single);

	public function queryByOpsiA($value, $single);

	public function queryByOpsiB($value, $single);

	public function queryByOpsiC($value, $single);

	public function queryByOpsiD($value, $single);

	public function queryByOpsiE($value, $single);

	public function queryByFileA($value, $single);

	public function queryByFileB($value, $single);

	public function queryByFileC($value, $single);

	public function queryByFileD($value, $single);

	public function queryByFileE($value, $single);

	public function queryByJawaban($value, $single);

	public function queryByCreatedOn($value, $single);

	public function queryByUpdatedOn($value, $single);

	public function queryByTampilkan($value, $single);


	public function deleteByBankId($value);

	public function deleteByMapelId($value);

	public function deleteByJenis($value);

	public function deleteByNomorSoal($value);

	public function deleteByFile($value);

	public function deleteBySoal($value);

	public function deleteByOpsiA($value);

	public function deleteByOpsiB($value);

	public function deleteByOpsiC($value);

	public function deleteByOpsiD($value);

	public function deleteByOpsiE($value);

	public function deleteByFileA($value);

	public function deleteByFileB($value);

	public function deleteByFileC($value);

	public function deleteByFileD($value);

	public function deleteByFileE($value);

	public function deleteByJawaban($value);

	public function deleteByCreatedOn($value);

	public function deleteByUpdatedOn($value);

	public function deleteByTampilkan($value);


}
?>