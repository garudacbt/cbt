<?php
/*
 * Class return connection to database
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class ConnectionFactory{
	
	/**
	 * Zwrocenie polaczenia
	 *
	 * @return mysqli
	 */
	static public function getConnection(){
		$conn = new mysqli(ConnectionProperty::getHost(), ConnectionProperty::getUser(), ConnectionProperty::getPassword(), ConnectionProperty::getDatabase());
		if(mysqli_connect_errno()){
			throw new Exception('could not connect to database ('.mysqli_connect_error().')');
		}
		return $conn;
	}

	/**
	 * Zamkniecie polaczenia
	 *
	 * @param connection
	 */
	static public function close($connection){
		$connection->close();
	}
}
?>