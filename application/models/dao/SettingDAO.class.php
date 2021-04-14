<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface SettingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Setting 
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
 	 * @param setting primary key
 	 */
	public function delete($id_setting);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Setting setting
 	 */
	public function insert($setting);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Setting setting
 	 */
	public function update($setting);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByKodeSekolah($value, $single);

	public function queryBySekolah($value, $single);

	public function queryByNpsn($value, $single);

	public function queryByNss($value, $single);

	public function queryByJenjang($value, $single);

	public function queryByKepsek($value, $single);

	public function queryByNip($value, $single);

	public function queryByTandaTangan($value, $single);

	public function queryByAlamat($value, $single);

	public function queryByDesa($value, $single);

	public function queryByKecamatan($value, $single);

	public function queryByKota($value, $single);

	public function queryByProvinsi($value, $single);

	public function queryByKodePos($value, $single);

	public function queryByTelp($value, $single);

	public function queryByFax($value, $single);

	public function queryByWeb($value, $single);

	public function queryByEmail($value, $single);

	public function queryByNamaAplikasi($value, $single);

	public function queryByLogoKanan($value, $single);

	public function queryByLogoKiri($value, $single);

	public function queryByVersi($value, $single);

	public function queryByIpServer($value, $single);

	public function queryByWaktu($value, $single);

	public function queryByServer($value, $single);

	public function queryByIdServer($value, $single);

	public function queryBySekolahId($value, $single);

	public function queryByDbVersi($value, $single);


	public function deleteByKodeSekolah($value);

	public function deleteBySekolah($value);

	public function deleteByNpsn($value);

	public function deleteByNss($value);

	public function deleteByJenjang($value);

	public function deleteByKepsek($value);

	public function deleteByNip($value);

	public function deleteByTandaTangan($value);

	public function deleteByAlamat($value);

	public function deleteByDesa($value);

	public function deleteByKecamatan($value);

	public function deleteByKota($value);

	public function deleteByProvinsi($value);

	public function deleteByKodePos($value);

	public function deleteByTelp($value);

	public function deleteByFax($value);

	public function deleteByWeb($value);

	public function deleteByEmail($value);

	public function deleteByNamaAplikasi($value);

	public function deleteByLogoKanan($value);

	public function deleteByLogoKiri($value);

	public function deleteByVersi($value);

	public function deleteByIpServer($value);

	public function deleteByWaktu($value);

	public function deleteByServer($value);

	public function deleteByIdServer($value);

	public function deleteBySekolahId($value);

	public function deleteByDbVersi($value);


}
?>