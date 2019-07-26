<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_guru');
        $this->load->library('session');
    }

    public function index(){ 
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'List Guru',
            'title' => 'List Guru'

        );
        $data['row'] = $this->m_guru->all()->result();
        // print_r($this->session->userdata());
        // if(!$user){
        //     redirect("/");
        // }else{
            $this->load->view('template/header');
            $this->load->view('guru/data_guru', $data);
            $this->load->view('template/footer');
        // }
    }

    public function form_detail_guru($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Detail Guru',
            'title' => 'Detail Guru',
            'kode' => $id
        );
        $data['row'] = $this->m_guru->detail($id)->row();
        $this->load->view('template/header');
        $this->load->view('guru/detail_guru',$data);
        $this->load->view('template/footer');
    }
    
    public function form_insert_guru(){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Tambah Guru',
            'title' => 'Tambah Guru'
        );
        $data['row'] = $this->m_guru->all_mapel()->result();
        $this->load->view('template/header');
        $this->load->view('guru/insert_guru',$data);
        $this->load->view('template/footer');
    
    }

    public function add_data(){ 
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $tgl = $this->input->post('tgl_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $mapel = $this->input->post('mapel');
        $jk = $this->input->post('jenis_kelamin');

            $where = array(
                'nip' => $nip,
                'nama' => $nama, 
                'tgl_lahir' => $tgl, 
                'kewarganegaraan' => $kewarganegaraan, 
                'id_mapel' => $mapel, 
                'jenis_kelamin' => $jk,
            );
            $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Tambah Data</div>');  
        $form_data = array();
        $data = $this->m_guru->insert($where);
        if($data){
            $form_data['success'] = true;  
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
         
    }

    public function form_edit_guru($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Edit Guru',
            'title' => 'Edit Guru',
            'kode' => $id
        );
        $data['rows'] = $this->m_guru->all_mapel()->result();
        $data['row'] = $this->m_guru->where(array('id_guru' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('guru/edit_guru',$data);
        $this->load->view('template/footer');
    
    }

    public function edit_data(){ 
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $tgl = $this->input->post('tgl_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $mapel = $this->input->post('mapel');
        $jk = $this->input->post('jenis_kelamin');
            $where = array(
                'nip' => $nip,
                'nama' => $nama, 
                'tgl_lahir' => $tgl, 
                'kewarganegaraan' => $kewarganegaraan, 
                'id_mapel' => $mapel, 
                'jenis_kelamin' => $jk,
            );
            
        $form_data = array();
        $data = $this->m_guru->update($where,array('id_guru' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Edit Data</div>');  
        if($data){
            $form_data['success'] = true; 
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
    }

    public function del_data(){
        
        $id = $this->input->post('id');
        $this->m_guru->delete(array('id_guru' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Dihapus</div>');
        redirect('index.php/guru');
    }
}