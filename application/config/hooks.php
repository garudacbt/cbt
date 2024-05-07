<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller'] = array(       // post_controller menunjukan eksekusi hooks                                                                                    setelah pengontrolan selesai
    'class'    => 'Db_log',         // Nama Class
    'function' => 'logQueries',     // Nama method yang di eksekusi dari class
    'filename' => 'Db_log.php',     // Nama File Hook
    'filepath' => 'hooks'           // nama folder tempat file hook disimpan
);