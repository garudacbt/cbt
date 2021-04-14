<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterEkstra 
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
 	 * @param masterEkstra primary key
 	 */
	public function delete($id_ekstra);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterEkstra masterEkstra
 	 */
	public function insert($masterEkstra);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterEkstra masterEkstra
 	 */
	public function update($masterEkstra);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNamaEkstra($value, $single);

	public function queryByKodeEkstra($value, $single);


	public function deleteByNamaEkstra($value);

	public function deleteByKodeEkstra($value);


}
?>