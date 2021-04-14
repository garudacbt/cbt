<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
interface MasterSiswaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MasterSiswa 
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
 	 * @param masterSiswa primary key
 	 */
	public function delete($id_siswa);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MasterSiswa masterSiswa
 	 */
	public function insert($masterSiswa);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MasterSiswa masterSiswa
 	 */
	public function update($masterSiswa);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNisn($value, $single);

	public function queryByNis($value, $single);

	public function queryByNama($value, $single);

	public function queryByJenisKelamin($value, $single);

	public function queryByUsername($value, $single);

	public function queryByPassword($value, $single);

	public function queryByKelasAwal($value, $single);

	public function queryByTahunMasuk($value, $single);

	public function queryBySekolahAsal($value, $single);

	public function queryByTempatLahir($value, $single);

	public function queryByTanggalLahir($value, $single);

	public function queryByAgama($value, $single);

	public function queryByHp($value, $single);

	public function queryByEmail($value, $single);

	public function queryByFoto($value, $single);

	public function queryByAnakKe($value, $single);

	public function queryByStatusKeluarga($value, $single);

	public function queryByAlamat($value, $single);

	public function queryByRt($value, $single);

	public function queryByRw($value, $single);

	public function queryByKelurahan($value, $single);

	public function queryByKecamatan($value, $single);

	public function queryByKabupaten($value, $single);

	public function queryByProvinsi($value, $single);

	public function queryByKodePos($value, $single);

	public function queryByNamaAyah($value, $single);

	public function queryByTglLahirAyah($value, $single);

	public function queryByPendidikanAyah($value, $single);

	public function queryByPekerjaanAyah($value, $single);

	public function queryByNohpAyah($value, $single);

	public function queryByAlamatAyah($value, $single);

	public function queryByNamaIbu($value, $single);

	public function queryByTglLahirIbu($value, $single);

	public function queryByPendidikanIbu($value, $single);

	public function queryByPekerjaanIbu($value, $single);

	public function queryByNohpIbu($value, $single);

	public function queryByAlamatIbu($value, $single);

	public function queryByNamaWali($value, $single);

	public function queryByTglLahirWali($value, $single);

	public function queryByPendidikanWali($value, $single);

	public function queryByPekerjaanWali($value, $single);

	public function queryByNohpWali($value, $single);

	public function queryByAlamatWali($value, $single);


	public function deleteByNisn($value);

	public function deleteByNis($value);

	public function deleteByNama($value);

	public function deleteByJenisKelamin($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByKelasAwal($value);

	public function deleteByTahunMasuk($value);

	public function deleteBySekolahAsal($value);

	public function deleteByTempatLahir($value);

	public function deleteByTanggalLahir($value);

	public function deleteByAgama($value);

	public function deleteByHp($value);

	public function deleteByEmail($value);

	public function deleteByFoto($value);

	public function deleteByAnakKe($value);

	public function deleteByStatusKeluarga($value);

	public function deleteByAlamat($value);

	public function deleteByRt($value);

	public function deleteByRw($value);

	public function deleteByKelurahan($value);

	public function deleteByKecamatan($value);

	public function deleteByKabupaten($value);

	public function deleteByProvinsi($value);

	public function deleteByKodePos($value);

	public function deleteByNamaAyah($value);

	public function deleteByTglLahirAyah($value);

	public function deleteByPendidikanAyah($value);

	public function deleteByPekerjaanAyah($value);

	public function deleteByNohpAyah($value);

	public function deleteByAlamatAyah($value);

	public function deleteByNamaIbu($value);

	public function deleteByTglLahirIbu($value);

	public function deleteByPendidikanIbu($value);

	public function deleteByPekerjaanIbu($value);

	public function deleteByNohpIbu($value);

	public function deleteByAlamatIbu($value);

	public function deleteByNamaWali($value);

	public function deleteByTglLahirWali($value);

	public function deleteByPendidikanWali($value);

	public function deleteByPekerjaanWali($value);

	public function deleteByNohpWali($value);

	public function deleteByAlamatWali($value);


}
?>