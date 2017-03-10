<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminplan_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    // 显示所有竞价
    public function index($limit, $offset)
    {
        $condition['plan_state']=5;
        $query = $this->db->get_where('jingjia_plan',$condition, $limit, $offset);
        $allPlan = $query->result_array();
        return $allPlan;
    }
    // 确认竞价
    public function confirm($id = '')
    {
        $condition['plan_id'] = $id;
        $data['plan_state'] = "1";
        if ($this->db->where($condition)->update('jingjia_plan', $data)) {
            return true;
        } else {
            return false;
        }
    }
    // 拒绝竞价
    public function deny($id = '')
    {
        $condition['plan_id'] = $id;
        $data['plan_state'] = "5";
        if ($this->db->where($condition)->update('jingjia_plan', $data)) {
            return true;
        } else {
            return false;
        }
    }
    // 竞价详情
    public function getUnitId($id = '')
    {
        $plan['plan_id']=$id;
        $query=$this->db->where($plan)->get('jingjia_unit')->result_array();
        return $query;
    }
    public function getAllIdea($id=''){
        $condition['unit_id']=$id;
        $query = $this->db->get_where('jingjia_idea', $condition);
        $allIdea = $query->result_array();
        return $allIdea;
    }
    public function getAllCount()
    {
        return $this->db->count_all('jingjia_plan');
    }
}