<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporAdminSettingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporAdminSetting 
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
 	 * @param raporAdminSetting primary key
 	 */
	public function delete($id_setting);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporAdminSetting raporAdminSetting
 	 */
	public function insert($raporAdminSetting);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporAdminSetting raporAdminSetting
 	 */
	public function update($raporAdminSetting);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByKkmTunggal($value, $single);

	public function queryByKkm($value, $single);

	public function queryByBobotPh($value, $single);

	public function queryByBobotPts($value, $single);

	public function queryByBobotPas($value, $single);

	public function queryByBobotAbsen($value, $single);

	public function queryByTglRaporAkhir($value, $single);

	public function queryByTglRaporPts($value, $single);


	public function deleteByKkmTunggal($value);

	public function deleteByKkm($value);

	public function deleteByBobotPh($value);

	public function deleteByBobotPts($value);

	public function deleteByBobotPas($value);

	public function deleteByBobotAbsen($value);

	public function deleteByTglRaporAkhir($value);

	public function deleteByTglRaporPts($value);


}
?>