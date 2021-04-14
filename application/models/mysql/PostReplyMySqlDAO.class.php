<?php
/**
 * Class that operate on table 'post_reply'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-25 11:46
 */
class PostReplyMySqlDAO implements PostReplyDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PostReplyDTO
	 */
	public function load($id){
		$sql = 'SELECT * FROM post_reply WHERE id_reply = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM post_reply';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM post_reply ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param postReply primary key
 	 */
	public function delete($id_reply){
		$sql = 'DELETE FROM post_reply WHERE id_reply = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id_reply);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostReplyDTO postReply
 	 */
	public function insert($postReply){
		$sql = 'INSERT INTO post_reply (id_comment, dari, dari_group, text, tanggal, updated) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($postReply->idComment);
		$sqlQuery->setNumber($postReply->dari);
		$sqlQuery->setNumber($postReply->dariGroup);
		$sqlQuery->set($postReply->text);
		$sqlQuery->set($postReply->tanggal);
		$sqlQuery->set($postReply->updated);

		$id = $this->executeInsert($sqlQuery);	
		$postReply->idReply = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostReplyDTO postReply
 	 */
	public function update($postReply){
		$sql = 'UPDATE post_reply SET id_comment = ?, dari = ?, dari_group = ?, text = ?, tanggal = ?, updated = ? WHERE id_reply = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($postReply->idComment);
		$sqlQuery->setNumber($postReply->dari);
		$sqlQuery->setNumber($postReply->dariGroup);
		$sqlQuery->set($postReply->text);
		$sqlQuery->set($postReply->tanggal);
		$sqlQuery->set($postReply->updated);

		$sqlQuery->setNumber($postReply->idReply);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM post_reply';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	/**
	* @param $sql
	* @param bool $single
	*/
	public function execQuery($sql, $single = false) {
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
	public function queryByKeys($arr_values, $single = false){
		$no = 0;
		$count = count($arr_values);
		$values = [];
		$sql = 'SELECT * FROM post_reply WHERE ';
		foreach ($arr_values as $key=>$value) {
			$sql .= $key.' = ?';
			if(++$no !== $count) {
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

	public function queryByIdReply($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE id_reply = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
			return $this->getList($sqlQuery);
	}

	public function queryByIdComment($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDari($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByDariGroup($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE dari_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByText($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByTanggal($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}

	public function queryByUpdated($value, $single = false){
		$sql = 'SELECT * FROM post_reply WHERE updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		if ($single === true)
			return $this->getRow($sqlQuery);
		else
		return $this->getList($sqlQuery);
	}


	public function deleteByIdReply($value){
		$sql = 'DELETE FROM post_reply WHERE id_reply = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIdComment($value){
		$sql = 'DELETE FROM post_reply WHERE id_comment = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDari($value){
		$sql = 'DELETE FROM post_reply WHERE dari = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDariGroup($value){
		$sql = 'DELETE FROM post_reply WHERE dari_group = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByText($value){
		$sql = 'DELETE FROM post_reply WHERE text = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTanggal($value){
		$sql = 'DELETE FROM post_reply WHERE tanggal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUpdated($value){
		$sql = 'DELETE FROM post_reply WHERE updated = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


			
	/**
	 * Get number of rows
	 */
	 public function numRows($where=false) {
		$sql = 'SELECT COUNT(*) as total from post_reply';
		
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
	 * @return PostReplyDTO
	 */
	protected function readRow($row){
		$postReply = new PostReplyDTO();
		
		$postReply->idReply = isset($row['id_reply']) ? $row['id_reply'] : null;
		$postReply->idComment = isset($row['id_comment']) ? $row['id_comment'] : null;
		$postReply->dari = isset($row['dari']) ? $row['dari'] : null;
		$postReply->dariGroup = isset($row['dari_group']) ? $row['dari_group'] : null;
		$postReply->text = isset($row['text']) ? $row['text'] : null;
		$postReply->tanggal = isset($row['tanggal']) ? $row['tanggal'] : null;
		$postReply->updated = isset($row['updated']) ? $row['updated'] : null;

		return $postReply;
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
	 * @return PostReplyDTO
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