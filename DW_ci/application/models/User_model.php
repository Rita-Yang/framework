<?php

class User_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get($email = NULL){
        $sql = "";
        $myData = array();
        if(!empty($_POST['l_email']) && !empty($_POST['l_pwd'])){
            $l_email = $this->db->escape_str( $_POST['l_email'] );
            $l_pwd = sha1( $_POST['l_pwd'] );
            $sql = "SELECT * FROM members WHERE email = '$l_email' AND password = '$l_pwd'";
        }else{
            $sql = "SELECT * FROM members WHERE email = '$email'";
        }
        $query = $this->db->query($sql);
        foreach($query->result_array() as $row){
            $myData = $row;    
        }
        return $myData;
    }

    public function checkEmail($email = NULL){
        // 串註冊
        $em = $this->db->escape_str( $email );
        $sql = "SELECT email FROM members WHERE email = '$em'";
        $query = $this->db->query($sql);
        $count = $query->num_rows();
        
        return $count;
    }

    public function set_user($name = NULL, $email = NULL, $pwd = NULL){
        $setData = array(
            'name' => $name,
            'email' => $email,
            'password' => $pwd,
            'create_date' => date("Y-m-d")
        );
        $this->db->insert('members', $setData);
        $row = $this->get($email);
        return $row;
    }

    public function edit($birth = NULL){
        $sid = $_SESSION['user']['sid'];
        if($birth != NULL){
            $array = array(
                'name' => $_POST['name'],
                'gender' => $_POST['gender'],
                'birthday' => $birth,
                'mobile' => $_POST['mobile'],
                'address' => $_POST['address']
            );
        }else{
            $array = array(
                'name' => $_POST['name'],
                'gender' => $_POST['gender'],
                'mobile' => $_POST['mobile'],
                'address' => $_POST['address']
            );
        }
        try{
            $this->db->where('sid', $sid);
            $this->db->update('members', $array);
            echo "<script>alert('資料修改完成！');</script>";
        }catch(Exception $e){
            echo "<script>alert('發生錯誤，修改未完成．');</script>";
        }
    }
}

?>