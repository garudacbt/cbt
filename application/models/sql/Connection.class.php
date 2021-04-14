<?php
/**
 * Object represents connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class Connection{
	private $connection;

	public function __construct(){
		$this->connection = ConnectionFactory::getConnection();
	}

	public function close(){
		ConnectionFactory::close($this->connection);
	}

    public function getError() {
        return $this->connection->error;
    }
    public function getAffectedRows() {
        return $this->connection->affected_rows;
    }
    public function getInsertedId()
    {
        return $this->connection->insert_id;
    }

    public function escape($value) {
        return $this->connection->real_escape_string($value);
    }

	/**
	 * Wykonanie zapytania sql na biezacym polaczeniu
	 *
	 * @param sql zapytanie sql
	 * @return wynik zapytania
	 */
	public function executeQuery($sql){
		return $this->connection->query($sql);
	}
}
?>