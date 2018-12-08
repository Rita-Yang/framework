<?php
class Brand extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $data['title'] = '品牌故事';
        $data['page'] = 'brand';
        $data['user'] = $this->session->userdata('session_id');
        
        $this->load->view('templates/header', $data);
        $this->load->view('brand');
        $this->load->view('templates/footer', $data);
    }
}
?>