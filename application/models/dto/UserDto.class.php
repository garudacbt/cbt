<?php
	/**
	 * Object represents table 'users'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2021-03-12 12:17	 
	 */
	class UserDto{
		
		var $id;
		var $ipAddress;
		var $username;
		var $password;
		var $email;
		var $activationSelector;
		var $activationCode;
		var $forgottenPasswordSelector;
		var $forgottenPasswordCode;
		var $forgottenPasswordTime;
		var $rememberSelector;
		var $rememberCode;
		var $createdOn;
		var $lastLogin;
		var $active;
		var $firstName;
		var $lastName;
		var $company;
		var $phone;
		
	}
?>