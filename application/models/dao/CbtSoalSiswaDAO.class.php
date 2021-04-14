<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtSoalSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtSoalSiswa 
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
 	 * @param cbtSoalSiswa primary key
 	 */
	public function delete($id_soal_siswa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtSoalSiswa cbtSoalSiswa
 	 */
	public function insert($cbtSoalSiswa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtSoalSiswa cbtSoalSiswa
 	 */
	public function update($cbtSoalSiswa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdBank($value, $single);

	public function queryByIdJadwal($value, $single);

	public function queryByIdSoal($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByJenisSoal($value, $single);

	public function queryByNoSoalAlias($value, $single);

	public function queryByOpsiAliasA($value, $single);

	public function queryByOpsiAliasB($value, $single);

	public function queryByOpsiAliasC($value, $single);

	public function queryByOpsiAliasD($value, $single);

	public function queryByOpsiAliasE($value, $single);

	public function queryByJawabanAlias($value, $single);

	public function queryByJawabanSiswa($value, $single);

	public function queryByJawabanBenar($value, $single);

	public function queryByPointEssai($value, $single);

	public function queryBySoalEnd($value, $single);


	public function deleteByIdBank($value);

	public function deleteByIdJadwal($value);

	public function deleteByIdSoal($value);

	public function deleteByIdSiswa($value);

	public function deleteByJenisSoal($value);

	public function deleteByNoSoalAlias($value);

	public function deleteByOpsiAliasA($value);

	public function deleteByOpsiAliasB($value);

	public function deleteByOpsiAliasC($value);

	public function deleteByOpsiAliasD($value);

	public function deleteByOpsiAliasE($value);

	public function deleteByJawabanAlias($value);

	public function deleteByJawabanSiswa($value);

	public function deleteByJawabanBenar($value);

	public function deleteByPointEssai($value);

	public function deleteBySoalEnd($value);


}
?>