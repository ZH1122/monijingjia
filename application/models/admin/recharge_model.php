<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recharge_model extends CI_Model{
    public  function __construct(){
        parent::__construct();
        $this->load->database();
    }
    //显示充值信息
    public function show(){
        $condition['recharge_status']="0";
        $query=$this->db->where($condition)->get('jingjia_recharge');
        $recharge=$query->result_array();
        return $recharge;
    }
    //更新账户余额
    public function update($recharge_id){
        //修改充值状态
        $condition['recharge_id']=$recharge_id;
        $data['recharge_status']="1";
        $this->db->where($condition)->update('jingjia_recharge',$data);
        //提取充值金额
        $query=$this->db->where($condition)->get('jingjia_recharge')->row_array();//获取充值数据
        
        
        $add_money=$query["recharge_money"];//获取充值金额

        $user['user_id']=$query["user_id"];;//获取用户id
        $query=$this->db->where($user)->get('jingjia_user')->row_array();
        $user_balance=$query['user_balance'];
        //增加金额
        $balance['user_balance']=$add_money+$user_balance;
        
        if($this->db->where($user)->update('jingjia_user',$balance)){
            return true;
        }else{
            return false;
        }
    }
    public function deny($id=''){
        $condition['recharge_id']=$id;
        $data['recharge_status']="2";
        if($this->db->where($condition)->update('jingjia_recharge',$data)){
            return true;
        }else{
            return false;
        }
    }
}