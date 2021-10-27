<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 04/05/2021
 * Time: 20:40
 */

class Basecontroller extends CI_Controller {

    //status
    public $statusOK = true;
    public $statusNotOK = false;

    //code
    public $granted = '1';
    public $denied = '2';
    public $cancelled = '3';
    public $needLogin = '4';
    public $errorLogin = '5';
    public $wrongMethod = '6';
    public $userNotExist = '7';

    //global variables
    public $setting;
    public $tp;
    public $smt;
    public $data = [];

    public function __construct(){
        parent::__construct();
        $this->load->database();

        $this->load->helper(['url', 'language']);
        $this->load->library('form_validation');
        $this->lang->load('auth');
        $this->load->model('Apimodel', 'api');
        $this->load->model('Log_model', 'logging');

        $this->load->model('DAOFactory', 'dao');
        $this->dao->load('users_groups');
        $this->dao->load('users');
    }

    protected function output_json($data){
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    protected function userTerdaftar($idUser) {
        //$this->dao->load('users');
        $user = $this->dao->getUsersDAO()->load($idUser);
        return $user != null;
    }

    protected function validate($idUser, $token, $method) {
        if($this->input->method(true) != $method){
            $this->result($this->statusNotOK, $this->wrongMethod);
            return;
        }

        if (!$this->isTokenValid($idUser, $token)) {
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

        if (!$this->userTerdaftar($idUser)) {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    protected function isAdmin($idUser){
        //$this->dao->load('users_groups');
        $userGroup = $this->dao->getUsersGroupsDAO()->queryByUserId($idUser, true);
        return $userGroup->group_id == '1';
    }

    /**
     * @return mixed
     */
    protected function isGuru($idUser){
        //$this->dao->load('users_groups');
        $userGroup = $this->dao->getUsersGroupsDAO()->queryByUserId($idUser, true);
        return $userGroup->group_id == '2';
    }

    /**
     * @return mixed
     */
    protected function isSiswa($idUser){
        $this->dao->load('users_groups');
        $userGroup = $this->dao->getUsersGroupsDAO()->queryByUserId($idUser, true);
        return $userGroup->group_id == '3';
    }

    protected function result($status, $code) {
        $message = 'Tidak diketahui';
        switch ($code) {
            case $this->needLogin :
                $message = 'Anda harus login terlebih dulu';
                break;
            case $this->granted :
                $message = 'access ok';
                break;
            case $this->denied :
                $message = 'access denied';
                break;
            case $this->cancelled :
                $message = 'cancelled';
                break;
            case $this->errorLogin :
                $message = 'Username atau Password salah';
                break;
            case $this->wrongMethod :
                $message = 'Salah metode';
                break;
            case $this->userNotExist :
                $message = 'Akun belum aktif, hubungi Admin.';
                break;
        }

        $this->data['success'] = $status;
        $this->data['message'] = $message;
        $this->data['code'] = $code;
        $this->output_json($this->data);
    }

    /*
    protected function cekSession($idUser, $token) {
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
    */

    protected function isTokenValid($id_user, $token) {
        $this->dao->load('api_token');
        $api = $this->dao->getApiTokenDAO()->queryByIdUser($id_user, true);
        $last = new DateTime($api->timestamp);
        $last->add(new DateInterval('PT12H'));
        $now = new DateTime();
        //$this->data['tkndb'] = $api->token;
        //$this->data['tknpost'] = $token;
        $valid = $now < $last;
        if ($token == $api->token && $valid) {
            return true;
        } else return false;
    }
}