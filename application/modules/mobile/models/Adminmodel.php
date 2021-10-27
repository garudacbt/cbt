<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 23:07
 */

class Adminmodel extends CI_Model {

    public function getProfileAdmin($id_user) {
        $this->db->select('b.*');
        $this->db->from('users a');
        $this->db->join('users_profile b', 'a.id=b.id_user', 'left');
        $this->db->where('a.id', $id_user);
        $query = $this->db->get()->row();
        return $query;
    }

}