<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_guru extends CI_Model{	
	public $tables = 'guru';
	public $tables_2 = 'mapel';
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
	}

	function all(){		
		$this->db->select('a.nip, a.nama, a.tgl_lahir, a.jenis_kelamin, a.kewarganegaraan, a.id_guru, b.nama_mapel')
			->from('guru AS a')
			->join('mapel AS b', 'a.id_mapel = b.id_mapel');
		return $this->db->get();
	}	

	function detail($id){		
		$this->db->select('a.nip, a.nama, a.tgl_lahir, a.jenis_kelamin, a.kewarganegaraan, a.id_guru, b.nama_mapel')
			->from('guru AS a')
			->join('mapel AS b', 'a.id_mapel = b.id_mapel')
			->where('a.id_guru',$id);
		return $this->db->get();
	}	

	function all_mapel(){
		return $this->db->get($this->tables_2);
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
