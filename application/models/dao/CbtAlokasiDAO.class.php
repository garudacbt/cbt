<?php

/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2021-05-03 20:21
 */
interface CbtAlokasiDAO
{

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @Return CbtAlokasi
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
     * @param cbtAlokasi primary key
     */
    public function delete($id_alokasi);

    /**
     * Insert record to table
     *
     * @param CbtAlokasi cbtAlokasi
     */
    public function insert($cbtAlokasi);

    /**
     * Update record in table
     *
     * @param CbtAlokasi cbtAlokasi
     */
    public function update($cbtAlokasi);

    /**
     * Delete all rows
     */
    public function clean();

    public function queryByIdJadwal($value, $single);

    public function queryByJarak($value, $single);

    public function queryByJamKe($value, $single);


    public function deleteByIdJadwal($value);

    public function deleteByJarak($value);

    public function deleteByJamKe($value);


}

?>