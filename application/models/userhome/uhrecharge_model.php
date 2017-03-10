<?php
/*用户中心->财务充值模型
/*time:2016/10/26   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHrecharge_model extends CI_Model{
    public function __construc(){
        $this->load->database();
    }

    //显示用户充值状况
    public function getrecharge($user_id){

        $query = $this->db->query("SELECT * FROM jingjia_recharge where user_id=$user_id ORDER BY recharge_id DESC");
        $res  = $query->result_array();
        return   $res ;

    }


    //用户充值
    public function recharge($user_id,$recharge_money,$recharge_date){
            $data = array(
                'user_id'=>$user_id,
                'recharge_money' =>$recharge_money,
                'recharge_date' => $recharge_date,
                'recharge_status' =>0,
            );
            $this->db->insert('jingjia_recharge', $data);



    }





}