<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recharge extends CI_Controller{
    public function __construct(){
        //$this->need_login = true;
        parent::__construct();
        
        $this->load->model('admin/recharge_model');
    }
    //显示代充值信息
    public function index($offset=''){
        $data['lists']=$this->recharge_model->show();
        $this->load->view("admin/header.html",array('title'=>'充值管理'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/confirm_recharge.html',$data);
    }
    //确认充值
    public function confirm($id=''){
        $this->recharge_model->update($id);
        redirect('admin/recharge/index');
    }
    //拒绝充值
    public function deny($id=''){
        $this->recharge_model->deny($id);
        redirect('admin/recharge/index');
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