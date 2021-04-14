<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterGuruDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterGuru 
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
 	 * @param masterGuru primary key
 	 */
	public function delete($id_guru);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterGuru masterGuru
 	 */
	public function insert($masterGuru);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterGuru masterGuru
 	 */
	public function update($masterGuru);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdUser($value, $single);

	public function queryByNip($value, $single);

	public function queryByNamaGuru($value, $single);

	public function queryByEmail($value, $single);

	public function queryByKodeGuru($value, $single);

	public function queryByUsername($value, $single);

	public function queryByPassword($value, $single);

	public function queryByNoKtp($value, $single);

	public function queryByTempatLahir($value, $single);

	public function queryByTglLahir($value, $single);

	public function queryByJenisKelamin($value, $single);

	public function queryByAgama($value, $single);

	public function queryByNoHp($value, $single);

	public function queryByAlamatJalan($value, $single);

	public function queryByRtRw($value, $single);

	public function queryByDusun($value, $single);

	public function queryByKelurahan($value, $single);

	public function queryByKecamatan($value, $single);

	public function queryByKabupaten($value, $single);

	public function queryByProvinsi($value, $single);

	public function queryByKodePos($value, $single);

	public function queryByKewarganegaraan($value, $single);

	public function queryByNuptk($value, $single);

	public function queryByJenisPtk($value, $single);

	public function queryByTgsTambahan($value, $single);

	public function queryByStatusPegawai($value, $single);

	public function queryByStatusAktif($value, $single);

	public function queryByStatusNikah($value, $single);

	public function queryByTmt($value, $single);

	public function queryByKeahlianIsyarat($value, $single);

	public function queryByNpwp($value, $single);

	public function queryByFoto($value, $single);


	public function deleteByIdUser($value);

	public function deleteByNip($value);

	public function deleteByNamaGuru($value);

	public function deleteByEmail($value);

	public function deleteByKodeGuru($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByNoKtp($value);

	public function deleteByTempatLahir($value);

	public function deleteByTglLahir($value);

	public function deleteByJenisKelamin($value);

	public function deleteByAgama($value);

	public function deleteByNoHp($value);

	public function deleteByAlamatJalan($value);

	public function deleteByRtRw($value);

	public function deleteByDusun($value);

	public function deleteByKelurahan($value);

	public function deleteByKecamatan($value);

	public function deleteByKabupaten($value);

	public function deleteByProvinsi($value);

	public function deleteByKodePos($value);

	public function deleteByKewarganegaraan($value);

	public function deleteByNuptk($value);

	public function deleteByJenisPtk($value);

	public function deleteByTgsTambahan($value);

	public function deleteByStatusPegawai($value);

	public function deleteByStatusAktif($value);

	public function deleteByStatusNikah($value);

	public function deleteByTmt($value);

	public function deleteByKeahlianIsyarat($value);

	public function deleteByNpwp($value);

	public function deleteByFoto($value);


}
?>