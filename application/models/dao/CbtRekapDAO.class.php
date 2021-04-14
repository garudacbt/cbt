<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtRekapDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtRekap 
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
 	 * @param cbtRekap primary key
 	 */
	public function delete($id_rekap);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRekap cbtRekap
 	 */
	public function insert($cbtRekap);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRekap cbtRekap
 	 */
	public function update($cbtRekap);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryBySmt($value, $single);

	public function queryByIdJadwal($value, $single);

	public function queryByIdJenis($value, $single);

	public function queryByKodeJenis($value, $single);

	public function queryByIdBank($value, $single);

	public function queryByBankKelas($value, $single);

	public function queryByBankKode($value, $single);

	public function queryByBankLevel($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByNamaMapel($value, $single);

	public function queryByKode($value, $single);

	public function queryByTglMulai($value, $single);

	public function queryByTglSelesai($value, $single);

	public function queryByTampilPg($value, $single);

	public function queryByJawabanPg($value, $single);

	public function queryByTampilEsai($value, $single);

	public function queryByJawabanEsai($value, $single);

	public function queryByBobotPg($value, $single);

	public function queryByBobotEsai($value, $single);

	public function queryByIdGuru($value, $single);

	public function queryByNamaGuru($value, $single);


	public function deleteByIdTp($value);

	public function deleteByTp($value);

	public function deleteByIdSmt($value);

	public function deleteBySmt($value);

	public function deleteByIdJadwal($value);

	public function deleteByIdJenis($value);

	public function deleteByKodeJenis($value);

	public function deleteByIdBank($value);

	public function deleteByBankKelas($value);

	public function deleteByBankKode($value);

	public function deleteByBankLevel($value);

	public function deleteByIdMapel($value);

	public function deleteByNamaMapel($value);

	public function deleteByKode($value);

	public function deleteByTglMulai($value);

	public function deleteByTglSelesai($value);

	public function deleteByTampilPg($value);

	public function deleteByJawabanPg($value);

	public function deleteByTampilEsai($value);

	public function deleteByJawabanEsai($value);

	public function deleteByBobotPg($value);

	public function deleteByBobotEsai($value);

	public function deleteByIdGuru($value);

	public function deleteByNamaGuru($value);


}
?>