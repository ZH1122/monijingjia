<?php
/*
 * 
 * __hao
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    
    }
    public function login(){
        if(empty($this->session->userdata('admin'))){
        $this->load->view("admin/header.html",array('title'=>'管理员登录'));
        $this->load->view("admin/login.html");
        $this->load->view("admin/foot.html");
        }else{
            redirect('admin/index/show');
        }
    }
    public function signin(){
        //获取用户的输入
        $user_name=$this->input->post('username',true);
        $user_password=$this->input->post('password',true);

        $this->load->model('admin/admin_model');
        if(!empty($user=$this->admin_model->getUser($user_name,$user_password))){
            //登陆成功，保存用户到session，并跳转到个人中心
            $this->session->set_userdata('admin',$user_name);
            //echo "登陆成功";
            redirect('admin/index/show');
        }else{
            echo "帐号/密码错误";

        }
    }
    public  function logout(){
        $this->session->unset_userdata('admin');
        redirect('admin/admin/login');
    }
}