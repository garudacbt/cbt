<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Gurumodel extends CI_Model {

    public function getDataGuruByUserId($id_user, $id_tp, $id_smt) {
        $this->db->select('a.id_guru, a.nama_guru, a.id_user, a.foto, b.id_jabatan, b.id_kelas as wali_kelas, f.level_id, g.level');
        $this->db->from('master_guru a');
        $this->db->join('jabatan_guru b', 'a.id_guru=b.id_guru AND b.id_tp='.$id_tp.' AND b.id_smt='.$id_smt, 'left');
        //$this->db->join('jabatan_guru b', 'a.id_guru=b.id_guru AND b.id_tp='.$id_tp, 'left');
        $this->db->join('level_guru e', 'b.id_jabatan=e.id_level', 'left');
        $this->db->join('master_kelas f', 'a.id_guru=f.guru_id AND f.id_tp='.$id_tp.' AND f.id_smt='.$id_smt, 'left');
        $this->db->join('level_kelas g', 'f.level_id=g.id_level', 'left');
        //$this->db->join('master_kelas f', 'a.id_guru=f.guru_id AND b.id_tp='.$id_tp, 'left');
        //$this->db->join('level_kelas c', 'c.id_level=f.level_id', 'left');
        $this->db->where('a.id_user', $id_user);
        $query = $this->db->get()->row();
        return $query;
    }

}