<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Kelasjadwalmodel extends CI_Model {

    public function getAllJadwalKbm($id_tp, $id_smt) {
        $this->db->select('*');
        $this->db->from('kelas_jadwal_kbm');

        $this->db->where('id_tp', $id_tp);
        $this->db->where('id_smt', $id_smt);
        $query = $this->db->get()->result();
        return $query;
    }

    public function getJadwalKbmByKelas($id_tp, $id_smt, $id_kelas) {
        $this->db->select('*');
        $this->db->from('kelas_jadwal_kbm');

        $this->db->where('id_tp', $id_tp);
        $this->db->where('id_smt', $id_smt);
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get()->row();

        return $query;
    }
}