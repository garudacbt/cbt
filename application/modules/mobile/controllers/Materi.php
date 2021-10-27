<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Materi extends Basecontroller {

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

    public function materiKelas() {
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $idKelas = $this->input->get('id_kelas');
        $idSiswa = $this->input->get('id_siswa');
        $jadwal = $this->input->get('jadwal');
        $this->validate($idUser, $token, 'GET');

        //$numday = date('N', strtotime(date("Y-m-d")));
        $today = date("Y-m-d");
        //$jadwal = $this->kelas->loadJadwalSiswaHariIni($this->tp->id_tp, $this->smt->id_smt, $idKelas, $numday);

        //$materis = $this->siswa->getAllMateri($idKelas);
        $materis = $this->siswa->getMateriHariIni($idKelas, $jadwal);
        foreach ($materis as $materi) {
            $materi->materi_kelas = unserialize($materi->materi_kelas);
            $materi->file = unserialize($materi->file);
        }
        $this->data['all_materi'] = $materis;
        //$logs = $this->db->get('log_materi')->result();
        $logs = $this->db->get_where('log_materi', 'id_siswa='.$idSiswa)->result();
        foreach ($logs as $log) {
            $log->file = $log->file == null ? [] : unserialize($log->file);
        }
        $this->data['log_materi'] = $logs;
        $this->data['komentar'] = $this->siswa->getComment(null, '2', null);
        $this->data['balasan'] = $this->siswa->getReplies(null, '2',  null);
        $this->result($this->statusOK, $this->granted);
        return;

    }

    public function saveLogMateri() {
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');
        $id_siswa = $this->input->post('id_siswa', true);
        $id_kjm = $this->input->post('id_kjm', true);
        $jamke = $this->input->post('jamke', true);

        $address = $this->input->post('address', true);
        $agent = $this->input->post('agent', true);
        $device = $this->input->post('device', true);

        if ($this->cekSession($idUser, $token)) {
            $this->dao->load('users');
            $this->dao->load('users_groups');

            $user = $this->dao->getUsersDAO()->load($idUser);
            if ($user == null) {
                $this->data['errcode'] = $token;
                $this->result($this->statusNotOK, $this->denied);
                return;
            } else {

                $this->siswa->saveLog('log_materi', $id_siswa, $id_kjm, $jamke, $address, $agent, $device, 1, 'Membuka materi');
                sleep(3);
                $this->data['log_materi'] = $this->siswa->getLogMateri($id_siswa, $id_kjm);
                $this->data['errcode'] = $token;
                $this->result($this->statusOK, $this->granted);
                return;
            }
        }
    }

    public function saveKomentar(){
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
        $dari = $this->input->post('id_siswa');
        $dari_group = $this->input->post('group');;
        $data = [
            'type' => "2",
            'id_post' => $this->input->post('id_post'),
            'dari' => $dari,
            'dari_group' => $dari_group,
            'text' => $this->input->post('text'),
        ];

        $status = $this->db->replace('post_comments', $data);
        $insert_id = $this->db->insert_id();
        sleep(3);
        $this->data['komentar'] = $this->siswa->getCommentById($insert_id);
        $this->result($status, $this->granted);
    }

    public function hapusKomentar(){
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

        $id_comment = $this->input->post('id_comment');
        $this->db->trans_start();

        $this->db->where('id_comment', $id_comment);
        $deleted = $this->db->delete('post_comments');

        $this->db->where('id_comment', $id_comment);
        $this->db->delete('post_reply');

        $this->db->trans_complete();

        $this->result($deleted, $this->granted);
    }

    public function saveBalasan(){
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
        $dari = $this->input->post('id_siswa');
        $dari_group = $this->input->post('group');;
        $data = [
            'id_comment' => $this->input->post('id_comment'),
            'type' => "2",
            'dari' => $dari,
            'dari_group' => $dari_group,
            'text' => $this->input->post('text'),
        ];

        $status = $this->db->replace('post_reply', $data);

        $id = $this->db->insert_id();
        sleep(5);
        $this->data['balasan'] = $this->siswa->getRepliesById($id);
        $this->result($status, $this->granted);
    }

    public function hapusBalasan(){
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

        $id_reply = $this->input->post('id_reply');
        $this->db->trans_start();

        $this->db->where('id_reply', $id_reply);
        $deleted = $this->db->delete('post_reply');

        $this->db->trans_complete();

        $this->result($deleted, $this->granted);
    }

}
