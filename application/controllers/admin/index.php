<?php
/*
 *
 * __hao
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller{
    public function __construct(){
        //$this->need_login = true;
        parent::__construct();
        $this->load->model('admin/index_model');
    }
    //用户数
    //未处理的充值数
    //关键词数量
    //有效的推广
    public function show(){
        $data['user']=$this->index_model->countUser();
        $data['recharge']=$this->index_model->countRecharge();
        $data['kw']=$this->index_model->countKw();
        $data['plan']=$this->index_model->countPlan();
        $adminshow['list']=$data;
        $this->load->view("admin/header.html",array('title'=>'管理员主页'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/index.html',$adminshow);
    }
}