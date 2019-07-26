<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_mapel');
        $this->load->library('session');
    }
    public function index(){ 
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'List Mapel',
            'title' => 'List Mapel'

        );
        $data['row'] = $this->m_mapel->all()->result();
            $this->load->view('template/header');
            $this->load->view('mapel/data_mapel', $data);
            $this->load->view('template/footer');
    }

    public function form_insert_mapel(){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Tambah Mapel',
            'title' => 'Tambah Mapel'
        );
        $this->load->view('template/header');
        $this->load->view('mapel/insert_mapel',$data);
        $this->load->view('template/footer');
    
    }

    public function add_data(){ 
        $kode = $this->input->post('kode');
        $nama = $this->input->post('nama');

            $where = array(
                'kode_mapel' => $kode,
                'nama_mapel' => $nama, 
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

    public function form_edit_mapel($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Edit Mapel',
            'title' => 'Edit Mapel',
            'kode' => $id
        );
        $data['row'] = $this->m_mapel->where(array('id_mapel' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('mapel/edit_mapel',$data);
        $this->load->view('template/footer');
    
    }

    public function edit_data(){ 
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

            $where = array(
                'nama_mapel' => $nama, 
            );  
        $form_data = array();
        $data = $this->m_mapel->update($where,array('id_mapel' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Edit Data</div>');  
        if($data){
            $form_data['success'] = true; 
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
    }

    public function form_detail_mapel($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Detail Mapel',
            'title' => 'Detail Mapel',
            'kode' => $id
        );
        $data['row'] = $this->m_mapel->where(array('id_mapel' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('mapel/detail_mapel',$data);
        $this->load->view('template/footer');
    }

    public function del_data(){
        
        $id = $this->input->post('id');
        $this->m_mapel->delete(array('id_mapel' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Dihapus</div>');
        redirect('index.php/mapel');
    }
}