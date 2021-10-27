<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 04/05/2021
 * Time: 20:40
 */

class Main_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        //$this->load->library('database');
    }

}