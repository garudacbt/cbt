<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 02/01/2023
 * Time: 19.25
 */

class Db_manager {
    var $connections = array();
    var $CI;

    function __construct() {
        $this->CI =& get_instance();
    }

    function get_connection() {
        include APPPATH . 'config/database.php';
        $db_name = $db['default']['database'];
        // connection exists? return it
        if ($db_name == '') {
            die();
        } else {
            if (isset($this->connections[$db_name])) {
                return $this->connections[$db_name];
            } else {
                // create connection. return it.
                $this->connections[$db_name] = $this->CI->load->database($db_name, true);
                return $this->connections[$db_name];
            }
        }
    }
}
