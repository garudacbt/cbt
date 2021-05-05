<?php

/**
 * Class that operate on table 'cbt_alokasi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-05-03 20:21
 */
class CbtAlokasiMySqlDAO implements CbtAlokasiDAO
{

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return CbtAlokasiDTO
     */
    public function load($id)
    {
        $sql = 'SELECT * FROM cbt_alokasi WHERE id_alokasi = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id);
        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll()
    {
        $sql = 'SELECT * FROM cbt_alokasi';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn)
    {
        $sql = 'SELECT * FROM cbt_alokasi ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param cbtAlokasi primary key
     */
    public function delete($id_alokasi)
    {
        $sql = 'DELETE FROM cbt_alokasi WHERE id_alokasi = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($id_alokasi);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param CbtAlokasiDTO cbtAlokasi
     */
    public function insert($cbtAlokasi)
    {
        $sql = 'INSERT INTO cbt_alokasi (id_jadwal, jarak, jam_ke) VALUES (?, ?, ?)';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($cbtAlokasi->idJadwal);
        $sqlQuery->setNumber($cbtAlokasi->jarak);
        $sqlQuery->setNumber($cbtAlokasi->jamKe);

        $id = $this->executeInsert($sqlQuery);
        $cbtAlokasi->idAlokasi = $id;
        return $id;
    }

    /**
     * Update record in table
     *
     * @param CbtAlokasiDTO cbtAlokasi
     */
    public function update($cbtAlokasi)
    {
        $sql = 'UPDATE cbt_alokasi SET id_jadwal = ?, jarak = ?, jam_ke = ? WHERE id_alokasi = ?';
        $sqlQuery = new SqlQuery($sql);

        $sqlQuery->setNumber($cbtAlokasi->idJadwal);
        $sqlQuery->setNumber($cbtAlokasi->jarak);
        $sqlQuery->setNumber($cbtAlokasi->jamKe);

        $sqlQuery->setNumber($cbtAlokasi->idAlokasi);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean()
    {
        $sql = 'DELETE FROM cbt_alokasi';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * @param $sql
     * @param bool $single
     */
    public function execQuery($sql, $single = false)
    {
        $sqlQuery = new SqlQuery($sql);
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }

    /**
     * @param $arr_values
     * @param bool $single
     */
    public function queryByKeys($arr_values, $single = false)
    {
        $no = 0;
        $count = count($arr_values);
        $values = [];
        $sql = 'SELECT * FROM cbt_alokasi WHERE ';
        foreach ($arr_values as $key => $value) {
            $sql .= $key . ' = ?';
            if (++$no !== $count) {
                $sql .= ' AND ';
            }
            array_push($values, $value);
        }

        $sqlQuery = new SqlQuery($sql);
        foreach ($values as $value) {
            $sqlQuery->set($value);
        }
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }

    public function queryByIdAlokasi($value, $single = false)
    {
        $sql = 'SELECT * FROM cbt_alokasi WHERE id_alokasi = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }

    public function queryByIdJadwal($value, $single = false)
    {
        $sql = 'SELECT * FROM cbt_alokasi WHERE id_jadwal = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }

    public function queryByJarak($value, $single = false)
    {
        $sql = 'SELECT * FROM cbt_alokasi WHERE jarak = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }

    public function queryByJamKe($value, $single = false)
    {
        $sql = 'SELECT * FROM cbt_alokasi WHERE jam_ke = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        if ($single === true)
            return $this->getRow($sqlQuery);
        else
            return $this->getList($sqlQuery);
    }


    public function deleteByIdAlokasi($value)
    {
        $sql = 'DELETE FROM cbt_alokasi WHERE id_alokasi = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByIdJadwal($value)
    {
        $sql = 'DELETE FROM cbt_alokasi WHERE id_jadwal = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByJarak($value)
    {
        $sql = 'DELETE FROM cbt_alokasi WHERE jarak = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }

    public function deleteByJamKe($value)
    {
        $sql = 'DELETE FROM cbt_alokasi WHERE jam_ke = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->executeUpdate($sqlQuery);
    }


    /**
     * Get number of rows
     */
    public function numRows($where = false)
    {
        $sql = 'SELECT COUNT(*) as total from cbt_alokasi';

        if ($where !== false) {
            $sql .= ' where ';
            $whereArr = array();
            foreach ($where as $clause => $val) {
                $whereArr[] = $clause . '=\'' . $val . '\'';
            }
            $sql .= ' where ' . implode(',', $whereArr);
        }
        $sqlQuery = new SqlQuery($sql);
        return $this->querySingleResult($sqlQuery);
    }

    /**
     * Read row
     *
     * @return CbtAlokasiDTO
     */
    protected function readRow($row)
    {
        $cbtAlokasi = new CbtAlokasiDTO();

        $cbtAlokasi->idAlokasi = isset($row['id_alokasi']) ? $row['id_alokasi'] : null;
        $cbtAlokasi->idJadwal = isset($row['id_jadwal']) ? $row['id_jadwal'] : null;
        $cbtAlokasi->jarak = isset($row['jarak']) ? $row['jarak'] : null;
        $cbtAlokasi->jamKe = isset($row['jam_ke']) ? $row['jam_ke'] : null;

        return $cbtAlokasi;
    }

    protected function getList($sqlQuery)
    {
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        for ($i = 0; $i < count($tab); $i++) {
            $ret[$i] = $this->readRow($tab[$i]);
        }
        return $ret;
    }

    /**
     * Get row
     *
     * @return CbtAlokasiDTO
     */
    protected function getRow($sqlQuery)
    {
        $tab = QueryExecutor::execute($sqlQuery);

        if (count($tab) == 0) {
            return null;
        }
        return $this->readRow($tab[0]);
    }

    /**
     * Execute sql query
     */
    protected function execute($sqlQuery)
    {
        return QueryExecutor::execute($sqlQuery);
    }


    /**
     * Execute sql query
     */
    protected function executeUpdate($sqlQuery)
    {
        return QueryExecutor::executeUpdate($sqlQuery);
    }

    /**
     * Query for one row and one column
     */
    protected function querySingleResult($sqlQuery)
    {
        return QueryExecutor::queryForString($sqlQuery);
    }

    /**
     * Insert row to table
     */
    protected function executeInsert($sqlQuery)
    {
        return QueryExecutor::executeInsert($sqlQuery);
    }
}

?>