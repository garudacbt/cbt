<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Mapelmodel extends CI_Model {

    public function getAllMapel($jenjang) {
        if ($jenjang == "1") {
            $this->db->where('jenjang=0 OR jenjang=1');
        } elseif ($jenjang == "2") {
            $this->db->where('jenjang=2 OR jenjang=1');
        }
        $this->db->where('status', '1');
        return $this->db->get('master_mapel')->result();
    }

}