<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Jadwal extends Basecontroller {

    public function __construct(){
        parent::__construct();
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

    private function cekSession($idUser, $token) {
        if($this->input->method(true) != 'POST'){
            $this->result($this->statusNotOK, $this->wrongMethod);
            return;
        }

        $valid = $this->isTokenValid($idUser, $token);
        if (!$valid) {
            $this->result($this->statusNotOK, $this->denied);
            return;
        }

    }

    public function jadwalKelas() {
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

        $day = date('N', strtotime(date('Y-m-d')));
        $jadwal = $this->kelas_main->loadJadwalHariIni($this->tp->id_tp, $this->smt->id_smt);
        $kbms = $this->kelas_jadwal->getAllJadwalKbm($this->tp->id_tp, $this->smt->id_smt);

        foreach ($kbms as $kbm) {
            $kbm->istirahat = unserialize($kbm->istirahat);
        }

        $this->data['jadwal'] = $jadwal;
        $this->data['kbm'] = $kbms;
        $this->data['mapel'] = $this->mapel->getAllMapel($this->setting->jenjang);
        $this->data['hari'] = $this->db->select('*')->from('hari')->get()->result();
        $this->data['bulan'] = $this->db->select('*')->from('bulan')->get()->result();
        $this->result($this->statusOK, $this->granted);
    }
}
