<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
        //用户数
     public function countUser(){
         return $this->db->count_all('jingjia_user');
     }
    //未处理的充值数
    public function countRecharge(){
        $condition['recharge_status']=0;
        return $this->db->where($condition)->count_all('jingjia_user');
    }
    //关键词数量
    public function countKw(){
        return $this->db->count_all('jingjia_keyword');
    }
    //有效的推广
    public function countPlan(){
        $condition['plan_state']=1;
        return $this->db->where($condition)->count_all('jingjia_plan');
    }
}