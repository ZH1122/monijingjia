<?php
/*用户中心->推广关键词管理模型
/*time:2016/10/30   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Managekeyword_model extends CI_Model{
    public function __construc(){
        $this->load->database();
    }

    //推广关键词显示
    public function getKeyword($user_id){
        //select * from `jingjia_unit`,`jingjia_plan`,`jingjia_unit_kw`,`jingjia_keyword` where jingjia_keyword.kw_id=jingjia_unit_kw.kw_id and jingjia_unit.unit_id=jingjia_unit_kw.unit_id and jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id="2"
        $this->load->database();

        $query = $this->db->query("select * from `jingjia_unit`,`jingjia_plan`,`jingjia_unit_kw`
                                   where jingjia_unit.unit_id=jingjia_unit_kw.unit_id and jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id="."$user_id");
        //获取查询结果！
        $res  = $query->result_array();
       // print_r($res);
        return   $res ;
    }


    //添加关键词里的单元选项显示
    public function getAddKeywordUnit($user_id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('jingjia_unit');
        $this->db->join('jingjia_plan', 'jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id='."$user_id");
        $query = $this->db->get();
        $res  = $query->result_array();
        return   $res ;
    }

    //用户输入关键词后查找：模糊查找
    public function selectKeyword($postData){
        $this->load->database();
        //SELECT * FROM `jingjia_keyword` WHERE `kw_name` like "%百度%"
        $this->db->select('*');
        $this->db->from('jingjia_keyword');
        $where = "kw_name like '%".$postData."%'";
        $this->db->where($where);
        $query = $this->db->get();
        $res  = $query->result_array();
         //print_r($res);
        return   $res ;
    }




    //添加关键词
    public function addKeyword($kw_id,$unit_id){
        $this->load->database();
        //插入新的关键词
        foreach($kw_id as $row =>$value){
            $data[]=array(
                'kw_id'=>$value,
                'unit_id'=>$unit_id
            );
        }
        $this->db->insert_batch('jingjia_unit_kw', $data);

    }




    //删除关键词
    public  function deleteKeyword($delunit_kw_id){
        $this->load->database();
        $this->db->query(" delete  from `jingjia_unit_kw`  WHERE `unit_kw_id` in ($delunit_kw_id) ");
    }




}