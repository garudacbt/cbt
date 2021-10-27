<?php
/**
 * Created by IntelliJ IDEA.
 * User: AbangAzmi
 * Date: 25/04/2021
 * Time: 22:25
 */

class Apimodel extends CI_Model {

    public function get_where($table, $pk, $id, $join = null, $order = null) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($pk, $id);

        if($join !== null){
            foreach($join as $table => $field){
                $this->db->join($table, $field);
            }
        }

        if($order !== null){
            foreach($order as $field => $sort){
                $this->db->order_by($field, $sort);
            }
        }

        $query = $this->db->get();
        return $query;
    }

    public function total($table, $where=null) {
        if ($where !=null) $this->db->where($where);
        $query = $this->db->get($table)->num_rows();
        return $query;
    }

    public function totalJadwal() {
        $this->db->select('*');
        $query = $this->db->get('cbt_jadwal')->num_rows();
        return $query;
    }

    public function getTahun() {
        $this->db->order_by('tahun', 'ASC');
        $result = $this->db->get('master_tp')->result();
        return $result;
    }

    public function getTahunById($id) {
        $result = $this->db->get_where('master_tp', 'id_tp='.$id)->row();
        return $result;
    }

    public function getTahunActive() {
        $this->db->select('id_tp, tahun');
        $this->db->from('master_tp');
        $this->db->where('active', 1);
        $result = $this->db->get()->row();
        return $result;
    }

    public function getSemester() {
        $this->db->order_by('smt', 'ASC');
        $result = $this->db->get('master_smt')->result();
        return $result;
    }

    public function getSemesterById($id) {
        $result = $this->db->get_where('master_smt', 'id_smt='.$id)->row();
        return $result;
    }

    public function getSemesterActive() {
        $this->db->select('id_smt, nama_smt, smt');
        $this->db->from('master_smt');
        $this->db->where('active', 1);
        $result = $this->db->get()->row();
        return $result;
    }

    public function totalWaliKelas() {
        $query = $this->get_where('jabatan_guru', 'id_jabatan', '4')->num_rows();
        return $query;
    }

    public function totalSiswaKelas($id_kelas, $id_tp, $id_smt) {
        $this->db->select('a.id_siswa');
        $this->db->from('kelas_siswa a');
        $this->db->where('a.id_tp', $id_tp);
        $this->db->where('a.id_smt', $id_smt);
        $this->db->where('a.id_kelas', $id_kelas);
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function getSetting() {
        return $this->db->get('setting')->row();
    }

    public function admin_box() {
        $setting = $this->getSetting();
        $where = '';
        if ($setting->jenjang == "1") {
            $where = 'jenjang=0 OR jenjang=1';
        } elseif ($setting->jenjang == "2") {
            $where = 'jenjang=2 OR jenjang=1';
        }

        $box = [
            [
                'box' 		=> 'blue',
                'total' 	=> $this->total('master_siswa'),
                'title'		=> 'Siswa',
                'url'		=> 'datasiswa',
                'icon'		=> 'users'
            ],
            [
                'box' 		=> 'cyan',
                'total' 	=> $this->total('master_kelas'),
                'title'		=> 'Rombel',
                'url'		=> 'datakelas',
                'icon'		=> 'bell'
            ],
            [
                'box' 		=> 'teal',
                'total' 	=> $this->total('master_guru'),
                'title'		=> 'Guru',
                'url'		=> 'dataguru',
                'icon'		=> 'user'
            ],
            [
                'box' 		=> 'fuchsia',
                'total' 	=> $this->totalWaliKelas(),
                'title'		=> 'Wali Kelas',
                'url'		=> 'dataguru',
                'icon'		=> 'user'
            ],
            [
                'box' 		=> 'success',
                'total' 	=> $this->total('master_mapel', $where),
                'title'		=> 'Mapel',
                'url'		=> 'datamapel',
                'icon'		=> 'book'
            ],
            [
                'box' 		=> 'yellow',
                'total' 	=> $this->total('master_ekstra'),
                'title'		=> 'Ekstrakurikuler',
                'url'		=> 'dataekstra',
                'icon'		=> 'book'
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }

    public function guru_box() {
        $setting = $this->getSetting();
        $where = '';
        if ($setting->jenjang == "1") {
            $where = 'jenjang=0 OR jenjang=1';
        } elseif ($setting->jenjang == "2") {
            $where = 'jenjang=2 OR jenjang=1';
        }
        $box = [
            [
                'box' 		=> 'teal',
                'total' 	=> $this->total('master_kelas'),
                'title'		=> 'Rombel',
                'icon'		=> 'user'
            ],
            [
                'box' 		=> 'blue',
                'total' 	=> $this->total('master_siswa'),
                'title'		=> 'Siswa',
                'icon'		=> 'users'
            ],
            [
                'box' 		=> 'fuchsia',
                'total' 	=> $this->total('master_guru'),
                'title'		=> 'Guru',
                'icon'		=> 'user'
            ],
            [
                'box' 		=> 'success',
                'total' 	=> $this->total('master_mapel', $where),
                'title'		=> 'Mapel',
                'icon'		=> 'book'
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }

    public function ujian_box() {
        $box = [
            [
                'box' 		=> 'indigo',
                'total' 	=> $this->total('cbt_ruang'),
                'title'		=> 'Ruang Ujian',
                'url'		=> 'cbtruang',
                'icon'		=> 'school'
            ],
            [
                'box' 		=> 'maroon',
                'total' 	=> $this->total('cbt_sesi'),
                'title'		=> 'Sesi',
                'url'		=> 'cbtsesi',
                'icon'		=> 'clock'
            ],
            [
                'box' 		=> 'green',
                'total' 	=> $this->total('cbt_bank_soal'),
                'title'		=> 'Bank Soal',
                'url'		=> 'cbtbanksoal',
                'icon'		=> 'folder'
            ],
            /*
			[
				'box' 		=> 'teal',
				'total' 	=> $this->totalPengawas(),
				'title'		=> 'Pengawas',
                'url'		=> 'cbtpengawas',
				'icon'		=> 'user'
			],*/
            [
                'box' 		=> 'teal',
                'total' 	=> $this->totalJadwal(),
                'title'		=> 'Jadwal',
                'url'		=> 'cbtjadwal',
                'icon'		=> 'clock'
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }

    public function menu_siswa_box() {
        $box = [
            [
                'title'		=> 'Jadwal Pelajaran',
                'icon'		=> 'ic_online',
                'link'		=> 'jadwalpelajaran'
            ],
            [
                'title'		=> 'Materi',
                'icon'		=> 'ic_elearning',
                'link'		=> 'materi'
            ],
            [
                'title'		=> 'Tugas',
                'icon'		=> 'ic_questions',
                'link'		=> 'tugas'
            ],
            [
                'title'		=> 'Ujian / Ulangan',
                'icon'		=> 'ic_question',
                'link'		=> 'cbt'
            ],
            [
                'title'		=> 'Nilai Hasil',
                'icon'		=> 'ic_exam',
                'link'		=> 'hasil'
            ],
            [
                'title'		=> 'Absensi',
                'icon'		=> 'ic_clipboard',
                'link'		=> 'kehadiran'
            ],
            /*
            [
                'title'		=> 'Prestasi',
                'icon'		=> 'ic_trophy',
                'link'		=> 'prestasi'
            ],
            */
            [
                'title'		=> 'Catatan Guru',
                'icon'		=> 'ic_student',
                'link'		=> 'catatan'
            ],
            /*
            [
                'title'		=> 'Pengumuman',
                'icon'		=> 'ic_innovation',
                'link'		=> 'pengumuman'
            ],
            /*
			[
				'title'		=> 'Perpustakaan',
				'icon'		=> 'ic_online_library',
				'link'		=> 'pustaka'
			],
            */
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }

    public function getRunningText() {
        return $this->db->get('running_text')->result();
    }

    public function loadPengumuman($id_for) {
        $this->db->select('a.*, b.nama_guru, b.foto');
        $this->db->from('pengumuman a');
        $this->db->join('master_guru b', 'a.dari=b.id_guru', 'left');
        $this->db->where('kepada', $id_for);
        $query = $this->db->get()->result();
        return $query;
    }

}