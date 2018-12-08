<?php

class Index_controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title'] = "首頁";
        $data['page'] = "index";
        $data['user'] = $this->session->userdata('session_id');

        $this->load->view('templates/header', $data);
        $this->load->view('index');
        $this->load->view('templates/footer', $data);
    }

}

?>