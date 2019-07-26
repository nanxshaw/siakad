<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_nilai');
        $this->load->library('session');
    }

    public function index(){ 
        $data['page'] = array(
            'page1' => 'Penilaian',
            'page2' => 'Daftar Raport',
            'title' => 'Daftar Raport'

        );
        $data['row'] = $this->m_nilai->all()->result();
            $this->load->view('template/header');
            $this->load->view('nilai/data_nilai', $data);
            $this->load->view('template/footer');
    }

    public function form_insert_nilai($semester, $id_siswa){
        $data['page'] = array(
            'page1' => 'Penilaian',
            'page2' => 'Tambah Nilai',
            'title' => 'Tambah Nilai',
            'id' => $id_siswa,
            'semester' => $semester
        );
        $data['row'] = $this->m_nilai->all_mapel()->result();
        $data['rows'] = $this->m_nilai->all_nilai()->result();
        $this->load->view('template/header');
        $this->load->view('nilai/insert_nilai',$data);
        $this->load->view('template/footer');
    
    }

    public function add_data(){ 
        $mapel = $this->input->post('mapel');
        $nilai = $this->input->post('nilai');
        $id = $this->input->post('id'); 
        $semester = $this->input->post('semester');
        
            $where = array(
                'id_siswa' => $id,
                'id_mapel' => $mapel,
                'nilai' => $nilai, 
                'semester' => $semester
            );  
        $form_data = array();
        $row = $this->m_nilai->where_2(array('id_siswa' => $id));
        if($row->num_rows() > 0){
            $ses = $this->m_nilai->where_nilai($semester);
            if($ses->num_rows() > 0){
                $data = $this->m_nilai->insert($where);
                $where2 = array(
                    'semester_'.$semester => $data, 
                );
                $data2 = $this->m_nilai->update($where2,array('id_siswa' => $id ));
                if($data){
                    $form_data['success'] = true;  
                }else{
                    $form_data['success'] = false;
                }
            }else{
                $data = $this->m_nilai->insert($where);
                if($data){
                    $form_data['success'] = true;  
                }else{
                    $form_data['success'] = false;
                }
            }
            
        }else{
            $data = $this->m_nilai->insert($where);
            $where2 = array(
                'id_siswa' => $id,
                'semester_'.$semester => $data,
            );  
            $data2 = $this->m_nilai->insert_2($where2);
            if($data){
                $form_data['success'] = true;  
            }else{
                $form_data['success'] = false;
            }
        }
        echo json_encode($form_data);
         
    }


}