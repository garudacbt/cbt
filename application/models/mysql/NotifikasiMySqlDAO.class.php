<?php
/**
 * Class that operate on table 'notifikasi'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
class NotifikasiMySqlDAO implements NotifikasiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return Notifikasi
	 */
	public function load($id){
		$sql = 'SELECT * FROM notifikasi WHERE id_noty = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM notifikasi';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM notifikasi ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param notifikasi primary key
 	 */
	public function delete($id_noty){
		$sql = 'DELETE FROM notifikasi WHERE id_noty = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_noty);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Notifikasi notifikasi
 	 */
	public function insert($notifikasi){
		$sql = 'INSERT INTO notifikasi (id_user, created_on, subject, type, user_group) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notifikasi->idUser);
		$sqlQuery->setNumber($notifikasi->createdOn);
		$sqlQuery->set($notifikasi->subject);
		$sqlQuery->setNumber($notifikasi->type);
		$sqlQuery->setNumber($notifikasi->userGroup);

		$id = $this->executeInsert($sqlQuery);	
		$notifikasi->idNoty = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Notifikasi notifikasi
 	 */
	public function update($notifikasi){
		$sql = 'UPDATE notifikasi SET id_user = ?, created_on = ?, subject = ?, type = ?, user_group = ? WHERE id_noty = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notifikasi->idUser);
		$sqlQuery->setNumber($notifikasi->createdOn);
		$sqlQuery->set($notifikasi->subject);
		$sqlQuery->setNumber($notifikasi->type);
		$sqlQuery->setNumber($notifikasi->userGroup);

		$sqlQuery->setNumber($notifikasi->idNoty);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM notifikasi';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdNoty($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE id_noty = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdUser($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySubject($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByType($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUserGroup($value, $single = false){
		$sql = 'SELECT * FROM notifikasi WHERE user_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdNoty($value){
		$sql = 'DELETE FROM notifikasi WHERE id_noty = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdUser($value){
		$sql = 'DELETE FROM notifikasi WHERE id_user = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM notifikasi WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubject($value){
		$sql = 'DELETE FROM notifikasi WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByType($value){
		$sql = 'DELETE FROM notifikasi WHERE type = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserGroup($value){
		$sql = 'DELETE FROM notifikasi WHERE user_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from notifikasi';
		
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
	 * @return Notifikasi
	 */
	protected function readRow($row){
		$notifikasi = new Notifikasi();
		
		$notifikasi->idNoty = $row['id_noty'];
		$notifikasi->idUser = $row['id_user'];
		$notifikasi->createdOn = $row['created_on'];
		$notifikasi->subject = $row['subject'];
		$notifikasi->type = $row['type'];
		$notifikasi->userGroup = $row['user_group'];

		return $notifikasi;
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
	 * @return Notifikasi
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