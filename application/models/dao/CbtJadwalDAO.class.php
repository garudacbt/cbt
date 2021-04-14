<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtJadwalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtJadwal 
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
 	 * @param cbtJadwal primary key
 	 */
	public function delete($id_jadwal);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtJadwal cbtJadwal
 	 */
	public function insert($cbtJadwal);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtJadwal cbtJadwal
 	 */
	public function update($cbtJadwal);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByIdBank($value, $single);

	public function queryByIdJenis($value, $single);

	public function queryByTglMulai($value, $single);

	public function queryByTglSelesai($value, $single);

	public function queryByDurasiUjian($value, $single);

	public function queryByPengawas($value, $single);

	public function queryByAcakSoal($value, $single);

	public function queryByAcakOpsi($value, $single);

	public function queryByHasilTampil($value, $single);

	public function queryByToken($value, $single);

	public function queryByStatus($value, $single);

	public function queryByUlang($value, $single);

	public function queryByResetLogin($value, $single);

	public function queryByRekap($value, $single);


	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByIdBank($value);

	public function deleteByIdJenis($value);

	public function deleteByTglMulai($value);

	public function deleteByTglSelesai($value);

	public function deleteByDurasiUjian($value);

	public function deleteByPengawas($value);

	public function deleteByAcakSoal($value);

	public function deleteByAcakOpsi($value);

	public function deleteByHasilTampil($value);

	public function deleteByToken($value);

	public function deleteByStatus($value);

	public function deleteByUlang($value);

	public function deleteByResetLogin($value);

	public function deleteByRekap($value);


}
?>