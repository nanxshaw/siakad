<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_raport');
        $this->load->library('session');
    }

    public function index(){ 
        $data['page'] = array(
            'page1' => 'Raport',
            'page2' => 'Daftar Raport',
            'title' => 'Daftar Raport'

        );
        // $data['row'] = $this->m_raport->all_mapel()->result();
        $data['rows'] = $this->m_raport->all_raport()->result();
            $this->load->view('template/header');
            $this->load->view('raport/data_raport', $data);
            $this->load->view('template/footer');
    }

    public function detail_form_raport($id_siswa){
        $data['page'] = array(
            'page1' => 'Raport',
            'page2' => 'Detail Raport',
            'title' => 'Detail Raport',
            'id' => $id_siswa,
        );
        $data['row'] = $this->m_raport->where_siswa(array('id_siswa' => $id_siswa ))->row();
        $data['nilai'] = $this->m_raport->where_nilai_mapel($id_siswa)->result();
        $data['rows'] = $this->m_raport->all_raports($id_siswa)->result();
        $data['total'] = $this->m_raport->total($id_siswa)->row();
        $x = $data['total']->total;
        $this->load->view('template/header');
        $this->load->view('raport/detail_raport',$data);
        $this->load->view('template/footer');
    
    }



}