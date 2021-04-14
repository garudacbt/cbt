<?php
/**
 * Object represents sql query with params
 *
 * @author: http://phpdao.com
 * @date: 27.10.2007
 */
class SqlQuery{
	var $txt;
	var $params = array();
	var $idx = 0;

	/**
	 * Constructor
	 *
	 * @param String $txt zapytanie sql
	 */
	function __construct($txt){
		$this->txt = $txt;
	}

    private function getConnection(){
        $transaction = Transaction::getCurrentTransaction();
        if(!$transaction){
            $connection = new Connection();
        }else{
            $connection = $transaction->getConnection();
        }
        return $connection;
    }

	/**
	 * Set string param
	 *
	 * @param String $value value set
	 */
	public function setString($value){
        $conn = $this->getConnection();
		$value = $conn->escape ($value);
		$this->params[$this->idx++] = "'".$value."'";
	}
	
	/**
	 * Set string param
	 *
	 * @param String $value value to set
	 */
	public function set($value){
        $conn = $this->getConnection();
		$value = $conn->escape($value);
		$this->params[$this->idx++] = "'".$value."'";
	}
	

	/**
	 * Metoda zamienia znaki zapytania
	 * na wartosci przekazane jako parametr metody
	 *
	 * @param String $value wartosc do wstawienia
	 */
	public function setNumber($value){
		if($value===null){
			$this->params[$this->idx++] = "null";
			return;
		}
		if(!is_numeric($value)){
			throw new Exception($value.' is not a number');
		}
		$this->params[$this->idx++] = "'".$value."'";
	}

	/**
	 * Get sql query
	 *
	 * @return String
	 */
	public function getQuery(){
		if($this->idx==0){
			return $this->txt;
		}
		$p = explode("?", $this->txt);
		$sql = '';
		for($i=0;$i<=$this->idx;$i++){
			if($i>=count($this->params)){
				$sql .= $p[$i];
			}else{
				$sql .= $p[$i].$this->params[$i];
			}
		}
		return $sql;
	}
	
	/**
	 * Function replace first char
	 *
	 * @param String $str
	 * @param String $old
	 * @param String $new
	 * @return String
	 */
	private function replaceFirst($str, $old, $new){
		$len = strlen($str);
		for ($i=0;$i<$len;$i++){
			if($str[$i]==$old){
				$str = substr($str,0,$i).$new.substr($str,$i+1);
				return $str;
			}
		}
		return $str;
	}
}
?>