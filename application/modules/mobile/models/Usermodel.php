<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {
    
    public function getDatausers($id = null) {
        $this->datatables->select('users.id, username, first_name, last_name, email, FROM_UNIXTIME(created_on) as created_on, last_login, active, groups.name as level');
        $this->datatables->from('users_groups');
        $this->datatables->join('users', 'users_groups.user_id=users.id');
        $this->datatables->join('groups', 'users_groups.group_id=groups.id');
        if($id !== null){
            $this->datatables->where('users.id !=', $id);
        }
        return $this->datatables->generate();
    }

	public function getLevelGuru() {
		$query = $this->db->get('level_guru')->result();
		return $query;
	}

	public function getDataadmin() {
		$this->datatables->select('users.id, username, first_name, last_name, email, FROM_UNIXTIME(created_on) as created_on, last_login, active, groups.name as level');
		$this->datatables->from('users_groups');
		$this->datatables->join('users', 'users_groups.user_id=users.id');
		$this->datatables->join('groups', 'users_groups.group_id=groups.id');
		$this->datatables->where('group_id =', 1);
		return $this->datatables->generate();
	}
	/*
	public function getDatasiswa() {
		$this->datatables->select('users.id, username, first_name, last_name, email, FROM_UNIXTIME(created_on) as created_on, last_login, active, groups.name as level');
		$this->datatables->from('users_groups');
		$this->datatables->join('users', 'users_groups.user_id=users.id');
		$this->datatables->join('groups', 'users_groups.group_id=groups.id');
		$this->datatables->where('group_id =', 3);
		return $this->datatables->generate();
	}*/

	public function getUserGuru($tp, $smt) {
		$this->datatables->select('a.id_guru, a.nama_guru, a.username, a.password, c.level, e.id, (SELECT COUNT(id) FROM users WHERE e.username = a.username) AS aktif');
		$this->datatables->from('master_guru a');
		$this->datatables->join('jabatan_guru b', 'a.id_guru=b.id_guru AND b.id_tp='.$tp.' AND b.id_smt='.$smt.'', 'left');
		$this->datatables->join('level_guru c', 'b.id_jabatan=c.id_level', 'left');
		$this->datatables->join('users e', 'a.username=e.username', 'left');
		return $this->datatables->generate();
	}

	public function getDataGuru($id) {
		$this->db->select('*');
		$this->db->from('master_guru');
		$this->db->where('id_guru', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getDetailGuru($id) {
		$this->db->select('a.id_guru, a.nama_guru, a.username, a.password, a.email, c.level, e.id, (SELECT COUNT(id) FROM users WHERE e.username = a.username) AS aktif');
		$this->db->from('master_guru a');
		$this->db->join('jabatan_guru b', 'a.id_guru=b.id_guru', 'left');
		$this->db->join('level_guru c', 'b.id_jabatan=c.id_level', 'left');
		$this->db->join('users e', 'a.username=e.username', 'left');
		$this->db->where('a.id_guru', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getGuruByUsername($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('master_guru')->row();
		return $query;
	}

	public function getUsers($username) {
		$this->db->where('username', $username);
		$query = $this->db->get('users')->row();
		return $query;
	}

    public function getGroupSiswa() {
	    $this->db->select('*');
	    $this->db->from('users_groups a');
	    $this->db->join('users b', 'a.user_id=b.id', 'left');
        $this->db->where('group_id', 3);
        $query = $this->db->get()->result();
        return $query;
    }

	public function getKelas($tp, $smt) {
        $this->db->where('id_tp', $tp);
        $this->db->where('id_smt', $smt);
		$query = $this->db->get('master_kelas')->result();
		return $query;
	}

	public function getMapel() {
		$query = $this->db->get('master_mapel')->result();
		return $query;
	}

	public function getUserSiswa($tp, $smt) {
		$this->datatables->select('a.id_siswa, a.nis,.a.nama, a.username, a.password, c.nama_kelas, d.id, (SELECT COUNT(id) FROM users WHERE d.username = a.username) AS aktif');
		$this->datatables->from('master_siswa a');
		$this->datatables->join('kelas_siswa b', 'b.id_siswa=a.id_siswa AND b.id_tp='.$tp.' AND b.id_smt='.$smt.'', 'left');
		$this->datatables->join('master_kelas c', 'c.id_kelas=b.id_kelas', 'left');
		$this->datatables->join('users d', 'd.username=a.username', 'left');
		return $this->datatables->generate();
	}

	public function getDataSiswa($id) {
		$this->db->select('nis, nisn, nama, username, password');
		$this->db->from('master_siswa');
		$this->db->where('id_siswa', $id);
		$query = $this->db->get()->row();
		return $query;
	}

	public function getSiswaAktif() {
		$this->db->select('a.id_siswa, c.id, (SELECT COUNT(id) FROM users WHERE users.username = a.username) AS aktif');
		$this->db->join('users c', 'a.username=c.username', 'left');
		return $this->db->get('master_siswa a')->result();
	}

    public function getGuruAktif() {
        $this->db->select('a.id_guru, c.id, (SELECT COUNT(id) FROM users WHERE users.username = a.username) AS aktif');
        $this->db->join('users c', 'a.username=c.username', 'left');
        return $this->db->get('master_guru a')->result();
    }
}
