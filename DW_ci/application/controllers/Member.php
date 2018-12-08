<?php

class Member extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index(){
        $data['title'] = "會員資料修改";
        $data['page'] = "member";
        if(isset($_SESSION['user'])){
            $data['row'] = $this->user_model->get($_SESSION['user']['email']);
            if(!empty($_POST['mobile']) && !empty($_POST['address'])){
                $this->user_model->edit($_POST['birth']);
                $data['row'] = $this->user_model->get($_SESSION['user']['email']);          
            }
        }else{
            echo "<script>alert('請先登入會員');location.href='../member/logReg';</script>";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function logReg(){
        $data['title'] = "登入註冊";
        $data['page'] = "logReg";
        
        if(!isset($_SESSION['user'])){
            if(isset($_POST['r_email'])):
                $emailCount = $this->user_model->checkEmail($_POST['r_email']);
                $data['title'] = "註冊會員";
                $r_name = $_POST['r_name'];
                $r_email = $_POST['r_email'];

                if($emailCount<1){
                    $_SESSION['user'] = $this->user_model->set_user($r_name, $r_email, sha1($r_pwd));
                    echo "<script>alert('註冊成功！');location.href='".$_SESSION['goback']."';</script>";
                }else{
                    echo "<script>alert('帳號重複！');</script>";
                }
            endif;
        }

        if(isset($_POST['l_email'])) {
            $memberCount = $this->user_model->checkEmail($_POST['l_email']);
            if($memberCount == 1) {
                $_SESSION['user'] = $this->user_model->get();
                echo "<script>location.href='".$_SESSION['goback']."';</script>";
            } else {
                echo "<script>alert('帳號或密碼錯誤!')</script>";            
            }
        }else{
            if($_SERVER['HTTP_REFERER'] != 'http://localhost:8888/DW_ci/member/logReg'){
                $_SESSION['goback'] = $_SERVER['HTTP_REFERER'];
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('member/logReg', $data);
        $this->load->view('templates/footer', $data);
    }
    public function order_list(){

        $this->load->view('templates/header', $data);
        $this->load->view('member/logReg', $data);
        $this->load->view('templates/footer', $data);
    }
    public function logout(){
        $data['title'] = "登出成功";
        $data['page'] = "logout";
        unset($_SESSION['user']);
        echo "<script>alert('您已登出');location.href='../';</script>";
    }
}

?>