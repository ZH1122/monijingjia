<?php
/*用户中心->推广计划管理模型
/*time:2016/10/15   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Manageplan_model extends CI_Model{
    public function __construc(){
        $this->load->database();
    }

    //推广计划显示
    public function getPlan($user_id){
        $condition['user_id']=$user_id;
        $query = $this->db->where($condition)->get('jingjia_plan');
        return $query->result_array();//返回查询结果，可多行
    }

   //添加推广计划
    public function addPlan($user_id,$plan_name,$plan_budget){
        $data = array(
            'user_id'=>$user_id,
            'plan_name' =>$plan_name,
            'plan_budget' => $plan_budget,
            'plan_state'=>3,
            'plan_consume'=>0
        );
        $this->db->insert('jingjia_plan', $data);
    }

    //显示单个推广计划（修改时候使用）
    public function getoncePlan($plan_id){
        $this->load->database();
        $condition1['plan_id']=$plan_id;
        $getoncequery= $this->db->where($condition1)->get('jingjia_plan');
        return $getoncequery->result_array();//返回查询结果，可多行
    }

    //编辑推广计划
    public function updataPlan($plan_id,$plan_name,$plan_budget){
        $this->load->database();
        $data = array(
            'plan_name' =>$plan_name,
            'plan_budget' => $plan_budget,
            'plan_state'=>"无效",
            'plan_consume'=>0
        );
        $this->db->where('plan_id',$plan_id);
        $this->db->update('jingjia_plan', $data);
    }

    //删除推广计划
    //备注：删除推广计划的时候应该删除对应的推广单元，推广创意，关键词表
    public  function deletePlan($plan_id){
        $this->load->database();
        $this->db->where('plan_id',$plan_id);
        $this->db->delete('jingjia_plan');
    }



}