<?php
/*用户中心->账户信息控制器
 * time:2016/10/15   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHinformation extends CI_Controller
{
    public function index(){
        $this->load->model('user/User_model');
        $user=$this->session->userdata('user');

        $this->load->view("templates/header",array('title'=>'个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/information",array('user'=>$user));
        $this->load->view("templates/footer");
    }

    //修改更新资料
    public function updateInformation(){


    }
}