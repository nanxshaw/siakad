
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_raport extends CI_Model{	
	public $tables = 'nilai_mapel';
	public $tables_2 = 'nilai';
	public $tables_3 = 'mapel';
	public $tables_4 = 'siswa';
	
	function __construct()
    {
        parent::__construct();
        $this->load->database();
	}

	function all(){		
		return $this->db->query("SELECT * FROM nilai AS a RIGHT JOIN siswa AS b ON a.id_siswa = b.id_siswa");
	}

	function all_raport(){		
		return $this->db->query("SELECT * FROM nilai AS a INNER JOIN nilai_mapel AS b ON a.id_siswa = b.id_siswa INNER JOIN siswa AS c ON a.id_siswa = c.id_siswa GROUP BY a.id_siswa");
	}

	

	function all_raports($id){		
		return $this->db->query("SELECT b.id_siswa, b.semester, d.nama_mapel, c.nama, AVG(b.nilai) AS total FROM nilai AS a INNER JOIN nilai_mapel AS b ON a.id_siswa = b.id_siswa INNER JOIN siswa AS c ON a.id_siswa = c.id_siswa INNER JOIN mapel AS d ON b.id_mapel = d.id_mapel WHERE b.id_siswa = ".$id." GROUP BY b.semester, d.id_mapel");
	}

	function total($id){		
		return $this->db->query("SELECT AVG(nilai) AS total FROM nilai_mapel WHERE id_siswa = ".$id);
	}

	function where_nilai_mapel($id){		
		return $this->db->query("SELECT * FROM nilai_mapel WHERE id_siswa = ".$id." GROUP BY semester");
	}

	
	function all_mapel(){		
		return $this->db->get($this->tables_3);
	}	

	function where_siswa($where){			
		return $this->db->get_where($this->tables_4,$where);
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


}
