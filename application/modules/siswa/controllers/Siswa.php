<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_siswa');
        $this->load->library('session');
    }
    public function index(){ 
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'List Siswa',
            'title' => 'List Siswa'

        );
        $data['row'] = $this->m_siswa->all()->result();
        // print_r($this->session->userdata());
        // if(!$user){
        //     redirect("/");
        // }else{
            $this->load->view('template/header');
            $this->load->view('siswa/data_siswa', $data);
            $this->load->view('template/footer');
        // }
    }

    public function form_insert_siswa(){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Tambah Siswa',
            'title' => 'Tambah Siswa'
        );
        $this->load->view('template/header');
        $this->load->view('siswa/insert_siswa',$data);
        $this->load->view('template/footer');
    
    }

    public function add_data(){ 
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $tgl = $this->input->post('tgl_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jenis_kelamin');

            $where = array(
                'nis' => $nis,
                'nama' => $nama, 
                'tgl_lahir' => $tgl, 
                'kewarganegaraan' => $kewarganegaraan, 
                'alamat' => $alamat, 
                'jenis_kelamin' => $jk,
            );
            $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Tambah Data</div>');  
        $form_data = array();
        $data = $this->m_siswa->insert($where);
        if($data){
            $form_data['success'] = true;  
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
         
    }

    public function form_edit_siswa($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Edit Siswa',
            'title' => 'Edit Siswa',
            'kode' => $id
        );
        $data['row'] = $this->m_siswa->where(array('id_siswa' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('siswa/edit_siswa',$data);
        $this->load->view('template/footer');
    
    }

    public function edit_data(){ 
        $id = $this->input->post('id');
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $tgl = $this->input->post('tgl_lahir');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jenis_kelamin');
            $where = array(
                'nis' => $nis,
                'nama' => $nama, 
                'tgl_lahir' => $tgl, 
                'kewarganegaraan' => $kewarganegaraan, 
                'alamat' => $alamat, 
                'jenis_kelamin' => $jk,
            );
            
        $form_data = array();
        $data = $this->m_siswa->update($where,array('id_siswa' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Edit Data</div>');  
        if($data){
            $form_data['success'] = true; 
        }else{
            $form_data['success'] = false;
        }
        echo json_encode($form_data);
    }

    public function form_detail_siswa($id){
        $data['page'] = array(
            'page1' => 'Master Data',
            'page2' => 'Detail Siswa',
            'title' => 'Detail Siswa',
            'kode' => $id
        );
        $data['row'] = $this->m_siswa->where(array('id_siswa' => $id))->row();
        $this->load->view('template/header');
        $this->load->view('siswa/detail_siswa',$data);
        $this->load->view('template/footer');
    }

    public function del_data(){
        
        $id = $this->input->post('id');
        $this->m_siswa->delete(array('id_siswa' => $id));
        $this->session->set_flashdata('data','<div class="alert alert-success">Berhasil Dihapus</div>');
        redirect('index.php/siswa');
    }
}