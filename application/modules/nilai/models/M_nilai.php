
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_nilai extends CI_Model{	
	public $tables = 'nilai_mapel';
	public $tables_2 = 'nilai';
	public $tables_3 = 'mapel';
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
	}

	function all(){		
		return $this->db->query("SELECT * FROM nilai AS a RIGHT JOIN siswa AS b ON a.id_siswa = b.id_siswa");
	}

	function all_nilai(){		
		return $this->db->query("SELECT * FROM nilai AS a INNER JOIN nilai_mapel AS b ON a.id_siswa = b.id_siswa INNER JOIN siswa AS c ON a.id_siswa = c.id_siswa GROUP BY a.id_siswa ORDER BY b.semester ASC");
	}
	
	function all_mapel(){		
		return $this->db->get($this->tables_3);
	}	

	function where_nilai($ses){
		return $this->db->query("SELECT * FROM nilai WHERE semester_".$ses." = 0");
	}

	function where($where){		
		return $this->db->get_where($this->tables,$where);
	}	

	function where_2($where){		
		return $this->db->get_where($this->tables_2,$where);
	}	

	function insert($where){
		$this->db->insert($this->tables,$where);
		return $this->db->insert_id();
	}

	function insert_2($where){
		$this->db->insert($this->tables_2,$where);
		return $this->db->insert_id();
	}

	function update($where, $id){
		return $this->db->update($this->tables_2,$where,$id);
	}

	function delete($id){
        return $this->db->delete($this->tables,$id);
	}

}
