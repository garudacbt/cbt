<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface RaporNilaiPtsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RaporNilaiPts 
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
 	 * @param raporNilaiPt primary key
 	 */
	public function delete($id_nilai_pts);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RaporNilaiPts raporNilaiPt
 	 */
	public function insert($raporNilaiPt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RaporNilaiPts raporNilaiPt
 	 */
	public function update($raporNilaiPt);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdMapel($value, $single);

	public function queryByIdKelas($value, $single);

	public function queryByIdSiswa($value, $single);

	public function queryByIdTp($value, $single);

	public function queryByIdSmt($value, $single);

	public function queryByNilai($value, $single);

	public function queryByPredikat($value, $single);


	public function deleteByIdMapel($value);

	public function deleteByIdKelas($value);

	public function deleteByIdSiswa($value);

	public function deleteByIdTp($value);

	public function deleteByIdSmt($value);

	public function deleteByNilai($value);

	public function deleteByPredikat($value);


}
?>