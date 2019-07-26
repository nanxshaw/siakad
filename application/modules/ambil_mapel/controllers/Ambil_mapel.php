<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_mapel extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_mapel');
        $this->load->library('session');
    }
    public function index(){ 
        $data['page'] = array(
            'page1' => 'Pelajaran',
            'page2' => 'Daftar Siswa',
            'title' => 'Daftar Siswa'

        );
        $data['row'] = $this->m_mapel->all()->result();
            $this->load->view('template/header');
            $this->load->view('ambil_mapel/data_mapel', $data);
            $this->load->view('template/footer');
    }

    public function form_insert_mapel($id, $ses){
        $data['page'] = array(
            'page1' => 'Pelajaran',
            'page2' => 'Tambah Mapel',
            'title' => 'Tambah Mapel',
            'id' => $id,
            'ses' => $ses
        );
        $data['mapel'] = $this->m_mapel->all_mapel()->result();
        $this->load->view('template/header');
        $this->load->view('ambil_mapel/insert_mapel',$data);
        $this->load->view('template/footer');
    
    }

    public function select_guru($id){
        $data = $this->m_mapel->pilih_guru($id);
        $form_data = array();
            $form_data['success'] = true;  
            $form_data['length'] = $data->num_rows();
            $form_data['data'] = $data->result();  
        echo json_encode($form_data);
    }

    public function add_data(){ 
        $siswa = $this->input->post('siswa');
        $mapel = $this->input->post('mapel');
        $guru = $this->input->post('guru');
        $ses = $this->input->post('ses');

            $where = array(
                'id_siswa' => $siswa,
                'id_guru' => $guru,
                'semester_'.$ses => $mapel, 
            );  
        $form_data = array();
        $data = $this->m_mapel->insert($where);
        if($data){
            $form_data['success'] = true;  
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
         
    }


}