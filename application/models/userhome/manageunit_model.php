<?php
/*用户中心->推广单元管理模型
/*time:2016/10/19   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Manageunit_model extends CI_Model{
    public function __construc(){
        $this->load->database();
    }

    //推广单元显示
    public function getUnit($user_id){
        // SELECT * FROM `jingjia_unit`,`jingjia_plan` WHERE jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id="2"
        $this->load->database();

        $this->db->select('*');
        $this->db->from('jingjia_unit');
        $this->db->join('jingjia_plan', 'jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id='."$user_id");
        //获取查询结果！
        $query = $this->db->get();
        $res  = $query->result_array();
        //print_r($res);
        return   $res ;
    }

    //添加推广单元
    public function addUnit($plan_id,$unit_name){
        $this->load->database();
        $data = array(
            'plan_id'=>$plan_id,
            'unit_name' => $unit_name,
        );
        $this->db->insert('jingjia_unit', $data);
    }

    //显示单个推广单元（修改时候使用）
    public function getonceUnit($unit_id){
        $this->load->database();
        $condition1['unit_id']=$unit_id;
        $getoncequery= $this->db->where($condition1)->get('jingjia_unit');
        return $getoncequery->result_array();//返回查询结果，可多行
    }

    //编辑推广单元
    public function updataUnit($unit_id,$unit_name){
        $this->load->database();
        $data = array(
            'unit_name' => $unit_name
        );
        $this->db->where('unit_id',$unit_id);
        $this->db->update('jingjia_unit', $data);
    }

    //删除推广单元
    /*备注：删除推广单元的时候应该删除对应的推广创意，关键词表* */
    public  function deleteUnit($delunit_id){
        $this->load->database();
        $this->db->query(" delete  from `jingjia_idea`  WHERE `unit_id`in ($delunit_id) ");
        $this->db->query(" delete  from `jingjia_unit_kw`  WHERE `unit_id` in ($delunit_id) ");
        $this->db->query(" delete  from `jingjia_unit`  WHERE `unit_id` in ($delunit_id) ");

    }






}