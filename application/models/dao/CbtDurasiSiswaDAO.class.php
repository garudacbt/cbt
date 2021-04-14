<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface CbtDurasiSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CbtDurasiSiswa 
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
 	 * @param cbtDurasiSiswa primary key
 	 */
	public function delete($id_durasi);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CbtDurasiSiswa cbtDurasiSiswa
 	 */
	public function insert($cbtDurasiSiswa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CbtDurasiSiswa cbtDurasiSiswa
 	 */
	public function update($cbtDurasiSiswa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSiswa($value, $single);

	public function queryByIdJadwal($value, $single);

	public function queryByStatus($value, $single);

	public function queryByLamaUjian($value, $single);

	public function queryByMulai($value, $single);

	public function queryBySelesai($value, $single);

	public function queryByReset($value, $single);


	public function deleteByIdSiswa($value);

	public function deleteByIdJadwal($value);

	public function deleteByStatus($value);

	public function deleteByLamaUjian($value);

	public function deleteByMulai($value);

	public function deleteBySelesai($value);

	public function deleteByReset($value);


}
?>