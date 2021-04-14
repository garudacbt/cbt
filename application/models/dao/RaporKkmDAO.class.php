<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporKkmDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporKkm 
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
 	 * @param raporKkm primary key
 	 */
	public function delete($id_kkm);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporKkm raporKkm
 	 */
	public function insert($raporKkm);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporKkm raporKkm
 	 */
	public function update($raporKkm);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByKkm($value, $single);

	public function queryByBobotPh($value, $single);

	public function queryByBobotPts($value, $single);

	public function queryByBobotPas($value, $single);

	public function queryByBobotAbsen($value, $single);

	public function queryByBebanJam($value, $single);


	public function deleteByKkm($value);

	public function deleteByBobotPh($value);

	public function deleteByBobotPts($value);

	public function deleteByBobotPas($value);

	public function deleteByBobotAbsen($value);

	public function deleteByBebanJam($value);


}
?>