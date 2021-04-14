<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtBankSoalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtBankSoal 
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
 	 * @param cbtBankSoal primary key
 	 */
	public function delete($id_bank);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtBankSoal cbtBankSoal
 	 */
	public function insert($cbtBankSoal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtBankSoal cbtBankSoal
 	 */
	public function update($cbtBankSoal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByBankJenisId($value, $single);

	public function queryByBankKode($value, $single);

	public function queryByBankLevel($value, $single);

	public function queryByBankKelas($value, $single);

	public function queryByBankMapelId($value, $single);

	public function queryByBankJurusanId($value, $single);

	public function queryByBankGuruId($value, $single);

	public function queryByBankNama($value, $single);

	public function queryByKkm($value, $single);

	public function queryByJmlSoal($value, $single);

	public function queryByJmlEsai($value, $single);

	public function queryByTampilPg($value, $single);

	public function queryByTampilEsai($value, $single);

	public function queryByBobotPg($value, $single);

	public function queryByBobotEsai($value, $single);

	public function queryByOpsi($value, $single);

	public function queryByDate($value, $single);

	public function queryByStatus($value, $single);

	public function queryBySoalAgama($value, $single);


	public function deleteByBankJenisId($value);

	public function deleteByBankKode($value);

	public function deleteByBankLevel($value);

	public function deleteByBankKelas($value);

	public function deleteByBankMapelId($value);

	public function deleteByBankJurusanId($value);

	public function deleteByBankGuruId($value);

	public function deleteByBankNama($value);

	public function deleteByKkm($value);

	public function deleteByJmlSoal($value);

	public function deleteByJmlEsai($value);

	public function deleteByTampilPg($value);

	public function deleteByTampilEsai($value);

	public function deleteByBobotPg($value);

	public function deleteByBobotEsai($value);

	public function deleteByOpsi($value);

	public function deleteByDate($value);

	public function deleteByStatus($value);

	public function deleteBySoalAgama($value);


}
?>