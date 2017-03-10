<?php
/*用户中心->首页控制器
 * time:2016/10/13   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Userhome extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->model('user/User_model');
        $user=$this->session->userdata('user');

        $this->load->view("templates/header",array('title'=>'个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/userhome",array('user'=>$user));
        $this->load->view("templates/footer");
    }


    }