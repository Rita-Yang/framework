<?php

class Activities_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($showimg = NULL, $morebtn = NULL, $startimg = NULL){
        $this->db->select('*');
        $this->db->from('activities');
        $this->db->where('act_check', 1);
        $this->db->order_by('sid DESC');
        $this->db->limit($startimg, $showimg);
        $query = $this->db->get();

        $this->db->select('1');
        $this->db->from('activities');
        $this->db->where('act_check', 1);
        $query2 = $this->db->get();
        $total = $this->db->count_all($query2);
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

        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('p_category', $p_cate);
        $query = $this->db->get();

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