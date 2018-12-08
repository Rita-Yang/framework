<?php
class Activity_list extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('activities_model', 'act_model');
    }
    public function index(){
        $data['title'] = '活動列表';
        $data['page'] = 'activity_list';
        $data['user'] = $this->session->userdata('session_id');
        
        $this->load->view('templates/header', $data);
        $this->load->view('activity/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function activity(){
        $data['title'] = '活動專區';
        $data['page'] = 'activity';
        $data['user'] = $this->session->userdata('session_id');

        $this->load->view('templates/header', $data);
        $this->load->view('activity/activity', $data);
        $this->load->view('templates/footer', $data);
    }

    public function loadmore(){
        $showimg = !empty($_POST['button']) ? 8 : 32 ; //一開始顯示32張圖，之後載8張
        $morebtn = !empty($_POST['button']) ? intval($_POST['button']): NULL;
        $startimg = !empty($_POST['button']) ? 24 + $morebtn * $showimg : $morebtn * $showimg ;
        // echo "<script>console.Log('showimg'+$showimg);</script>";
        echo $this->act_model->get($showimg, $morebtn, $startimg);
    }

    public function loadProductSelect(){
        $p_cate = isset($_GET['p_cate']) ? intval($_GET['p_cate']) : NULL;
        echo $this->act_model->get_Product($p_cate);
    }

    public function uploadImg(){
        echo $this->act_model->uploadImg();
    }

}
?>