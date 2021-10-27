<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Kelasmainmodel extends CI_Model {

    public function getAllKelasDrop($tp, $smt) {
        $this->db->select('*');
        $this->db->from('master_kelas');
        $this->db->where('id_tp', $tp);
        $this->db->where('id_smt', $smt);
        $result = $this->db->get()->result();
        if ($result) {
            foreach ($result as $key => $row) {
                $ret [$row->id_kelas] = $row->nama_kelas;
            }
        } else {
            $ret = [];
        }
        return $ret;
    }

    public function getAllKelas($tp, $smt) {
        $this->db->select('*');
        $this->db->from('master_kelas');
        $this->db->where('id_tp', $tp);
        $this->db->where('id_smt', $smt);
        $result = $this->db->get()->result();
        return $result;
    }

    public function loadJadwalHariIni($id_tp, $id_smt, $id_kelas = null, $id_hari=null) {
        $this->db->select('*');
        $this->db->from('kelas_jadwal_mapel a');
        $this->db->join('master_mapel b', 'b.id_mapel=a.id_mapel', 'left');

        $this->db->where('a.id_tp', $id_tp);
        $this->db->where('a.id_smt', $id_smt);
        if ($id_kelas != null) {
            $this->db->where('a.id_kelas', $id_kelas);
        }
        if ($id_hari!=null) {
            $this->db->where('a.id_hari', $id_hari);
        }

        $query = $this->db->get()->result();
        return $query;
    }

}