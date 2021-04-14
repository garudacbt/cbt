<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporNilaiEkstraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNilaiEkstra 
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
 	 * @param raporNilaiEkstra primary key
 	 */
	public function delete($id_nilai_ekstra);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiEkstra raporNilaiEkstra
 	 */
	public function insert($raporNilaiEkstra);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiEkstra raporNilaiEkstra
 	 */
	public function update($raporNilaiEkstra);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdEkstra($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByNilai($value, $single);

	public function queryByPredikat($value, $single);

	public function queryByDeskripsi($value, $single);


	public function deleteByIdEkstra($value);

	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByNilai($value);

	public function deleteByPredikat($value);

	public function deleteByDeskripsi($value);


}
?>