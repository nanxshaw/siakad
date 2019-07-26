<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_mapel extends CI_Model{	
	public $tables = 'ambil_mapel';
	public $tables_2 = 'mapel';
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
	}

	function all(){		
		return $this->db->query("SELECT b.id_siswa, b.nama AS nama_siswa, c.nama AS nama_guru, a.semester_1, a.semester_2, a.semester_3, a.semester_4, a.semester_5,a.semester_6 FROM ambil_mapel AS a RIGHT JOIN siswa AS b ON a.id_siswa = b.id_siswa LEFT JOIN guru AS c ON a.id_guru = c.id_guru GROUP BY id_siswa");
	}	

	function all_mapel(){
		return $this->db->get($this->tables_2);
	}

	function pilih_guru($id){		
		$this->db->select('a.nip, a.nama, a.tgl_lahir, a.jenis_kelamin, a.kewarganegaraan, a.id_guru, b.nama_mapel')
			->from('guru AS a')
			->join('mapel AS b', 'a.id_mapel = b.id_mapel')
			->where('a.id_guru',$id);
		return $this->db->get();
	}	

	function where($where){		
		return $this->db->get_where($this->tables,$where);
	}	

	function insert($where){
		$this->db->insert($this->tables,$where);
		return $this->db->insert_id();
	}

	function update($where, $id){
		return $this->db->update($this->tables,$where,$id);
	}

	function delete($id){
        return $this->db->delete($this->tables,$id);
	}

}
