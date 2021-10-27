<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Siswamodel extends CI_Model {

    public function getDataSiswaById($idSiswa, $id_tp, $id_smt) {
        $this->db->select('*');
        $this->db->from('master_siswa a');
        $this->db->join('kelas_siswa b', 'a.id_siswa=b.id_siswa AND b.id_tp='.$id_tp.' AND b.id_smt='.$id_smt, 'left');
        $this->db->join('master_kelas c', 'b.id_kelas=c.id_kelas AND c.id_tp='.$id_tp.' AND c.id_smt='.$id_smt, 'left');
        $this->db->join('cbt_sesi_siswa d', 'a.id_siswa=d.siswa_id AND d.tp_id='.$id_tp.' AND d.smt_id='.$id_smt, 'left');
        $this->db->where('a.id_siswa', $idSiswa);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getDataSiswa($username, $id_tp, $id_smt) {
        $this->db->select('*');
        $this->db->from('master_siswa a');
        $this->db->join('kelas_siswa b', 'a.id_siswa=b.id_siswa AND b.id_tp='.$id_tp.' AND b.id_smt='.$id_smt, 'left');
        $this->db->join('master_kelas c', 'b.id_kelas=c.id_kelas AND c.id_tp='.$id_tp.' AND c.id_smt='.$id_smt, 'left');
        $this->db->join('cbt_sesi_siswa d', 'a.id_siswa=d.siswa_id AND d.tp_id='.$id_tp.' AND d.smt_id='.$id_smt, 'left');
        $this->db->where('a.username', $username);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getPostById($id_post) {
        $this->db->select('a.*, b.nama_guru, b.foto, (SELECT COUNT(post_comments.id_comment) FROM post_comments WHERE a.id_post = post_comments.id_post) AS jml');
        $this->db->from('post a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->where("a.kepada LIKE '%siswa%'");
        $this->db->where('a.id_post', $id_post);
        $posts = $this->db->get()->row();
        return $posts;
    }

    public function getAllPosts() {
        $this->db->select('a.*, b.nama_guru, b.foto, (SELECT COUNT(post_comments.id_comment) FROM post_comments WHERE a.id_post = post_comments.id_post) AS jml');
        $this->db->from('post a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->where("a.kepada LIKE '%siswa%'");
        $this->db->order_by('a.updated', 'desc');
        $posts = $this->db->get()->result();
        return $posts;
    }

    public function getPosts() {
        $this->db->select('a.*, b.nama_guru, b.foto, (SELECT COUNT(post_comments.id_comment) FROM post_comments WHERE a.id_post = post_comments.id_post) AS jml');
        $this->db->from('post a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->where("a.kepada LIKE '%siswa%'");
        $this->db->order_by('a.updated', 'desc');
        $posts = $this->db->get()->result();
        return $posts;
    }

    public function getCommentById($id_comment) {
        $this->db->select('a.*, b.nama_guru, b.foto, c.nama as nama_siswa, c.foto as foto_siswa, (SELECT COUNT(post_reply.id_reply) FROM post_reply WHERE a.id_comment = post_reply.id_comment) AS jml');
        $this->db->from('post_comments a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->join('master_siswa c', 'a.dari=c.id_siswa', 'left');
        $this->db->where('a.id_comment', $id_comment);
        $comment = $this->db->get()->row();
        return $comment;

    }

    public function getComment($id_post, $type, $page=null) {
        //$perPage = 5;
        //$offset = $page * $perPage;
        $this->db->select('a.*, b.nama_guru, b.foto, c.nama as nama_siswa, c.foto as foto_siswa, (SELECT COUNT(post_reply.id_reply) FROM post_reply WHERE a.id_comment = post_reply.id_comment) AS jml');
        $this->db->from('post_comments a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->join('master_siswa c', 'a.dari=c.id_siswa', 'left');
        $this->db->order_by('a.tanggal', 'asc');
        $this->db->where('a.type', $type);
        if ($id_post!=null) $this->db->where('a.id_post', $id_post);
        //$this->db->limit($perPage, $offset);
        $comment = $this->db->get()->result();
        return $comment;

    }

    public function getRepliesById($id_reply) {
        $this->db->select('a.*, b.nama_guru, b.foto, c.nama as nama_siswa, c.foto as foto_siswa');
        $this->db->from('post_reply a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->join('master_siswa c', 'a.dari=c.id_siswa', 'left');
        $this->db->where('a.id_reply', $id_reply);
        $replies = $this->db->get()->result_array();
        return $replies;
    }

    public function getReplies($id_comment, $type, $page) {
        //$perPage = 5;
        //$offset = $page * $perPage;
        $this->db->select('a.*, b.nama_guru, b.foto, c.nama as nama_siswa, c.foto as foto_siswa');
        $this->db->from('post_reply a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->join('master_siswa c', 'a.dari=c.id_siswa', 'left');
        //$this->db->order_by('a.tanggal', 'desc');
        //$this->db->where('a.id_comment', $id_comment);
        //$this->db->limit($perPage, $offset);
        $this->db->where('a.type', $type);
        $replies = $this->db->get()->result();
        return $replies;
    }

    public function getMateriHariIni($id_kelas, $tgl) {
        $this->db->select('a.*, b.id_kjm, b.id_kelas, b.jadwal_materi, c.id_guru, c.nama_guru, c.foto, d.nama_mapel, d.kode');
        $this->db->from('kelas_materi a');
        $this->db->join('kelas_jadwal_materi b', 'a.id_materi=b.id_materi');
        $this->db->join('master_guru c', 'a.id_guru=c.id_guru', 'left');
        $this->db->join('master_mapel d', 'a.id_mapel=d.id_mapel', 'left');
        $this->db->where("a.status", "1");
        $this->db->where("b.jadwal_materi", $tgl);
        $this->db->where("b.id_kelas", $id_kelas);
        //$this->db->where("b.id_mapel", $id_mapel);

        $result = $this->db->get()->result();
        return $result;
    }

    public function getAllMateri($id_kelas) {
        $this->db->select('a.*, b.id_kjm, b.id_kelas, b.jadwal_materi, c.id_guru, c.nama_guru, c.foto, d.nama_mapel, d.kode');
        $this->db->from('kelas_materi a');
        $this->db->join('kelas_jadwal_materi b', 'a.id_materi=b.id_materi');
        $this->db->join('master_guru c', 'a.id_guru=c.id_guru', 'left');
        $this->db->join('master_mapel d', 'a.id_mapel=d.id_mapel', 'left');
        $this->db->where("a.jenis", "1");
        $this->db->where("a.status", "1");
        $this->db->where("b.id_kelas", $id_kelas);
        //$this->db->where("b.id_mapel", $id_mapel);

        $result = $this->db->get()->result();
        return $result;
    }

    public function getAllTugas($id_kelas) {
        $this->db->select('a.*, b.id_kjm, b.id_kelas, b.jadwal_materi, c.id_guru, c.nama_guru, c.foto, d.nama_mapel, d.kode');
        $this->db->from('kelas_materi a');
        $this->db->join('kelas_jadwal_materi b', 'a.id_materi=b.id_materi');
        $this->db->join('master_guru c', 'a.id_guru=c.id_guru', 'left');
        $this->db->join('master_mapel d', 'a.id_mapel=d.id_mapel', 'left');
        $this->db->where("a.jenis", "2");
        $this->db->where("a.status", "1");
        $this->db->where("b.id_kelas", $id_kelas);

        $result = $this->db->get()->result();
        return $result;
    }

    /*
     * SEMUA
     * 1 = membuka materi
     * 2 = selesai materi
     */

    public function saveLog($table, $id_siswa, $id_kjm, $jamke, $address, $agent, $device, $type, $desc) {
        if ($table === 'log_materi') {
            $data = array(
                'id_log' => $id_siswa.$id_kjm.$type,
                'id_siswa' => $id_siswa,
                'id_materi' => $id_kjm,
                'jam_ke' => $jamke,
                'log_type' => $type,
                'log_desc' => $desc,
                'address' => $address,
                'agent' => $agent,
                'device' => $device,
            );
        } else {
            $data = array(
                'id_log' => $id_siswa.$id_kjm.$type,
                'id_siswa' => $id_siswa,
                'id_tugas' => $id_kjm,
                'jam_ke' => $jamke,
                'log_type' => $type,
                'log_desc' => $desc,
                'address' => $address,
                'agent' => $agent,
                'device' => $device,
            );
        }

        $insert = $this->db->insert($table, $data);
        return $insert;
    }

    public function getLogMateri($id_siswa, $id_kjm){
        $this->db->select('*');
        $this->db->from('log_materi');
        $this->db->where("id_materi", $id_kjm);
        $result = $this->db->get()->row();
        return $result;
    }
}