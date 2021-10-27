<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Temp extends Basecontroller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Apimodel', 'api');
        $this->load->model('Gurumodel', 'guru');
        $this->load->model('Siswamodel', 'siswa');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->tp = $this->api->getTahunActive();
        $this->smt = $this->api->getSemesterActive();
        $this->setting = $this->api->getSetting();
    }

    public function index() {
        echo 'mobile api';
    }

    private function cekSession($idUser, $token) {
        if($this->input->method(true) != 'POST'){
            $this->result($this->statusNotOK, $this->wrongMethod);
            return false;
        } else {
            $valid = $this->isTokenValid($idUser, $token);
            if (!$valid) {
                $this->data['errcode'] = 'Token invalid';
                $this->result($this->statusNotOK, $this->denied);
                return false;
            } else {
                return true;
            }
        }
    }

    public function get(){
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');

        if ($this->cekSession($idUser, $token)) {
            $this->dao->load('users');
            $this->dao->load('users_groups');

            $user = $this->dao->getUsersDAO()->load($idUser);
            if ($user == null) {
                $this->data['errcode'] = $token;
                $this->result($this->statusNotOK, $this->denied);
                return;
            } else {

            }
        }
    }
}
