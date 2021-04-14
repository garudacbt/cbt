<?php
/**
 * ArrayList
 *
 * @author: Tomasz Jazwinski
 * @date: 2007-11-28
 */
class ArrayList{
	private $tab;
	private $size;

	public function __construct(){
		$this->tab = array();
		$this->size=0;
	}

	/**
	 * Dodanie wartosci do listy
	 */
	public function add($value){
		$this->tab[$this->size] = $value;
		$this->size = ($this->size) +1;
	}

	/**
	 * Pobranie elementu o numerze podanym
	 * jako parametr metody
	 */
	public function get($idx){
		return $this->tab[$idx];
	}

	/**
	 * Pobranie ostatniego elementu
	 */
	public function getLast(){
		if($this->size==0){
			return null;
		}
		return $this->tab[($this->size)-1];
	}

	/**
	 * Rozmiar listy
	 */
	public function size(){
		return $this->size;
	}

	/**
	 * Czy lista jest pusta
	 */
	public function isEmpty(){
		return ($this->size)==0;
	}

	/**
	 * Usuniecie ostatniego
	 */
	public function removeLast(){
		return $this->size = ($this->size) -1;
	}
}
?>