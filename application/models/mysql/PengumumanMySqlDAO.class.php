<?php
/**
 * Class that operate on table 'pengumuman'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
class PengumumanMySqlDAO implements PengumumanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return Pengumuman
	 */
	public function load($id){
		$sql = 'SELECT * FROM pengumuman WHERE id_pengumuman = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM pengumuman';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM pengumuman ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param pengumuman primary key
 	 */
	public function delete($id_pengumuman){
		$sql = 'DELETE FROM pengumuman WHERE id_pengumuman = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_pengumuman);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pengumuman pengumuman
 	 */
	public function insert($pengumuman){
		$sql = 'INSERT INTO pengumuman (date, dari, kepada, judul, text) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pengumuman->date);
		$sqlQuery->setNumber($pengumuman->dari);
		$sqlQuery->set($pengumuman->kepada);
		$sqlQuery->set($pengumuman->judul);
		$sqlQuery->set($pengumuman->text);

		$id = $this->executeInsert($sqlQuery);	
		$pengumuman->idPengumuman = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pengumuman pengumuman
 	 */
	public function update($pengumuman){
		$sql = 'UPDATE pengumuman SET date = ?, dari = ?, kepada = ?, judul = ?, text = ? WHERE id_pengumuman = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($pengumuman->date);
		$sqlQuery->setNumber($pengumuman->dari);
		$sqlQuery->set($pengumuman->kepada);
		$sqlQuery->set($pengumuman->judul);
		$sqlQuery->set($pengumuman->text);

		$sqlQuery->setNumber($pengumuman->idPengumuman);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM pengumuman';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdPengumuman($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE id_pengumuman = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByDate($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDari($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByKepada($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE kepada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByJudul($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE judul = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM pengumuman WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdPengumuman($value){
		$sql = 'DELETE FROM pengumuman WHERE id_pengumuman = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDate($value){
		$sql = 'DELETE FROM pengumuman WHERE date = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDari($value){
		$sql = 'DELETE FROM pengumuman WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByKepada($value){
		$sql = 'DELETE FROM pengumuman WHERE kepada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJudul($value){
		$sql = 'DELETE FROM pengumuman WHERE judul = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM pengumuman WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from pengumuman';
		
		if ($where !== false){
			$sql.=' where ';
			$whereArr = array();
			foreach($where as $clause => $val) {
				$whereArr[] = $clause.'=\''.$val.'\'';
			}
			$sql.=' where '.implode(',',$whereArr);
		}
		$sqlQuery = new SqlQuery($sql);
		return $this->querySingleResult($sqlQuery);
	 }
	
	/**
	 * Read row
	 *
	 * @return Pengumuman
	 */
	protected function readRow($row){
		$pengumuman = new Pengumuman();
		
		$pengumuman->idPengumuman = $row['id_pengumuman'];
		$pengumuman->date = $row['date'];
		$pengumuman->dari = $row['dari'];
		$pengumuman->kepada = $row['kepada'];
		$pengumuman->judul = $row['judul'];
		$pengumuman->text = $row['text'];

		return $pengumuman;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return Pengumuman
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);

		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>