<?php
/*用户中心->推广管理控制器
 * time:2016/10/15   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHmanage extends CI_Controller
{
    public function index()
    {
        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

       $this->load->model('userhome/Manageplan_model');
        //print_r($user['user_id']);
        $plan=$this->Manageplan_model->getPlan($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/manageleftheader", array('user' => $user,'data'=>$plan));
        $this->load->view("userhome/manage/plan", array('user' => $user,'data'=>$plan));
        $this->load->view("templates/footer");
    }


}