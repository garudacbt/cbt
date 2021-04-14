<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('database.php');

$host 		= $db['default']['hostname'];
$username 	= $db['default']['username'];
$pass 		= $db['default']['password'];
$db 		= $db['default']['database'];

ORM::configure('mysql:host='.$host.';dbname='.$db.'');
ORM::configure('username', $username);
ORM::configure('password', $pass);
ORM::configure('logging', true);