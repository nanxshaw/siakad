<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends MX_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('session');
    }
    
    public function index(){
        $this->load->view('auth/login');
    }

    public function login(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $where = array(
                'username' => $username,
                'password' => $password 
            );
            $cek_login = $this->m_user->where($where);
            $errors = array();
            $form_data = array();
            if($cek_login->num_rows() > 0){
                $sql = $cek_login->result_array();
                
                $items = array();
                foreach($sql as $key) {
                    $items = $key;
                }
                
                $this->session->set_userdata($items);
                
                $form_data['success'] = true;
                $form_data['posted'] = 'Data Was Posted Successfully';
                $form_data['rows'][] = $items;
            }else{
                $form_data['success'] = false;
                $form_data['errors']  = $errors;
            }
            echo json_encode($form_data);
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
    }
}
