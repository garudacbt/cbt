<?php
/**
 * Class that operate on table 'chat'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-12-04 04:50
 */
class ChatMySqlDAO implements ChatDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return Chat
	 */
	public function load($id){
		$sql = 'SELECT * FROM chat WHERE id_chat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM chat';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM chat ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param chat primary key
 	 */
	public function delete($id_chat){
		$sql = 'DELETE FROM chat WHERE id_chat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_chat);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Chat chat
 	 */
	public function insert($chat){
		$sql = 'INSERT INTO chat (id_from, id_to, id_reply_to, created_on, updated_on, subject) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($chat->idFrom);
		$sqlQuery->setNumber($chat->idTo);
		$sqlQuery->setNumber($chat->idReplyTo);
		$sqlQuery->set($chat->createdOn);
		$sqlQuery->set($chat->updatedOn);
		$sqlQuery->set($chat->subject);

		$id = $this->executeInsert($sqlQuery);	
		$chat->idChat = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param Chat chat
 	 */
	public function update($chat){
		$sql = 'UPDATE chat SET id_from = ?, id_to = ?, id_reply_to = ?, created_on = ?, updated_on = ?, subject = ? WHERE id_chat = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($chat->idFrom);
		$sqlQuery->setNumber($chat->idTo);
		$sqlQuery->setNumber($chat->idReplyTo);
		$sqlQuery->set($chat->createdOn);
		$sqlQuery->set($chat->updatedOn);
		$sqlQuery->set($chat->subject);

		$sqlQuery->setNumber($chat->idChat);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM chat';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdChat($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE id_chat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdFrom($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE id_from = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdTo($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE id_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByIdReplyTo($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE id_reply_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByCreatedOn($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdatedOn($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryBySubject($value, $single = false){
		$sql = 'SELECT * FROM chat WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdChat($value){
		$sql = 'DELETE FROM chat WHERE id_chat = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdFrom($value){
		$sql = 'DELETE FROM chat WHERE id_from = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdTo($value){
		$sql = 'DELETE FROM chat WHERE id_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdReplyTo($value){
		$sql = 'DELETE FROM chat WHERE id_reply_to = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCreatedOn($value){
		$sql = 'DELETE FROM chat WHERE created_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdatedOn($value){
		$sql = 'DELETE FROM chat WHERE updated_on = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySubject($value){
		$sql = 'DELETE FROM chat WHERE subject = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from chat';
		
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
	 * @return Chat
	 */
	protected function readRow($row){
		$chat = new Chat();
		
		$chat->idChat = $row['id_chat'];
		$chat->idFrom = $row['id_from'];
		$chat->idTo = $row['id_to'];
		$chat->idReplyTo = $row['id_reply_to'];
		$chat->createdOn = $row['created_on'];
		$chat->updatedOn = $row['updated_on'];
		$chat->subject = $row['subject'];

		return $chat;
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
	 * @return Chat
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