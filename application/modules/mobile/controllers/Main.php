<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Main extends Basecontroller {

    public function __construct(){
        parent::__construct();
        $this->load->database();

        $this->load->model('Adminmodel', 'admin');
        $this->load->model('Gurumodel', 'guru');
        $this->load->model('Siswamodel', 'siswa');
        $this->load->model('Mapelmodel', 'mapel');

        $this->load->model('Kelasmainmodel', 'kelas_main');
        $this->load->model('Kelasjadwalmodel', 'kelas_jadwal');
        $this->load->model('Cbtjadwalmodel', 'cbt_jadwal');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->tp = $this->api->getTahunActive();
        $this->smt = $this->api->getSemesterActive();
        $this->setting = $this->api->getSetting();
    }

    public function index() {
        echo 'mobile api';
    }

    public function cekToken() {
        $id = $this->input->post('id_user', true);
        $token = $this->input->post('token');
        if ($id == null){
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

        if ($token == null){
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

        $valid = $this->isTokenValid($id, $token);
        $data['success'] = $valid;
        $data['message'] = $valid ? "access ok" : "need login";
        $data['code'] = $valid ? "1" : "3";
        $this->output_json($data);
    }

    public function siswa() {
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');

        $this->dao->load('users');
        $this->dao->load('users_groups');

        $user = $this->dao->getUsersDAO()->load($idUser);
        if ($user==null) {
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

        $siswa = $this->siswa->getDataSiswa($user->username, $this->tp->id_tp, $this->smt->id_smt);
        $siswa->jumlah_siswa = unserialize($siswa->jumlah_siswa);
        $this->data['siswa'] = $siswa;
        $this->result($this->statusOK, $this->granted);
    }

    /**
     * akses localhost/main/mobile/main/dashboard
     */

    public function menu(){
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        if ($this->isAdmin($idUser)) {
            $this->data['info_box'] = $this->api->admin_box();
            $this->data['ujian_box'] = $this->api->ujian_box();

            $this->result($this->statusOK, $this->granted);
            return;
        } elseif ($this->isGuru($idUser)) {
            $this->data['info_box'] = $this->api->admin_box();//$this->guru_box();
            $this->data['ujian_box'] = $this->api->ujian_box();
            $this->result($this->statusOK, $this->granted);
            return;
        } elseif ($this->isSiswa($idUser)) {
            $this->data['menu'] = $this->api->menu_siswa_box();
            $this->result($this->statusOK, $this->granted);
            return;
        } else {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    public function runningText(){
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        if ($this->isSiswa($idUser)) {
            $this->data['running_text'] = $this->api->getRunningText();
            $this->result($this->statusOK, $this->granted);
            return;
        } else {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    public function kelas(){
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        if ($this->isSiswa($idUser)) {
            $kelases = $this->kelas_main->getAllKelas($this->tp->id_tp, $this->smt->id_smt);
            foreach ($kelases as $kelas) {
                $kelas->jumlah_siswa = unserialize($kelas->jumlah_siswa);
            }
            $this->data['kelases']	= $kelases;

            $this->result($this->statusOK, $this->granted);
            return;
        } else {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    public function setting(){
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        if ($this->isSiswa($idUser)) {
            $where = '';
            if ($this->setting->jenjang == "1") {
                $where = 'jenjang=0 OR jenjang=1';
            } elseif ($this->setting->jenjang == "2") {
                $where = 'jenjang=2 OR jenjang=1';
            }
            $this->setting->jml_siswa = $this->api->total('master_siswa');
            $this->setting->jml_kelas = $this->api->total('master_kelas');
            $this->setting->jml_guru = $this->api->total('master_guru');
            $this->setting->jml_wali = $this->api->totalWaliKelas();
            $this->setting->jml_mapel = $this->api->total('master_mapel', $where);
            $this->setting->jml_ekstra = $this->api->total('master_ekstra');
            $this->setting->jml_ruang = $this->api->total('cbt_ruang');
            $this->setting->jml_sesi = $this->api->total('cbt_sesi');
            $this->data['setting']     = $this->setting;
            $this->result($this->statusOK, $this->granted);
            return;
        } else {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    public function dashboard(){
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');

        $this->dao->load('users');
        $this->dao->load('users_groups');

        $user = $this->dao->getUsersDAO()->load($idUser);
        if ($user==null) {
            $this->data['errcode'] = $token;
            $this->result($this->statusNotOK, $this->denied);
            return;
        } else {

            $kelases = $this->kelas_main->getAllKelas($this->tp->id_tp, $this->smt->id_smt);
            foreach ($kelases as $kelas) {
                $kelas->jumlah_siswa = unserialize($kelas->jumlah_siswa);
            }

            $where = '';
            if ($this->setting->jenjang == "1") {
                $where = 'jenjang=0 OR jenjang=1';
            } elseif ($this->setting->jenjang == "2") {
                $where = 'jenjang=2 OR jenjang=1';
            }

            $this->data['kelases']	= $kelases;
            $this->setting->jml_siswa = $this->api->total('master_siswa');
            $this->setting->jml_kelas = $this->api->total('master_kelas');
            $this->setting->jml_guru = $this->api->total('master_guru');
            $this->setting->jml_wali = $this->api->totalWaliKelas();
            $this->setting->jml_mapel = $this->api->total('master_mapel', $where);
            $this->setting->jml_ekstra = $this->api->total('master_ekstra');
            $this->setting->jml_ruang = $this->api->total('cbt_ruang');
            $this->setting->jml_sesi = $this->api->total('cbt_sesi');
            $this->data['setting']     = $this->setting;

            $userGroup = $this->dao->getUsersGroupsDAO()->queryByUserId($idUser, true);
            if ($userGroup->group_id == '1') {
                $this->data['info_box'] = $this->api->admin_box();
                $this->data['ujian_box'] = $this->api->ujian_box();
                $this->data['profile'] = $this->admin->getProfileAdmin($user->id);

                $this->result($this->statusOK, $this->granted);
                return;
            } elseif ($userGroup->group_id == '2') {
                $guru = $this->guru->getDataGuruByUserId($user->id, $this->tp->id_tp, $this->smt->id_smt);
                $this->data['info_box'] = $this->api->admin_box();//$this->guru_box();
                $this->data['ujian_box'] = $this->api->ujian_box();
                $this->data['guru'] = $guru;
                //$this->data['jadwals'] = $jadwal;
                //$this->data['kbms'] = $kbms;
                //$this->data['mapels'] = $this->mapel->getAllMapel($this->setting->jenjang);

                $this->result($this->statusOK, $this->granted);
                return;
            } elseif ($userGroup->group_id == '3') {
                $this->data['menu'] = $this->api->menu_siswa_box();
                $this->data['running_text'] = $this->api->getRunningText();
                $this->result($this->statusOK, $this->granted);
                return;
            } else {
                $this->data['errcode'] = 'Usergroup invalid'.$idUser;
                $this->result($this->statusNotOK, $this->denied);
                return;
            }

        }
    }

    /**
     * akses localhost/main/mobile/main/login
     */
    public function login() {
        if($this->input->method(true) != 'POST'){
            $this->result($this->statusNotOK, $this->wrongMethod);
            return;
        } else {
            $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required|trim');
            $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required|trim');

            if ($this->form_validation->run() === TRUE)	{
                $remember = (bool)$this->input->post('remember');
                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
                    $this->cek_akses();
                }else {
                    $this->result($this->statusNotOK, $this->errorLogin);
                    return;
                }
            }else{
                $this->result($this->statusNotOK, $this->denied);
                return;
            }
        }
    }

    private function cek_akses() {
        if (!$this->ion_auth->logged_in()){
            $this->result($this->statusNotOK, $this->errorLogin);
            return;
        } else {
            $this->dao->load('api_token');
            $api = $this->dao->getApiTokenDAO()->queryByIdUser($this->ion_auth->user()->row()->id, true);
            if ($api == null) {
                $api = new ApiTokenDTO();
                $api->timestamp = date('Y-m-d H:i:s');
                $api->id_user = $this->ion_auth->user()->row()->id;
                $api->token = bin2hex(random_bytes(100));

                $this->dao->getApiTokenDAO()->insert($api);
            } else {
                $api->timestamp = date('Y-m-d H:i:s');
                $api->token = bin2hex(random_bytes(100));
                $this->dao->getApiTokenDAO()->update($api);
            }

            $this->data['api'] = $api;
            $user = $this->ion_auth->user()->row();
            $this->data['user']         = $user;

            $siswa = $this->siswa->getDataSiswa($user->username, $this->tp->id_tp, $this->smt->id_smt);
            $siswa->jumlah_siswa = unserialize($siswa->jumlah_siswa);
            $this->data['siswa'] = $siswa;

            $this->data['tp']           = $this->api->getTahun();
            $this->data['tp_active']    = $this->tp;
            $this->data['smt']          = $this->api->getSemester();
            $this->data['smt_active']   = $this->smt;

            $this->logging->saveLog(1, 'Login');
            $this->result($this->statusOK, $this->granted);
            return;
        }
    }

    public function pengumuman() {
        $for = $this->input->post('for');
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');

        $this->cekSession($idUser, $token);

        $this->dao->load('users');
        $this->dao->load('users_groups');

        $user = $this->dao->getUsersDAO()->load($idUser);
        if ($user==null) {
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

        $this->data['pengumuman'] = $this->api->loadPengumuman($for);
        $this->result($this->statusOK, $this->granted);
        //$this->output_json($this->dashboard->loadPengumuman($for));
    }

    /**
     * akses localhost/main/mobile/main/logout
     */
    public function logout(){
        $idUser = $this->input->post('id_user');
        $delete = $this->db->delete("api_token", "id_user=".$idUser);
        $this->result($delete, $this->needLogin);
    }
}