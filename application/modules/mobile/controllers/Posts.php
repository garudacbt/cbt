<?php
/**
 * Created by IntelliJ IDEA.
 * User: multazam
 * Date: 07/07/20
 * Time: 14:10
 */

class Posts extends Basecontroller {

    public function __construct() {
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

    public function output_json($data, $encode = true) {
        if ($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function index() {

    }

    public function pengumuman() {
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        if ($this->isSiswa($idUser)) {
            $data['pengumuman'] = $this->siswa->getPosts();
            $data['komentar'] = $this->siswa->getComment(null, '1', null);
            $data['balasan'] = $this->siswa->getReplies(null, '1',  null);
            $this->data['post'] = $data;

            $this->result($this->statusOK, $this->granted);
            return;
        } else {
            $this->result($this->statusNotOK, $this->userNotExist);
            return;
        }
    }

    public function pengumumanById() {
        $idPost = $this->input->get('id_post');
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        $this->data['pengumuman'] = $this->siswa->getPostById($idPost);
        $this->result($this->statusOK, $this->granted);
    }

    public function saveKomentar(){
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');
        $this->validate($idUser, $token, 'POST');

        $dari = $this->input->post('id_siswa');
        $dari_group = $this->input->post('group');
        $data = [
            'type' => "1",
            'id_post' => $this->input->post('id_post'),
            'dari' => $dari,
            'dari_group' => $dari_group,
            'text' => $this->input->post('text'),
        ];

        $status = $this->db->replace('post_comments', $data);
        $insert_id = $this->db->insert_id();
        sleep(2);
        $this->data['komentar'] = $this->siswa->getCommentById($insert_id);
        $this->result($status, $this->granted);
    }

    public function getKomentarByIdPost() {
        $idPost = $this->input->get('id_post');
        $idUser = $this->input->get('id_user');
        $token = $this->input->get('token');
        $this->validate($idUser, $token, 'GET');

        $this->data['komentar'] = $this->siswa->getComment($idPost, 0);
        $this->result($this->statusOK, $this->granted);
    }

    public function saveBalasan(){
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');
        $this->validate($idUser, $token, 'POST');

        $dari = $this->input->post('id_siswa');
        $dari_group = $this->input->post('group');;
        $data = [
            'type' => "1",
            'id_comment' => $this->input->post('id_comment'),
            'dari' => $dari,
            'dari_group' => $dari_group,
            'text' => $this->input->post('text'),
        ];

        $status = $this->db->replace('post_reply', $data);

        $id = $this->db->insert_id();
        sleep(2);
        $this->data['balasan'] = $this->siswa->getRepliesById($id);
        $this->result($status, $this->granted);
    }

    public function hapusKomentar(){
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');
        $this->validate($idUser, $token, 'POST');

        $id_comment = $this->input->post('id_comment');
        $this->db->trans_start();

        $this->db->where('id_comment', $id_comment);
        $deleted = $this->db->delete('post_comments');

        $this->db->where('id_comment', $id_comment);
        $this->db->delete('post_reply');

        $this->db->trans_complete();

        $this->result($deleted, $this->granted);
    }

    public function hapusBalasan(){
        $id_reply = $this->input->post('id_reply');
        $idUser = $this->input->post('id_user');
        $token = $this->input->post('token');
        $this->validate($idUser, $token, 'POST');

        $this->db->trans_start();

        $this->db->where('id_reply', $id_reply);
        $deleted = $this->db->delete('post_reply');

        $this->db->trans_complete();

        $this->result($deleted, $this->granted);
    }

    public function getRunningText() {
        $data['running_text'] = $this->dashboard->getRunningText();
        $this->output_json($data);
    }

    public function saveRunningText() {
        /*
        $text = $this->input->post('text', true);
        $insert = $this->master->create('running_text', ['text' => $text], false);
        $this->output_json($insert);
        */
        $input = json_decode($this->input->post('text', true));
        $updates = [];
        foreach ($input as $d) {
            $data = [
                'id_text' => $d->id_text,
                'text' => $d->text,
                ];
            $update = $this->db->replace('running_text', $data);
            array_push($updates, $update);
        }
        $data['status'] = $updates;
        $this->output_json($data);

    }

    public function hapusRunningText($id) {
        $this->db->where('id_text', $id);
        $deleted = $this->db->delete('running_text');
        $this->output_json($deleted);
    }
}
