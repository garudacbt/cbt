<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtRekapNilaiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtRekapNilai 
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
 	 * @param cbtRekapNilai primary key
 	 */
	public function delete($id_rekap_nilai);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtRekapNilai cbtRekapNilai
 	 */
	public function insert($cbtRekapNilai);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtRekapNilai cbtRekapNilai
 	 */
	public function update($cbtRekapNilai);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdJadwal($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryBySmt($value, $single);

	public function queryByIdJenis($value, $single);

	public function queryByKodeJenis($value, $single);

	public function queryByIdBank($value, $single);

	public function queryByIdMapel($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByKelas($value, $single);

	public function queryByMulai($value, $single);

	public function queryBySelesai($value, $single);

	public function queryByDurasi($value, $single);

	public function queryByBobotPg($value, $single);

	public function queryByJawabanPg($value, $single);

	public function queryByNilaiPg($value, $single);

	public function queryByBobotEsai($value, $single);

	public function queryByJawabanEsai($value, $single);

	public function queryByNilaiEsai($value, $single);

	public function queryByIdGuru($value, $single);


	public function deleteByIdJadwal($value);

	public function deleteByIdTp($value);

	public function deleteByTp($value);

	public function deleteByIdSmt($value);

	public function deleteBySmt($value);

	public function deleteByIdJenis($value);

	public function deleteByKodeJenis($value);

	public function deleteByIdBank($value);

	public function deleteByIdMapel($value);

	public function deleteByIdSiswa($value);

	public function deleteByKelas($value);

	public function deleteByMulai($value);

	public function deleteBySelesai($value);

	public function deleteByDurasi($value);

	public function deleteByBobotPg($value);

	public function deleteByJawabanPg($value);

	public function deleteByNilaiPg($value);

	public function deleteByBobotEsai($value);

	public function deleteByJawabanEsai($value);

	public function deleteByNilaiEsai($value);

	public function deleteByIdGuru($value);


}
?>