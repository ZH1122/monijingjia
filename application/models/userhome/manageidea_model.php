<?php
/*用户中心->推广创意管理模型
/*time:2016/10/26   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Manageidea_model extends CI_Model{
    public function __construc(){
        $this->load->database();
    }

    //推广创意显示
    public function getIdea($user_id){
        //select * from `jingjia_unit`,`jingjia_plan`,`jingjia_idea` where jingjia_unit.unit_id=jingjia_idea.unit_id and jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id="2"
        $this->load->database();

        $query = $this->db->query("select * from `jingjia_unit`,`jingjia_plan`,`jingjia_idea` where jingjia_unit.unit_id=jingjia_idea.unit_id and jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_plan.user_id="."$user_id");
        //获取查询结果！
        $res  = $query->result_array();
        //print_r($res);
        return   $res ;
    }


    //添加推广创意里的单元选项显示
    public function getAddIdeaUnit($user_id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('jingjia_unit');
        $this->db->join('jingjia_plan', 'jingjia_unit.plan_id=jingjia_plan.plan_id and jingjia_unit.isset_idea=0 and jingjia_plan.user_id='."$user_id");
        $query = $this->db->get();
        $res  = $query->result_array();
        return   $res ;
    }


    //添加推广创意
    public function addIdea($unit_id,$idea_title,$idea_url,$idea_describr){
        $this->load->database();
        //插入新的推广创意
        $data1 = array(
            'unit_id'=>$unit_id,
            'idea_title'=>$idea_title,
            'idea_url'=>$idea_url,
            'idea_describr'=>$idea_describr,
            'idea_click'=>0,
            'idea_show'=>0,
        );
        $this->db->insert('jingjia_idea', $data1);

        //更新推广单元的idea_id字段
        $data2= array(
            'isset_idea'=>1
        );
        $this->db->where('unit_id',$unit_id);
        $this->db->update('jingjia_unit', $data2);
    }


    //显示单个推广创意（修改时候使用）
    public function getonceIdea($idea_id){
        $this->load->database();
        $condition1['idea_id']=$idea_id;

        $this->db->select('*');
        $this->db->from('jingjia_idea');
        $this->db->join('jingjia_unit', 'jingjia_unit.unit_id=jingjia_idea.unit_id  and jingjia_idea.idea_id='."$idea_id");
        $query = $this->db->get();
        $res  = $query->result_array();
        return   $res ;
    }


    //编辑推广创意
    public function updateIdea($idea_id,$unit_id,$idea_title,$idea_url,$idea_describr){
        $this->load->database();
        //插入新的推广创意
        $data= array(
            'unit_id'=>$unit_id,
            'idea_title'=>$idea_title,
            'idea_url'=>$idea_url,
            'idea_describr'=>$idea_describr,
            'idea_click'=>0,
            'idea_show'=>0,
        );
        $this->db->where('idea_id',$idea_id);
        $this->db->update('jingjia_idea', $data);
    }


    //删除推广创意
    public  function deleteIdea($idea_id,$unit_id){
        $this->load->database();

        $this->db->query(" delete  from `jingjia_idea`  WHERE `idea_id`in ($idea_id) ");
        //删除创意时候，所对应的推广单元内的isset_idea的值改为0
        //UPDATE `jingjia_unit` SET `isset_idea` ='0' WHERE `unit_id`in (1,2)
        $this->db->query("UPDATE `jingjia_unit` SET `isset_idea` ='0' WHERE `unit_id`in ($unit_id) ");
    }




}