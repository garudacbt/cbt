<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 23/06/2020
 * Time: 20.54
 */

class ModelDtoLoader {
	public function __construct(){
		spl_autoload_register(array($this, 'loader'));
	}

	public function loader($className){
		if (substr($className, 0, 6) == 'models')
			require  APPPATH .  str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.class.php';
	}

}
