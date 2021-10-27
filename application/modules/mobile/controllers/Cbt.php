<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Cbt extends CI_Controller {

    //status
    public $statusOK = true;
    public $statusNotOK = false;

    //code
    public $granted = '1';
    public $denied = '2';
    public $cancelled = '3';
    public $needLogin = '4';
    public $logout = '4';

    //global variables
    public $setting;
    public $user;
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

        $this->load->model('Adminmodel', 'admin');
        $this->load->model('Gurumodel', 'guru');
        $this->load->model('Siswamodel', 'siswa');

        $this->load->model('Kelasjadwalmodel', 'kelas_jadal');
        $this->load->model('Cbtjadwalmodel', 'cbt_jadal');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->tp = $this->api->getTahunActive();
        $this->smt = $this->api->getSemesterActive();
        $this->setting = $this->api->getSetting();
        $this->user = $this->ion_auth->user()->row();
    }

    public function index() {
        echo 'mobile api';
    }

    public function output_json($data){
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    private function setDataResult($title, $subtitle) {
        $this->data = [
            'user' 			=> $this->user,
            'judul'			=> $title,
            'subjudul'		=> $subtitle,
            'setting'		=> $this->setting,
            'tp'            => $this->api->getTahun(),
            'tp_active'     => $this->tp,
            'smt'           => $this->api->getSemester(),
            'smt_active'    => $this->smt,
        ];
    }

    private function result($status, $code, $datas) {
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
        }

        $this->data['status'] = $status;
        $this->data['message'] = $message;
        $this->data['code'] = $code;
        $this->data['data'] = $datas;
        $this->output_json($this->data);
    }

    public function isGuru(){
        return $this->ion_auth->in_group('guru');
    }

    public function isSiswa(){
        return $this->ion_auth->in_group('siswa');
    }
}
