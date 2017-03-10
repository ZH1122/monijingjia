<?php
/*
 * 
 * __hao
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminPlan extends CI_Controller{
    //显示竞价计划
    public function __construct(){
        //$this->need_login = true;
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('admin/adminplan_model');
    }
    public function index($offset=''){
        $offset1=intval($offset);
        $count=$this->adminplan_model->getAllCount();
        $row=20;
        $url=site_url('admin/adminplan/index');
        $uri=4;
        $data['page']=$this->page($count, $row, $url, $uri);
        $data['lists']=$this->adminplan_model->index($offset1,$row);
        $this->load->view("admin/header.html",array('title'=>'竞价计划管理'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/adminplan.html',$data);
    }
    //显示竞价详情
    public function showPlan($id=''){
        $query=$this->adminplan_model->getUnitId($id);
        $unit_id=$query[0]['unit_id'];
        $data['lists']=$this->adminplan_model->getAllIdea($unit_id);
        $this->load->view("admin/header.html",array('title'=>'计划详情'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/showIdea.html',$data);
    }
    //批准竞价
    public function confirm($id=''){
        
        if($this->adminplan_model->confirm($id)){
        
            redirect('admin/adminplan/index');
        }else{
            echo '修改失败';
        }
    }
    //拒绝竞价
    public function deny($id='') {
    if($this->adminplan_model->deny($id)){
            
            redirect('admin/adminplan/index');
        }else{
            echo '修改失败';
        }
    }
    public function page_config($count,$row,$url,$uri){
        $config=array(
            'base_url'=>$url,
            'uri_segment'=>$uri,
            'total_rows'=>$count,
            'per_page'=>$row,
            'first_link'=>'首页',
            'last_link'=>'尾页',
            'next_link'=>'下一页>',
            'prev_link'=>'<上一页',
    
        );
        return $config;
    }
    public function page($count, $row, $url,$uri){
        $config=$this->page_config($count, $row, $url,$uri);
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}