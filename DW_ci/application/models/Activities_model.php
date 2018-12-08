<?php

class Activities_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get($showimg = NULL, $morebtn = NULL, $startimg = NULL){
        $sql = "SELECT * FROM activities WHERE act_check = 1 ORDER BY sid DESC LIMIT $startimg, $showimg";
        $query = $this->db->query($sql);

        $sql2 = "SELECT 1 FROM activities WHERE act_check = 1";
        $query2 = $this->db->query($sql2);
        $total = $query2->num_rows();
        $maxMore = !empty($morebtn) ? ceil(($total-32)/$showimg) : ceil($total/$showimg);

        $mydata = array(
            'maxMore' => $maxMore,
            'data' => array()
            );

        foreach($query->result_array() as $row) {
            $mydata['data'][] = $row;
        }

        return json_encode($mydata, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function get_Product($p_cate = NULL){
        $sql = "SELECT * FROM products WHERE p_category = $p_cate";
        $query = $this->db->query($sql);

        $mydata = array();

        if(!empty($p_cate)){
            foreach($query->result_array() as $row){
                $mydata[] = $row;
            }
        }

        return json_encode($mydata, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function uploadImg(){
        $tmp_file = isset($_POST['tmp_file']) ? $_POST['tmp_file'] : ''; //暫存路徑+檔名
        $filename = isset($_POST['filename']) ? $_POST['filename'] : ''; //檔名
        $name = "assets/images/upload/".$filename; //目標路徑+檔名
        $p_num = isset($_POST['p_num']) ? $_POST['p_num'] : ''; //商品貨號
        $des = isset($_POST['des']) ? $_POST['des'] : ''; //描述說明
        $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : ''; //聯絡電話
        $address = isset($_POST['address']) ? $_POST['address'] : ''; //聯絡地址
        $msid = isset($_SESSION['user']['sid']) ? $_SESSION['user']['sid'] : header('Location:activity_list'); //會員編號

        $arr = array(
            'member_sid' => $msid,
            'act_img_path' => $filename,
            'act_description' => $des,
            'act_p_num' => $p_num,
            'act_phone' => $mobile,
            'act_address' => $address,
            'act_check' => '0',
            'act_votes' => '0'
        );
        $this->db->insert('activities', $arr);

        rename($tmp_file, $name); //移動檔案

        return json_encode($name, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

}

?>